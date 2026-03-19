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
    // Google Fonts — Inter
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', [], null);
    // Tailwind + DaisyUI via CDN
    wp_enqueue_style('daisyui', 'https://cdn.jsdelivr.net/npm/daisyui@4/dist/full.min.css', [], '4.0');
    wp_enqueue_script('tailwind', 'https://cdn.tailwindcss.com', [], null, false);
    // Animate on Scroll
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', [], null);
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', [], null, true);
    // Theme
    wp_enqueue_style('gitts-style', get_stylesheet_uri(), [], '4.0');
    wp_enqueue_script('gitts-main', get_template_directory_uri() . '/js/main.js', ['aos-js'], '4.0', true);
}
add_action('wp_enqueue_scripts', 'gitts_scripts');

// Tailwind config + DaisyUI custom theme
function gitts_tailwind_config() { ?>
<script>
tailwind.config = {
    theme: {
        extend: {
            colors: {
                'baleine': '#165288',
                'baleine-dark': '#0e3a5f',
                'hibiscus': '#DE3848',
                'mgreen': '#3C824E',
                'slate': {
                    50: '#F8FAFC', 100: '#F1F5F9', 200: '#E2E8F0',
                    300: '#CBD5E1', 400: '#94A3B8', 500: '#64748B',
                    600: '#475569', 700: '#334155', 800: '#1E293B', 900: '#0F172A',
                },
            },
            fontFamily: {
                'sans': ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
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
    --s: 0.512 0.112 152.8;      /* #3C824E green */
    --sf: 0.432 0.098 151.5;     /* #2D6A3D green dark */
    --sc: 0.965 0.005 90;        /* #F8F8F4 */
    --a: 0.546 0.191 22.5;       /* #DE3848 hibiscus */
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
}
add_action('init', 'gitts_register_cpts');

// ── Taxonomías ──
function gitts_register_taxonomies() {
    register_taxonomy('tipo_miembro', 'miembro', [
        'labels' => ['name' => 'Tipo de Miembro', 'singular_name' => 'Tipo'],
        'hierarchical' => true, 'show_in_rest' => true,
    ]);
}
add_action('init', 'gitts_register_taxonomies');

// ── Meta boxes (simulando ACF) ──
function gitts_meta_boxes() {
    add_meta_box('proyecto_fields', 'Campos del Proyecto', 'gitts_proyecto_fields_cb', 'proyecto', 'normal', 'high');
    add_meta_box('miembro_fields', 'Campos del Miembro', 'gitts_miembro_fields_cb', 'miembro', 'normal', 'high');
}
add_action('add_meta_boxes', 'gitts_meta_boxes');

function gitts_proyecto_fields_cb($post) {
    wp_nonce_field('gitts_save', 'gitts_nonce');
    $fields = [
        'fecha_inicio' => 'Fecha de Inicio',
        'fecha_fin' => 'Fecha de Fin (vacío si en curso)',
        'estado_proyecto' => 'Estado (En progreso / Concluido / Pausado)',
        'investigadores_asignados' => 'Investigadores Asignados',
        'entidades_financiadoras' => 'Entidades Financiadoras',
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
    ];
    foreach ($fields as $k => $label) {
        $v = get_post_meta($post->ID, $k, true);
        echo "<p><strong>{$label}:</strong><br><input type='text' name='{$k}' value='" . esc_attr($v) . "' class='widefat'></p>";
    }
}

function gitts_save_fields($post_id) {
    if (!isset($_POST['gitts_nonce']) || !wp_verify_nonce($_POST['gitts_nonce'], 'gitts_save')) return;
    $all = ['fecha_inicio','fecha_fin','estado_proyecto','investigadores_asignados','entidades_financiadoras','cargo_oficial','email_institucional','link_linkedin','link_orcid','link_researchgate'];
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
        background: linear-gradient(135deg, #0F172A 0%, #165288 60%, #1a6bb5 100%);
        font-family: 'Inter', system-ui, sans-serif;
    }
    #login {
        padding-top: 6%;
    }
    .login h1 a {
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/logo-digital.png');
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
    .notice-success { border-left-color: #3C824E; }
    .notice-info { border-left-color: #165288; }
    .notice-error { border-left-color: #DE3848; }

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
                <div style="font-size:28px;font-weight:600;color:#3C824E;"><?php echo $proyectos->publish; ?></div>
                <div style="font-size:12px;color:#64748B;margin-top:4px;">Proyectos</div>
            </div>
            <div style="background:#FFF5F5;border-radius:8px;padding:16px;text-align:center;">
                <div style="font-size:28px;font-weight:600;color:#DE3848;"><?php echo $posts->publish; ?></div>
                <div style="font-size:12px;color:#64748B;margin-top:4px;">Noticias</div>
            </div>
        </div>
        <div style="display:flex;gap:8px;flex-wrap:wrap;">
            <a href="<?php echo admin_url('post-new.php?post_type=miembro'); ?>" style="display:inline-flex;align-items:center;gap:6px;background:#165288;color:#fff;padding:8px 16px;border-radius:6px;text-decoration:none;font-size:13px;font-weight:500;">+ Nuevo Miembro</a>
            <a href="<?php echo admin_url('post-new.php?post_type=proyecto'); ?>" style="display:inline-flex;align-items:center;gap:6px;background:#3C824E;color:#fff;padding:8px 16px;border-radius:6px;text-decoration:none;font-size:13px;font-weight:500;">+ Nuevo Proyecto</a>
            <a href="<?php echo admin_url('post-new.php'); ?>" style="display:inline-flex;align-items:center;gap:6px;background:#DE3848;color:#fff;padding:8px 16px;border-radius:6px;text-decoration:none;font-size:13px;font-weight:500;">+ Nueva Noticia</a>
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
