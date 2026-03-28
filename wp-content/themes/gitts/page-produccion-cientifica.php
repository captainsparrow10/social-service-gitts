<?php /* Template Name: Producción Científica */ get_header(); ?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6">
        <h1 class="text-white font-light text-4xl">Producción Científica</h1>
        <p class="text-slate-300 mt-3 text-lg font-light max-w-3xl"><?php echo esc_html(get_option('gitts_intro_prod_header', 'Artículos en revistas y congresos internacionales, tesis desarrolladas por estudiantes de distintos niveles y resultados de innovación tecnológica.')); ?></p>
    </div>
</div>

<!-- Filtros -->
<section class="py-6 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-wrap justify-center gap-3">
            <button class="btn btn-sm bg-primary text-white border-none prod-filter filter-active" data-section="all">Todas</button>
            <button class="btn btn-sm btn-outline border-slate-300 text-slate-600 hover:bg-primary hover:text-white hover:border-primary prod-filter" data-section="publicaciones">Publicaciones</button>
            <button class="btn btn-sm btn-outline border-slate-300 text-slate-600 hover:bg-primary hover:text-white hover:border-primary prod-filter" data-section="tesis">Tesis</button>
            <button class="btn btn-sm btn-outline border-slate-300 text-slate-600 hover:bg-primary hover:text-white hover:border-primary prod-filter" data-section="desarrollos">Desarrollos aplicados</button>
        </div>
    </div>
</section>

<!-- ═══════════ PUBLICACIONES ═══════════ -->
<section class="py-16 bg-slate-50 prod-section" data-section="publicaciones">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-3xl mb-12 text-center">Publicaciones</h2>

        <!-- Más recientes (3 cards) -->
        <h3 class="text-slate-800 font-semibold text-2xl mb-8"><?php echo esc_html(get_option('gitts_sec_recientes', 'Más Recientes')); ?></h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
            <?php
            $recientes_q = new WP_Query([
                'post_type' => 'publicacion', 'posts_per_page' => 3,
                'meta_query' => [['key' => 'pub_destacada_reciente', 'value' => 'si']],
                'orderby' => 'meta_value_num', 'meta_key' => 'pub_anio', 'order' => 'DESC',
            ]);
            if ($recientes_q->have_posts()) :
                while ($recientes_q->have_posts()) : $recientes_q->the_post();
                    $autores = get_post_meta(get_the_ID(), 'pub_autores', true);
                    $revista = get_post_meta(get_the_ID(), 'pub_revista', true);
                    $anio = get_post_meta(get_the_ID(), 'pub_anio', true);
                    $doi = get_post_meta(get_the_ID(), 'pub_doi', true);
            ?>
            <a href="<?php echo get_permalink(); ?>" class="card bg-white border border-slate-200 hover:border-primary/30 hover:shadow-md transition-all group">
                <div class="card-body p-6">
                    <span class="badge badge-sm font-medium text-white py-2.5 px-3 mb-2" style="background-color:<?php echo esc_attr(get_option('gitts_color_primary', '#165288')); ?>"><?php echo esc_html($anio); ?></span>
                    <h4 class="text-sm font-semibold text-slate-800 leading-snug group-hover:text-primary transition-colors"><?php echo esc_html(get_the_title()); ?></h4>
                    <p class="text-xs text-slate-500 mt-2"><?php echo esc_html($autores); ?></p>
                    <p class="text-xs text-slate-400 mt-1"><?php echo esc_html($revista); ?></p>
                    <span class="text-primary text-xs font-medium mt-2 group-hover:underline">Ver publicación →</span>
                </div>
            </a>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <!-- Más citadas (3 cards) -->
        <h3 class="text-slate-800 font-semibold text-2xl mb-8"><?php echo esc_html(get_option('gitts_sec_citadas', 'Más Citadas')); ?></h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
            <?php
            $citadas_q = new WP_Query([
                'post_type' => 'publicacion', 'posts_per_page' => 3,
                'meta_query' => [['key' => 'pub_destacada', 'value' => 'si']],
                'orderby' => 'meta_value_num', 'meta_key' => 'pub_citaciones', 'order' => 'DESC',
            ]);
            if ($citadas_q->have_posts()) :
                while ($citadas_q->have_posts()) : $citadas_q->the_post();
                    $autores = get_post_meta(get_the_ID(), 'pub_autores', true);
                    $revista = get_post_meta(get_the_ID(), 'pub_revista', true);
                    $anio = get_post_meta(get_the_ID(), 'pub_anio', true);
                    $doi = get_post_meta(get_the_ID(), 'pub_doi', true);
                    $citas = get_post_meta(get_the_ID(), 'pub_citaciones', true);
            ?>
            <a href="<?php echo get_permalink(); ?>" class="card bg-white border border-slate-200 hover:border-primary/30 hover:shadow-md transition-all group">
                <div class="card-body p-6">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="badge badge-sm font-medium text-white py-2.5 px-3" style="background-color:<?php echo esc_attr(get_option('gitts_color_primary', '#165288')); ?>"><?php echo esc_html($anio); ?></span>
                        <?php if ($citas) : ?>
                        <span class="badge badge-sm badge-outline border-slate-300 text-slate-500 py-2.5 px-3"><?php echo esc_html($citas); ?> citas</span>
                        <?php endif; ?>
                    </div>
                    <h4 class="text-sm font-semibold text-slate-800 leading-snug group-hover:text-primary transition-colors"><?php echo esc_html(get_the_title()); ?></h4>
                    <p class="text-xs text-slate-500 mt-2"><?php echo esc_html($autores); ?></p>
                    <p class="text-xs text-slate-400 mt-1"><?php echo esc_html($revista); ?></p>
                    <span class="text-primary text-xs font-medium mt-2 group-hover:underline">Ver publicación →</span>
                </div>
            </a>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <!-- Lista completa -->
        <h3 class="text-slate-800 font-semibold text-2xl mb-8"><?php echo esc_html(get_option('gitts_sec_lista_completa', 'Lista Completa')); ?></h3>
        <div class="space-y-4">
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
            <a href="<?php echo get_permalink(); ?>" class="flex gap-4 items-start p-4 bg-white rounded-lg border border-slate-200 hover:border-primary/30 hover:shadow-sm transition-all group">
                <span class="text-xs font-mono font-semibold mt-0.5 flex-shrink-0 badge badge-sm text-white py-2.5 px-3" style="background-color:#495C9B"><?php echo esc_html($anio); ?></span>
                <div class="flex-1">
                    <h4 class="text-sm font-medium text-slate-800 group-hover:text-primary transition-colors"><?php echo esc_html(get_the_title()); ?></h4>
                    <p class="text-xs text-slate-500 mt-1"><?php echo esc_html($autores); ?> — <span class="text-slate-400"><?php echo esc_html($revista); ?></span></p>
                </div>
                <svg class="w-4 h-4 text-slate-400 group-hover:text-primary flex-shrink-0 mt-1 transition-colors" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
            </a>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- ═══════════ TESIS ═══════════ -->
<section class="py-16 bg-white prod-section" data-section="tesis">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-3xl mb-12 text-center"><?php echo esc_html(get_option('gitts_sec_tesis', 'Tesis')); ?></h2>

        <!-- Más citadas (3 cards con resumen visible) -->
        <h3 class="text-slate-800 font-semibold text-2xl mb-8">Más Citadas</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
            <?php
            $tesis_dest_q = new WP_Query([
                'post_type' => 'publicacion', 'posts_per_page' => 3,
                'meta_query' => [['key' => 'pub_tesis_destacada', 'value' => 'si']],
                'orderby' => 'meta_value_num', 'meta_key' => 'pub_anio', 'order' => 'DESC',
            ]);
            if ($tesis_dest_q->have_posts()) :
                while ($tesis_dest_q->have_posts()) : $tesis_dest_q->the_post();
                    $autores = get_post_meta(get_the_ID(), 'pub_autores', true);
                    $director = get_post_meta(get_the_ID(), 'pub_director', true);
                    $nivel = get_post_meta(get_the_ID(), 'pub_nivel', true);
                    $anio = get_post_meta(get_the_ID(), 'pub_anio', true);
                    $resumen = get_post_meta(get_the_ID(), 'pub_resumen', true);
            ?>
            <div class="card bg-white border border-slate-200">
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
                    <?php if ($resumen) : ?>
                    <div class="mt-3 pt-3 border-t border-slate-100">
                        <p class="text-xs text-slate-500 leading-relaxed"><strong class="text-slate-600">Abstract:</strong> <?php echo esc_html($resumen); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <!-- Todas las tesis (lista plana expandible) -->
        <h3 class="text-slate-800 font-semibold text-2xl mb-8">Todas las tesis</h3>
        <div class="space-y-4">
            <?php
            $tesis_q = new WP_Query([
                'post_type' => 'publicacion', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_publicacion', 'field' => 'slug', 'terms' => 'tesis']],
                'orderby' => 'meta_value_num', 'meta_key' => 'pub_anio', 'order' => 'DESC',
            ]);
            if ($tesis_q->have_posts()) :
                while ($tesis_q->have_posts()) : $tesis_q->the_post();
                    $autores = get_post_meta(get_the_ID(), 'pub_autores', true);
                    $director = get_post_meta(get_the_ID(), 'pub_director', true);
                    $nivel = get_post_meta(get_the_ID(), 'pub_nivel', true);
                    $anio = get_post_meta(get_the_ID(), 'pub_anio', true);
                    $resumen = get_post_meta(get_the_ID(), 'pub_resumen', true);
            ?>
            <div class="p-4 bg-white rounded-lg border border-slate-200 hover:border-primary/30 hover:shadow-sm transition-all <?php echo $resumen ? 'cursor-pointer tesis-expandible' : ''; ?>">
                <div class="flex gap-4 items-start">
                    <span class="text-xs font-mono font-semibold mt-0.5 flex-shrink-0 badge badge-sm text-white py-2.5 px-3" style="background-color:#7365AA"><?php echo esc_html($anio); ?></span>
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-slate-800"><?php echo esc_html(get_the_title()); ?></h4>
                        <p class="text-xs text-slate-500 mt-1"><?php echo esc_html($autores); ?><?php if ($director) : ?> — <span class="text-slate-400"><?php echo esc_html($director); ?></span><?php endif; ?><?php if ($nivel) : ?> · <span class="text-slate-400"><?php echo esc_html($nivel); ?></span><?php endif; ?></p>
                    </div>
                    <?php if ($resumen) : ?>
                    <svg class="w-4 h-4 text-slate-400 flex-shrink-0 mt-1 tesis-chevron transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
                    <?php endif; ?>
                </div>
                <?php if ($resumen) : ?>
                <div class="tesis-resumen hidden mt-3 pt-3 border-t border-slate-100 ml-[calc(3.5rem+1rem)]">
                    <p class="text-xs text-slate-500 leading-relaxed"><strong class="text-slate-600">Abstract:</strong> <?php echo esc_html($resumen); ?></p>
                </div>
                <?php endif; ?>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- ═══════════ DESARROLLOS APLICADOS ═══════════ -->
<section class="py-16 bg-slate-50 prod-section" data-section="desarrollos">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-8"><?php echo esc_html(get_option('gitts_sec_desarrollos', 'Desarrollos Aplicados')); ?></h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $dev_q = new WP_Query([
                'post_type' => 'publicacion', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_publicacion', 'field' => 'slug', 'terms' => 'desarrollo']],
                'orderby' => 'meta_value_num', 'meta_key' => 'pub_anio', 'order' => 'DESC',
            ]);
            if ($dev_q->have_posts()) :
                while ($dev_q->have_posts()) : $dev_q->the_post();
                    $estado = get_post_meta(get_the_ID(), 'pub_estado', true);
                    $anio = get_post_meta(get_the_ID(), 'pub_anio', true);
                    $doi = get_post_meta(get_the_ID(), 'pub_doi', true);
            ?>
            <div class="card bg-white border border-slate-200 hover:shadow-md transition-all">
                <div class="card-body p-7">
                    <div class="flex items-center justify-between mb-3">
                        <?php if ($estado) : ?>
                        <span class="badge badge-sm font-medium text-white py-3 px-4" style="background-color:<?php echo esc_attr(get_option('gitts_color_secondary', '#52975D')); ?>"><?php echo esc_html($estado); ?></span>
                        <?php endif; ?>
                        <span class="text-xs font-mono text-slate-400"><?php echo esc_html($anio); ?></span>
                    </div>
                    <h3 class="text-base font-semibold text-slate-800 mb-2"><?php echo esc_html(get_the_title()); ?></h3>
                    <a href="<?php echo get_permalink(); ?>" class="text-primary text-xs font-medium mt-3 inline-block hover:underline">Ver más →</a>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- JS: expandir tesis -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.tesis-expandible').forEach(function(card) {
        card.addEventListener('click', function() {
            var resumen = this.querySelector('.tesis-resumen');
            var chevron = this.querySelector('.tesis-chevron');
            if (resumen) {
                resumen.classList.toggle('hidden');
                if (chevron) chevron.style.transform = resumen.classList.contains('hidden') ? '' : 'rotate(180deg)';
            }
        });
    });
});
</script>

<?php get_footer(); ?>
