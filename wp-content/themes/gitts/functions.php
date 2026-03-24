<?php
/**
 * GITTS Theme — functions.php
 * Siguiendo SRS + Ficha Técnica exactamente
 */

function gitts_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form','comment-form','gallery','caption']);
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    register_nav_menus([
        'primary' => 'Menú Principal',
        'footer'  => 'Menú Footer',
    ]);
}
add_action('after_setup_theme', 'gitts_setup');

// Helper: obtener URL del logo (custom_logo o fallback al del tema)
function gitts_get_logo_url() {
    $custom_logo_id = get_theme_mod('custom_logo');
    if ($custom_logo_id) {
        return wp_get_attachment_image_url($custom_logo_id, 'full');
    }
    return get_template_directory_uri() . '/assets/img/brand/logo-digital.png';
}

function gitts_scripts() {
    // Myriad Pro loaded via @font-face in style.css
    // Tailwind + DaisyUI via CDN
    wp_enqueue_style('daisyui', 'https://cdn.jsdelivr.net/npm/daisyui@4/dist/full.min.css', [], '4.0');
    // Tailwind CDN loaded directly in header.php before config
    // Animate on Scroll
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', [], null);
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', [], null, true);
    // GLightbox (lightbox para galería)
    wp_enqueue_style('glightbox-css', 'https://cdn.jsdelivr.net/npm/glightbox@3.2.0/dist/css/glightbox.min.css', [], '3.2.0');
    wp_enqueue_script('glightbox-js', 'https://cdn.jsdelivr.net/npm/glightbox@3.2.0/dist/js/glightbox.min.js', [], '3.2.0', true);
    // Theme
    wp_enqueue_style('gitts-style', get_stylesheet_uri(), [], '4.0');
    wp_enqueue_script('gitts-main', get_template_directory_uri() . '/js/main.js', ['aos-js', 'glightbox-js'], '4.0', true);
}
add_action('wp_enqueue_scripts', 'gitts_scripts');

// Remove WordPress core block/global styles that conflict with Tailwind/DaisyUI
function gitts_remove_wp_block_styles() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
    wp_dequeue_style('classic-theme-styles');
    wp_deregister_style('global-styles');
    wp_deregister_style('classic-theme-styles');
}
add_action('wp_enqueue_scripts', 'gitts_remove_wp_block_styles', 100);
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

// Tailwind config + DaisyUI custom theme
function gitts_tailwind_config() {
    $primary   = get_option('gitts_color_primary', '#165288');
    $secondary = get_option('gitts_color_secondary', '#52975D');
    $accent    = get_option('gitts_color_accent', '#E83C56');
    $primary_dark = gitts_darken_hex($primary, 0.3);
?>
<script>
tailwind.config = {
    theme: {
        extend: {
            colors: {
                'baleine': '<?php echo $primary; ?>',
                'baleine-dark': '<?php echo $primary_dark; ?>',
                'hibiscus': '<?php echo $accent; ?>',
                'mgreen': '<?php echo $secondary; ?>',
                'indigo': '#495C9B',
                'purple-mid': '#7365AA',
                'orchid': '#9C6DB4',
                'pink-soft': '#C474B9',
                'pink-light': '#E97DB9',
                'slate': {
                    50: '#F8FAFC', 100: '#F1F5F9', 200: '#E2E8F0',
                    300: '#CBD5E1', 400: '#94A3B8', 500: '#64748B',
                    600: '#475569', 700: '#334155', 800: '#1E293B', 900: '#0F172A',
                },
            },
            fontFamily: {
                'sans': ['"Myriad Pro"', 'system-ui', '-apple-system', 'sans-serif'],
            }
        }
    }
}
</script>
<style>
/* GITTS DaisyUI 4 custom theme — oklch native */
[data-theme="gitts"] {
    --p: 0.389 0.106 243.35;     /* #165288 navy */
    --pf: 0.299 0.082 241.5;     /* #0E3A5F navy dark */
    --pc: 0.965 0.005 90;        /* #F8F8F4 warm off-white */
    --s: 0.512 0.112 152.8;      /* #52975D green */
    --sf: 0.432 0.098 151.5;     /* #2D6A3D green dark */
    --sc: 0.965 0.005 90;        /* #F8F8F4 */
    --a: 0.546 0.191 22.5;       /* #E83C56 hibiscus */
    --af: 0.478 0.172 21.8;      /* #C42F3D hibiscus dark */
    --ac: 1.0 0.0 0;             /* #FFFFFF */
    --n: 0.554 0.022 250;        /* #64748B slate-500 */
    --nf: 0.446 0.022 250;       /* #475569 slate-600 */
    --nc: 0.965 0.005 90;        /* #F8F8F4 */
    --b1: 1.0 0.0 0;             /* #FFFFFF */
    --b2: 0.976 0.005 250;       /* #F8FAFC slate-50 */
    --b3: 0.916 0.014 250;       /* #E2E8F0 slate-200 */
    --bc: 0.208 0.030 250;       /* #1E293B slate-800 */
    --su: 0.512 0.112 152.8;     /* green */
    --suc: 0.965 0.005 90;
    --in: 0.480 0.090 243;       /* blue info */
    --inc: 0.965 0.005 90;
    --wa: 0.700 0.150 72;        /* amber */
    --wac: 0.208 0.030 250;
    --er: 0.546 0.191 22.5;      /* red */
    --erc: 1.0 0.0 0;
    --rounded-box: 0.625rem;
    --rounded-btn: 0.5rem;
    --rounded-badge: 1.25rem;
    --animation-btn: 0.2s;
    --animation-input: 0.2s;
    --btn-focus-scale: 0.98;
    --border-btn: 1px;
    --tab-border: 2px;
    --tab-radius: 0.5rem;
}
</style>
<?php }
add_action('wp_head', 'gitts_tailwind_config', 1);

// ── CPT: Proyectos ──
function gitts_register_cpts() {
    register_post_type('proyecto', [
        'labels' => [
            'name' => 'Proyectos', 'singular_name' => 'Proyecto',
            'add_new' => 'Agregar Proyecto', 'add_new_item' => 'Nuevo Proyecto',
            'edit_item' => 'Editar Proyecto',
        ],
        'public' => true, 'has_archive' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title','editor','thumbnail','excerpt'],
        'rewrite' => ['slug' => 'proyectos'],
        'show_in_rest' => true,
    ]);

    register_post_type('miembro', [
        'labels' => [
            'name' => 'Equipo', 'singular_name' => 'Miembro',
            'add_new' => 'Agregar Miembro',
        ],
        'public' => true, 'has_archive' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => ['title','editor','thumbnail','excerpt'],
        'rewrite' => ['slug' => 'equipo'],
        'show_in_rest' => true,
    ]);

    // Publicación científica
    register_post_type('publicacion', [
        'labels' => ['name' => 'Publicaciones', 'singular_name' => 'Publicación', 'add_new_item' => 'Nueva Publicación', 'edit_item' => 'Editar Publicación'],
        'public' => true, 'has_archive' => false, 'menu_icon' => 'dashicons-book-alt',
        'supports' => ['title', 'editor', 'thumbnail'], 'show_in_rest' => true,
        'rewrite' => ['slug' => 'publicaciones'],
    ]);

    // Valor institucional
    register_post_type('valor', [
        'labels' => ['name' => 'Valores', 'singular_name' => 'Valor', 'add_new_item' => 'Nuevo Valor'],
        'public' => true, 'has_archive' => false, 'menu_icon' => 'dashicons-heart',
        'supports' => ['title', 'thumbnail'], 'show_in_rest' => true,
    ]);

    // Línea de investigación
    register_post_type('linea_inv', [
        'labels' => ['name' => 'Líneas de Investigación', 'singular_name' => 'Línea', 'add_new_item' => 'Nueva Línea'],
        'public' => true, 'has_archive' => false, 'menu_icon' => 'dashicons-lightbulb',
        'supports' => ['title', 'thumbnail'], 'show_in_rest' => true,
    ]);

    // Laboratorio
    register_post_type('laboratorio', [
        'labels' => ['name' => 'Laboratorios', 'singular_name' => 'Laboratorio', 'add_new_item' => 'Nuevo Laboratorio'],
        'public' => true, 'has_archive' => false, 'menu_icon' => 'dashicons-building',
        'supports' => ['title', 'editor', 'thumbnail'], 'show_in_rest' => true,
    ]);

    // Equipamiento
    register_post_type('equipo_lab', [
        'labels' => ['name' => 'Equipamiento', 'singular_name' => 'Equipo', 'add_new_item' => 'Nuevo Equipo'],
        'public' => true, 'has_archive' => false, 'menu_icon' => 'dashicons-hammer',
        'supports' => ['title'], 'show_in_rest' => true,
    ]);

    // Capacidad técnica
    register_post_type('capacidad', [
        'labels' => ['name' => 'Capacidades', 'singular_name' => 'Capacidad', 'add_new_item' => 'Nueva Capacidad'],
        'public' => true, 'has_archive' => false, 'menu_icon' => 'dashicons-performance',
        'supports' => ['title'], 'show_in_rest' => true,
    ]);

    // Servicio institucional
    register_post_type('servicio', [
        'labels' => ['name' => 'Servicios', 'singular_name' => 'Servicio', 'add_new_item' => 'Nuevo Servicio'],
        'public' => true, 'has_archive' => false, 'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title'], 'show_in_rest' => true,
    ]);

    // Forma de colaboración
    register_post_type('colaboracion', [
        'labels' => ['name' => 'Colaboraciones', 'singular_name' => 'Colaboración', 'add_new_item' => 'Nueva Colaboración'],
        'public' => true, 'has_archive' => false, 'menu_icon' => 'dashicons-groups',
        'supports' => ['title'], 'show_in_rest' => true,
    ]);

    // Aplicación
    register_post_type('aplicacion', [
        'labels' => ['name' => 'Aplicaciones', 'singular_name' => 'Aplicación', 'add_new_item' => 'Nueva Aplicación'],
        'public' => true, 'has_archive' => false, 'menu_icon' => 'dashicons-admin-site-alt3',
        'supports' => ['title'], 'show_in_rest' => true,
    ]);

    // Tag de especialización
    register_post_type('especializacion', [
        'labels' => ['name' => 'Especializaciones', 'singular_name' => 'Especialización', 'add_new_item' => 'Nueva Especialización'],
        'public' => true, 'has_archive' => false, 'menu_icon' => 'dashicons-tag',
        'supports' => ['title'], 'show_in_rest' => true,
    ]);

    // Objetivo institucional
    register_post_type('objetivo', [
        'labels' => ['name' => 'Objetivos', 'singular_name' => 'Objetivo', 'add_new_item' => 'Nuevo Objetivo'],
        'public' => true, 'has_archive' => false, 'menu_icon' => 'dashicons-flag',
        'supports' => ['title'], 'show_in_rest' => true,
    ]);
}
add_action('init', 'gitts_register_cpts');

// ── Taxonomías ──
function gitts_register_taxonomies() {
    register_taxonomy('tipo_miembro', 'miembro', [
        'labels' => ['name' => 'Tipo de Miembro', 'singular_name' => 'Tipo'],
        'hierarchical' => true, 'show_in_rest' => true,
    ]);

    register_taxonomy('tipo_publicacion', 'publicacion', [
        'labels' => ['name' => 'Tipo de Publicación', 'singular_name' => 'Tipo'],
        'hierarchical' => true, 'show_in_rest' => true,
    ]);
}
add_action('init', 'gitts_register_taxonomies');

// ── Meta boxes (simulando ACF) ──
function gitts_meta_boxes() {
    add_meta_box('proyecto_fields', 'Campos del Proyecto', 'gitts_proyecto_fields_cb', 'proyecto', 'normal', 'high');
    add_meta_box('miembro_fields', 'Campos del Miembro', 'gitts_miembro_fields_cb', 'miembro', 'normal', 'high');
    add_meta_box('publicacion_fields', 'Campos de Publicación', 'gitts_publicacion_fields_cb', 'publicacion', 'normal', 'high');
    add_meta_box('valor_fields', 'Campos del Valor', 'gitts_simple_fields_cb', 'valor', 'normal', 'high');
    add_meta_box('linea_fields', 'Campos de Línea', 'gitts_simple_fields_cb', 'linea_inv', 'normal', 'high');
    add_meta_box('lab_fields', 'Campos del Laboratorio', 'gitts_lab_fields_cb', 'laboratorio', 'normal', 'high');
    add_meta_box('equipo_fields', 'Campos del Equipo', 'gitts_simple_fields_cb', 'equipo_lab', 'normal', 'high');
    add_meta_box('capacidad_fields', 'Campos de Capacidad', 'gitts_simple_fields_cb', 'capacidad', 'normal', 'high');
    add_meta_box('servicio_fields', 'Campos del Servicio', 'gitts_simple_fields_cb', 'servicio', 'normal', 'high');
    add_meta_box('colaboracion_fields', 'Campos de Colaboración', 'gitts_simple_fields_cb', 'colaboracion', 'normal', 'high');
    add_meta_box('objetivo_fields', 'Campos del Objetivo', 'gitts_simple_fields_cb', 'objetivo', 'normal', 'high');
}
add_action('add_meta_boxes', 'gitts_meta_boxes');

function gitts_proyecto_fields_cb($post) {
    wp_nonce_field('gitts_save', 'gitts_nonce');

    // Estado del proyecto (select)
    $estado = get_post_meta($post->ID, 'estado_proyecto', true);
    echo "<p><strong>Estado del Proyecto:</strong><br><select name='estado_proyecto' class='widefat'>";
    foreach (['En progreso', 'Concluido', 'Pausado'] as $opt) {
        echo "<option value='" . esc_attr($opt) . "'" . selected($estado, $opt, false) . ">" . esc_html($opt) . "</option>";
    }
    echo "</select></p>";

    // Tipo de proyecto (select)
    $tipo = get_post_meta($post->ID, 'tipo_proyecto', true);
    echo "<p><strong>Tipo de Proyecto:</strong><br><select name='tipo_proyecto' class='widefat'>";
    foreach (['I+D' => 'id', 'Generación de capacidades' => 'capacidades', 'Colaboración' => 'colaboracion'] as $label => $val) {
        echo "<option value='" . esc_attr($val) . "'" . selected($tipo, $val, false) . ">" . esc_html($label) . "</option>";
    }
    echo "</select></p>";

    $fields = [
        'fecha_inicio' => 'Fecha de Inicio',
        'fecha_fin' => 'Fecha de Fin (vacío si en curso)',
        'investigador_principal' => 'Investigador Principal',
        'co_investigadores' => 'Co-investigadores (separados por coma)',
        'investigadores_asignados' => 'Otros investigadores',
        'organismo_financiador' => 'Organismo Financiador (ej: SENACYT)',
        'organismo_ejecutor' => 'Organismo Ejecutor (ej: CEMCIT-AIP)',
        'codigo_proyecto' => 'Código del Proyecto (ej: FID 2018 096)',
        'entidades_financiadoras' => 'Entidades Financiadoras (detalle)',
        'duracion' => 'Duración (ej: 26 meses)',
        'monto_total' => 'Monto Total (ej: B/. 99,996.85)',
        'contacto_email' => 'Email de contacto',
        'galeria_imagenes' => 'Galería (URLs de imágenes separadas por coma)',
    ];
    foreach ($fields as $k => $label) {
        $v = get_post_meta($post->ID, $k, true);
        echo "<p><strong>{$label}:</strong><br><input type='text' name='{$k}' value='" . esc_attr($v) . "' class='widefat'></p>";
    }
}

function gitts_miembro_fields_cb($post) {
    wp_nonce_field('gitts_save', 'gitts_nonce');
    $fields = [
        'cargo_oficial' => 'Cargo Oficial',
        'email_institucional' => 'Email Institucional (@utp.ac.pa)',
        'link_linkedin' => 'LinkedIn URL',
        'link_orcid' => 'ORCID URL',
        'link_researchgate' => 'ResearchGate URL',
        'link_apersei' => 'Alpha Persei URL',
        'link_scholar' => 'Google Scholar URL',
        'bio_extendida' => 'Biografía extendida',
        'orden' => 'Orden de aparición (número)',
    ];
    foreach ($fields as $k => $label) {
        $v = get_post_meta($post->ID, $k, true);
        echo "<p><strong>{$label}:</strong><br><input type='text' name='{$k}' value='" . esc_attr($v) . "' class='widefat'></p>";
    }
}

function gitts_publicacion_fields_cb($post) {
    wp_nonce_field('gitts_save', 'gitts_nonce');
    $fields = [
        'pub_autores' => 'Autores',
        'pub_revista' => 'Revista / Conferencia',
        'pub_anio' => 'Año',
        'pub_doi' => 'Link DOI / IEEE',
        'pub_director' => 'Director (solo tesis)',
        'pub_nivel' => 'Nivel (Pregrado/Maestría — solo tesis)',
        'pub_estado' => 'Estado (solo desarrollos)',
        'pub_citaciones' => 'Número de citaciones',
    ];
    foreach ($fields as $k => $label) {
        $v = get_post_meta($post->ID, $k, true);
        echo "<p><strong>{$label}:</strong><br><input type='text' name='{$k}' value='" . esc_attr($v) . "' class='widefat'></p>";
    }
    // Destacada (select)
    $destacada = get_post_meta($post->ID, 'pub_destacada', true);
    echo "<p><strong>Destacada:</strong><br><select name='pub_destacada' class='widefat'>";
    echo "<option value='no'" . selected($destacada, 'no', false) . ">No</option>";
    echo "<option value='si'" . selected($destacada, 'si', false) . ">Sí</option>";
    echo "</select></p>";
}

function gitts_simple_fields_cb($post) {
    wp_nonce_field('gitts_save', 'gitts_nonce');
    $v = get_post_meta($post->ID, 'descripcion', true);
    echo "<p><strong>Descripción:</strong><br><textarea name='descripcion' class='widefat' rows='4'>" . esc_textarea($v) . "</textarea></p>";
    $o = get_post_meta($post->ID, 'orden', true);
    echo "<p><strong>Orden (número):</strong><br><input type='number' name='orden' value='" . esc_attr($o) . "' class='small-text'></p>";
}

function gitts_lab_fields_cb($post) {
    wp_nonce_field('gitts_save', 'gitts_nonce');
    $desc = get_post_meta($post->ID, 'lab_descripcion', true);
    echo "<p><strong>Descripción:</strong><br><textarea name='lab_descripcion' class='widefat' rows='3'>" . esc_textarea($desc) . "</textarea></p>";
    $equip = get_post_meta($post->ID, 'lab_equipamiento', true);
    echo "<p><strong>Equipamiento (uno por línea):</strong><br><textarea name='lab_equipamiento' class='widefat' rows='5'>" . esc_textarea($equip) . "</textarea></p>";
    $o = get_post_meta($post->ID, 'orden', true);
    echo "<p><strong>Orden:</strong><br><input type='number' name='orden' value='" . esc_attr($o) . "' class='small-text'></p>";
}

function gitts_save_fields($post_id) {
    if (!isset($_POST['gitts_nonce']) || !wp_verify_nonce($_POST['gitts_nonce'], 'gitts_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Campos de texto (sanitize_text_field)
    $text_fields = [
        'fecha_inicio','fecha_fin','estado_proyecto','tipo_proyecto',
        'investigador_principal','co_investigadores','investigadores_asignados',
        'organismo_financiador','organismo_ejecutor','codigo_proyecto',
        'entidades_financiadoras','duracion','monto_total','contacto_email','galeria_imagenes',
        'cargo_oficial','email_institucional','link_linkedin','link_orcid','link_researchgate',
        'link_apersei','link_scholar','orden',
        'pub_autores','pub_revista','pub_anio','pub_doi','pub_director','pub_nivel',
        'pub_estado','pub_destacada','pub_citaciones',
    ];
    foreach ($text_fields as $f) {
        if (isset($_POST[$f])) update_post_meta($post_id, $f, sanitize_text_field($_POST[$f]));
    }

    // Campos textarea (sanitize_textarea_field — preserva saltos de línea)
    $textarea_fields = ['bio_extendida', 'descripcion', 'lab_descripcion', 'lab_equipamiento'];
    foreach ($textarea_fields as $f) {
        if (isset($_POST[$f])) update_post_meta($post_id, $f, sanitize_textarea_field($_POST[$f]));
    }
}
add_action('save_post', 'gitts_save_fields');

// ══════════════════════════════════════════════
// ADMIN UI CUSTOMIZATION
// ══════════════════════════════════════════════

// ── Custom Login Page ──
function gitts_login_styles() { ?>
<style>
    body.login {
        background: linear-gradient(135deg, #0F172A 0%, #165288 60%, #495C9B 100%);
        font-family: 'Inter', system-ui, sans-serif;
    }
    #login {
        padding-top: 6%;
    }
    .login h1 a {
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/brand/logo-digital.png');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        width: 200px;
        height: 80px;
        filter: brightness(0) invert(1);
    }
    .login form {
        background: rgba(255,255,255,0.97);
        border: none;
        border-radius: 12px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.2);
        padding: 28px 24px;
    }
    .login form .input {
        border: 1px solid #E2E8F0;
        border-radius: 8px;
        padding: 10px 14px;
        font-size: 14px;
        background: #fff;
        color: #1E293B;
        transition: border-color 0.2s;
    }
    .login form .input:focus {
        border-color: #165288;
        box-shadow: 0 0 0 3px rgba(22,82,136,0.15);
    }
    .login label {
        color: #475569;
        font-size: 13px;
        font-weight: 500;
    }
    .wp-core-ui .button-primary {
        background: #165288;
        border: none;
        border-radius: 8px;
        padding: 8px 20px;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.01em;
        transition: background 0.2s;
        box-shadow: 0 2px 4px rgba(22,82,136,0.3);
    }
    .wp-core-ui .button-primary:hover,
    .wp-core-ui .button-primary:focus {
        background: #0E3A5F;
        box-shadow: 0 4px 12px rgba(22,82,136,0.4);
    }
    .login #nav a, .login #backtoblog a {
        color: rgba(255,255,255,0.7);
        transition: color 0.2s;
    }
    .login #nav a:hover, .login #backtoblog a:hover {
        color: #fff;
    }
    .login .message, .login .success {
        border-left-color: #165288;
        border-radius: 8px;
    }
    .wp-pwd .button.wp-hide-pw {
        color: #64748B;
    }
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<?php }
add_action('login_enqueue_scripts', 'gitts_login_styles');

function gitts_login_url() { return home_url(); }
add_filter('login_headerurl', 'gitts_login_url');

function gitts_login_title() { return 'GITTS — Portal Web'; }
add_filter('login_headertext', 'gitts_login_title');

// ── Admin Color Scheme & Branding ──
function gitts_admin_styles() { ?>
<style>
    /* Admin bar */
    #wpadminbar { background: #0E3A5F; }
    #wpadminbar .menupop .ab-sub-wrapper { background: #0E3A5F; }
    #wpadminbar .ab-item, #wpadminbar a.ab-item { color: #CBD5E1; }
    #wpadminbar .ab-item:hover, #wpadminbar a.ab-item:hover { color: #fff; background: #165288; }

    /* Sidebar */
    #adminmenuback, #adminmenuwrap, #adminmenu { background: #0F172A; }
    #adminmenu a { color: #94A3B8; font-size: 13px; }
    #adminmenu a:hover, #adminmenu li.menu-top:hover,
    #adminmenu li.opensub > a.menu-top { color: #fff; background: #165288; }
    #adminmenu .wp-has-current-submenu .wp-submenu,
    #adminmenu .current a.menu-top { background: #165288; color: #fff; }
    #adminmenu .wp-submenu { background: #0F172A; }
    #adminmenu .wp-submenu a { color: #94A3B8; }
    #adminmenu .wp-submenu a:hover,
    #adminmenu .wp-submenu li.current a { color: #fff; }
    #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,
    #adminmenu li.current a.menu-top { background: #165288; }
    #adminmenu .wp-menu-separator { border-color: rgba(148,163,184,0.1); }
    #adminmenu div.wp-menu-image:before { color: #64748B; }
    #adminmenu a:hover div.wp-menu-image:before,
    #adminmenu li.wp-has-current-submenu div.wp-menu-image:before { color: #fff; }
    #collapse-menu { color: #64748B; }

    /* Content area */
    #wpcontent, #wpfooter { background: #F8FAFC; }
    .wrap h1 { color: #1E293B; font-weight: 600; }

    /* Buttons */
    .wp-core-ui .button-primary {
        background: #165288;
        border-color: #165288;
        box-shadow: 0 1px 2px rgba(22,82,136,0.2);
    }
    .wp-core-ui .button-primary:hover {
        background: #0E3A5F;
        border-color: #0E3A5F;
    }

    /* Links */
    #wpcontent a { color: #165288; }
    #wpcontent a:hover { color: #0E3A5F; }

    /* Dashboard cards */
    .postbox { border-color: #E2E8F0; border-radius: 8px; }
    .postbox .postbox-header { border-bottom-color: #E2E8F0; }
    #dashboard-widgets .postbox-header h2 { color: #1E293B; }

    /* Notices */
    .notice-success { border-left-color: #52975D; }
    .notice-info { border-left-color: #165288; }
    .notice-error { border-left-color: #E83C56; }

    /* Footer */
    #wpfooter { color: #94A3B8; }
    #wpfooter a { color: #165288; }
</style>
<?php }
add_action('admin_head', 'gitts_admin_styles');

// ── Admin Footer ──
function gitts_admin_footer() {
    return '<span style="color:#64748B">GITTS — Universidad Tecnológica de Panamá</span>';
}
add_filter('admin_footer_text', 'gitts_admin_footer');

// ── Custom Dashboard Widget ──
function gitts_dashboard_widgets() {
    wp_add_dashboard_widget('gitts_welcome', 'GITTS — Panel de Administración', 'gitts_welcome_widget');
}
add_action('wp_dashboard_setup', 'gitts_dashboard_widgets');

function gitts_welcome_widget() {
    $miembros = wp_count_posts('miembro');
    $proyectos = wp_count_posts('proyecto');
    $posts = wp_count_posts('post');
    ?>
    <div style="font-family:Inter,system-ui,sans-serif;">
        <p style="color:#475569;font-size:14px;margin-bottom:20px;">Bienvenido al panel de administración del portal web de GITTS.</p>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-bottom:20px;">
            <div style="background:#F0F7FF;border-radius:8px;padding:16px;text-align:center;">
                <div style="font-size:28px;font-weight:600;color:#165288;"><?php echo $miembros->publish; ?></div>
                <div style="font-size:12px;color:#64748B;margin-top:4px;">Miembros</div>
            </div>
            <div style="background:#F0FAF3;border-radius:8px;padding:16px;text-align:center;">
                <div style="font-size:28px;font-weight:600;color:#52975D;"><?php echo $proyectos->publish; ?></div>
                <div style="font-size:12px;color:#64748B;margin-top:4px;">Proyectos</div>
            </div>
            <div style="background:#FFF5F5;border-radius:8px;padding:16px;text-align:center;">
                <div style="font-size:28px;font-weight:600;color:#E83C56;"><?php echo $posts->publish; ?></div>
                <div style="font-size:12px;color:#64748B;margin-top:4px;">Noticias</div>
            </div>
        </div>
        <div style="display:flex;gap:8px;flex-wrap:wrap;">
            <a href="<?php echo admin_url('post-new.php?post_type=miembro'); ?>" style="display:inline-flex;align-items:center;gap:6px;background:#165288;color:#fff;padding:8px 16px;border-radius:6px;text-decoration:none;font-size:13px;font-weight:500;">+ Nuevo Miembro</a>
            <a href="<?php echo admin_url('post-new.php?post_type=proyecto'); ?>" style="display:inline-flex;align-items:center;gap:6px;background:#52975D;color:#fff;padding:8px 16px;border-radius:6px;text-decoration:none;font-size:13px;font-weight:500;">+ Nuevo Proyecto</a>
            <a href="<?php echo admin_url('post-new.php'); ?>" style="display:inline-flex;align-items:center;gap:6px;background:#E83C56;color:#fff;padding:8px 16px;border-radius:6px;text-decoration:none;font-size:13px;font-weight:500;">+ Nueva Noticia</a>
        </div>
    </div>
    <?php
}

// ── Remove default dashboard widgets ──
function gitts_remove_dashboard_widgets() {
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'gitts_remove_dashboard_widgets');

// ── Simplify admin menu for non-super-admins ──
function gitts_clean_admin_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'gitts_clean_admin_menu');

// ── Theme Options Page ──
function gitts_theme_options_page() {
    add_menu_page('GITTS Settings', 'GITTS Settings', 'manage_options', 'gitts-settings', 'gitts_settings_render', 'dashicons-admin-generic', 3);
}
add_action('admin_menu', 'gitts_theme_options_page');

function gitts_settings_render() {
    if (isset($_POST['gitts_settings_nonce']) && wp_verify_nonce($_POST['gitts_settings_nonce'], 'gitts_settings_save')) {
        $opts = [
            'gitts_mision','gitts_vision','gitts_telefono','gitts_email_contacto','gitts_direccion','gitts_campus',
            'gitts_hero_titulo','gitts_hero_subtitulo',
            'gitts_intro_quienes','gitts_intro_unete','gitts_intro_miembros','gitts_intro_produccion',
            'gitts_intro_infraestructura','gitts_intro_investigacion',
            'gitts_intro_valores','gitts_importancia_titulo','gitts_importancia_texto',
            'gitts_descripcion_grupo','gitts_intro_prod_header','gitts_intro_invest_header',
            'gitts_institucion',
            'gitts_color_primary','gitts_color_secondary','gitts_color_accent',
            'gitts_intro_noticias',
            'gitts_sec_valores','gitts_sec_especializacion','gitts_sec_actualidad',
            'gitts_sec_laboratorios','gitts_sec_equipamiento','gitts_sec_capacidades','gitts_sec_ubicacion',
            'gitts_sec_areas_inv','gitts_sec_aplicaciones','gitts_sec_proyectos',
            'gitts_sec_recientes','gitts_sec_citadas','gitts_sec_lista_completa','gitts_sec_tesis','gitts_sec_desarrollos',
            'gitts_sec_miembros_principales','gitts_sec_colaboradores','gitts_sec_colaboradores_ext',
            'gitts_sec_estudiantes_activos','gitts_sec_estudiantes_egresados',
            'gitts_sec_como_colaborar','gitts_sec_servicios',
            'gitts_sec_valores_fund','gitts_sec_objetivos',
        ];
        foreach ($opts as $opt) {
            if (isset($_POST[$opt])) update_option($opt, wp_kses_post($_POST[$opt]));
        }
        echo '<div class="notice notice-success"><p>Configuración guardada.</p></div>';
    }
    ?>
    <div class="wrap">
        <h1>GITTS — Configuración del Tema</h1>
        <form method="post">
            <?php wp_nonce_field('gitts_settings_save', 'gitts_settings_nonce'); ?>
            <h2>Hero del Home</h2>
            <table class="form-table">
                <tr><th>Título</th><td><input type="text" name="gitts_hero_titulo" value="<?php echo esc_attr(get_option('gitts_hero_titulo', '')); ?>" class="large-text"></td></tr>
                <tr><th>Subtítulo</th><td><textarea name="gitts_hero_subtitulo" class="large-text" rows="2"><?php echo esc_textarea(get_option('gitts_hero_subtitulo', '')); ?></textarea></td></tr>
            </table>
            <h2>Secciones del Home</h2>
            <table class="form-table">
                <tr><th>Subtítulo sección Valores</th><td><textarea name="gitts_intro_valores" class="large-text" rows="2"><?php echo esc_textarea(get_option('gitts_intro_valores', '')); ?></textarea></td></tr>
                <tr><th>Título sección Importancia</th><td><input type="text" name="gitts_importancia_titulo" value="<?php echo esc_attr(get_option('gitts_importancia_titulo', '')); ?>" class="large-text"></td></tr>
                <tr><th>Texto sección Importancia</th><td><textarea name="gitts_importancia_texto" class="large-text" rows="4"><?php echo esc_textarea(get_option('gitts_importancia_texto', '')); ?></textarea></td></tr>
            </table>
            <h2>Contenido Institucional</h2>
            <table class="form-table">
                <tr><th>Misión</th><td><textarea name="gitts_mision" class="large-text" rows="4"><?php echo esc_textarea(get_option('gitts_mision', '')); ?></textarea></td></tr>
                <tr><th>Visión</th><td><textarea name="gitts_vision" class="large-text" rows="4"><?php echo esc_textarea(get_option('gitts_vision', '')); ?></textarea></td></tr>
                <tr><th>Intro Quiénes Somos</th><td><textarea name="gitts_intro_quienes" class="large-text" rows="4"><?php echo esc_textarea(get_option('gitts_intro_quienes', '')); ?></textarea></td></tr>
                <tr><th>Intro Únete</th><td><textarea name="gitts_intro_unete" class="large-text" rows="4"><?php echo esc_textarea(get_option('gitts_intro_unete', '')); ?></textarea></td></tr>
                <tr><th>Intro Miembros</th><td><textarea name="gitts_intro_miembros" class="large-text" rows="3"><?php echo esc_textarea(get_option('gitts_intro_miembros', '')); ?></textarea></td></tr>
                <tr><th>Intro Producción</th><td><textarea name="gitts_intro_produccion" class="large-text" rows="3"><?php echo esc_textarea(get_option('gitts_intro_produccion', '')); ?></textarea></td></tr>
                <tr><th>Intro Infraestructura</th><td><textarea name="gitts_intro_infraestructura" class="large-text" rows="3"><?php echo esc_textarea(get_option('gitts_intro_infraestructura', '')); ?></textarea></td></tr>
                <tr><th>Intro Investigación</th><td><textarea name="gitts_intro_investigacion" class="large-text" rows="3"><?php echo esc_textarea(get_option('gitts_intro_investigacion', '')); ?></textarea></td></tr>
            </table>
            <h2>Headers de Páginas</h2>
            <table class="form-table">
                <tr><th>Subtítulo header Investigación</th><td><textarea name="gitts_intro_invest_header" class="large-text" rows="2"><?php echo esc_textarea(get_option('gitts_intro_invest_header', '')); ?></textarea></td></tr>
                <tr><th>Subtítulo header Producción Científica</th><td><textarea name="gitts_intro_prod_header" class="large-text" rows="2"><?php echo esc_textarea(get_option('gitts_intro_prod_header', '')); ?></textarea></td></tr>
            </table>
            <h2>Títulos de Sección</h2>
            <p class="description">Personaliza los títulos de cada sección visible en el sitio. Deja vacío para usar el texto por defecto.</p>
            <table class="form-table">
                <tr><th colspan="2" style="padding-bottom:0"><strong>— Home —</strong></th></tr>
                <tr><th>Valores</th><td><input type="text" name="gitts_sec_valores" value="<?php echo esc_attr(get_option('gitts_sec_valores', '')); ?>" class="large-text" placeholder="Nuestros Valores"></td></tr>
                <tr><th>Especialización</th><td><input type="text" name="gitts_sec_especializacion" value="<?php echo esc_attr(get_option('gitts_sec_especializacion', '')); ?>" class="large-text" placeholder="Áreas de Especialización"></td></tr>
                <tr><th>Actualidad</th><td><input type="text" name="gitts_sec_actualidad" value="<?php echo esc_attr(get_option('gitts_sec_actualidad', '')); ?>" class="large-text" placeholder="Actualidad"></td></tr>
                <tr><th colspan="2" style="padding-bottom:0"><strong>— Quiénes Somos —</strong></th></tr>
                <tr><th>Valores Fundamentales</th><td><input type="text" name="gitts_sec_valores_fund" value="<?php echo esc_attr(get_option('gitts_sec_valores_fund', '')); ?>" class="large-text" placeholder="Valores Fundamentales"></td></tr>
                <tr><th>Objetivos</th><td><input type="text" name="gitts_sec_objetivos" value="<?php echo esc_attr(get_option('gitts_sec_objetivos', '')); ?>" class="large-text" placeholder="Objetivos"></td></tr>
                <tr><th colspan="2" style="padding-bottom:0"><strong>— Investigación —</strong></th></tr>
                <tr><th>Áreas de Investigación</th><td><input type="text" name="gitts_sec_areas_inv" value="<?php echo esc_attr(get_option('gitts_sec_areas_inv', '')); ?>" class="large-text" placeholder="Áreas de Investigación"></td></tr>
                <tr><th>Aplicaciones</th><td><input type="text" name="gitts_sec_aplicaciones" value="<?php echo esc_attr(get_option('gitts_sec_aplicaciones', '')); ?>" class="large-text" placeholder="Aplicaciones"></td></tr>
                <tr><th>Proyectos</th><td><input type="text" name="gitts_sec_proyectos" value="<?php echo esc_attr(get_option('gitts_sec_proyectos', '')); ?>" class="large-text" placeholder="Proyectos Financiados"></td></tr>
                <tr><th colspan="2" style="padding-bottom:0"><strong>— Producción Científica —</strong></th></tr>
                <tr><th>Más Recientes</th><td><input type="text" name="gitts_sec_recientes" value="<?php echo esc_attr(get_option('gitts_sec_recientes', '')); ?>" class="large-text" placeholder="Más Recientes"></td></tr>
                <tr><th>Más Citadas</th><td><input type="text" name="gitts_sec_citadas" value="<?php echo esc_attr(get_option('gitts_sec_citadas', '')); ?>" class="large-text" placeholder="Más Citadas"></td></tr>
                <tr><th>Lista Completa</th><td><input type="text" name="gitts_sec_lista_completa" value="<?php echo esc_attr(get_option('gitts_sec_lista_completa', '')); ?>" class="large-text" placeholder="Lista Completa"></td></tr>
                <tr><th>Tesis</th><td><input type="text" name="gitts_sec_tesis" value="<?php echo esc_attr(get_option('gitts_sec_tesis', '')); ?>" class="large-text" placeholder="Tesis"></td></tr>
                <tr><th>Desarrollos</th><td><input type="text" name="gitts_sec_desarrollos" value="<?php echo esc_attr(get_option('gitts_sec_desarrollos', '')); ?>" class="large-text" placeholder="Desarrollos Aplicados"></td></tr>
                <tr><th colspan="2" style="padding-bottom:0"><strong>— Infraestructura —</strong></th></tr>
                <tr><th>Laboratorios</th><td><input type="text" name="gitts_sec_laboratorios" value="<?php echo esc_attr(get_option('gitts_sec_laboratorios', '')); ?>" class="large-text" placeholder="Nuestros Laboratorios"></td></tr>
                <tr><th>Equipamiento</th><td><input type="text" name="gitts_sec_equipamiento" value="<?php echo esc_attr(get_option('gitts_sec_equipamiento', '')); ?>" class="large-text" placeholder="Equipamiento Principal"></td></tr>
                <tr><th>Capacidades</th><td><input type="text" name="gitts_sec_capacidades" value="<?php echo esc_attr(get_option('gitts_sec_capacidades', '')); ?>" class="large-text" placeholder="Capacidades Técnicas"></td></tr>
                <tr><th>Ubicación</th><td><input type="text" name="gitts_sec_ubicacion" value="<?php echo esc_attr(get_option('gitts_sec_ubicacion', '')); ?>" class="large-text" placeholder="Ubicación"></td></tr>
                <tr><th colspan="2" style="padding-bottom:0"><strong>— Equipo —</strong></th></tr>
                <tr><th>Miembros Principales</th><td><input type="text" name="gitts_sec_miembros_principales" value="<?php echo esc_attr(get_option('gitts_sec_miembros_principales', '')); ?>" class="large-text" placeholder="Miembros Principales"></td></tr>
                <tr><th>Colaboradores</th><td><input type="text" name="gitts_sec_colaboradores" value="<?php echo esc_attr(get_option('gitts_sec_colaboradores', '')); ?>" class="large-text" placeholder="Colaboradores"></td></tr>
                <tr><th>Colaboradores Externos</th><td><input type="text" name="gitts_sec_colaboradores_ext" value="<?php echo esc_attr(get_option('gitts_sec_colaboradores_ext', '')); ?>" class="large-text" placeholder="Colaboradores Externos"></td></tr>
                <tr><th>Estudiantes Activos</th><td><input type="text" name="gitts_sec_estudiantes_activos" value="<?php echo esc_attr(get_option('gitts_sec_estudiantes_activos', '')); ?>" class="large-text" placeholder="Estudiantes Activos"></td></tr>
                <tr><th>Estudiantes Egresados</th><td><input type="text" name="gitts_sec_estudiantes_egresados" value="<?php echo esc_attr(get_option('gitts_sec_estudiantes_egresados', '')); ?>" class="large-text" placeholder="Estudiantes Egresados"></td></tr>
                <tr><th colspan="2" style="padding-bottom:0"><strong>— Únete —</strong></th></tr>
                <tr><th>Cómo Colaborar</th><td><input type="text" name="gitts_sec_como_colaborar" value="<?php echo esc_attr(get_option('gitts_sec_como_colaborar', '')); ?>" class="large-text" placeholder="Cómo Colaborar"></td></tr>
                <tr><th>Servicios</th><td><input type="text" name="gitts_sec_servicios" value="<?php echo esc_attr(get_option('gitts_sec_servicios', '')); ?>" class="large-text" placeholder="Servicios Institucionales"></td></tr>
                <tr><th colspan="2" style="padding-bottom:0"><strong>— Noticias —</strong></th></tr>
                <tr><th>Subtítulo Noticias</th><td><input type="text" name="gitts_intro_noticias" value="<?php echo esc_attr(get_option('gitts_intro_noticias', '')); ?>" class="large-text" placeholder="Conferencias, premios, defensas de tesis, workshops y eventos del grupo."></td></tr>
            </table>
            <h2>Identidad</h2>
            <table class="form-table">
                <tr><th>Institución</th><td><input type="text" name="gitts_institucion" value="<?php echo esc_attr(get_option('gitts_institucion', '')); ?>" class="large-text" placeholder="Universidad Tecnológica de Panamá"></td></tr>
            </table>
            <h2>Colores del Tema</h2>
            <p class="description">Personaliza los colores principales del sitio. Deja vacío para usar los colores por defecto.</p>
            <table class="form-table">
                <tr><th>Color Primario (navy)</th><td><input type="color" name="gitts_color_primary" value="<?php echo esc_attr(get_option('gitts_color_primary', '#165288')); ?>"> <code><?php echo esc_html(get_option('gitts_color_primary', '#165288')); ?></code></td></tr>
                <tr><th>Color Secundario (green)</th><td><input type="color" name="gitts_color_secondary" value="<?php echo esc_attr(get_option('gitts_color_secondary', '#52975D')); ?>"> <code><?php echo esc_html(get_option('gitts_color_secondary', '#52975D')); ?></code></td></tr>
                <tr><th>Color Acento (hibiscus)</th><td><input type="color" name="gitts_color_accent" value="<?php echo esc_attr(get_option('gitts_color_accent', '#E83C56')); ?>"> <code><?php echo esc_html(get_option('gitts_color_accent', '#E83C56')); ?></code></td></tr>
            </table>
            <h2>Footer</h2>
            <table class="form-table">
                <tr><th>Descripción del grupo</th><td><textarea name="gitts_descripcion_grupo" class="large-text" rows="3"><?php echo esc_textarea(get_option('gitts_descripcion_grupo', '')); ?></textarea></td></tr>
            </table>
            <h2>Contacto (Footer + Únete)</h2>
            <table class="form-table">
                <tr><th>Teléfono</th><td><input type="text" name="gitts_telefono" value="<?php echo esc_attr(get_option('gitts_telefono', '')); ?>" class="regular-text"></td></tr>
                <tr><th>Email</th><td><input type="text" name="gitts_email_contacto" value="<?php echo esc_attr(get_option('gitts_email_contacto', '')); ?>" class="regular-text"></td></tr>
                <tr><th>Dirección</th><td><textarea name="gitts_direccion" class="large-text" rows="2"><?php echo esc_textarea(get_option('gitts_direccion', '')); ?></textarea></td></tr>
                <tr><th>Campus</th><td><input type="text" name="gitts_campus" value="<?php echo esc_attr(get_option('gitts_campus', '')); ?>" class="regular-text"></td></tr>
            </table>
            <?php submit_button('Guardar Configuración'); ?>
        </form>
    </div>
    <?php
}

// ── Defaults al activar el tema ──
function gitts_theme_defaults() {
    $defaults = [
        'gitts_hero_titulo' => 'Grupo de Investigación en Tecnologías Avanzadas de <span class="font-semibold">Telecomunicación</span> y <span class="font-semibold">Procesamiento de Señales</span>',
        'gitts_hero_subtitulo' => 'Investigación de frontera que conecta señales y datos con soluciones de impacto.',
        'gitts_mision' => 'Generar, validar y transferir conocimiento mediante investigación científica y desarrollo tecnológico en telecomunicaciones, procesamiento de señales y áreas afines (sensado electromagnético, instrumentación, electrónica, radiofrecuencia y óptica). Con un enfoque científico riguroso y prototipos experimentales, GITTS transforma señales y datos en soluciones confiables, eficientes y seguras, formando talento e impulsando la innovación para atender retos relevantes en la industria, el sector público y la sociedad de manera sostenible.',
        'gitts_vision' => 'Ser un grupo de investigación de referencia en Panamá y la región, reconocido por la solidez de su trabajo científico-tecnológico y la pertinencia de sus líneas de investigación, así como por la calidad de su formación y su capacidad para liderar proyectos aplicados. GITTS aspira a consolidarse como un espacio de innovación y colaboración internacional, con impacto sostenido en el desarrollo científico, productivo y social (mejoras en telecomunicaciones, salud, energía, medio ambiente, etc.), actuando como puente entre la academia y la industria.',
        'gitts_intro_valores' => 'Reconocemos que la capacidad para sobresalir en investigación, desarrollo tecnológico y academia depende de:',
        'gitts_importancia_titulo' => 'Importancia de la Investigación',
        'gitts_importancia_texto' => 'La investigación en telecomunicaciones y procesamiento de señales es fundamental para la vida moderna. Sus aplicaciones abarcan proyectos industriales, ambientales y sociales, desarrollo profesional, certificación de productos, soluciones comerciales y adopción de estándares. En GITTS, transformamos señales y datos en soluciones de impacto para Panamá y la región.',
        'gitts_descripcion_grupo' => 'Grupo de Investigación en Tecnologías Avanzadas de Telecomunicación y Procesamiento de Señales.',
        'gitts_intro_quienes' => 'En GITTS somos un equipo de investigadores dedicados a la ingeniería de las telecomunicaciones y el procesamiento de señales.',
        'gitts_intro_invest_header' => 'En GITTS desarrollamos investigación científica y tecnológica en telecomunicaciones, procesamiento de señales e inteligencia artificial aplicada a sistemas de comunicación y sensado.',
        'gitts_intro_prod_header' => 'Artículos en revistas y congresos internacionales, tesis desarrolladas por estudiantes de distintos niveles y resultados de innovación tecnológica.',
        'gitts_telefono' => '(+507) 560-3061',
        'gitts_email_contacto' => 'gitts@utp.ac.pa',
        'gitts_direccion' => 'Edificio de Investigación e Innovación (ELII), Piso 2',
        'gitts_campus' => 'Campus Víctor Levi Sasso, Universidad Tecnológica de Panamá, Ciudad de Panamá',
        'gitts_institucion' => 'Universidad Tecnológica de Panamá',
        'gitts_color_primary' => '#165288',
        'gitts_color_secondary' => '#52975D',
        'gitts_color_accent' => '#E83C56',
        'gitts_intro_noticias' => 'Conferencias, premios, defensas de tesis, workshops y eventos del grupo.',
        'gitts_sec_valores' => 'Nuestros Valores',
        'gitts_sec_especializacion' => 'Áreas de Especialización',
        'gitts_sec_actualidad' => 'Actualidad',
        'gitts_sec_valores_fund' => 'Valores Fundamentales',
        'gitts_sec_objetivos' => 'Objetivos',
        'gitts_sec_areas_inv' => 'Áreas de Investigación',
        'gitts_sec_aplicaciones' => 'Aplicaciones',
        'gitts_sec_proyectos' => 'Proyectos Financiados',
        'gitts_sec_recientes' => 'Más Recientes',
        'gitts_sec_citadas' => 'Más Citadas',
        'gitts_sec_lista_completa' => 'Lista Completa',
        'gitts_sec_tesis' => 'Tesis',
        'gitts_sec_desarrollos' => 'Desarrollos Aplicados',
        'gitts_sec_laboratorios' => 'Nuestros Laboratorios',
        'gitts_sec_equipamiento' => 'Equipamiento Principal',
        'gitts_sec_capacidades' => 'Capacidades Técnicas',
        'gitts_sec_ubicacion' => 'Ubicación',
        'gitts_sec_miembros_principales' => 'Miembros Principales',
        'gitts_sec_colaboradores' => 'Colaboradores',
        'gitts_sec_colaboradores_ext' => 'Colaboradores Externos',
        'gitts_sec_estudiantes_activos' => 'Estudiantes Activos',
        'gitts_sec_estudiantes_egresados' => 'Estudiantes Egresados',
        'gitts_sec_como_colaborar' => 'Cómo Colaborar',
        'gitts_sec_servicios' => 'Servicios Institucionales',
    ];
    foreach ($defaults as $key => $value) {
        if (get_option($key) === false) {
            update_option($key, $value);
        }
    }
}
add_action('after_switch_theme', 'gitts_theme_defaults');

// ── Colores dinámicos: inyectar CSS variables desde opciones ──
function gitts_dynamic_colors() {
    $primary   = get_option('gitts_color_primary', '#165288');
    $secondary = get_option('gitts_color_secondary', '#52975D');
    $accent    = get_option('gitts_color_accent', '#E83C56');

    // Derivar colores oscuros (mezcla con negro al 30%)
    $primary_dark = gitts_darken_hex($primary, 0.3);
    $secondary_dark = gitts_darken_hex($secondary, 0.3);
    $accent_dark = gitts_darken_hex($accent, 0.3);
    ?>
    <style>
    :root {
        --gitts-primary: <?php echo $primary; ?>;
        --gitts-primary-dark: <?php echo $primary_dark; ?>;
        --gitts-secondary: <?php echo $secondary; ?>;
        --gitts-accent: <?php echo $accent; ?>;
    }
    .navbar { background-color: var(--gitts-primary) !important; }
    .page-header { background: linear-gradient(135deg, <?php echo $primary_dark; ?> 0%, <?php echo $primary; ?> 60%, #495C9B 100%); }
    .footer-gradient { background: linear-gradient(135deg, <?php echo $primary_dark; ?> 0%, <?php echo $primary; ?> 100%); }
    footer.footer-center { background-color: <?php echo $primary_dark; ?> !important; }
    </style>
    <?php
}
add_action('wp_head', 'gitts_dynamic_colors', 99);

// Helper: oscurecer un color hex
function gitts_darken_hex($hex, $factor) {
    $hex = ltrim($hex, '#');
    $r = max(0, floor(hexdec(substr($hex, 0, 2)) * (1 - $factor)));
    $g = max(0, floor(hexdec(substr($hex, 2, 2)) * (1 - $factor)));
    $b = max(0, floor(hexdec(substr($hex, 4, 2)) * (1 - $factor)));
    return sprintf('#%02x%02x%02x', $r, $g, $b);
}
