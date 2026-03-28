# GITTS WordPress — Documentacion Completa

## Indice

1. [Estructura del proyecto](#estructura-del-proyecto)
2. [Como funciona WordPress](#como-funciona-wordpress)
3. [Tema GITTS — Archivos y que hace cada uno](#tema-gitts)
4. [Custom Post Types (CPTs)](#custom-post-types-cpts)
5. [Opciones del tema (textos, colores, titulos)](#opciones-del-tema)
6. [Como editar contenido desde el admin](#como-editar-contenido-desde-el-admin)
7. [Como editar codigo del tema](#como-editar-codigo-del-tema)
8. [Base de datos — Tablas y queries utiles](#base-de-datos)
9. [Guia de deploy](#guia-de-deploy)
10. [Cambio de dominio](#cambio-de-dominio)
11. [Credenciales](#credenciales)

---

## Estructura del proyecto

```
wordpress/                          ← Raiz de WordPress (va dentro de htdocs/)
├── wp-admin/                       ← Panel de administracion (NO TOCAR)
├── wp-includes/                    ← Core de WordPress (NO TOCAR)
├── wp-content/                     ← Aqui va todo lo personalizado
│   ├── themes/
│   │   └── gitts/                  ← TEMA GITTS (aqui se edita el sitio)
│   │       ├── style.css           ← Estilos CSS del tema
│   │       ├── functions.php       ← Cerebro del tema: CPTs, metaboxes, menus admin, opciones
│   │       ├── header.php          ← Navbar y <head> (se repite en todas las paginas)
│   │       ├── footer.php          ← Footer (se repite en todas las paginas)
│   │       ├── front-page.php      ← Pagina de inicio
│   │       ├── page-quienes-somos.php      ← Quienes Somos
│   │       ├── page-investigacion.php      ← Investigacion (areas, proyectos)
│   │       ├── page-produccion-cientifica.php ← Publicaciones y tesis
│   │       ├── page-infraestructura.php    ← Laboratorios y equipos
│   │       ├── page-equipo.php             ← Nuestro Equipo (miembros)
│   │       ├── page-miembros.php           ← Lista de miembros
│   │       ├── page-noticias.php           ← Noticias/Actualidad
│   │       ├── page-servicios.php          ← Servicios
│   │       ├── page-unete.php              ← Unete a nosotros
│   │       ├── page-acerca-de.php          ← Acerca de
│   │       ├── single.php                  ← Vista individual de un post/noticia
│   │       ├── single-proyecto.php         ← Vista individual de un proyecto
│   │       ├── single-publicacion.php      ← Vista individual de una publicacion
│   │       ├── page.php                    ← Template generico de pagina
│   │       ├── index.php                   ← Fallback (requerido por WordPress)
│   │       ├── assets/                     ← Imagenes estaticas del tema
│   │       ├── fonts/                      ← Fuentes
│   │       ├── icons/                      ← Iconos
│   │       └── js/                         ← JavaScript del tema
│   ├── uploads/                    ← Imagenes subidas desde el admin (logos, fotos, etc.)
│   │   └── 2026/03/               ← Organizadas por año/mes
│   └── plugins/                    ← Plugins instalados
├── wp-config.php                   ← Configuracion de base de datos y claves (NO SE SUBE AL ZIP)
├── .htaccess                       ← Reglas de URL/permalinks (se genera automaticamente)
└── data/                           ← Dumps de base de datos (solo en desarrollo)
```

---

## Como funciona WordPress

WordPress tiene dos partes:

1. **Archivos PHP** (en `htdocs/`) — El codigo que genera las paginas HTML
2. **Base de datos MySQL** (en phpMyAdmin) — Todo el contenido: textos, paginas, posts, opciones, menus, usuarios

Cuando alguien visita una pagina:
1. WordPress recibe la URL
2. Busca que template PHP usar (ej. `page-investigacion.php`)
3. El template hace queries a la base de datos con `WP_Query` o `get_option()`
4. Genera el HTML y lo muestra al usuario

**Importante:** Si borras la base de datos, el sitio se queda sin contenido. Si borras los archivos, el sitio no funciona. Necesitas AMBOS.

---

## Tema GITTS

### Archivos principales

| Archivo | Que hace |
|---------|----------|
| `functions.php` | Registra los CPTs (tipos de contenido), metaboxes (campos personalizados), menus del admin (GITTS Settings), opciones del tema, y la navbar |
| `header.php` | Contiene el `<head>`, carga Tailwind CSS, DaisyUI, AOS (animaciones), y renderiza la navbar |
| `footer.php` | Footer con logo, navegacion, contacto, campus. Cierra el HTML |
| `style.css` | Variables CSS de colores (`--color-primary`, `--color-secondary`, `--color-accent`), estilos personalizados |
| `front-page.php` | Pagina de inicio con hero, valores, especializaciones, noticias recientes |

### Templates de pagina

Cada pagina del sitio tiene su propio template PHP. WordPress los asocia por el **Template Name** (comentario al inicio del archivo) que se asigna a cada pagina en el admin.

Ejemplo en `page-investigacion.php`:
```php
<?php /* Template Name: Investigacion */ get_header(); ?>
```

Dentro de cada template se usan **WP_Query** para traer el contenido:

```php
$proyectos = new WP_Query([
    'post_type' => 'proyecto',       // Tipo de contenido
    'posts_per_page' => -1,          // Todos (-1 = sin limite)
    'orderby' => 'date',             // Ordenar por fecha
    'order' => 'DESC',               // Mas reciente primero
]);

if ($proyectos->have_posts()) :
    while ($proyectos->have_posts()) : $proyectos->the_post();
        the_title();                  // Imprime el titulo
        the_content();                // Imprime el contenido
        get_post_meta(get_the_ID(), 'campo', true);  // Lee un campo personalizado
    endwhile;
    wp_reset_postdata();
endif;
```

### Relacion pagina → template → CPT

| Pagina | Template | CPTs que usa |
|--------|----------|-------------|
| Inicio | `front-page.php` | publicacion (recientes), especializacion |
| Quienes Somos | `page-quienes-somos.php` | Ninguno — usa `get_option()` para valores/objetivos (JSON) |
| Investigacion | `page-investigacion.php` | linea_inv, aplicacion, proyecto |
| Produccion Cientifica | `page-produccion-cientifica.php` | publicacion |
| Infraestructura | `page-infraestructura.php` | laboratorio, equipo_lab, capacidad |
| Nuestro Equipo | `page-equipo.php` | miembro |
| Noticias | `page-noticias.php` | post (posts nativos de WordPress) |
| Servicios | `page-servicios.php` | servicio, colaboracion |
| Unete | `page-unete.php` | Ninguno — usa `get_option()` |
| Acerca de | `page-acerca-de.php` | valor, objetivo |

---

## Custom Post Types (CPTs)

Los CPTs son tipos de contenido personalizados. Se registran en `functions.php` y aparecen en el menu lateral del admin.

| CPT | Para que sirve | Campos personalizados (meta) |
|-----|---------------|------------------------------|
| `proyecto` | Proyectos de investigacion | `investigador_principal`, `coinvestigadores`, `entidad_financiadora`, `monto`, `periodo`, `descripcion`, `estado_proyecto`, `tipo_proyecto` |
| `miembro` | Miembros del equipo | `cargo`, `especializacion`, `email`, `bio`, `scholar_url`, `orcid_url`, `scopus_url`, `orden` |
| `publicacion` | Papers, articulos, tesis | `autores`, `revista_conferencia`, `anio`, `doi`, `tipo_publicacion`, `pub_destacada` |
| `valor` | Valores del grupo | `descripcion`, `orden` |
| `objetivo` | Objetivos del grupo | `descripcion`, `orden` |
| `linea_inv` | Lineas de investigacion | `descripcion`, `orden` |
| `laboratorio` | Laboratorios | `descripcion`, `ubicacion`, `equipamiento` |
| `equipo_lab` | Equipos de laboratorio | `descripcion`, `orden` |
| `capacidad` | Capacidades tecnicas | `descripcion`, `orden` |
| `servicio` | Servicios ofrecidos | `descripcion`, `orden` |
| `colaboracion` | Instituciones colaboradoras | `descripcion`, `orden` |
| `aplicacion` | Aplicaciones de investigacion | `descripcion`, `orden` |
| `especializacion` | Areas de especializacion | `orden` |

### Como agregar un nuevo proyecto (ejemplo)

1. En el admin → menu lateral → **Proyectos** → **Anadir nuevo**
2. Titulo: nombre del proyecto
3. Llena los campos personalizados (investigador principal, monto, etc.)
4. Sube una imagen destacada (thumbnail)
5. Publica

El proyecto aparecera automaticamente en la pagina de Investigacion.

### Como agregar un nuevo miembro

1. Admin → **Miembros** → **Anadir nuevo**
2. Titulo: nombre completo
3. Llena cargo, especializacion, email, bio, URLs academicas
4. Sube foto como imagen destacada
5. Usa el campo `orden` para controlar la posicion en la lista
6. Publica

---

## Opciones del tema

Hay contenido que NO esta en CPTs sino en **opciones de WordPress** (`wp_options`). Se editan desde el admin en las paginas de configuracion de GITTS.

### Donde se editan

En el admin, menu lateral → **GITTS Settings** tiene varias subpaginas:

| Subpagina | Que se edita |
|-----------|-------------|
| General | Colores (primario, secundario, acento), telefono, email, direccion, campus |
| Inicio | Titulo hero, subtitulo, textos de secciones |
| Quienes Somos | Mision, vision, texto "Sobre GITTS", valores fundamentales (JSON), objetivos (JSON) |
| Investigacion | Textos introductorios de la pagina |
| Infraestructura | Textos introductorios de la pagina |
| Unete | Texto del formulario, opciones de modalidades |

### Opciones importantes en la base de datos

| option_name | Que contiene |
|-------------|-------------|
| `gitts_hero_titulo` | Titulo principal del hero en inicio |
| `gitts_hero_subtitulo` | Subtitulo del hero |
| `gitts_mision` | Texto de la mision |
| `gitts_vision` | Texto de la vision |
| `gitts_sobre_gitts` | HTML del texto "Sobre GITTS" |
| `gitts_valores_fund_data` | JSON con array de valores [{titulo, descripcion}] |
| `gitts_objetivos_data` | JSON con array de objetivos [{titulo, descripcion}] |
| `gitts_especializacion_data` | JSON con areas de especializacion |
| `gitts_unete_opciones` | JSON con modalidades de participacion |
| `gitts_color_primary` | Color primario (hex) |
| `gitts_color_secondary` | Color secundario (hex) |
| `gitts_color_accent` | Color de acento (hex) |
| `gitts_telefono` | Telefono de contacto |
| `gitts_email_contacto` | Email de contacto |
| `gitts_direccion` | Direccion fisica |
| `gitts_campus` | Nombre del campus |

---

## Como editar contenido desde el admin

### Textos y opciones globales
1. Ir a **GITTS Settings** en el menu lateral
2. Editar los campos necesarios
3. Guardar cambios

### Contenido tipo CPT (proyectos, miembros, publicaciones, etc.)
1. Ir al CPT correspondiente en el menu lateral (ej. **Proyectos**)
2. Hacer clic en el item a editar, o crear uno nuevo
3. Editar titulo, campos personalizados e imagen destacada
4. Actualizar/Publicar

### Menu de navegacion
1. Ir a **Apariencia → Menus**
2. El menu principal se llama "Principal"
3. Agregar/quitar paginas del menu
4. Guardar

### Logo
1. Ir a **Apariencia → Personalizar → Identidad del sitio**
2. Cambiar el logo
3. Publicar

### Noticias (posts)
1. Ir a **Entradas → Anadir nueva**
2. Escribir titulo y contenido
3. Asignar una categoria (tesis, eventos, premios, conferencias, pasantia)
4. Subir imagen destacada
5. Publicar

---

## Como editar codigo del tema

Los archivos del tema estan en `wp-content/themes/gitts/`.

### Para cambiar estilos
Editar `style.css`. Los colores principales se definen como variables CSS:
```css
:root {
    --color-primary: #1e3a5f;
    --color-secondary: #52975D;
    --color-accent: #d4a853;
}
```
Pero estos se sobreescriben desde el admin (GITTS Settings → colores), que inyecta CSS inline en `header.php`.

### Para cambiar la estructura de una pagina
Editar el template correspondiente (ej. `page-investigacion.php`). Cada template:
1. Llama a `get_header()` al inicio
2. Tiene el HTML/PHP de la pagina
3. Usa `WP_Query` para traer datos de CPTs
4. Usa `get_option()` para leer opciones del tema
5. Llama a `get_footer()` al final

### Para agregar un nuevo CPT
En `functions.php`, dentro de la funcion `gitts_cpts()`, agregar:
```php
register_post_type('nuevo_tipo', [
    'labels' => ['name' => 'Nuevos Tipos', 'singular_name' => 'Nuevo Tipo'],
    'public' => true, 'has_archive' => true,
    'supports' => ['title', 'editor', 'thumbnail'],
    'menu_icon' => 'dashicons-admin-generic',
    'show_in_rest' => true,
]);
```

### Para agregar campos personalizados a un CPT
En `functions.php`, agregar un meta box en `gitts_meta_boxes()` y su callback para renderizar los campos.

---

## Base de datos

### Tablas principales de WordPress

| Tabla | Que guarda |
|-------|-----------|
| `wp_posts` | Todo el contenido: paginas, posts, CPTs (proyectos, miembros, etc.) |
| `wp_postmeta` | Campos personalizados de cada post (investigador_principal, cargo, doi, etc.) |
| `wp_options` | Configuracion del sitio y opciones del tema (gitts_*) |
| `wp_users` | Usuarios del admin |
| `wp_terms` | Categorias y etiquetas |
| `wp_term_relationships` | Relacion entre posts y categorias |

### Queries utiles para phpMyAdmin

**Ver todas las opciones de GITTS:**
```sql
SELECT option_name, LEFT(option_value, 100)
FROM wp_options
WHERE option_name LIKE 'gitts_%'
ORDER BY option_name;
```

**Ver todos los proyectos:**
```sql
SELECT ID, post_title, post_status, post_date
FROM wp_posts
WHERE post_type = 'proyecto'
ORDER BY post_date DESC;
```

**Ver todos los miembros con su cargo:**
```sql
SELECT p.post_title AS nombre, pm.meta_value AS cargo
FROM wp_posts p
JOIN wp_postmeta pm ON p.ID = pm.post_id AND pm.meta_key = 'cargo'
WHERE p.post_type = 'miembro' AND p.post_status = 'publish'
ORDER BY p.post_title;
```

**Ver todas las publicaciones con autor y anio:**
```sql
SELECT p.post_title AS titulo,
       MAX(CASE WHEN pm.meta_key = 'autores' THEN pm.meta_value END) AS autores,
       MAX(CASE WHEN pm.meta_key = 'anio' THEN pm.meta_value END) AS anio
FROM wp_posts p
JOIN wp_postmeta pm ON p.ID = pm.post_id
WHERE p.post_type = 'publicacion' AND p.post_status = 'publish'
GROUP BY p.ID
ORDER BY anio DESC;
```

**Contar contenido por tipo:**
```sql
SELECT post_type, COUNT(*) AS total
FROM wp_posts
WHERE post_status = 'publish'
GROUP BY post_type
ORDER BY total DESC;
```

**Cambiar la URL del sitio:**
```sql
UPDATE wp_options SET option_value = 'https://NUEVA-URL.com' WHERE option_name = 'siteurl';
UPDATE wp_options SET option_value = 'https://NUEVA-URL.com' WHERE option_name = 'home';
```

**Cambiar la contrasena del admin:**
```sql
UPDATE wp_users SET user_pass = MD5('nueva_contrasena') WHERE user_login = 'admin';
```

**Ver un valor de opcion completo (ej. valores fundamentales):**
```sql
SELECT option_value FROM wp_options WHERE option_name = 'gitts_valores_fund_data';
```

---

## Guia de deploy

### Contenido del paquete

- **`gitts-htdocs.zip`** — WordPress completo: core + tema GITTS + imagenes/uploads. Se descomprime en `htdocs/`.
- **`gitts-sql.zip`** — Base de datos (`gitts-final.sql`). Se importa en phpMyAdmin.

### Paso 1: Crear la base de datos

1. En el panel de control de tu hosting (cPanel, hPanel, etc.), busca **"Bases de datos MySQL"**.
2. Crea una nueva base de datos. Anota el nombre (ej. `if0_41426545_gitts_wp`).
3. Crea un usuario MySQL con contrasena. Anota usuario y contrasena.
4. Asigna el usuario a la base de datos con **todos los privilegios**.
5. Anota el **host de MySQL** (ej. `sql211.infinityfree.com`, `localhost`).

### Paso 2: Importar la base de datos

1. Abre **phpMyAdmin** desde el panel de tu hosting.
2. Selecciona la base de datos que creaste.
3. Ve a la pestana **Importar**.
4. Descomprime `gitts-sql.zip` y sube el archivo `gitts-final.sql`.
5. Dale **Continuar/Ejecutar**.
6. Si tu dominio es diferente a `https://gitts-social-service.wuaze.com`, ejecuta el query de cambio de URL (ver seccion "Cambio de dominio").

### Paso 3: Subir los archivos

1. Descomprime `gitts-htdocs.zip`.
2. Sube **todo el contenido** dentro de `htdocs/` (o `public_html/`) del hosting.
   - Si el hosting permite subir ZIPs, sube `gitts-htdocs.zip` a `htdocs/` y descomprime ahi.

### Paso 4: Crear `wp-config.php`

Este archivo **NO viene incluido** por seguridad. Crealo manualmente en la raiz de `htdocs/`.

```php
<?php
// -- Datos de la base de datos (los del Paso 1) --
define( 'DB_NAME', 'NOMBRE_DE_TU_BASE_DE_DATOS' );
define( 'DB_USER', 'TU_USUARIO_MYSQL' );
define( 'DB_PASSWORD', 'TU_CONTRASENA_MYSQL' );
define( 'DB_HOST', 'HOST_MYSQL' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

// -- Claves de seguridad --
// Genera las tuyas en: https://api.wordpress.org/secret-key/1.1/salt/
// Copia y pega el resultado aqui reemplazando estas 8 lineas:
define( 'AUTH_KEY',         'genera-tu-clave-unica-aqui-1' );
define( 'SECURE_AUTH_KEY',  'genera-tu-clave-unica-aqui-2' );
define( 'LOGGED_IN_KEY',    'genera-tu-clave-unica-aqui-3' );
define( 'NONCE_KEY',        'genera-tu-clave-unica-aqui-4' );
define( 'AUTH_SALT',        'genera-tu-clave-unica-aqui-5' );
define( 'SECURE_AUTH_SALT', 'genera-tu-clave-unica-aqui-6' );
define( 'LOGGED_IN_SALT',   'genera-tu-clave-unica-aqui-7' );
define( 'NONCE_SALT',       'genera-tu-clave-unica-aqui-8' );

$table_prefix = 'wp_';

define( 'WP_DEBUG', false );

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';
```

**Ejemplo real (InfinityFree):**

```php
<?php
define( 'DB_NAME', 'if0_41426545_gitts_wp' );
define( 'DB_USER', 'if0_41426545' );
define( 'DB_PASSWORD', 'SfKNfo7UwztsEvW' );
define( 'DB_HOST', 'sql211.infinityfree.com' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

define( 'AUTH_KEY',         'g8$kP#mN!vR2xQ7wZ9jL' );
define( 'SECURE_AUTH_KEY',  'j3&tY9nL@cF5hB1dK4pS' );
define( 'LOGGED_IN_KEY',    'q6*wE4pS!uA8mX2rV7nT' );
define( 'NONCE_KEY',        'z1#bH7yT@fG3kN9jM5cL' );
define( 'AUTH_SALT',        'd5&xR2cL!vP8qW4nS6hY' );
define( 'SECURE_AUTH_SALT', 'h9*mK6tY@bF1jA3gE8wR' );
define( 'LOGGED_IN_SALT',   'w4#nS8pR!uC2xV7dL3fT' );
define( 'NONCE_SALT',       'f3&kM5hT@yB9qJ1aG6xP' );

$table_prefix = 'wp_';

define( 'WP_DEBUG', false );

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';
```

### Paso 5: Configurar permalinks

1. Entra al admin: `https://TU-DOMINIO.com/wp-admin`
2. Ve a **Ajustes → Enlaces permanentes**
3. Selecciona **"Nombre de la entrada"** (`/%postname%/`)
4. **Guardar cambios**

### Resumen rapido

| Que cambiar | Donde |
|-------------|-------|
| Nombre de base de datos | `wp-config.php` → `DB_NAME` |
| Usuario MySQL | `wp-config.php` → `DB_USER` |
| Contrasena MySQL | `wp-config.php` → `DB_PASSWORD` |
| Host MySQL | `wp-config.php` → `DB_HOST` |
| URL del sitio | phpMyAdmin → `wp_options` → `siteurl` y `home` |
| Claves de seguridad | `wp-config.php` → AUTH_KEY, SALT, etc. |

---

## Cambio de dominio

Si cambias de hosting o dominio:

### Opcion 1: Plugin (mas facil)
1. Instala **Better Search Replace** desde Plugins → Anadir nuevo
2. Busca: `https://url-vieja.com`
3. Reemplaza con: `https://url-nueva.com`
4. Selecciona todas las tablas
5. Ejecuta

### Opcion 2: SQL directo en phpMyAdmin
```sql
UPDATE wp_options SET option_value = 'https://NUEVA-URL.com' WHERE option_name = 'siteurl';
UPDATE wp_options SET option_value = 'https://NUEVA-URL.com' WHERE option_name = 'home';
```

> Si las imagenes se ven rotas despues del cambio, es porque las URLs de imagenes en `wp_posts` y `wp_postmeta` aun apuntan al dominio viejo. Usa Better Search Replace para cambiarlas todas.

---

## Credenciales

- **URL admin:** `https://TU-DOMINIO.com/wp-admin`
- **Usuario:** `admin`
- **Contrasena:** La misma de la instalacion local. Si no la recuerdas, cambiala con este query en phpMyAdmin:
  ```sql
  UPDATE wp_users SET user_pass = MD5('tu_nueva_contrasena') WHERE user_login = 'admin';
  ```
