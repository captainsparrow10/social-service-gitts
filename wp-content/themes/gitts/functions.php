<?php
/**
 * GITTS Theme — functions.php
 * Siguiendo SRS + Ficha Técnica exactamente
 */

function gitts_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form','comment-form','gallery','caption']);
    register_nav_menus(['primary' => 'Menú Principal']);
}
add_action('after_setup_theme', 'gitts_setup');

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
function gitts_tailwind_config() { ?>
<script>
tailwind.config = {
    theme: {
        extend: {
            colors: {
                'baleine': '#165288',
                'baleine-dark': '#0e3a5f',
                'hibiscus': '#E83C56',
                'mgreen': '#52975D',
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
    $fields = [
        'fecha_inicio' => 'Fecha de Inicio',
        'fecha_fin' => 'Fecha de Fin (vacío si en curso)',
        'estado_proyecto' => 'Estado (En progreso / Concluido / Pausado)',
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
        'pub_destacada' => 'Destacada (si/no)',
        'pub_citaciones' => 'Número de citaciones',
    ];
    foreach ($fields as $k => $label) {
        $v = get_post_meta($post->ID, $k, true);
        echo "<p><strong>{$label}:</strong><br><input type='text' name='{$k}' value='" . esc_attr($v) . "' class='widefat'></p>";
    }
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
    $all = [
        // proyecto
        'fecha_inicio','fecha_fin','estado_proyecto','investigador_principal','co_investigadores',
        'investigadores_asignados','organismo_financiador','organismo_ejecutor','codigo_proyecto',
        'entidades_financiadoras','duracion','monto_total','contacto_email','galeria_imagenes',
        // miembro
        'cargo_oficial','email_institucional','link_linkedin','link_orcid','link_researchgate',
        'link_apersei','link_scholar','bio_extendida','orden',
        // publicacion
        'pub_autores','pub_revista','pub_anio','pub_doi','pub_director','pub_nivel',
        'pub_estado','pub_destacada','pub_citaciones',
        // simple fields (shared)
        'descripcion',
        // laboratorio
        'lab_descripcion','lab_equipamiento',
    ];
    foreach ($all as $f) {
        if (isset($_POST[$f])) update_post_meta($post_id, $f, sanitize_text_field($_POST[$f]));
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
        $opts = ['gitts_mision','gitts_vision','gitts_telefono','gitts_email_contacto','gitts_direccion','gitts_campus','gitts_hero_titulo','gitts_hero_subtitulo','gitts_intro_quienes','gitts_intro_unete','gitts_intro_miembros','gitts_intro_produccion','gitts_intro_infraestructura','gitts_intro_investigacion'];
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
