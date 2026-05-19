# ARGA Group · Design System

> **Versión** 1.0 · Mayo 2026
> **Audiencia** Equipo de Diseño Web, Frontend y Backend (Yii2 / PHP 8.4)
> **Stack** Yii2 · PHP 8.4 · Bootstrap 5.3 (solo grid/reset) · JS Vanilla
> **Estado** En refinamiento — sustituye al template "base" actual

Este documento es **la biblia de interfaz** del nuevo ARGA Group. Define el lenguaje visual, los componentes y las reglas de uso tanto del **sitio público** como del **panel administrativo**. Su objetivo: que cualquier persona del equipo (diseño, frontend, backend) pueda implementar nuevas pantallas sin romper la coherencia de marca.

---

## Tabla de contenido

1. [Filosofía](#1-filosofía)
2. [Identidad de marca](#2-identidad-de-marca)
3. [Color](#3-color)
4. [Tipografía](#4-tipografía)
5. [Espaciado, radios y sombras](#5-espaciado-radios-y-sombras)
6. [Iconografía](#6-iconografía)
7. [Botones](#7-botones)
8. [Formularios](#8-formularios)
9. [Tarjetas](#9-tarjetas)
10. [Modales](#10-modales)
11. [Navegación · topbar, sidebar y footer](#11-navegación)
12. [Carrito de cotización](#12-carrito-de-cotización)
13. [Carruseles · hero, ads, banner](#13-carruseles)
14. [Sección Divisiones (escudos)](#14-sección-divisiones)
15. [Blog / Noticias](#15-blog--noticias)
16. [Acreditaciones](#16-acreditaciones)
17. [Mascota y voz de marca](#17-mascota-y-voz-de-marca)
18. [Panel administrativo](#18-panel-administrativo)
19. [Reglas anti-Bootstrap](#19-reglas-anti-bootstrap)
20. [Roadmap por secciones](#20-roadmap)
21. [Archivos y arquitectura](#21-archivos)

---

## 1 · Filosofía

Tres principios no negociables:

1. **Confianza institucional, no corporate aburrido.** ARGA tiene 30 años de credibilidad. El sistema usa azul institucional + rojo de marca como anclas, pero rompe la rigidez con gradientes, tipografía geométrica fuerte y micro-interacciones cálidas.
2. **Bootstrap no se ve.** Bootstrap 5.3 nos da el grid 12-col y un reset razonable. Punto. Botones, formularios, tarjetas y modales son 100% propios. Nunca usar clases como `btn-primary` de Bootstrap — usamos `.btn .btn-primary` propio (clases con el mismo nombre pero CSS sobrescrito).
3. **Datos dinámicos.** Toda la interfaz responde a contenido editable desde el admin. Si una sección depende de un número fijo de elementos (8 escudos, 4 acreditaciones, etc.), debe **degradar y escalar** automáticamente.

---

## 2 · Identidad de marca

- **Nombre**: ARGA Group
- **Sello**: 30+ años en control total de pérdidas
- **Tono de voz**: profesional, técnico pero accesible. Verbos en presente. "Acreditados por la EMA". "Reducimos pérdidas". Sin emojis en copy formal.
- **Mascota**: tigre con casco e ingeniería de seguridad. Aparece como **ayudante flotante** abajo-derecha. Su rol: hacer preguntas que dirigen a una conversión ("¿Cumples con la NOM-002-STPS?"). Nunca como decoración pasiva.

### Logo

- Mark cuadrado **AG** sobre gradient de marca (`--g-title`) en esquinas 10px.
- Versión completa: `[mark] ARGA Group / Control total de pérdidas` (display + body pequeño).
- Sobre fondo oscuro: mark conserva gradient; texto en blanco.
- Sobre fondo claro: mark con gradient; texto en `--c-text` (`#1a2238`).

---

## 3 · Color

Todas las variables están en `assets/arga.css` bajo `:root`. **Nunca hardcodear hex en componentes**. Si necesitas un color nuevo, súbelo aquí primero.

### Paleta principal

| Token | Hex | Uso |
|---|---|---|
| `--c-navy` | `#1f3b8a` | Azul institucional (acción principal, link activo, focus) |
| `--c-navy-700` | `#142764` | Navy profundo (hover sobre navy, fondos oscuros) |
| `--c-navy-500` | `#2e5cc6` | Navy intermedio (chips, acentos) |
| `--c-navy-100` | `#dfe7f8` | Navy claro (background de chips subtle, hover ligero) |
| `--c-red` | `#c4172e` | Rojo de marca (acción secundaria, error, "ver documento") |
| `--c-red-700` | `#8e0d20` | Rojo profundo (hover) |
| `--c-red-100` | `#fbdde2` | Rojo claro (background de íconos, chips danger) |
| `--c-purple` | `#7a2b80` | Púrpura central del gradient de título |

### Acentos secundarios

| Token | Hex | Uso |
|---|---|---|
| `--c-teal` | `#2bb7b4` | CTA verde-teal del gradient ("Agregar a cotización") |
| `--c-green` | `#4cc28a` | CTA verde, success badges |
| `--c-amber` | `#f5a623` | Warnings, íconos amber en admin |

### Neutrales

| Token | Hex | Uso |
|---|---|---|
| `--c-bg` | `#ffffff` | Fondo página |
| `--c-bg-soft` | `#f7f9fd` | Secciones alternadas, panel admin |
| `--c-bg-muted` | `#eef2fa` | Background sutil de inputs deshabilitados |
| `--c-bg-dark` | `#0d1b3d` | Footer, sección acreditaciones |
| `--c-bg-darker` | `#050e22` | Cabecera de modal con imagen oscura |
| `--c-border` | `#e1e6f0` | Bordes de tarjetas, inputs |
| `--c-border-strong` | `#c9d0de` | Hover de borde |
| `--c-text` | `#1a2238` | Texto principal |
| `--c-text-mid` | `#5b6478` | Texto secundario, body |
| `--c-text-soft` | `#8c95a8` | Placeholders, captions |
| `--c-text-on-dark` | `#e6ecf9` | Texto sobre fondos oscuros |

### Gradients de marca

Los gradients son **firma**, no decoración aleatoria. Tres permitidos y solo tres:

```css
--g-title:  linear-gradient(90deg, #1f3b8a 0%, #7a2b80 55%, #c4172e 100%);
--g-cta:    linear-gradient(90deg, #2bb7b4 0%, #4cc28a 100%);
--g-shield: dos variantes por color (azul / rojo) — solo para escudos SVG
```

- **`--g-title`**: titulares grandes ("DIVISIONES DE NEGOCIO"), botón primario, banner navegación, badges de modal, sello sobre tarjetas (línea decorativa superior).
- **`--g-cta`**: botón "Agregar a cotización", eyebrow de modal (texto), badge de "verificado", anillos de check.
- **`--g-shield-blue` / `--g-shield-red`**: exclusivos para shields SVG. Alternan entre divisiones para crear ritmo visual.

❌ Prohibido inventar nuevos gradients. Si el equipo siente la necesidad, súbelo al sistema primero.

### Estados semánticos

| Token | Color | Uso |
|---|---|---|
| `--c-success` / `--c-success-bg` | `#2fa66c` / `#e6f7ee` | Toast success, chip "Activa" |
| `--c-warning` / `--c-warning-bg` | `#f5a623` / `#fef6e6` | Chips de pendiente |
| `--c-danger` / `--c-danger-bg` | `#c4172e` / `#fde7eb` | Errores, "eliminar" |
| `--c-info` / `--c-info-bg` | `#1f3b8a` / `#e6ecf8` | Toast info |

---

## 4 · Tipografía

Dos familias. **No agregar más**.

### Display — Plus Jakarta Sans

- **Pesos**: 700, 800, 900
- **Uso**: titulares (`h1`-`h6`), botones, etiquetas, números grandes (stats), eyebrows
- **Letterspacing**: `-0.02em` para titulares grandes (negative tracking), `0.08em` para eyebrows uppercase

### Body — Manrope

- **Pesos**: 400, 500, 600, 700
- **Uso**: párrafos, descripciones, inputs, labels normales, metadata

### Escala tipográfica

| Token CSS | Tamaño | Uso |
|---|---|---|
| `--fs-12` | 0.75rem | Labels mayúsculas, footnotes |
| `--fs-13` | 0.81rem | Chips, captions, breadcrumbs |
| `--fs-14` | 0.88rem | Botones small, nav, secondary copy |
| `--fs-15` | 0.94rem | Body de tarjetas, inputs |
| `--fs-16` | 1rem | Body principal |
| `--fs-18` | 1.13rem | Lead pequeño |
| `--fs-20` | 1.25rem | h5 |
| `--fs-24` | 1.5rem | h4 |
| `--fs-32` | 2rem | h3 |
| `--fs-40+` | 2.5rem+ | h2, h1, display |

### Reglas de uso

- **Display 1** (clamp 2.8rem → 5.5rem): exclusivo de hero y frase grande "Cero accidentes...". Máximo 1 por viewport.
- **h1**: clamp 2.2rem → 3.5rem. Una sola por página.
- **h2** se usa para introducir secciones.
- **Eyebrow** (chip pill mayúsculas, 12px, letterspacing 0.18em): siempre que se introduce una nueva sección. Pareja inseparable con h2.
- **Body** por default 1rem / line-height 1.6. Para descripciones largas, `line-height: 1.7-1.8`.
- **Números grandes** (stats, contadores): font-display 800, letterspacing negativo.

### Aplicación del gradient `--g-title` en texto

```css
.gradient-text {
  background: var(--g-title);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
```

- Solo titulares grandes (h1/h2 display). Nunca en párrafos. Nunca en botones (en botones usa el gradient como background).

---

## 5 · Espaciado, radios y sombras

### Spacing scale (base 4px)

`--s-1` (4) · `--s-2` (8) · `--s-3` (12) · `--s-4` (16) · `--s-5` (20) · `--s-6` (24) · `--s-8` (32) · `--s-10` (40) · `--s-12` (48) · `--s-16` (64) · `--s-20` (80) · `--s-24` (96)

- **Gap interno de tarjetas**: `--s-6` (24px) por default.
- **Gap entre secciones**: `--s-12` a `--s-20`.
- **Padding lateral de container**: `--s-6` (24px), max-width 1240px.

### Radii

| Token | Valor | Uso |
|---|---|---|
| `--r-sm` | 8px | Inputs pequeños, chips de info |
| `--r` | 14px | Inputs, tarjetas pequeñas |
| `--r-md` | 18px | Tarjetas regulares |
| `--r-lg` | 24px | Modal, hero, contenedores grandes |
| `--r-xl` | 36px | Secciones "blob" (equipo) |
| `--r-full` | 9999px | Pills, botones, chips |

**Regla**: nunca esquinas cuadradas (`0px`) excepto bordes de tabla.

### Sombras

| Token | Valor | Uso |
|---|---|---|
| `--sh-xs` | sombra de 1-2px | Inputs en reposo |
| `--sh-sm` | 2-8px | Chips, badges flotantes |
| `--sh` | 8-24px | Tarjetas en hover, modales secundarios |
| `--sh-md` | 14-36px | Hero cards |
| `--sh-lg` | 30-60px | Modal principal |
| `--sh-glow-navy` | sombra azul | Botón primario |
| `--sh-glow-cta` | sombra teal | Botón CTA |

**Color**: todas las sombras usan tinte azul navy (`rgba(20,39,100,...)`), no gris neutro. Así se sienten "de marca".

---

## 6 · Iconografía

- **Set**: Feather Icons (line, 2px stroke). Tamaño base 18-24px.
- **Estilo**: outline, redondeados (`stroke-linecap: round`, `stroke-linejoin: round`).
- **Color**: por contexto. En botones, hereda del texto. Sobre fondos suaves, usa `currentColor`.
- **❌ Prohibido mezclar sets** (no Material + Feather + emojis). Mantén la misma familia.
- **Mascota y escudos** son SVG custom — viven aparte del set.

---

## 7 · Botones

```html
<button class="btn btn-primary">Texto <svg>…</svg></button>
```

### Variantes

| Clase | Estilo | Uso |
|---|---|---|
| `.btn-primary` | Gradient `--g-title`, sombra azul, blanco | Acción principal de la pantalla. Una por viewport. |
| `.btn-cta` | Gradient `--g-cta` (teal→green), sombra teal, blanco | Acción de conversión específica (agregar a cotización). |
| `.btn-outline` | Borde 1.5px, fondo blanco, texto navy | Acción secundaria. Cancelar. "Ver más". |
| `.btn-ghost` | Sin borde, fondo navy-100, texto navy | Acción terciaria, links de navegación. |
| `.btn-dark` | Fondo dark navy, blanco | Sobre fondos claros donde primary no contrasta bien. |
| `.btn-danger` | Fondo rojo, blanco | Solo destructivo (eliminar, salir). |
| `.btn-icon` | Círculo 42px | Botones sin label (cerrar, prev/next, search). |

### Tamaños

- Default: `padding: 12px 22px`, font-size 15px.
- `.btn-sm`: padding 8×16, font 13px.
- `.btn-lg`: padding 16×28, font 16px.

### Comportamiento

- **Hover**: `translateY(-2px)` + sombra aumentada (sutil).
- **Active**: vuelve a `translateY(0)`.
- **Focus**: outline 2px navy con offset 3px. Nunca eliminar focus.
- **Disabled**: opacity 0.5, sin cursor pointer.

### Reglas de uso

- **Solo un `.btn-primary` por pantalla visible**. Si necesitas dos, una es `.btn-outline` o `.btn-ghost`.
- **Botones de íconos** siempre con `aria-label`.
- **Texto + ícono**: ícono a la derecha si es "ir a / siguiente". A la izquierda si es "agregar / abrir".
- **CTA en formularios**: nunca `Enviar`. Siempre verbos específicos ("Guardar cambios", "Solicitar cotización").

---

## 8 · Formularios

Filosofía: respiración generosa, bordes 1.5px, **focus state muy visible** (caja de luz navy alrededor del input).

### Estructura

```html
<div class="field">
  <label class="label" for="x">Nombre <span class="required">*</span></label>
  <input class="input" id="x" type="text">
  <span class="help">Texto de ayuda opcional.</span>
</div>
```

### Inputs

- Padding 12×14, border 1.5px, radius `--r` (14px).
- Focus: borde navy + sombra de halo `box-shadow: 0 0 0 4px rgba(31,59,138,0.10)`.
- Inválido (`.is-invalid`): borde rojo + halo rojo.
- Placeholder en `--c-text-soft` (gris medio).

### Textarea

- Por default usa **JetBrains Mono** y font-size 13px. Pensado para código (SVG markup, JSON).
- Para textareas de copy (descripciones), aplicar inline `font-family: var(--ff-body); font-size: var(--fs-15)`.

### Chip input (NOMs)

- Container blanco, borde 1.5px, padding 8px.
- Chips internos: pill navy con `×` para eliminar.
- Field secundario debajo con input + botón "+ Agregar".
- Soporte teclado: `Enter` agrega.

### Checkboxes / Radios

- 20×20, custom appearance.
- Checked: relleno navy + check blanco SVG.
- **Nunca usar el default del navegador**.

### Toggle switch

- Pill 42×24. Track gris off / navy on. Knob blanco 20×20.
- Acompañar siempre de texto descriptivo a la derecha.

### Validación

- Mensaje de error: rojo, font-size 12px, debajo del field, con ícono.
- Mensaje de éxito: chip success en la cabecera del form ("✓ Cambios guardados · hace 2 min").

### Form actions

- Siempre **sticky** abajo cuando el form es largo.
- Botón primario a la izquierda, cancelar a la derecha-izquierda, metadata ("última edición") a la derecha.

---

## 9 · Tarjetas

### Base — `.card`

- Background blanco, borde 1px, radius `--r-md` (18px), padding `--s-6` (24px).
- Si es clickeable: `.is-hoverable` → translateY + sombra al hover.

### Variantes documentadas

- **`.doc-card`**: borde top 3px gradient en hover, ícono cuadrado 56×56 azul claro arriba.
- **`.news-card`**: media (16:10), body con categoría coloreada + título + excerpt + meta. Versión `.featured` para destacar (4:3).
- **`.all-card`**: tarjetas del catálogo "Ver todas". Sello shield SVG + categoría + título + descripción + footer con código.
- **`.admin-card`**: tarjeta del panel admin con ícono cuadrado, h3, p y footer con stat + flecha.
- **`.team-card`**: avatar circular grande, nombre, credencial, rol. Sombra fuerte sobre fondo pastel.
- **`.acred-card`**: tarjeta dark con logo blanco arriba, código + scope. Sobre `.section-dark`.

### Regla universal

Todas las tarjetas clickeables tienen un **micro indicador**:
- Borde top 3px que aparece en hover (gradient `--g-title`), OR
- `translateY(-3px)` + sombra
- Nunca solo cambio de color de fondo (poco descubrible)

---

## 10 · Modales

Layout split 1.05fr / 1fr:
- **Izquierda**: contenido textual con scroll interno.
- **Derecha**: banner de imágenes con auto-scroll (5s default), flechas navegación, dots, pause-on-hover.

### Elementos

- **Eyebrow** con `--g-cta` aplicado como gradient text.
- **Title** display 1.7rem.
- **Subtitle** muted.
- **Divider** 3px × 56px con `--g-title`.
- **Chips de NOM** (`.chip.subtle`).
- **Body scrollable** max-height 50vh con scrollbar custom 6px.
- **Actions** al fondo: 1 CTA primario (gradient teal) + 1 secundario ghost.

### Banner derecho

- Background image cover + overlay gradient bottom para legibilidad.
- Caption sobre la imagen, abajo-izquierda.
- Dots en bottom centered, flechas en lateral (aparecen solo al hover).
- Soporte teclado: ←/→ navega, Esc cierra.

### Cierre

- Botón × circular blanco en esquina superior derecha del banner. Rota 90° en hover.
- Click en backdrop también cierra.
- Esc también cierra.

### Mobile

- Stack vertical (banner arriba, contenido abajo).
- Banner ajusta a aspect-ratio 4:3.

---

## 11 · Navegación

### Topbar

- Sticky top, altura 76px, fondo blanco translúcido con `backdrop-filter: blur(14px)`.
- Estructura: brand (logo + texto) · nav links (centro) · actions (cotizar + hamburguesa móvil).
- Link activo: subrayado 2px con gradient `--g-title`.
- Hover: background `--c-navy-100`.
- Móvil (<980px): nav links ocultos, hamburguesa abre sidebar.

### Sidebar

Dos usos:
1. **Menú móvil** (público) — drawer izquierdo
2. **Sidebar admin** — fijo en desktop, drawer en móvil

Estructura:
- **Head** con brand + botón cerrar
- **Body** con secciones (`.sidebar-section` uppercase) y links (`.sidebar-link` con ícono + label + count opcional)
- **Foot** con usuario actual + botón logout o CTA

Link activo:
- Borde izquierdo 3px gradient `--g-title`
- Background `--c-navy-100`, color navy
- Ícono también navy

Counts: pill navy mini con número (notificaciones, items en sección).

### Footer

- Background `--c-bg-darker` (#050e22)
- Curva decorativa superior (border-radius hack) para suavizar
- 3 columnas: brand + redes / navegación / sistema
- Bottom bar con copyright + acreditación geográfica

---

## 12 · Carrito de cotización

Mecánica:
1. Usuario hace click en un escudo → modal → "Agregar a cotización".
2. División se guarda en `localStorage.arga_cart`.
3. **FAB** abajo-derecha muestra contador (pill blanco con número navy).
4. Toast confirma agregar / duplicado.
5. (Pendiente) vista detallada del carrito → click en FAB.

### FAB

- Posición fija bottom-right (24px / 24px).
- Background gradient `--g-title`, sombra glow navy.
- Texto "Mi cotización" + ícono carrito + contador.
- Z-index 90 (debajo de modal/toasts).

### Toasts

- Aparecen bottom-right, encima del FAB.
- Slide-in desde la derecha, auto-dismiss a 3.7s.
- Variantes: success (verde), info (navy).
- Ícono circular pequeño + mensaje.

### Reglas de UX

- **Nunca agregar al carrito sin feedback** (toast obligatorio).
- **Duplicados**: toast info, no agregar.
- **Persistencia**: cart sobrevive recarga (localStorage). Limpiar solo al checkout.

---

## 13 · Carruseles

Patrón único `data-carousel` + `data-autoplay="ms"`. Ver `arga.js` para implementación.

### Variantes

| Tipo | Altura | Auto-scroll | Controles |
|---|---|---|---|
| Hero | 80vh | 6s | Flechas + dots (overlay sobre la imagen) |
| Ads banner | 320px | 6s | Flechas + dots (light style sobre fondo claro) |
| Modal banner | full container | 5s | Flechas hover + dots (sobre dark) |
| Team carousel | auto | 7s | Flechas circulares + dots (light) |

### Flechas

- Circulares 48×48 (40 para variantes pequeñas).
- Sobre dark: translúcidas con blur. Sobre light: borde + sombra sutil.
- Aparecen solo al hover en banners. Siempre visibles en hero.

### Dots

- 8×8 inactivos, **24×8 pill** activo.
- Sobre dark: blanco translúcido. Sobre light: navy.

### Pause on hover

- Auto-scroll se detiene al pasar el mouse encima.
- Reinicia al salir.

---

## 14 · Sección Divisiones

⭐ **El componente más reconocible del sistema**. Diseñado para escalar 1-N items.

### Layout adaptable

El grid es 6 columnas. Según N items, los escudos se colocan en formaciones distintas:

| N | Layout |
|---|---|
| 1 | Centrado (1 col) |
| 2 | Lado a lado con offset |
| 3 | Línea horizontal (cabeza de escudo) |
| 4 | Rombo 2+2 |
| 5 | 3 + 2 |
| 6 | 3 + 2 + 1 |
| 7 | 3 + 2 + 2 (con hueco central) |
| 8 | **Escudo clásico** 3+2+2+1 |
| 9 | 3 × 3 |
| 10+ | Auto-fit grid (140px min) |

### Móvil

- < 768px: siempre grid 2-col, sin formación shield.

### Interacción

- Cada item es `<button>` clickeable.
- Hover: shield levanta y escala (`translateY(-6px) scale(1.06)`), badge "Ver detalle" aparece, subrayado 3px abajo.
- Focus visible para accesibilidad.

### Shield SVG

- viewBox 80×95 fijo.
- Fondo: gradient azul (`url(#gradBlue)`) o rojo (`url(#gradRed)`). Alternar para crear ritmo.
- Ícono interno custom (configurable desde admin).
- Drop shadow sutil.

### Reglas

- **Nunca poner más de 12 escudos** en una sola sección. Si hay más, paginar o agrupar.
- **El watermark "ARGA"** detrás del grid solo se usa cuando hay >= 5 items.
- **El texto descriptivo** (columna izquierda) es obligatorio. Sin él, la sección pierde contexto.

---

## 15 · Blog / Noticias

Grid asimétrico: 1 destacado (col-span-1 row-span-2) + 3 estándar.

### Card de noticia

- Media 16:10 (4:3 en featured)
- Imagen zoom on hover (scale 1.06)
- Category pill colored (teal / red según división)
- Título display 1.05rem (1.3-1.7rem en featured)
- Excerpt 13px muted
- Meta footer: fecha · tiempo de lectura, con línea divisora

### Featured

- Mismo grid pero la card 1 ocupa 2 filas
- Imagen más grande, body más espacioso

### Responsive

- < 980px: featured pasa a col-span-full, resto 2-col
- < 620px: todo 1 columna

---

## 16 · Acreditaciones

Sección sobre `--c-bg-dark`. Grid 4 columnas (2 en tablet, 1 en móvil).

### Card de acreditación

- Background `rgba(255,255,255,0.04)`, borde translúcido
- Logo organismo en caja blanca arriba (placeholder = texto monograma con sub-text legible)
- Eyebrow uppercase blanco translúcido
- Code monoespaciado destacado
- Scope (descripción) blanco translúcido

### Reglas

- Siempre incluir el código oficial (EMA, STPS, PFPA, etc.)
- Logos reales deben subirse como SVG/PNG transparente
- Si la acreditación está por vencer, agregar chip warning superior

---

## 17 · Mascota y voz de marca

### Mascota visual

- Tigre con casco de seguridad + auriculares + escudo ARGA en el pecho
- Aparece flotante bottom-right (oculta en < 600px)
- Burbuja de chat con pregunta corta arriba
- Las preguntas son **redirects a conversión**, no decoración:
  - "¿Cumples con la NOM-002-STPS?"
  - "¿Tus trabajadores tienen capacitación en SST?"
  - "¿Sabías que la NOM-035 es obligatoria?"

### Voz

- 2da persona singular ("¿Cumples con...?")
- Pregunta + implicación de acción
- Nunca exclamaciones gratuitas ("¡Hola!", "¡Bienvenido!")
- Click en mascota: abre sidebar de cotización o modal de contacto rápido

---

## 18 · Panel administrativo

Layout: sidebar fija 260px + main fluido.

### Sidebar admin

- Mismas reglas que sidebar pública
- Secciones agrupadas: **Gestión** (divisiones, servicios, cursos, folios) / **Contenido** (blog, ads, equipo) / **Sistema** (config)
- Footer con usuario actual + logout

### Topbar admin

- Card blanca con shadow sutil
- Breadcrumbs a la izquierda
- Acciones rápidas a la derecha (buscar, notificaciones)
- Avatar usuario en pill

### Stats row

- 4 tarjetas con métrica clave + trend
- Verde para "up", rojo para "down"
- Solo métricas accionables (no vanity numbers)

### Cards de módulo

- 3 columnas (2 en tablet, 1 móvil)
- Ícono cuadrado 48×48 con tinte (navy/red/teal/amber)
- h3 + descripción + footer con stat
- Hover: borde top gradient + lift

### Formularios admin

- Layout 1.5fr / 1fr: form izquierda, side panel con **preview en vivo** derecha
- Secciones del form con separador y h4 con barra gradient izquierda
- Footer del form sticky con CTA primario + cancelar + última edición
- **Preview en tiempo real** del SVG mientras el admin escribe el markup
- Chip input para NOMs con `Enter` + botón "+ Agregar"

### Reglas para admin

- **Confirmaciones**: toast de éxito siempre. Modal de confirmación solo para destructivo.
- **Auto-save indicado**: chip success "Cambios guardados · hace 2 min" en topbar
- **Permisos**: futuro — links que el usuario no puede tocar deben verse deshabilitados, no ocultos (excepto sección Sistema → solo super-admin)
- **Mobile admin**: el panel admin debe ser usable en tablet (>= 768px) pero **NO está optimizado para móvil**. Diseñar pensando en pantalla 1024px+.

---

## 19 · Reglas anti-Bootstrap

Bootstrap 5.3 está incluido **solo por el grid 12-col + reset**. Todo lo demás es nuestro.

### ❌ Prohibido en el código

```html
<!-- NUNCA -->
<button class="btn btn-primary">…</button>  <!-- usando Bootstrap btn-primary -->
<div class="card">…</div>                    <!-- card de Bootstrap -->
<div class="alert alert-warning">…</div>     <!-- alerts de Bootstrap -->
<nav class="navbar navbar-expand-lg">…</nav> <!-- navbar de Bootstrap -->
<div class="modal fade">…</div>              <!-- modal de Bootstrap -->
```

### ✅ Permitido de Bootstrap

```html
<!-- Grid 12 columnas para layouts complejos -->
<div class="row g-4">
  <div class="col-12 col-md-6 col-lg-4">…</div>
</div>

<!-- Utilities solo si no existen en arga.css y son neutras -->
<!-- (raramente — preferir las nuestras) -->
```

### Estrategia de override

Cuando nuestras clases comparten nombre con Bootstrap (`.btn`, `.card`, `.modal`):
- **Cargar `arga.css` DESPUÉS** de Bootstrap.
- Nuestras reglas sobrescriben sin `!important`.
- Si Bootstrap usa un selector más específico, igualamos especificidad.

---

## 20 · Roadmap

Propuestas de mejora por sección, ordenadas por impacto. Cada item lleva 🔥 (crítico) / ⭐ (alta) / 🌱 (nice-to-have).

### Hero
- 🔥 Permitir editar slides desde admin (banner, eyebrow, título, descripción, CTA y link)
- ⭐ Slot opcional para video de fondo en lugar de imagen estática
- 🌱 Animación de entrada para el título al cambiar de slide

### Divisiones
- 🔥 Layout adaptable a N items (✅ implementado)
- 🔥 Cada NOM individual con botón "Agregar a cotización" granular (no solo división entera)
- ⭐ Preview en tooltip al hacer hover sobre un escudo (sin abrir modal)
- ⭐ Filtro rápido sobre el grid: "todas / con acreditación / nuevas"

### Modal
- ⭐ Compartir link directo: `?division=ergonomia` abre la modal al cargar la página
- ⭐ Sección "Servicios relacionados" al final de la modal (cross-sell)
- 🌱 Print-friendly: imprimir la modal genera PDF con la ficha técnica

### Ads
- 🔥 Editor visual desde admin con preview (subir imagen, eyebrow, título, copy, CTA, color de acento)
- ⭐ Programación temporal (mostrar entre fechas)
- ⭐ A/B testing entre 2 versiones de un mismo slot
- 🌱 Tracking de clicks por slide

### Blog
- 🔥 CMS editable con markdown + WYSIWYG
- 🔥 Página de detalle individual (no solo grid)
- ⭐ Tags + filtro por división
- ⭐ Suscripción a newsletter integrada al final
- 🌱 Lectura relacionada al final del artículo

### Equipo
- ⭐ Foto real (no avatar con iniciales) — placeholder está mientras
- ⭐ Vista detalle con CV expandible
- 🌱 LinkedIn link por persona

### Acreditaciones
- ⭐ Subir el SVG real de cada organismo (placeholder actual es texto)
- ⭐ Link a documento PDF de la acreditación
- 🌱 Alerta visual cuando una acreditación esté a < 30 días de vencer

### Contacto
- 🔥 Formulario funcional con validación + reCAPTCHA + envío por email
- ⭐ Selector de división para enrutar el correo al equipo correcto
- ⭐ Confirmación inmediata + número de ticket
- 🌱 Chatbot integrado con mascota (claude.complete) — preguntas frecuentes

### Carrito cotización
- 🔥 Vista detallada al click del FAB (drawer derecho con items)
- 🔥 Formulario de "Convertir a cotización" → email + datos cliente → genera PDF
- ⭐ Editar cantidades / quitar items
- ⭐ Compartir cotización por link

### Panel admin
- 🔥 Login real + roles (super admin, editor, viewer)
- 🔥 Auditoría: registro de quién editó qué y cuándo
- ⭐ Dashboard con métricas reales (visitas, leads, conversiones)
- ⭐ Editor visual del SVG del escudo (no solo markup)
- ⭐ Upload de imágenes a CDN/S3 con compresión automática
- 🌱 Modo oscuro para el admin

### Performance
- 🔥 Lazy loading agresivo de imágenes
- 🔥 Preload de fonts críticas
- ⭐ Code-splitting de JS por página
- ⭐ Service worker para PWA (admin offline-first)

### Accesibilidad
- 🔥 Auditoría WCAG AA completa
- 🔥 Focus visible en todos los elementos interactivos (✅ implementado en CSS base)
- ⭐ Soporte lector de pantalla en modal (live regions)
- ⭐ Modo alto contraste

---

## 21 · Archivos

```
project-root/
├── index.html                  ← landing público (todas las secciones)
├── divisiones.html             ← versión standalone solo de la sección
├── assets/
│   ├── arga.css                ← TOKENS + componentes base (importar siempre primero)
│   ├── arga.js                 ← lógica global (modal, cart, sidebar, carrusel genérico)
│   ├── data.js                 ← data mock — en Yii2 sustituir por JSON renderizado del backend
│   ├── landing.css             ← estilos específicos del landing
│   ├── landing-extras.js       ← renderizado de news, ads, team, acreditaciones
│   ├── admin.css               ← estilos específicos del admin
│   └── (futuro) admin.js, blog.js
├── admin/
│   ├── index.html              ← tablero del panel admin
│   └── edit-division.html      ← ejemplo de formulario rediseñado
└── DESIGN_SYSTEM.md            ← este documento
```

### Portabilidad a Yii2

Todos los componentes funcionan con HTML + JS vanilla. Para integrar a Yii2:

1. **CSS y JS** → copiar `assets/` tal cual a `web/assets/arga/` y registrar bundle en `AppAsset.php`.
2. **Data** → el `data.js` actual es mock. En producción, renderizar desde el controller:
   ```php
   <script>
     window.ARGA_DIVISIONS = <?= Json::encode($divisions) ?>;
     window.ARGA_NEWS = <?= Json::encode($news) ?>;
     // …
   </script>
   ```
3. **Markup de secciones** → portar a vistas de Yii2 (`views/site/_section-divisiones.php` etc.). Mantener exactamente los mismos `id` y `class` para que el JS los encuentre.
4. **Formularios admin** → usar `ActiveForm` de Yii2 pero **agregar las clases `arga`** (`input`, `label`, `field`, etc.). No usar el rendering por defecto.

### Versionado

- Este documento es vivo. Cualquier cambio de tokens, agregado de componentes o decisión de diseño debe actualizarlo.
- **Pull requests al sistema requieren actualizar este `.md`** o serán rechazados.

---

## 22 · Decisiones tomadas (para no re-debatir)

- **Bootstrap como base**: sí, pero invisible. La grilla es útil; los componentes no.
- **Manrope + Plus Jakarta**: ya elegidas. No abrir el debate de fuentes a menos que sea por performance.
- **Iconografía Feather**: estandarizada.
- **Mascota como elemento de conversión**: sí, pero usable solo con propósito (preguntas que redirigen).
- **Color verde-teal del CTA**: representa "agregar / sumar / construir". No confundir con success (`--c-success` es otro verde más oscuro).
- **Gradient `--g-title`**: solo en titulares grandes y botón primario. No en iconografía. No en chips.
- **Footer y acreditaciones en oscuro**: decisión institucional para separar lo público de lo legal/credencial.
- **Layout escudo adaptable**: implementado para 1-9 items con layouts manuales y auto-fit para 10+.

---

*Para dudas: pregúntale al manteiner del sistema antes de improvisar. Cualquier improvisación de diseño que se cuela en el código termina siendo tech debt visual.*

**ARGA Group · Design System v1.0 · Mayo 2026**
