<?php get_header(); ?>

<?php while (have_posts()) : the_post();
    $autores = get_post_meta(get_the_ID(), 'pub_autores', true);
    $revista = get_post_meta(get_the_ID(), 'pub_revista', true);
    $anio = get_post_meta(get_the_ID(), 'pub_anio', true);
    $doi = get_post_meta(get_the_ID(), 'pub_doi', true);
    $estado = get_post_meta(get_the_ID(), 'pub_estado', true);
    $tipo_terms = wp_get_post_terms(get_the_ID(), 'tipo_publicacion');
    $tipo_name = $tipo_terms ? $tipo_terms[0]->name : 'Publicación';
    $tipo_slug = $tipo_terms ? $tipo_terms[0]->slug : '';
?>

<div class="relative min-h-[420px] flex items-end" <?php if (has_post_thumbnail()) : ?>style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');background-size:cover;background-position:center;"<?php endif; ?>>
    <?php if (!has_post_thumbnail()) : ?>
    <div class="absolute inset-0 bg-gradient-to-br from-primary to-slate-800"></div>
    <?php endif; ?>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/95 via-slate-900/60 to-slate-900/30"></div>
    <div class="relative max-w-7xl mx-auto px-6 pb-12 pt-32 w-full">
        <h1 class="text-white font-light text-3xl lg:text-4xl leading-tight max-w-4xl"><?php the_title(); ?></h1>
    </div>
</div>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Contenido principal -->
            <div class="lg:col-span-2">
                <h2 class="text-primary font-semibold text-xl mb-4 pb-3 border-b border-slate-200">Resumen</h2>
                <article class="prose prose-slate max-w-none">
                    <?php the_content(); ?>
                </article>
            </div>

            <!-- Sidebar -->
            <div>
                <div class="card bg-slate-50 border-0 sticky top-24">
                    <div class="card-body p-7">
                        <h3 class="text-slate-800 font-semibold text-lg mb-6">Detalles</h3>
                        <dl class="space-y-5">
                            <?php if ($anio) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Año</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo esc_html($anio); ?></dd>
                            </div>
                            <?php endif; ?>
                            <?php if ($estado) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Estado</dt>
                                <dd class="mt-1">
                                    <span class="badge badge-sm font-medium text-white py-3 px-4" style="background-color:<?php echo esc_attr(get_option('gitts_color_secondary', '#52975D')); ?>"><?php echo esc_html($estado); ?></span>
                                </dd>
                            </div>
                            <?php endif; ?>
                            <?php if ($autores) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Autores</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo esc_html($autores); ?></dd>
                            </div>
                            <?php endif; ?>
                            <?php if ($revista) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Revista / Conferencia</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo esc_html($revista); ?></dd>
                            </div>
                            <?php endif; ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Tipo</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo esc_html($tipo_name); ?></dd>
                            </div>
                            <?php if ($doi) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Enlace externo</dt>
                                <dd class="mt-1"><a href="<?php echo esc_url($doi); ?>" target="_blank" class="text-primary text-sm font-medium hover:underline">Ver publicación →</a></dd>
                            </div>
                            <?php endif; ?>
                        </dl>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="<?php echo home_url('/produccion-cientifica'); ?>" class="text-primary text-sm font-medium hover:underline">← Producción Científica</a>
                </div>

                <!-- Relacionadas -->
                <?php
                $related = new WP_Query([
                    'post_type' => 'publicacion',
                    'posts_per_page' => 3,
                    'post__not_in' => [get_the_ID()],
                    'tax_query' => $tipo_terms ? [['taxonomy' => 'tipo_publicacion', 'field' => 'slug', 'terms' => $tipo_slug]] : [],
                ]);
                if ($related->have_posts()) : ?>
                <div class="mt-10">
                    <h3 class="text-slate-800 font-semibold text-lg mb-5">Relacionadas</h3>
                    <div class="space-y-4">
                        <?php while ($related->have_posts()) : $related->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="block group">
                            <div class="card bg-white border border-slate-200 hover:border-primary/30 transition-colors">
                                <div class="card-body p-4">
                                    <p class="text-xs text-slate-400"><?php echo esc_html(get_post_meta(get_the_ID(), 'pub_anio', true)); ?></p>
                                    <h4 class="text-sm font-medium text-slate-700 group-hover:text-primary transition-colors"><?php the_title(); ?></h4>
                                </div>
                            </div>
                        </a>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
