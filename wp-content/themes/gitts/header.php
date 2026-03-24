<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="gitts">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/brand/favicon.png" type="image/png">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/brand/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    html,body{background:#fff;color:#1E293B;}
    [data-theme="gitts"]{--b1:1.0 0.0 0;--b2:0.976 0.005 250;--b3:0.916 0.014 250;--bc:0.208 0.030 250;--p:0.389 0.106 243.35;--pf:0.299 0.082 241.5;--pc:0.965 0.005 90;--s:0.433 0.09 152;--sf:0.373 0.08 152;--sc:0.965 0.005 90;--a:0.500 0.160 15;--af:0.440 0.150 15;--ac:1.0 0.0 0;--n:0.554 0.022 250;--nf:0.446 0.022 250;--nc:0.965 0.005 90;}
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class('font-sans bg-base-100 text-base-content antialiased'); ?>>
<?php wp_body_open(); ?>

<!-- NAVBAR -->
<div class="navbar backdrop-blur-lg border-b border-white/10 sticky top-0 z-50 px-4 lg:px-8">
    <!-- Logo -->
    <div class="navbar-start">
        <a href="<?php echo home_url(); ?>" class="flex items-center gap-3 group">
            <img src="<?php echo esc_url(gitts_get_logo_url()); ?>" alt="<?php bloginfo('name'); ?>" class="h-10 w-auto transition-transform group-hover:scale-105">
            <span class="text-white font-semibold text-lg hidden sm:block tracking-tight"><?php bloginfo('name'); ?></span>
        </a>
    </div>

    <!-- Desktop nav -->
    <div class="navbar-center hidden lg:flex">
        <?php wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'menu menu-horizontal px-1 gap-1',
            'link_before'    => '<span class="text-sm font-medium text-slate-300 hover:text-white">',
            'link_after'     => '</span>',
            'fallback_cb'    => false,
        ]); ?>
    </div>

    <!-- CTA + Mobile -->
    <div class="navbar-end gap-2">
        <!-- Mobile dropdown -->
        <div class="dropdown dropdown-end lg:hidden">
            <div tabindex="0" role="button" class="btn btn-ghost btn-square">
                <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </div>
            <?php wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'menu menu-sm dropdown-content bg-white rounded-xl z-[1] mt-3 w-56 p-3 shadow-lg border border-slate-200',
                'link_before'    => '<span class="font-medium text-slate-600">',
                'link_after'     => '</span>',
                'fallback_cb'    => false,
            ]); ?>
        </div>
    </div>
</div>
