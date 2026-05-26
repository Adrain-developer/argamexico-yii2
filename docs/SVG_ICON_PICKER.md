# SVG Icon Picker — Documentación de Feature

**Versión:** 1.0  
**Fecha:** 2026-05-26  
**Stack:** PHP 8.4 + Yii2 2.0.45 + Bootstrap 5.3 + Vanilla JS

---

## Descripción General

El **SVG Icon Picker** es un widget visual reutilizable que reemplaza el textarea crudo de `icon_svg` en los formularios de Divisiones y Servicios. Permite al administrador seleccionar un ícono de una librería visual precargada, con preview en tiempo real dentro del escudo ARGA.

---

## Arquitectura

```
config/svg-icons.php              ← Librería estática (32+ iconos)
views/partials/_icon-picker.php   ← Widget reutilizable
views/divisiones/_form.php        ← Integra picker (icono requerido)
views/servicios/_form.php         ← Integra picker (icono opcional)
```

### Decisión de diseño: PHP estático vs. tabla de BD

| Criterio | PHP estático ✅ | Tabla BD |
|---|---|---|
| Queries adicionales | 0 | 1 por página |
| Tiempo de carga | Instantáneo (opcode cache) | +5–20ms |
| Mantenimiento | Editar `config/svg-icons.php` | CRUD admin |
| Escalabilidad | Hasta ~100 iconos sin impacto | Ilimitado |

Para el volumen actual (30–60 iconos), la librería PHP estática es la opción óptima. Migrar a tabla DB solo vale la pena si se requiere gestión dinámica por parte del admin sin acceso al código.

---

## Librería de Iconos (`config/svg-icons.php`)

### Estructura de cada icono

```php
[
    'id'       => 'hardhat',           // slug único (solo a-z, guiones)
    'label'    => 'Casco de Seguridad', // nombre legible en español
    'category' => 'seguridad',          // clave de categoría (ver abajo)
    'svg'      => '<path d="..." stroke="white" .../>', // contenido SVG SIN <svg>
],
```

### Categorías disponibles

| Clave | Descripción | Iconos actuales |
|---|---|---|
| `seguridad` | Seguridad Industrial | 10 |
| `salud` | Salud Ocupacional | 6 |
| `ambiente` | Protección Ambiental | 5 |
| `capacitacion` | Capacitación y Formación | 4 |
| `higiene` | Higiene Industrial | 5 |
| `auditoria` | Auditoría e Inspección | 4 |
| `ergonomia` | Ergonomía | 3 |
| `patrimonio` | Seguridad Patrimonial / Emergencias | 3 |

**Total:** 40 iconos (incluidos los 8 del seed original + 32 nuevos)

### Convenciones de diseño SVG

- **ViewBox:** `0 0 80 95` (igual que el escudo ARGA)
- **Área de icono recomendada:** `x[14–66]`, `y[22–68]`, centro en `(40, 45)`
- **Color de trazo:** `stroke="white"` (contraste sobre escudo colored)
- **Rellenos suaves:** `fill="white" fill-opacity=".15"` para áreas
- **Grosor de línea:** 1.5–2.5px según importancia del elemento
- **Sin tag `<svg>`:** El campo almacena solo el contenido interno

---

## Widget `_icon-picker.php`

### Parámetros

| Parámetro | Tipo | Requerido | Descripción |
|---|---|---|---|
| `$fieldId` | `string` | ✅ | ID del input hidden (usar `Html::getInputId($model, 'icon_svg')`) |
| `$fieldName` | `string` | ✅ | Name del input (usar `Html::getInputName($model, 'icon_svg')`) |
| `$currentValue` | `string` | ✅ | Valor actual de `icon_svg` (vacío string si es nuevo) |
| `$optional` | `bool` | ❌ | `true` → muestra opción "Sin ícono". Default: `false` |
| `$shieldColor` | `string` | ❌ | `'teal'` o `'red'`. Afecta el color del preview. Default: `'teal'` |

### Uso básico

```php
echo $this->render('//partials/_icon-picker', [
    'fieldId'      => \yii\helpers\Html::getInputId($model, 'icon_svg'),
    'fieldName'    => \yii\helpers\Html::getInputName($model, 'icon_svg'),
    'currentValue' => $model->icon_svg ?? '',
    'optional'     => false,
    'shieldColor'  => $model->color ?? 'teal',
]);
```

### Funcionalidades del widget

1. **Preview en tiempo real** — Mini escudo (54×64px) que muestra el ícono seleccionado
2. **Filtrado por categoría** — Tabs para filtrar la grid sin JS pesado
3. **Grid scrollable** — Máx. 340px de alto, scroll vertical interno
4. **SVG personalizado** — Toggle colapsable con textarea para código SVG raw (modo avanzado)
5. **Estado de selección** — Borde azul + fondo claro en ícono activo
6. **Accesibilidad** — `role="listbox"`, `aria-selected`, `aria-label`

### Comportamiento por contexto

| Contexto | Modo | Campo vacío muestra |
|---|---|---|
| División | `optional=false` | "Selecciona un ícono" |
| Servicio | `optional=true` | Botón "Sin ícono" + leyenda "hereda de la división" |

---

## Integración con los Formularios

### Divisiones (`views/divisiones/_form.php`)

- Icono **requerido** (`optional=false`)
- `shieldColor` toma el valor del campo `$model->color` (teal/red)
- El color cambia el gradiente del escudo en el preview

### Servicios (`views/servicios/_form.php`)

- Icono **opcional** (`optional=true`)
- El widget resuelve el color de la división en tiempo de render:
  - Si `$model->isNewRecord` → busca división por `$model->division_id`
  - Si existe `$model->division` → usa la relación cargada
- Seleccionar "Sin ícono" pone `icon_svg = ''` → el front-end del sitio hereda el ícono de la división padre

---

## Cómo Agregar Nuevos Iconos

### Paso 1: Diseñar el SVG

Usa un editor SVG (Inkscape, Figma) con artboard de 80×95px.  
Exporta solo el contenido interno (sin `<svg>`).  
Convierte todos los colores a `white` con opacity.

### Paso 2: Agregar al array

En `config/svg-icons.php`, agrega al final de la categoría correspondiente:

```php
[
    'id'       => 'mi-icono',
    'label'    => 'Mi Nuevo Ícono',
    'category' => 'seguridad',  // o cualquier categoría existente
    'svg'      => '<path d="M..." stroke="white" stroke-width="2" fill="none"/>',
],
```

### Paso 3: Agregar nueva categoría (opcional)

1. Agrega la entrada al array `$categories` dentro de `_icon-picker.php`:
   ```php
   'mi-cat' => 'Mi Categoría',
   ```
2. Usa `'category' => 'mi-cat'` en los iconos del array.

No se requieren cambios en modelos, controladores ni base de datos.

---

## Escalabilidad

### Si se necesita gestión dinámica por el admin (futuro)

Migrar a tabla `svg_iconos` en BD:

```sql
CREATE TABLE svg_iconos (
    id        INT PRIMARY KEY AUTO_INCREMENT,
    slug      VARCHAR(60) UNIQUE NOT NULL,
    label     VARCHAR(120) NOT NULL,
    category  VARCHAR(40) NOT NULL,
    svg       TEXT NOT NULL,
    activo    TINYINT(1) DEFAULT 1,
    orden     SMALLINT DEFAULT 0
);
```

El widget `_icon-picker.php` recibiría `$icons` como parámetro en lugar de hacer `require`:

```php
// En el widget — cambiar:
$icons = require Yii::getAlias('@app/config/svg-icons.php');
// Por:
$icons = $icons; // parámetro inyectado desde el controller
```

El controller cargaría los iconos con `Yii::$app->cache->getOrSet('svg_icons', ...)` para mantener 0 queries adicionales en producción.

### Límite práctico del enfoque actual

- Hasta ~80 iconos: impacto nulo (archivo PHP en opcode cache)
- Más de 80 iconos: considerar lazy loading por categoría vía AJAX o migración a BD con caché

---

## Archivos Involucrados

| Archivo | Rol | Modificado |
|---|---|---|
| `config/svg-icons.php` | Librería de iconos | ✅ CREADO |
| `views/partials/_icon-picker.php` | Widget visual reutilizable | ✅ CREADO |
| `views/divisiones/_form.php` | Formulario de división | ✅ MODIFICADO |
| `views/servicios/_form.php` | Formulario de servicio | ✅ MODIFICADO |

---

## Testing Manual

1. Ir a `admin/divisiones/create` → verificar grid de iconos con preview
2. Seleccionar ícono → verificar que el hidden input se actualiza y el preview cambia
3. Usar filtro de categoría → verificar que la grid filtra correctamente
4. Guardar → verificar que el ícono queda almacenado en BD
5. Editar división existente → verificar que el ícono actual aparece pre-seleccionado
6. Ir a `admin/servicios/create` → verificar opción "Sin ícono" visible
7. Abrir "SVG personalizado" → pegar código → clic "Aplicar" → verificar preview
8. Para servicio con `icon_svg` vacío, verificar que el sitio usa el ícono de la división

---

*Documentado por: Claude (Ingeniero Fullstack Senior) — 2026-05-26*
