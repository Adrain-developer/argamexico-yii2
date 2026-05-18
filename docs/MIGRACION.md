# Migración ARGA México — Yii2 + PHP + Bootstrap

## Stack antes / después

| Componente | Antes | Después |
|---|---|---|
| PHP | 7.4 | 8.4 |
| Yii2 | 2.0.40 | ~2.0.45 |
| Bootstrap | 3.4.1 (bower-asset) | 5.x (yii2-bootstrap5) |
| Mailer | yii2-swiftmailer (EOL) | yii2-symfonymailer ~2.0 |
| Secrets | Hardcoded en config/ | Variables de entorno (.env) |
| Codeception | ^4.0 | ^5.0 |

---

## Ramas de trabajo

```
master                        ← producción (no tocar)
claude/update-php-yii-Biw7h  ← rama principal de migración (Fases 1 y 2)
feature/bootstrap5-upgrade    ← rediseño UX/UI (fase futura)
```

---

## Entornos

| Entorno | URL | Carpeta | APP_ENV |
|---|---|---|---|
| Producción | argamexico.com | public_html/ | prod |
| Staging | staging.argamexico.com | public_html/staging/ | staging |

**Document root** del subdominio staging → `public_html/staging/web/`

---

## Fase 1 — Upgrade PHP + Yii2 + Mailer + Dotenv

### composer.json — cambios clave

```json
"require": {
    "php": ">=8.1",
    "yiisoft/yii2": "~2.0.45",
    "yiisoft/yii2-bootstrap5": "~2.0.0",
    "yiisoft/yii2-symfonymailer": "~2.0.0",
    "vlucas/phpdotenv": "^5.6"
}
```

- **SwiftMailer eliminado** (`yii2-swiftmailer`): abandonado desde 2021.
- **Codeception** actualizado a `^5.0` para compatibilidad con PHP 8.4.
- **`symfony/browser-kit` y `codeception/specify`** eliminados (no requeridos en Codeception 5).

### Variables de entorno — `.env`

Las credenciales se movieron de `config/web.php` y `config/db.php` a `.env`.
El archivo `.env` **no se commitea** (está en `.gitignore`). Usar `.env.example` como plantilla.

```ini
APP_ENV=staging          # dev | staging | prod
APP_DEBUG=false          # true solo en local
COOKIE_VALIDATION_KEY=   # clave secreta de Yii2

DB_HOST=localhost
DB_NAME=
DB_USER=
DB_PASS=""               # comillas si contiene $ u otros caracteres especiales

MAIL_HOST=smtp.hostinger.com
MAIL_PORT=465
MAIL_ENCRYPTION=ssl
MAIL_USERNAME=
MAIL_PASSWORD=""
MAIL_FROM=
MAIL_FROM_NAME="ARGA Mexico"   # comillas obligatorias si tiene espacios
```

> **Regla dotenv:** valores con espacios o caracteres especiales (`$`, `!`) deben ir entre comillas dobles.

### Mailer — migración SwiftMailer → Symfony Mailer

```php
// Antes (SwiftMailer — config/web.php)
'class' => 'yii\swiftmailer\Mailer',
'transport' => ['class' => 'Swift_SmtpTransport', ...]

// Ahora (Symfony Mailer)
'class' => \yii\symfonymailer\Mailer::class,
'transport' => [
    'scheme'   => 'smtps',
    'host'     => $_ENV['MAIL_HOST'],
    'port'     => 465,
    'username' => $_ENV['MAIL_USERNAME'],
    'password' => $_ENV['MAIL_PASSWORD'],
]
```

### Entry point — `web/index.php`

El proyecto original tenía el entry point en la raíz (`index.php`).
Se creó `web/index.php` como entry point estándar Yii2 para que el document root del subdominio apunte a `web/`.

```php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();
// paths con /../ para referenciar vendor y config desde web/
```

### DB — charset actualizado

```php
// Antes
'charset' => 'utf8'
// Ahora
'charset' => 'utf8mb4'   // soporte completo Unicode (emojis, caracteres especiales)
```

---

## Fase 2 — Bootstrap 3 → Bootstrap 5

### Paquete composer

```json
// Eliminado
"yiisoft/yii2-bootstrap": "~2.0.0"

// Agregado
"yiisoft/yii2-bootstrap5": "~2.0.0"
```

### Namespaces actualizados

Todos los archivos que importaban `yii\bootstrap\*` fueron migrados a `yii\bootstrap5\*`:

| Archivo | Cambio |
|---|---|
| `views/layouts/main.php` | `Nav`, `NavBar` |
| `views/site/quejas.php` | `Nav`, `NavBar` |
| `views/site/login.php` | `ActiveForm` |
| `views/site/contacto.php` | `ActiveForm` |
| `views/argafire/index.php` | `ActiveForm` |
| `views/argafire/acreditacion.php` | `@var` |
| `views/site/codigoetica.php` | `@var` |
| `views/site/avisoprivacidad.php` | `@var` |
| `config/web.php` | `BootstrapAsset`, `BootstrapPluginAsset` |

> Las clases CSS de Bootstrap 3 en las vistas (`col-xs-*`, `panel`, `btn-default`, etc.)
> se actualizarán durante el rediseño UX/UI — **Fase 3**.

---

## Setup Staging — paso a paso

```bash
# 1. Clonar repo en la carpeta raíz (el punto es crítico)
cd public_html/staging
git clone https://github.com/Adrain-developer/argamexico-yii2.git .
git checkout claude/update-php-yii-Biw7h

# 2. Crear .env con credenciales reales
cp .env.example .env
nano .env

# 3. Instalar dependencias con PHP 8.4
/opt/alt/php84/usr/bin/php /usr/local/bin/composer update --no-dev --optimize-autoloader

# 4. Permisos
chmod 777 runtime/ web/assets/
chmod 755 yii

# 5. cPanel → Subdominios
#    Subdominio: staging.argamexico.com
#    Document root: public_html/staging/web
```

### En futuros deploys (lock file ya actualizado)

```bash
git pull origin claude/update-php-yii-Biw7h
/opt/alt/php84/usr/bin/php /usr/local/bin/composer install --no-dev --optimize-autoloader
```

---

## Fase 3 — Pendiente (Rediseño UX/UI)

- Migrar clases CSS Bootstrap 3 → Bootstrap 5 en todas las vistas
- `col-xs-*` → `col-*`, `panel` → `card`, `btn-default` → `btn-secondary`, etc.
- Nuevo diseño en rama `feature/bootstrap5-upgrade`
- QA visual completo antes de merge a master

---

## Problemas encontrados y soluciones

| Error | Causa | Solución |
|---|---|---|
| `yii2-symfonymailer ~1.5.0 not found` | Versión inexistente en packagist | Cambiar a `~2.0.0` |
| `codeception/module-yii2` incompatible | Requería PHP <8.4 | Actualizar Codeception a `^5.0` |
| `web/` muestra página default de Hostinger | `web/index.php` no existía | Crear `web/index.php` con paths `/../` |
| `Failed to parse dotenv — ARGA Mexico` | Valor con espacios sin comillas | `MAIL_FROM_NAME="ARGA Mexico"` |
| `cookieValidationKey must be configured` | `COOKIE_VALIDATION_KEY` vacío en `.env` | Agregar la clave en `.env` del servidor |
| `DB_PASS` / `MAIL_PASSWORD` vacíos | `$` en contraseña sin comillas | Encerrar valores entre comillas dobles |
| Error 500 debug module not found | `APP_ENV=dev` en staging sin deps dev | Cambiar a `APP_ENV=staging` |
| Git push rechazado (403 / divergent) | Staging commiteó `composer.lock` al remote | `git pull --rebase origin <rama>` luego push |
