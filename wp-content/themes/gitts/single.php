<?php get_header(); ?>

<?php while (have_posts()) : the_post();
    $cats = get_the_category();
    $cat_name = $cats ? $cats[0]->name : 'General';
    $badge_class = 'badge-outline badge-primary';
    if ($cats) {
        $slug = $cats[0]->slug;
        if (strpos($slug, 'proyecto') !== false || strpos($slug, 'colabora') !== false) $badge_class = 'badge-outline badge-secondary';
        elseif (strpos($slug, 'vida') !== false || strpos($slug, 'academ') !== false) $badge_class = 'badge-outline badge-accent';
    }
?>

<div class="relative min-h-[400px] flex items-end" <?php if (has_post_thumbnail()) : ?>style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');background-size:cover;background-position:center;"<?php endif; ?>>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/95 via-slate-900/60 to-slate-900/30"></div>
    <div class="relative max-w-7xl mx-auto px-6 pb-12 pt-32 w-full" data-aos="fade-right">
        <div class="flex items-center gap-3 mb-4">
            <span class="badge <?php echo $badge_class; ?> border-white/40 text-white badge-sm font-normal"><?php echo esc_html($cat_name); ?></span>
            <span class="text-slate-300 text-sm"><?php echo get_the_date('d M Y'); ?></span>
        </div>
        <h1 class="text-white font-light text-4xl leading-tight max-w-3xl"><?php the_title(); ?></h1>
    </div>
</div>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-14">
            <!-- Contenido principal -->
            <div class="lg:col-span-2" data-aos="fade-up">

                <article class="max-w-none noticia-content">
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
            <div data-aos="fade-left">
                <div class="card bg-slate-50 border-0 sticky top-24">
                    <div class="card-body p-6">
                        <h3 class="text-slate-800 font-semibold text-lg mb-5">Detalles</h3>
                        <dl class="space-y-4">
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Fecha</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo get_the_date('d \d\e F, Y'); ?></dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Categoría</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo esc_html($cat_name); ?></dd>
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
                    <a href="<?php echo home_url('/noticias'); ?>" class="text-primary text-sm font-medium hover:underline">← Todas las noticias</a>
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
                            <div class="card bg-white border-0 hover:bg-slate-50 transition-colors">
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
