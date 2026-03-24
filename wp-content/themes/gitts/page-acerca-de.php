<?php /* Template Name: Acerca de */ get_header(); ?>

<!-- Header banner -->
<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6" data-aos="fade-right">
        <h1 class="text-white font-light text-4xl">¿Quiénes Somos?</h1>
        <p class="text-slate-300 mt-3 text-lg font-light"><?php echo esc_html(get_option('gitts_intro_quienes', 'En GITTS somos un equipo de investigadores dedicados a la ingeniería de las telecomunicaciones y el procesamiento de señales.')); ?></p>
    </div>
</div>

<!-- Introducción -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6" data-aos="fade-up">
        <div class="prose prose-lg max-w-none space-y-5 text-slate-600 text-base leading-relaxed">
            <?php the_content(); ?>
        </div>
    </div>
</section>

<!-- Misión y Visión -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Misión -->
            <div class="card bg-white" data-aos="fade-up">
                <div class="card-body p-10">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>
                        </div>
                        <h2 class="text-2xl font-semibold text-slate-800">Misión</h2>
                    </div>
                    <p class="text-slate-600 text-base leading-relaxed"><?php echo wp_kses_post(get_option('gitts_mision', 'Generar, validar y transferir conocimiento mediante investigación científica y desarrollo tecnológico en telecomunicaciones, procesamiento de señales y áreas afines.')); ?></p>
                </div>
            </div>
            <!-- Visión -->
            <div class="card bg-white" data-aos="fade-up" data-aos-delay="100">
                <div class="card-body p-10">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center">
                            <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h2 class="text-2xl font-semibold text-slate-800">Visión</h2>
                    </div>
                    <p class="text-slate-600 text-base leading-relaxed"><?php echo wp_kses_post(get_option('gitts_vision', 'Ser un grupo de investigación de referencia en Panamá y la región.')); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Valores -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-3xl mb-12 text-center" data-aos="fade-up">Valores Fundamentales</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $valores_q = new WP_Query(['post_type' => 'valor', 'posts_per_page' => -1, 'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC']);
            if ($valores_q->have_posts()) :
                $i = 0;
                while ($valores_q->have_posts()) : $valores_q->the_post();
                    $desc = get_post_meta(get_the_ID(), 'descripcion', true);
            ?>
            <div class="card bg-white border border-slate-200 hover:shadow-md transition-shadow" data-aos="fade-up" data-aos-delay="<?php echo $i * 60; ?>">
                <div class="card-body p-8">
                    <div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800 mb-2"><?php the_title(); ?></h3>
                    <p class="text-sm text-slate-500 leading-relaxed"><?php echo esc_html($desc); ?></p>
                </div>
            </div>
            <?php $i++; endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- Objetivos -->
<section class="py-20 bg-slate-50">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-3xl mb-12 text-center" data-aos="fade-up">Objetivos</h2>
        <div class="space-y-6">
            <?php
            $obj_q = new WP_Query(['post_type' => 'objetivo', 'posts_per_page' => -1, 'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC']);
            if ($obj_q->have_posts()) :
                $i = 0;
                while ($obj_q->have_posts()) : $obj_q->the_post();
                    $desc = get_post_meta(get_the_ID(), 'descripcion', true);
            ?>
            <div class="flex gap-5 items-start" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-semibold text-sm flex-shrink-0 mt-0.5"><?php echo $i + 1; ?></div>
                <div>
                    <h3 class="text-base font-semibold text-slate-800 mb-1"><?php the_title(); ?></h3>
                    <?php if ($desc) : ?>
                        <p class="text-slate-600 text-base leading-relaxed"><?php echo esc_html($desc); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php $i++; endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
