<?php /* Template Name: Servicios */ get_header(); ?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6" data-aos="fade-right">
        <h1 class="text-white font-light text-4xl">Servicios Institucionales</h1>
        <p class="text-slate-300 mt-3 text-lg font-light">Oferta de valor técnico para la industria, el sector público y corporativo.</p>
    </div>
</div>

<section class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <div class="space-y-8">
            <?php
            $colors = ['border-l-primary text-primary', 'border-l-secondary text-secondary', 'border-l-accent text-accent'];
            $serv_q = new WP_Query(['post_type' => 'servicio', 'posts_per_page' => -1, 'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC']);
            if ($serv_q->have_posts()) :
                $i = 0;
                while ($serv_q->have_posts()) : $serv_q->the_post();
                    $descripcion = get_post_meta(get_the_ID(), 'descripcion', true);
                    $color = $colors[$i % count($colors)];
                    $parts = explode(' ', $color);
            ?>
            <div class="card bg-white border-l-4 <?php echo $parts[0]; ?>" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                <div class="card-body p-8 lg:p-10">
                    <h3 class="text-xl font-semibold text-slate-800 mb-3"><?php the_title(); ?></h3>
                    <p class="text-slate-500 text-base leading-relaxed max-w-3xl mb-5"><?php echo esc_html($descripcion); ?></p>
                    <a href="<?php echo home_url('/unete'); ?>" class="<?php echo $parts[1]; ?> text-sm font-medium hover:underline">Solicitar más información →</a>
                </div>
            </div>
            <?php $i++; endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
