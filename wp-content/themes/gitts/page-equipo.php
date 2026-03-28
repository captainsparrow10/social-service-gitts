<?php /* Template Name: Nuestro Equipo */ get_header(); ?>

<?php
$icons_url = get_template_directory_uri() . '/assets/icons';
?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6">
        <h1 class="text-white font-light text-4xl">Nuestro Equipo</h1>
        <p class="text-slate-300 mt-3 text-lg font-light max-w-3xl">Conozca a los investigadores, estudiantes y colaboradores que impulsan la innovación en GITTS.</p>
    </div>
</div>

<section class="py-14 bg-white">
    <div class="max-w-3xl mx-auto px-6 text-center">
        <?php
        $intro = wp_kses_post(get_option('gitts_intro_miembros', ''));
        if ($intro) :
            echo '<p class="text-slate-600 text-base leading-relaxed">' . $intro . '</p>';
        else :
        ?>
            <p class="text-slate-600 text-base leading-relaxed">GITTS está conformado por un equipo multidisciplinario de investigadores, estudiantes y colaboradores que comparten una visión común: impulsar el conocimiento y la innovación en telecomunicaciones y procesamiento de señales.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Miembros Principales -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-10 text-center"><?php echo esc_html(get_option('gitts_sec_miembros_principales', 'Miembros Principales')); ?></h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            $principales = new WP_Query([
                'post_type' => 'miembro', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_miembro', 'field' => 'slug', 'terms' => 'miembros-core']],
                'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC',
            ]);
            if ($principales->have_posts()) :
                while ($principales->have_posts()) : $principales->the_post();
                    $email = get_post_meta(get_the_ID(), 'email_institucional', true);
                    $cargo = get_post_meta(get_the_ID(), 'cargo_oficial', true);
                    $bio = get_post_meta(get_the_ID(), 'bio_extendida', true);
                    $apersei = get_post_meta(get_the_ID(), 'link_apersei', true);
                    $orcid = get_post_meta(get_the_ID(), 'link_orcid', true);
                    $scholar = get_post_meta(get_the_ID(), 'link_scholar', true);
                    $rg = get_post_meta(get_the_ID(), 'link_researchgate', true);
            ?>
            <div class="flex flex-col items-center text-center">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium', ['class' => 'w-40 h-40 rounded-full object-cover mb-6']); ?>
                <?php else : ?>
                    <div class="w-40 h-40 rounded-full bg-slate-200 flex items-center justify-center mb-6">
                        <span class="text-4xl font-light text-slate-500"><?php echo mb_substr(get_the_title(), 0, 1); ?></span>
                    </div>
                <?php endif; ?>
                <h3 class="text-base font-bold text-slate-800 tracking-wide mb-3"><?php echo mb_strtoupper(get_the_title(), 'UTF-8'); ?></h3>
                <div class="w-12 h-0.5 bg-primary mb-4"></div>
                <?php if ($email) : ?>
                    <a href="mailto:<?php echo esc_attr($email); ?>" class="text-primary text-sm hover:underline mb-1"><?php echo esc_html($email); ?></a>
                <?php endif; ?>
                <?php if ($cargo) : ?>
                    <p class="text-slate-500 text-sm"><?php echo esc_html($cargo); ?></p>
                <?php endif; ?>
                <?php if ($bio) : ?>
                    <p class="text-slate-500 text-xs leading-relaxed mb-4"><span class="font-medium text-slate-600">Área de Interés:</span><br><?php echo esc_html($bio); ?></p>
                <?php endif; ?>
                <div class="flex gap-2">
                    <?php if ($apersei) : ?>
                    <a href="<?php echo esc_url($apersei); ?>" target="_blank" class="w-9 h-9 rounded-lg bg-white border border-slate-200 flex items-center justify-center hover:border-primary transition-colors" title="Alpha Persei">
                        <img src="<?php echo $icons_url; ?>/apersei.png" alt="Alpha Persei" class="w-6 h-6 object-contain rounded">
                    </a>
                    <?php endif; ?>
                    <?php if ($orcid) : ?>
                    <a href="<?php echo esc_url($orcid); ?>" target="_blank" class="w-9 h-9 rounded-lg bg-white border border-slate-200 flex items-center justify-center hover:border-primary transition-colors" title="ORCID">
                        <img src="<?php echo $icons_url; ?>/orcid.png" alt="ORCID" class="w-6 h-6 object-contain rounded">
                    </a>
                    <?php endif; ?>
                    <?php if ($scholar) : ?>
                    <a href="<?php echo esc_url($scholar); ?>" target="_blank" class="w-9 h-9 rounded-lg bg-white border border-slate-200 flex items-center justify-center hover:border-primary transition-colors" title="Google Scholar">
                        <img src="<?php echo $icons_url; ?>/google-scholar.png" alt="Google Scholar" class="w-6 h-6 object-contain rounded">
                    </a>
                    <?php endif; ?>
                    <?php if ($rg) : ?>
                    <a href="<?php echo esc_url($rg); ?>" target="_blank" class="w-9 h-9 rounded-lg bg-white border border-slate-200 flex items-center justify-center hover:border-primary transition-colors" title="ResearchGate">
                        <img src="<?php echo $icons_url; ?>/research-gate.png" alt="ResearchGate" class="w-6 h-6 object-contain rounded">
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- Colaboradores -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-10 text-center"><?php echo esc_html(get_option('gitts_sec_colaboradores', 'Colaboradores')); ?></h2>
        <div class="flex flex-wrap justify-center gap-8">
            <?php
            $colaboradores = new WP_Query([
                'post_type' => 'miembro', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_miembro', 'field' => 'slug', 'terms' => 'colaborador']],
                'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC',
            ]);
            if ($colaboradores->have_posts()) :
                while ($colaboradores->have_posts()) : $colaboradores->the_post();
                    $email = get_post_meta(get_the_ID(), 'email_institucional', true);
                    $cargo = get_post_meta(get_the_ID(), 'cargo_oficial', true);
                    $bio = get_post_meta(get_the_ID(), 'bio_extendida', true);
                    $apersei = get_post_meta(get_the_ID(), 'link_apersei', true);
                    $orcid = get_post_meta(get_the_ID(), 'link_orcid', true);
                    $scholar = get_post_meta(get_the_ID(), 'link_scholar', true);
                    $rg = get_post_meta(get_the_ID(), 'link_researchgate', true);
            ?>
            <div class="flex flex-col items-center text-center w-full sm:w-[calc(50%-1rem)] lg:w-[calc(25%-1.5rem)]">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium', ['class' => 'w-40 h-40 rounded-full object-cover mb-6']); ?>
                <?php else : ?>
                    <div class="w-40 h-40 rounded-full bg-slate-200 flex items-center justify-center mb-6">
                        <span class="text-4xl font-light text-slate-500"><?php echo mb_substr(get_the_title(), 0, 1); ?></span>
                    </div>
                <?php endif; ?>
                <h3 class="text-base font-bold text-slate-800 tracking-wide mb-3"><?php echo mb_strtoupper(get_the_title(), 'UTF-8'); ?></h3>
                <div class="w-12 h-0.5 bg-primary mb-4"></div>
                <?php if ($email) : ?>
                    <a href="mailto:<?php echo esc_attr($email); ?>" class="text-primary text-sm hover:underline mb-1"><?php echo esc_html($email); ?></a>
                <?php endif; ?>
                <?php if ($cargo) : ?>
                    <p class="text-slate-500 text-sm"><?php echo esc_html($cargo); ?></p>
                <?php endif; ?>
                <?php if ($bio) : ?>
                    <p class="text-slate-500 text-xs leading-relaxed mb-4"><span class="font-medium text-slate-600">Área de Interés:</span><br><?php echo esc_html($bio); ?></p>
                <?php endif; ?>
                <div class="flex gap-2">
                    <?php if ($apersei) : ?>
                    <a href="<?php echo esc_url($apersei); ?>" target="_blank" class="w-9 h-9 rounded-lg bg-white border border-slate-200 flex items-center justify-center hover:border-primary transition-colors" title="Alpha Persei">
                        <img src="<?php echo $icons_url; ?>/apersei.png" alt="Alpha Persei" class="w-6 h-6 object-contain rounded">
                    </a>
                    <?php endif; ?>
                    <?php if ($orcid) : ?>
                    <a href="<?php echo esc_url($orcid); ?>" target="_blank" class="w-9 h-9 rounded-lg bg-white border border-slate-200 flex items-center justify-center hover:border-primary transition-colors" title="ORCID">
                        <img src="<?php echo $icons_url; ?>/orcid.png" alt="ORCID" class="w-6 h-6 object-contain rounded">
                    </a>
                    <?php endif; ?>
                    <?php if ($scholar) : ?>
                    <a href="<?php echo esc_url($scholar); ?>" target="_blank" class="w-9 h-9 rounded-lg bg-white border border-slate-200 flex items-center justify-center hover:border-primary transition-colors" title="Google Scholar">
                        <img src="<?php echo $icons_url; ?>/google-scholar.png" alt="Google Scholar" class="w-6 h-6 object-contain rounded">
                    </a>
                    <?php endif; ?>
                    <?php if ($rg) : ?>
                    <a href="<?php echo esc_url($rg); ?>" target="_blank" class="w-9 h-9 rounded-lg bg-white border border-slate-200 flex items-center justify-center hover:border-primary transition-colors" title="ResearchGate">
                        <img src="<?php echo $icons_url; ?>/research-gate.png" alt="ResearchGate" class="w-6 h-6 object-contain rounded">
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- Colaboradores Externos -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-10 text-center"><?php echo esc_html(get_option('gitts_sec_colaboradores_ext', 'Colaboradores Externos')); ?></h2>
        <div class="flex flex-wrap justify-center gap-8">
            <?php
            $externos = new WP_Query([
                'post_type' => 'miembro', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_miembro', 'field' => 'slug', 'terms' => 'colaborador-externo']],
                'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC',
            ]);
            if ($externos->have_posts()) :
                while ($externos->have_posts()) : $externos->the_post();
                    $email = get_post_meta(get_the_ID(), 'email_institucional', true);
                    $cargo = get_post_meta(get_the_ID(), 'cargo_oficial', true);
                    $bio = get_post_meta(get_the_ID(), 'bio_extendida', true);
                    $apersei = get_post_meta(get_the_ID(), 'link_apersei', true);
                    $orcid = get_post_meta(get_the_ID(), 'link_orcid', true);
                    $scholar = get_post_meta(get_the_ID(), 'link_scholar', true);
                    $rg = get_post_meta(get_the_ID(), 'link_researchgate', true);
            ?>
            <div class="flex flex-col items-center text-center w-full sm:w-[calc(50%-1rem)] lg:w-[calc(25%-1.5rem)]">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium', ['class' => 'w-40 h-40 rounded-full object-cover mb-6']); ?>
                <?php else : ?>
                    <div class="w-40 h-40 rounded-full bg-slate-200 flex items-center justify-center mb-6">
                        <span class="text-4xl font-light text-slate-500"><?php echo mb_substr(get_the_title(), 0, 1); ?></span>
                    </div>
                <?php endif; ?>
                <h3 class="text-base font-bold text-slate-800 tracking-wide mb-3"><?php echo mb_strtoupper(get_the_title(), 'UTF-8'); ?></h3>
                <div class="w-12 h-0.5 bg-primary mb-4"></div>
                <?php if ($email) : ?>
                    <a href="mailto:<?php echo esc_attr($email); ?>" class="text-primary text-sm hover:underline mb-1"><?php echo esc_html($email); ?></a>
                <?php endif; ?>
                <?php if ($cargo) : ?>
                    <p class="text-slate-500 text-sm"><?php echo esc_html($cargo); ?></p>
                <?php endif; ?>
                <?php if ($bio) : ?>
                    <p class="text-slate-500 text-xs leading-relaxed mb-4"><span class="font-medium text-slate-600">Área de Interés:</span><br><?php echo esc_html($bio); ?></p>
                <?php endif; ?>
                <div class="flex gap-2">
                    <?php if ($apersei) : ?>
                    <a href="<?php echo esc_url($apersei); ?>" target="_blank" class="w-9 h-9 rounded-lg bg-white border border-slate-200 flex items-center justify-center hover:border-primary transition-colors" title="Alpha Persei">
                        <img src="<?php echo $icons_url; ?>/apersei.png" alt="Alpha Persei" class="w-6 h-6 object-contain rounded">
                    </a>
                    <?php endif; ?>
                    <?php if ($orcid) : ?>
                    <a href="<?php echo esc_url($orcid); ?>" target="_blank" class="w-9 h-9 rounded-lg bg-white border border-slate-200 flex items-center justify-center hover:border-primary transition-colors" title="ORCID">
                        <img src="<?php echo $icons_url; ?>/orcid.png" alt="ORCID" class="w-6 h-6 object-contain rounded">
                    </a>
                    <?php endif; ?>
                    <?php if ($scholar) : ?>
                    <a href="<?php echo esc_url($scholar); ?>" target="_blank" class="w-9 h-9 rounded-lg bg-white border border-slate-200 flex items-center justify-center hover:border-primary transition-colors" title="Google Scholar">
                        <img src="<?php echo $icons_url; ?>/google-scholar.png" alt="Google Scholar" class="w-6 h-6 object-contain rounded">
                    </a>
                    <?php endif; ?>
                    <?php if ($rg) : ?>
                    <a href="<?php echo esc_url($rg); ?>" target="_blank" class="w-9 h-9 rounded-lg bg-white border border-slate-200 flex items-center justify-center hover:border-primary transition-colors" title="ResearchGate">
                        <img src="<?php echo $icons_url; ?>/research-gate.png" alt="ResearchGate" class="w-6 h-6 object-contain rounded">
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- Estudiantes -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-8 text-center"><?php echo esc_html(get_option('gitts_sec_estudiantes_activos', 'Estudiantes Activos')); ?></h2>
        <div class="flex flex-wrap justify-center gap-6 mb-16">
            <?php
            $activos = new WP_Query([
                'post_type' => 'miembro', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_miembro', 'field' => 'slug', 'terms' => 'estudiante-activo']],
                'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC',
            ]);
            if ($activos->have_posts()) :
                while ($activos->have_posts()) : $activos->the_post();
                    $cargo = get_post_meta(get_the_ID(), 'cargo_oficial', true);
                    $bio = get_post_meta(get_the_ID(), 'bio_extendida', true);
            ?>
            <div class="card bg-white border border-slate-200 w-full sm:w-[calc(50%-0.75rem)] lg:w-[calc(33.333%-1rem)]">
                <div class="card-body p-6 items-center text-center">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('thumbnail', ['class' => 'w-16 h-16 rounded-full object-cover mb-3']); ?>
                    <?php else : ?>
                        <div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center mb-3">
                            <span class="text-xl font-light text-white"><?php echo mb_substr(get_the_title(), 0, 1); ?></span>
                        </div>
                    <?php endif; ?>
                    <h4 class="text-sm font-semibold text-slate-800"><?php echo esc_html(get_the_title()); ?></h4>
                    <?php if ($cargo) : ?>
                        <p class="text-xs text-slate-500"><?php echo esc_html($cargo); ?></p>
                    <?php endif; ?>
                    <?php if ($bio) : ?>
                        <p class="text-xs text-slate-400 mt-1"><?php echo esc_html($bio); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <h2 class="text-slate-800 font-semibold text-2xl mb-8 text-center"><?php echo esc_html(get_option('gitts_sec_estudiantes_egresados', 'Estudiantes Egresados')); ?></h2>
        <div class="flex flex-wrap justify-center gap-6">
            <?php
            $egresados = new WP_Query([
                'post_type' => 'miembro', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_miembro', 'field' => 'slug', 'terms' => 'estudiante-egresado']],
                'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC',
            ]);
            if ($egresados->have_posts()) :
                while ($egresados->have_posts()) : $egresados->the_post();
                    $bio = get_post_meta(get_the_ID(), 'bio_extendida', true);
            ?>
            <div class="flex gap-3 items-start p-5 bg-slate-50 rounded-xl w-full md:w-[calc(50%-0.75rem)]">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('thumbnail', ['class' => 'w-10 h-10 rounded-full object-cover flex-shrink-0']); ?>
                <?php else : ?>
                    <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center text-slate-500 text-sm font-semibold flex-shrink-0"><?php echo mb_substr(get_the_title(), 0, 1); ?></div>
                <?php endif; ?>
                <div>
                    <h4 class="text-sm font-semibold text-slate-700"><?php echo esc_html(get_the_title()); ?></h4>
                    <?php if ($bio) : ?>
                        <p class="text-xs text-slate-500 leading-relaxed mt-1"><?php echo esc_html($bio); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
