<?php /* Template Name: Actualidad */ get_header(); ?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6" data-aos="fade-right">
        <h1 class="text-white font-light text-4xl">Noticias</h1>
        <p class="text-slate-300 mt-3 text-lg font-light"><?php echo esc_html(get_option('gitts_intro_noticias', 'Conferencias, premios, defensas de tesis, workshops y eventos del grupo.')); ?></p>
    </div>
</div>

<!-- Grid de noticias -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <?php
            $noticias_q = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
            ]);
            $idx = 0;
            if ($noticias_q->have_posts()) :
                while ($noticias_q->have_posts()) : $noticias_q->the_post();
                    $cats = get_the_category();
                    $cat_name = $cats ? $cats[0]->name : 'General';
                    $cat_slug = $cats ? $cats[0]->slug : '';
                    $badge_class = 'badge-outline badge-primary';
                    if (strpos($cat_slug, 'evento') !== false) $badge_class = 'badge-outline badge-secondary';
                    elseif (strpos($cat_slug, 'premio') !== false) $badge_class = 'badge-outline badge-accent';
                    elseif (strpos($cat_slug, 'tesis') !== false) $badge_class = 'badge-outline badge-warning';
                    elseif (strpos($cat_slug, 'pasantia') !== false) $badge_class = 'badge-outline badge-info';
            ?>
            <div class="card bg-white" data-aos="fade-up" data-aos-delay="<?php echo ($idx % 3) * 60; ?>">
                <?php if (has_post_thumbnail()) : ?>
                <figure><?php the_post_thumbnail('medium_large', ['class' => 'w-full h-56 object-cover']); ?></figure>
                <?php else : ?>
                <figure><div class="w-full h-56 bg-gradient-to-br from-slate-800 to-primary"></div></figure>
                <?php endif; ?>
                <div class="card-body p-6">
                    <div class="flex items-center gap-3">
                        <span class="badge <?php echo $badge_class; ?> badge-sm font-normal"><?php echo esc_html($cat_name); ?></span>
                        <span class="text-xs text-slate-400"><?php echo get_the_date('d M Y'); ?></span>
                    </div>
                    <h3 class="text-base font-medium text-slate-800 mt-2"><?php the_title(); ?></h3>
                    <p class="text-sm text-slate-500 leading-relaxed"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                    <div class="card-actions justify-end mt-3">
                        <a href="<?php the_permalink(); ?>" class="text-primary text-sm font-medium hover:underline">Leer más →</a>
                    </div>
                </div>
            </div>
            <?php $idx++; endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
