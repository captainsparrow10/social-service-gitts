<?php /* Template Name: Nuestro Equipo */ get_header(); ?>

<?php $icons_url = get_template_directory_uri() . '/assets/icons'; ?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6" data-aos="fade-right">
        <h1 class="text-white font-light text-4xl">Nuestro Equipo</h1>
        <p class="text-slate-300 mt-3 text-lg font-light">Las personas detrás de la investigación, la tecnología y las ideas que dan vida a GITTS.</p>
    </div>
</div>

<!-- Investigadores -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-10 text-center" data-aos="fade-up">Investigadores</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            $investigadores = new WP_Query([
                'post_type' => 'miembro', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_miembro', 'field' => 'slug', 'terms' => 'miembros-core']],
                'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC',
            ]);
            if ($investigadores->have_posts()) :
                while ($investigadores->have_posts()) : $investigadores->the_post();
                    $cargo = get_post_meta(get_the_ID(), 'cargo_oficial', true);
                    $orcid = get_post_meta(get_the_ID(), 'link_orcid', true);
                    $scholar = get_post_meta(get_the_ID(), 'link_scholar', true);
                    $rg = get_post_meta(get_the_ID(), 'link_researchgate', true);
                    $apersei = get_post_meta(get_the_ID(), 'link_apersei', true);
            ?>
            <div class="flex flex-col items-center text-center" data-aos="fade-up">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium', ['class' => 'w-32 h-32 rounded-full object-cover mb-5']); ?>
                <?php else : ?>
                    <div class="w-32 h-32 rounded-full bg-slate-200 flex items-center justify-center mb-5">
                        <span class="text-3xl font-light text-slate-500"><?php echo mb_substr(get_the_title(), 0, 1); ?></span>
                    </div>
                <?php endif; ?>
                <h3 class="text-sm font-bold text-slate-800 tracking-wide mb-1"><?php the_title(); ?></h3>
                <?php if ($cargo) : ?>
                    <p class="text-slate-500 text-xs mb-3"><?php echo esc_html($cargo); ?></p>
                <?php endif; ?>
                <div class="flex gap-2">
                    <?php if ($apersei) : ?>
                    <a href="<?php echo esc_url($apersei); ?>" target="_blank" class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center hover:border-primary transition-colors" title="Alpha Persei">
                        <img src="<?php echo $icons_url; ?>/apersei.png" alt="Alpha Persei" class="w-5 h-5 object-contain rounded">
                    </a>
                    <?php endif; ?>
                    <?php if ($orcid) : ?>
                    <a href="<?php echo esc_url($orcid); ?>" target="_blank" class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center hover:border-primary transition-colors" title="ORCID">
                        <img src="<?php echo $icons_url; ?>/orcid.png" alt="ORCID" class="w-5 h-5 object-contain rounded">
                    </a>
                    <?php endif; ?>
                    <?php if ($scholar) : ?>
                    <a href="<?php echo esc_url($scholar); ?>" target="_blank" class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center hover:border-primary transition-colors" title="Google Scholar">
                        <img src="<?php echo $icons_url; ?>/google-scholar.png" alt="Google Scholar" class="w-5 h-5 object-contain rounded">
                    </a>
                    <?php endif; ?>
                    <?php if ($rg) : ?>
                    <a href="<?php echo esc_url($rg); ?>" target="_blank" class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center hover:border-primary transition-colors" title="ResearchGate">
                        <img src="<?php echo $icons_url; ?>/research-gate.png" alt="ResearchGate" class="w-5 h-5 object-contain rounded">
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- Estudiantes Activos -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-10 text-center" data-aos="fade-up">Estudiantes Activos</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
            <?php
            $estudiantes = new WP_Query([
                'post_type' => 'miembro', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_miembro', 'field' => 'slug', 'terms' => 'estudiante-activo']],
                'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC',
            ]);
            if ($estudiantes->have_posts()) :
                while ($estudiantes->have_posts()) : $estudiantes->the_post();
                    $cargo = get_post_meta(get_the_ID(), 'cargo_oficial', true);
            ?>
            <div class="card bg-white border border-slate-200" data-aos="fade-up">
                <div class="card-body p-6 items-center text-center">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('thumbnail', ['class' => 'w-16 h-16 rounded-full object-cover mb-3']); ?>
                    <?php else : ?>
                        <div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center mb-3">
                            <span class="text-xl font-light text-white"><?php echo mb_substr(get_the_title(), 0, 1); ?></span>
                        </div>
                    <?php endif; ?>
                    <h4 class="text-sm font-semibold text-slate-800"><?php the_title(); ?></h4>
                    <?php if ($cargo) : ?>
                        <p class="text-xs text-slate-500"><?php echo esc_html($cargo); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
