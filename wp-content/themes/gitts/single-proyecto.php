<?php get_header(); ?>

<?php while (have_posts()) : the_post();
    $estado = get_post_meta(get_the_ID(), 'estado_proyecto', true);
    $fecha_inicio = get_post_meta(get_the_ID(), 'fecha_inicio', true);
    $fecha_fin = get_post_meta(get_the_ID(), 'fecha_fin', true);
    $investigadores = get_post_meta(get_the_ID(), 'investigadores_asignados', true);
    $entidades = get_post_meta(get_the_ID(), 'entidades_financiadoras', true);
    $badge = ($estado === 'Concluido') ? 'badge-info' : 'badge-success';
    $estado_text = $estado ?: 'En progreso';
?>

<div class="relative min-h-[420px] flex items-end" <?php if (has_post_thumbnail()) : ?>style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');background-size:cover;background-position:center;"<?php endif; ?>>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/95 via-slate-900/60 to-slate-900/30"></div>
    <div class="relative max-w-7xl mx-auto px-6 pb-12 pt-32 w-full" data-aos="fade-right">
        <div class="flex items-center gap-3 mb-4">
            <span class="badge <?php echo $badge; ?> badge-sm font-medium"><?php echo esc_html($estado_text); ?></span>
            <?php if ($entidades) : ?>
                <span class="badge badge-outline border-white/40 text-white badge-sm font-normal"><?php echo esc_html($entidades); ?></span>
            <?php endif; ?>
        </div>
        <h1 class="text-white font-light text-4xl leading-tight max-w-4xl"><?php the_title(); ?></h1>
        <div class="flex flex-wrap gap-6 mt-5 text-slate-300 text-sm">
            <?php if ($fecha_inicio) : ?>
                <span>Inicio: <?php echo esc_html($fecha_inicio); ?></span>
            <?php endif; ?>
            <?php if ($fecha_fin) : ?>
                <span>Fin: <?php echo esc_html($fecha_fin); ?></span>
            <?php endif; ?>
            <?php if ($investigadores) : ?>
                <span><?php echo esc_html($investigadores); ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-14">
            <!-- Contenido principal -->
            <div class="lg:col-span-2" data-aos="fade-up">
                <article class="max-w-none proyecto-content">
                    <?php the_content(); ?>
                </article>
            </div>

            <!-- Sidebar -->
            <div data-aos="fade-left">
                <div class="card bg-slate-50 border-0 sticky top-24">
                    <div class="card-body p-7">
                        <h3 class="text-slate-800 font-semibold text-lg mb-6">Detalles del Proyecto</h3>
                        <dl class="space-y-5">
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Estado</dt>
                                <dd class="mt-1"><span class="badge <?php echo $badge; ?> badge-sm font-medium"><?php echo esc_html($estado_text); ?></span></dd>
                            </div>
                            <?php if ($fecha_inicio) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Fecha de Inicio</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo esc_html($fecha_inicio); ?></dd>
                            </div>
                            <?php endif; ?>
                            <?php if ($fecha_fin) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Fecha de Fin</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo esc_html($fecha_fin); ?></dd>
                            </div>
                            <?php endif; ?>
                            <?php if ($investigadores) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Investigadores</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo esc_html($investigadores); ?></dd>
                            </div>
                            <?php endif; ?>
                            <?php if ($entidades) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Financiamiento</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo esc_html($entidades); ?></dd>
                            </div>
                            <?php endif; ?>
                        </dl>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="<?php echo home_url('/investigacion'); ?>" class="text-primary text-sm font-medium hover:underline">← Todos los proyectos</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
