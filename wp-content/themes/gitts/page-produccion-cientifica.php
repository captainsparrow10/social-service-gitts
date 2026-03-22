<?php /* Template Name: Producción Científica */ get_header(); ?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6" data-aos="fade-right">
        <h1 class="text-white font-light text-4xl">Producción Científica</h1>
        <p class="text-slate-300 mt-3 text-lg font-light max-w-3xl">Artículos en revistas y congresos internacionales, tesis desarrolladas por estudiantes de distintos niveles y resultados de innovación tecnológica.</p>
    </div>
</div>

<!-- Introducción -->
<section class="py-14 bg-white">
    <div class="max-w-3xl mx-auto px-6 text-center" data-aos="fade-up">
        <?php
        $intro = wp_kses_post(get_option('gitts_intro_produccion', ''));
        if ($intro) :
            echo '<p class="text-slate-600 text-base leading-relaxed">' . $intro . '</p>';
        else :
        ?>
            <p class="text-slate-600 text-base leading-relaxed">La investigación desarrollada en GITTS se traduce en generación de conocimiento, formación de nuevos investigadores y desarrollo de tecnologías con impacto. En esta sección se reúnen y organizan los principales resultados generados por el grupo y su comunidad académica.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Filtros -->
<section class="py-6 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-wrap justify-center gap-3" data-aos="fade-up">
            <button class="btn btn-sm bg-primary text-white border-none prod-filter filter-active" data-section="all">Todas</button>
            <button class="btn btn-sm btn-outline border-slate-300 text-slate-600 hover:bg-primary hover:text-white hover:border-primary prod-filter" data-section="publicaciones">Publicaciones</button>
            <button class="btn btn-sm btn-outline border-slate-300 text-slate-600 hover:bg-primary hover:text-white hover:border-primary prod-filter" data-section="tesis">Tesis</button>
            <button class="btn btn-sm btn-outline border-slate-300 text-slate-600 hover:bg-primary hover:text-white hover:border-primary prod-filter" data-section="desarrollos">Desarrollos aplicados</button>
        </div>
    </div>
</section>

<!-- PUBLICACIONES -->
<section class="py-16 bg-slate-50 prod-section" data-section="publicaciones">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Más recientes — Carousel -->
        <div class="flex items-center justify-between mb-8" data-aos="fade-up">
            <h2 class="text-slate-800 font-semibold text-2xl">Más Recientes</h2>
            <div class="flex gap-2">
                <button class="btn btn-sm btn-circle btn-outline border-slate-300 text-slate-500 hover:bg-primary hover:text-white hover:border-primary carousel-prev" data-target="carousel-recientes">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                </button>
                <button class="btn btn-sm btn-circle btn-outline border-slate-300 text-slate-500 hover:bg-primary hover:text-white hover:border-primary carousel-next" data-target="carousel-recientes">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                </button>
            </div>
        </div>
        <div id="carousel-recientes" class="flex gap-6 overflow-x-auto pb-4 snap-x snap-mandatory scrollbar-hide mb-16 scroll-smooth" data-aos="fade-up">
            <?php
            $recientes_q = new WP_Query([
                'post_type' => 'publicacion', 'posts_per_page' => 6,
                'tax_query' => [['taxonomy' => 'tipo_publicacion', 'field' => 'slug', 'terms' => ['articulo', 'libro']]],
                'orderby' => 'meta_value_num', 'meta_key' => 'pub_anio', 'order' => 'DESC',
            ]);
            if ($recientes_q->have_posts()) :
                while ($recientes_q->have_posts()) : $recientes_q->the_post();
                    $autores = get_post_meta(get_the_ID(), 'pub_autores', true);
                    $revista = get_post_meta(get_the_ID(), 'pub_revista', true);
                    $anio = get_post_meta(get_the_ID(), 'pub_anio', true);
                    $doi = get_post_meta(get_the_ID(), 'pub_doi', true);
            ?>
            <a href="<?php echo esc_url($doi); ?>" target="_blank" class="card bg-white border border-slate-200 hover:border-primary/30 hover:shadow-md transition-all min-w-[320px] max-w-[360px] snap-start flex-shrink-0 group">
                <div class="card-body p-6">
                    <span class="badge badge-sm font-medium text-white py-2.5 px-3 mb-2" style="background-color:#495C9B;border-color:#495C9B"><?php echo esc_html($anio); ?></span>
                    <h4 class="text-sm font-semibold text-slate-800 leading-snug group-hover:text-primary transition-colors"><?php echo esc_html(get_the_title()); ?></h4>
                    <p class="text-xs text-slate-500 mt-2"><?php echo esc_html($autores); ?></p>
                    <p class="text-xs text-slate-400 mt-1"><?php echo esc_html($revista); ?></p>
                    <span class="text-primary text-xs font-medium mt-2 group-hover:underline">Ver publicación →</span>
                </div>
            </a>
            <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>

        <!-- Más citadas — Carousel -->
        <div class="flex items-center justify-between mb-8" data-aos="fade-up">
            <h2 class="text-slate-800 font-semibold text-2xl">Más Citadas</h2>
            <div class="flex gap-2">
                <button class="btn btn-sm btn-circle btn-outline border-slate-300 text-slate-500 hover:bg-primary hover:text-white hover:border-primary carousel-prev" data-target="carousel-citadas">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                </button>
                <button class="btn btn-sm btn-circle btn-outline border-slate-300 text-slate-500 hover:bg-primary hover:text-white hover:border-primary carousel-next" data-target="carousel-citadas">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                </button>
            </div>
        </div>
        <div id="carousel-citadas" class="flex gap-6 overflow-x-auto pb-4 snap-x snap-mandatory scrollbar-hide mb-16 scroll-smooth" data-aos="fade-up">
            <?php
            $citadas_q = new WP_Query([
                'post_type' => 'publicacion', 'posts_per_page' => 6,
                'meta_query' => [['key' => 'pub_destacada', 'value' => 'si']],
                'orderby' => 'meta_value_num', 'meta_key' => 'pub_citaciones', 'order' => 'DESC',
            ]);
            if ($citadas_q->have_posts()) :
                while ($citadas_q->have_posts()) : $citadas_q->the_post();
                    $autores = get_post_meta(get_the_ID(), 'pub_autores', true);
                    $revista = get_post_meta(get_the_ID(), 'pub_revista', true);
                    $anio = get_post_meta(get_the_ID(), 'pub_anio', true);
                    $doi = get_post_meta(get_the_ID(), 'pub_doi', true);
            ?>
            <a href="<?php echo esc_url($doi); ?>" target="_blank" class="card bg-white border border-slate-200 hover:border-primary/30 hover:shadow-md transition-all min-w-[320px] max-w-[360px] snap-start flex-shrink-0 group">
                <div class="card-body p-6">
                    <span class="badge badge-sm font-medium text-white py-2.5 px-3 mb-2" style="background-color:#495C9B;border-color:#495C9B"><?php echo esc_html($anio); ?></span>
                    <h4 class="text-sm font-semibold text-slate-800 leading-snug group-hover:text-primary transition-colors"><?php echo esc_html(get_the_title()); ?></h4>
                    <p class="text-xs text-slate-500 mt-2"><?php echo esc_html($autores); ?></p>
                    <p class="text-xs text-slate-400 mt-1"><?php echo esc_html($revista); ?></p>
                    <span class="text-primary text-xs font-medium mt-2 group-hover:underline">Ver publicación →</span>
                </div>
            </a>
            <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>

        <!-- Lista completa -->
        <h2 class="text-slate-800 font-semibold text-2xl mb-8" data-aos="fade-up">Lista Completa</h2>
        <div class="space-y-4" data-aos="fade-up">
            <?php
            $todas_q = new WP_Query([
                'post_type' => 'publicacion', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_publicacion', 'field' => 'slug', 'terms' => ['articulo', 'libro', 'conferencia-nacional']]],
                'orderby' => 'meta_value_num', 'meta_key' => 'pub_anio', 'order' => 'DESC',
            ]);
            if ($todas_q->have_posts()) :
                while ($todas_q->have_posts()) : $todas_q->the_post();
                    $autores = get_post_meta(get_the_ID(), 'pub_autores', true);
                    $revista = get_post_meta(get_the_ID(), 'pub_revista', true);
                    $anio = get_post_meta(get_the_ID(), 'pub_anio', true);
                    $doi = get_post_meta(get_the_ID(), 'pub_doi', true);
            ?>
            <a href="<?php echo esc_url($doi); ?>" target="_blank" class="flex gap-4 items-start p-4 bg-white rounded-lg border border-slate-200 hover:border-primary/30 hover:shadow-sm transition-all group">
                <span class="text-xs font-mono font-semibold mt-0.5 flex-shrink-0 badge badge-sm text-white py-2.5 px-3" style="background-color:#495C9B"><?php echo esc_html($anio); ?></span>
                <div class="flex-1">
                    <h4 class="text-sm font-medium text-slate-800 group-hover:text-primary transition-colors"><?php echo esc_html(get_the_title()); ?></h4>
                    <p class="text-xs text-slate-500 mt-1"><?php echo esc_html($autores); ?> — <span class="text-slate-400"><?php echo esc_html($revista); ?></span></p>
                </div>
                <svg class="w-4 h-4 text-slate-400 group-hover:text-primary flex-shrink-0 mt-1 transition-colors" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
            </a>
            <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<!-- TESIS -->
<section class="py-16 bg-white prod-section" data-section="tesis">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-8" data-aos="fade-up">Tesis</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php
            $tesis_q = new WP_Query([
                'post_type' => 'publicacion', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_publicacion', 'field' => 'slug', 'terms' => 'tesis']],
                'orderby' => 'meta_value_num', 'meta_key' => 'pub_anio', 'order' => 'DESC',
            ]);
            $t_index = 0;
            if ($tesis_q->have_posts()) :
                while ($tesis_q->have_posts()) : $tesis_q->the_post();
                    $autores = get_post_meta(get_the_ID(), 'pub_autores', true);
                    $director = get_post_meta(get_the_ID(), 'pub_director', true);
                    $nivel = get_post_meta(get_the_ID(), 'pub_nivel', true);
                    $anio = get_post_meta(get_the_ID(), 'pub_anio', true);
            ?>
            <div class="card bg-white border border-slate-200 hover:border-primary/30 transition-colors" data-aos="fade-up" data-aos-delay="<?php echo ($t_index % 2) * 60; ?>">
                <div class="card-body p-6">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="badge badge-sm font-medium text-white py-2.5 px-3" style="background-color:#7365AA"><?php echo esc_html($anio); ?></span>
                        <?php if ($nivel) : ?>
                            <span class="badge badge-sm badge-outline border-slate-300 text-slate-500 py-2.5 px-3"><?php echo esc_html($nivel); ?></span>
                        <?php endif; ?>
                    </div>
                    <h4 class="text-sm font-semibold text-slate-800"><?php echo esc_html(get_the_title()); ?></h4>
                    <?php if ($autores) : ?>
                        <p class="text-xs text-slate-500 mt-2"><?php echo esc_html($autores); ?></p>
                    <?php endif; ?>
                    <?php if ($director) : ?>
                        <p class="text-xs text-slate-400"><?php echo esc_html($director); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php
                    $t_index++;
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<!-- DESARROLLOS APLICADOS -->
<section class="py-16 bg-slate-50 prod-section" data-section="desarrollos">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-8" data-aos="fade-up">Desarrollos Aplicados</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $dev_q = new WP_Query([
                'post_type' => 'publicacion', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_publicacion', 'field' => 'slug', 'terms' => 'desarrollo']],
                'orderby' => 'meta_value_num', 'meta_key' => 'pub_anio', 'order' => 'DESC',
            ]);
            $d_index = 0;
            if ($dev_q->have_posts()) :
                while ($dev_q->have_posts()) : $dev_q->the_post();
                    $estado = get_post_meta(get_the_ID(), 'pub_estado', true);
                    $anio = get_post_meta(get_the_ID(), 'pub_anio', true);
            ?>
            <div class="card bg-white border border-slate-200 hover:shadow-md transition-all" data-aos="fade-up" data-aos-delay="<?php echo ($d_index % 3) * 60; ?>">
                <div class="card-body p-7">
                    <div class="flex items-center justify-between mb-3">
                        <?php if ($estado) : ?>
                            <span class="badge badge-sm font-medium text-white py-3 px-4" style="background-color:#52975D"><?php echo esc_html($estado); ?></span>
                        <?php endif; ?>
                        <span class="text-xs font-mono text-slate-400"><?php echo esc_html($anio); ?></span>
                    </div>
                    <h3 class="text-base font-semibold text-slate-800 mb-2"><?php echo esc_html(get_the_title()); ?></h3>
                    <?php if (get_the_content()) : ?>
                        <p class="text-sm text-slate-500 leading-relaxed"><?php echo wp_kses_post(get_the_content()); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php
                    $d_index++;
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
