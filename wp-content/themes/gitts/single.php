<?php get_header(); ?>

<?php while (have_posts()) : the_post();
    $cats = get_the_category();
    $cat_name = $cats ? $cats[0]->name : 'General';
    $cat_slug = $cats ? $cats[0]->slug : '';

    // Color del badge según categoría
    $badge_color = '#165288'; // primary por defecto
    if (strpos($cat_slug, 'conferencia') !== false) $badge_color = '#495C9B';
    elseif (strpos($cat_slug, 'premio') !== false) $badge_color = '#52975D';
    elseif (strpos($cat_slug, 'tesis') !== false) $badge_color = '#7365AA';
    elseif (strpos($cat_slug, 'evento') !== false || strpos($cat_slug, 'workshop') !== false) $badge_color = '#9C6DB4';
?>

<div class="relative min-h-[420px] flex items-end" <?php if (has_post_thumbnail()) : ?>style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');background-size:cover;background-position:center;"<?php endif; ?>>
    <?php if (!has_post_thumbnail()) : ?>
    <div class="absolute inset-0 bg-gradient-to-br from-primary to-slate-800"></div>
    <?php endif; ?>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/95 via-slate-900/60 to-slate-900/30"></div>
    <div class="relative max-w-7xl mx-auto px-6 pb-12 pt-32 w-full">
        <div class="flex items-center gap-3 mb-4">
            <span class="badge badge-sm font-medium text-white py-3 px-4" style="background-color:<?php echo $badge_color; ?>;border-color:<?php echo $badge_color; ?>"><?php echo esc_html($cat_name); ?></span>
            <span class="text-slate-300 text-sm"><?php echo get_the_date('d M Y'); ?></span>
        </div>
        <h1 class="text-white font-light text-3xl lg:text-4xl leading-tight max-w-4xl"><?php the_title(); ?></h1>
    </div>
</div>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Contenido principal -->
            <div class="lg:col-span-2">
                <article class="prose prose-slate max-w-none noticia-content">
                    <?php the_content(); ?>
                </article>

                <?php
                $tags = get_the_tags();
                if ($tags) : ?>
                <div class="flex flex-wrap gap-2 mt-10 pt-8 border-t border-slate-200">
                    <?php foreach ($tags as $tag) : ?>
                        <span class="badge badge-outline badge-primary badge-sm font-normal"><?php echo esc_html($tag->name); ?></span>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <div>
                <div class="card bg-slate-50 border-0 sticky top-24">
                    <div class="card-body p-7">
                        <h3 class="text-slate-800 font-semibold text-lg mb-6">Detalles</h3>
                        <dl class="space-y-5">
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Fecha</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo get_the_date('d \d\e F, Y'); ?></dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Categoría</dt>
                                <dd class="mt-1">
                                    <span class="badge badge-sm font-medium text-white py-3 px-4" style="background-color:<?php echo $badge_color; ?>"><?php echo esc_html($cat_name); ?></span>
                                </dd>
                            </div>
                            <?php if (get_the_author()) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Autor</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo get_the_author(); ?></dd>
                            </div>
                            <?php endif; ?>
                        </dl>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="<?php echo home_url('/noticias'); ?>" class="text-primary text-sm font-medium hover:underline">← Actualidad</a>
                </div>

                <!-- Noticias relacionadas -->
                <?php
                $related = new WP_Query([
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'post__not_in' => [get_the_ID()],
                    'category__in' => $cats ? [$cats[0]->term_id] : [],
                ]);
                if ($related->have_posts()) : ?>
                <div class="mt-10">
                    <h3 class="text-slate-800 font-semibold text-lg mb-5">Relacionadas</h3>
                    <div class="space-y-4">
                        <?php while ($related->have_posts()) : $related->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="block group">
                            <div class="card bg-white border border-slate-200 hover:border-primary/30 transition-colors">
                                <div class="card-body p-4">
                                    <p class="text-xs text-slate-400"><?php echo get_the_date('d M Y'); ?></p>
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
