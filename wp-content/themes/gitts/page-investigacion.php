<?php /* Template Name: Investigación */ get_header(); ?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6" data-aos="fade-right">
        <h1 class="text-white font-light text-4xl">Investigación</h1>
        <p class="text-slate-300 mt-3 text-lg font-light">En GITTS desarrollamos investigación científica y tecnológica en telecomunicaciones, procesamiento de señales e inteligencia artificial aplicada a sistemas de comunicación y sensado.</p>
    </div>
</div>

<!-- Introducción -->
<section class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-6 text-center" data-aos="fade-up">
        <p class="text-slate-600 text-base leading-relaxed"><?php echo esc_html(get_option('gitts_intro_investigacion', '')); ?></p>
    </div>
</section>

<!-- Áreas de investigación -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-10 text-center" data-aos="fade-up">Áreas de Investigación</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $lineas_q = new WP_Query(['post_type' => 'linea_inv', 'posts_per_page' => -1, 'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC']);
            $idx = 0;
            if ($lineas_q->have_posts()) :
                while ($lineas_q->have_posts()) : $lineas_q->the_post();
                    $descripcion = get_post_meta(get_the_ID(), 'descripcion', true);
            ?>
            <div class="card bg-white border border-slate-200 hover:border-primary/30 hover:shadow-md transition-all" data-aos="fade-up" data-aos-delay="<?php echo $idx * 60; ?>">
                <div class="card-body p-7">
                    <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-3">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                    </div>
                    <h3 class="text-base font-semibold text-slate-800 mb-1"><?php the_title(); ?></h3>
                    <p class="text-sm text-slate-500 leading-relaxed"><?php echo esc_html($descripcion); ?></p>
                </div>
            </div>
            <?php $idx++; endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- Aplicaciones -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-10 text-center" data-aos="fade-up">Aplicaciones</h2>
        <div class="flex flex-wrap justify-center gap-3" data-aos="fade-up" data-aos-delay="100">
            <?php
            $apps_q = new WP_Query(['post_type' => 'aplicacion', 'posts_per_page' => -1, 'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC']);
            if ($apps_q->have_posts()) :
                while ($apps_q->have_posts()) : $apps_q->the_post();
            ?>
            <span class="badge badge-lg badge-outline badge-primary py-3.5 px-5 text-sm font-normal"><?php the_title(); ?></span>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- Filtros de proyectos -->
<section class="py-10 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-8 text-center" data-aos="fade-up">Proyectos Financiados</h2>
        <div class="flex flex-wrap justify-center gap-3 mb-10" data-aos="fade-up">
            <button class="btn btn-sm bg-primary text-white border-none project-filter filter-active" data-filter="all">Todos</button>
            <button class="btn btn-sm btn-outline border-slate-300 text-slate-600 hover:bg-primary hover:text-white hover:border-primary project-filter" data-filter="ejecucion">En ejecución</button>
            <button class="btn btn-sm btn-outline border-slate-300 text-slate-600 hover:bg-primary hover:text-white hover:border-primary project-filter" data-filter="finalizado">Finalizado</button>
            <span class="w-px h-8 bg-slate-300 mx-2"></span>
            <button class="btn btn-sm btn-outline border-slate-300 text-slate-600 hover:bg-primary hover:text-white hover:border-primary project-filter" data-filter="id">I+D</button>
            <button class="btn btn-sm btn-outline border-slate-300 text-slate-600 hover:bg-primary hover:text-white hover:border-primary project-filter" data-filter="capacidades">Generación de capacidades</button>
            <button class="btn btn-sm btn-outline border-slate-300 text-slate-600 hover:bg-primary hover:text-white hover:border-primary project-filter" data-filter="colaboracion">Colaboración</button>
        </div>
    </div>
</section>

<!-- Grid de proyectos -->
<section class="py-10 pb-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="projects-grid">
            <?php
            $proyectos_q = new WP_Query(['post_type' => 'proyecto', 'posts_per_page' => -1, 'orderby' => 'date', 'order' => 'DESC']);
            if ($proyectos_q->have_posts()) :
                $idx = 0;
                while ($proyectos_q->have_posts()) : $proyectos_q->the_post();
                    $estado = get_post_meta(get_the_ID(), 'estado_proyecto', true) ?: 'En progreso';
                    $es_activo = ($estado !== 'Concluido' && $estado !== 'Finalizado');
                    $estado_filter = $es_activo ? 'ejecucion' : 'finalizado';
            ?>
            <a href="<?php the_permalink(); ?>" class="card bg-white border border-slate-200 hover:shadow-md transition-all project-card group" data-estado="<?php echo $estado_filter; ?>" data-tipo="id" data-aos="fade-up" data-aos-delay="<?php echo ($idx % 3) * 60; ?>">
                <?php if (has_post_thumbnail()) : ?>
                <figure><?php the_post_thumbnail('medium_large', ['class' => 'w-full h-44 object-cover group-hover:scale-105 transition-transform duration-300']); ?></figure>
                <?php else : ?>
                <figure><div class="w-full h-44 bg-gradient-to-br from-primary to-slate-800"></div></figure>
                <?php endif; ?>
                <div class="card-body p-6">
                    <div class="flex flex-wrap gap-2">
                        <span class="badge badge-sm font-medium text-white py-3 px-4" style="background-color:<?php echo $es_activo ? '#52975D' : '#495C9B'; ?>;border-color:<?php echo $es_activo ? '#52975D' : '#495C9B'; ?>"><?php echo $es_activo ? 'En ejecución' : 'Finalizado'; ?></span>
                    </div>
                    <h3 class="card-title text-sm text-slate-800 mt-2"><?php the_title(); ?></h3>
                </div>
            </a>
            <?php $idx++; endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
