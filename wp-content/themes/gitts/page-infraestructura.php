<?php /* Template Name: Infraestructura */ get_header(); ?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6">
        <h1 class="text-white font-light text-4xl">Infraestructura</h1>
        <p class="text-slate-300 mt-3 text-lg font-light max-w-3xl"><?php echo esc_html(get_option('gitts_intro_infraestructura', 'Conoce las instalaciones y capacidades que sustentan nuestra investigación y desarrollo tecnológico.')); ?></p>
    </div>
</div>

<!-- Laboratorios -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-10 text-center"><?php echo esc_html(get_option('gitts_sec_laboratorios', 'Nuestros Laboratorios')); ?></h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <?php
            $labs_q = new WP_Query(['post_type' => 'laboratorio', 'posts_per_page' => -1, 'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC']);
            if ($labs_q->have_posts()) :
                while ($labs_q->have_posts()) : $labs_q->the_post();
                    $desc = get_post_meta(get_the_ID(), 'lab_descripcion', true);
                    $equip_raw = get_post_meta(get_the_ID(), 'lab_equipamiento', true);
                    $equip = array_filter(array_map('trim', explode("\n", $equip_raw)));
            ?>
            <div class="card bg-white border border-slate-200 hover:shadow-md transition-all">
                <div class="card-body p-8">
                    <div class="w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center text-primary mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714a2.25 2.25 0 0 0 .659 1.591L19 14.5M14.25 3.104c.251.023.501.05.75.082M19 14.5l-2.47 4.447A2.25 2.25 0 0 1 14.554 20.5H9.446a2.25 2.25 0 0 1-1.976-1.053L5 14.5m14 0H5"/></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800 mb-2"><?php the_title(); ?></h3>
                    <p class="text-sm text-slate-500 leading-relaxed mb-4"><?php echo esc_html($desc); ?></p>
                    <?php if (!empty($equip)) : ?>
                    <ul class="space-y-2">
                        <?php foreach ($equip as $item) : ?>
                        <li class="flex items-center gap-2 text-sm text-slate-600">
                            <svg class="w-4 h-4 text-primary flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                            <?php echo esc_html($item); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- Equipamiento -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-10 text-center"><?php echo esc_html(get_option('gitts_sec_equipamiento', 'Equipamiento Principal')); ?></h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $equip_q = new WP_Query(['post_type' => 'equipo_lab', 'posts_per_page' => -1, 'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC']);
            if ($equip_q->have_posts()) :
                while ($equip_q->have_posts()) : $equip_q->the_post();
                    $descripcion = get_post_meta(get_the_ID(), 'descripcion', true);
            ?>
            <div class="flex gap-4 items-start p-5 bg-white rounded-xl border border-slate-200 hover:border-primary/30 transition-colors">
                <div class="w-11 h-11 rounded-lg bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.049.58.025 1.193-.14 1.743"/></svg>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-slate-800 mb-1"><?php the_title(); ?></h4>
                    <p class="text-xs text-slate-500 leading-relaxed"><?php echo esc_html($descripcion); ?></p>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- Capacidades Técnicas -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-10 text-center"><?php echo esc_html(get_option('gitts_sec_capacidades', 'Capacidades Técnicas')); ?></h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $caps_q = new WP_Query(['post_type' => 'capacidad', 'posts_per_page' => -1, 'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC']);
            if ($caps_q->have_posts()) :
                while ($caps_q->have_posts()) : $caps_q->the_post();
                    $descripcion = get_post_meta(get_the_ID(), 'descripcion', true);
            ?>
            <div class="text-center p-8 rounded-xl bg-slate-50 border border-slate-200 hover:border-primary/30 transition-colors">
                <div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center text-primary mx-auto mb-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Z"/></svg>
                </div>
                <h4 class="text-base font-semibold text-slate-800 mb-2"><?php the_title(); ?></h4>
                <p class="text-sm text-slate-500 leading-relaxed"><?php echo esc_html($descripcion); ?></p>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- Ubicación -->
<section class="py-16 page-header">
    <div class="max-w-3xl mx-auto px-6 text-center">
        <h2 class="text-white font-semibold text-2xl mb-4"><?php echo esc_html(get_option('gitts_sec_ubicacion', 'Ubicación')); ?></h2>
        <p class="text-slate-200 text-base leading-relaxed"><?php echo esc_html(get_option('gitts_direccion', '')); ?>, <?php echo esc_html(get_option('gitts_campus', '')); ?></p>
        <a href="<?php echo home_url('/unete'); ?>" class="btn btn-lg font-medium text-base bg-white text-primary border-none hover:bg-slate-100 mt-8">Únete al equipo</a>
    </div>
</section>

<?php get_footer(); ?>
