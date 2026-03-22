<?php get_header(); ?>

<?php while (have_posts()) : the_post();
    $estado = get_post_meta(get_the_ID(), 'estado_proyecto', true) ?: 'En progreso';
    $fecha_inicio = get_post_meta(get_the_ID(), 'fecha_inicio', true);
    $fecha_fin = get_post_meta(get_the_ID(), 'fecha_fin', true);
    $investigadores = get_post_meta(get_the_ID(), 'investigadores_asignados', true);
    $entidades = get_post_meta(get_the_ID(), 'entidades_financiadoras', true);
    $organismo_financiador = get_post_meta(get_the_ID(), 'organismo_financiador', true);
    $organismo_ejecutor = get_post_meta(get_the_ID(), 'organismo_ejecutor', true);
    $codigo = get_post_meta(get_the_ID(), 'codigo_proyecto', true);
    $ip = get_post_meta(get_the_ID(), 'investigador_principal', true);
    $co_ip = get_post_meta(get_the_ID(), 'co_investigadores', true);
    $duracion = get_post_meta(get_the_ID(), 'duracion', true);
    $monto = get_post_meta(get_the_ID(), 'monto_total', true);
    $contacto = get_post_meta(get_the_ID(), 'contacto_email', true);
    $es_activo = ($estado !== 'Concluido' && $estado !== 'Finalizado');
?>

<!-- Hero con imagen -->
<div class="relative min-h-[420px] flex items-end" <?php if (has_post_thumbnail()) : ?>style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');background-size:cover;background-position:center;"<?php endif; ?>>
    <?php if (!has_post_thumbnail()) : ?>
    <div class="absolute inset-0 bg-gradient-to-br from-primary to-slate-800"></div>
    <?php endif; ?>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/95 via-slate-900/60 to-slate-900/30"></div>
    <div class="relative max-w-7xl mx-auto px-6 pb-12 pt-32 w-full" data-aos="fade-right">
        <div class="flex items-center gap-3 mb-4">
            <span class="badge badge-sm font-medium text-white py-3 px-4" style="background-color:<?php echo $es_activo ? '#52975D' : '#495C9B'; ?>;border-color:<?php echo $es_activo ? '#52975D' : '#495C9B'; ?>"><?php echo esc_html($estado); ?></span>
            <?php if ($organismo_financiador) : ?>
                <span class="badge badge-outline border-white/40 text-white badge-sm py-3 px-4"><?php echo esc_html($organismo_financiador); ?></span>
            <?php elseif ($entidades) : ?>
                <span class="badge badge-outline border-white/40 text-white badge-sm py-3 px-4"><?php echo esc_html($entidades); ?></span>
            <?php endif; ?>
        </div>
        <h1 class="text-white font-light text-3xl lg:text-4xl leading-tight max-w-4xl"><?php the_title(); ?></h1>
        <?php if ($ip) : ?>
        <p class="text-slate-300 text-sm mt-4">Investigador principal: <?php echo esc_html($ip); ?></p>
        <?php endif; ?>
    </div>
</div>

<!-- Descripción + Ficha técnica -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Contenido principal -->
            <div class="lg:col-span-2" data-aos="fade-up">
                <p class="text-slate-500 text-base leading-relaxed italic mb-10">Proyecto de investigación orientado al desarrollo de tecnologías, métodos y resultados aplicables a desafíos científicos, productivos y sociales.</p>

                <article class="prose prose-slate max-w-none proyecto-content">
                    <?php the_content(); ?>
                </article>
            </div>

            <!-- Sidebar — Ficha técnica -->
            <div data-aos="fade-left">
                <div class="card bg-slate-50 border-0 sticky top-24">
                    <div class="card-body p-7">
                        <h3 class="text-slate-800 font-semibold text-lg mb-6">Ficha Técnica</h3>
                        <dl class="space-y-5">
                            <?php if ($organismo_financiador) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Organismo financiador</dt>
                                <dd class="text-sm text-slate-700 mt-1 font-medium"><?php echo esc_html($organismo_financiador); ?></dd>
                            </div>
                            <?php endif; ?>
                            <?php if ($organismo_ejecutor) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Organismo ejecutor</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo esc_html($organismo_ejecutor); ?></dd>
                            </div>
                            <?php endif; ?>
                            <?php if ($codigo) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Código</dt>
                                <dd class="text-sm text-slate-700 mt-1 font-mono"><?php echo esc_html($codigo); ?></dd>
                            </div>
                            <?php endif; ?>
                            <?php if ($ip) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Investigador principal</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo esc_html($ip); ?></dd>
                            </div>
                            <?php endif; ?>
                            <?php if ($co_ip) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Co-investigadores</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo esc_html($co_ip); ?></dd>
                            </div>
                            <?php endif; ?>
                            <?php if ($duracion) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Duración</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo esc_html($duracion); ?></dd>
                            </div>
                            <?php endif; ?>
                            <?php if ($monto) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Monto total</dt>
                                <dd class="text-sm text-slate-700 mt-1 font-medium"><?php echo esc_html($monto); ?></dd>
                            </div>
                            <?php endif; ?>
                            <?php if ($fecha_inicio) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Inicio</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo esc_html($fecha_inicio); ?></dd>
                            </div>
                            <?php endif; ?>
                            <?php if ($fecha_fin) : ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Fin</dt>
                                <dd class="text-sm text-slate-700 mt-1"><?php echo esc_html($fecha_fin); ?></dd>
                            </div>
                            <?php endif; ?>
                            <div>
                                <dt class="text-xs font-medium text-slate-400 uppercase tracking-wide">Estado</dt>
                                <dd class="mt-1">
                                    <span class="badge badge-sm font-medium text-white py-3 px-4" style="background-color:<?php echo $es_activo ? '#52975D' : '#495C9B'; ?>"><?php echo esc_html($estado); ?></span>
                                </dd>
                            </div>
                        </dl>

                        <?php if ($contacto) : ?>
                        <div class="mt-8 pt-6 border-t border-slate-200">
                            <p class="text-xs font-medium text-slate-400 uppercase tracking-wide mb-2">Contacto</p>
                            <a href="mailto:<?php echo esc_attr($contacto); ?>" class="text-primary text-sm font-medium hover:underline"><?php echo esc_html($contacto); ?></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="<?php echo home_url('/investigacion'); ?>" class="text-primary text-sm font-medium hover:underline">← Todos los proyectos</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Galería de imágenes -->
<?php
$galeria = get_post_meta(get_the_ID(), 'galeria_imagenes', true);
$img_dir = get_template_directory_uri() . '/assets/img/';
$imagenes = [];
if ($galeria) {
    $imagenes = array_map('trim', explode(',', $galeria));
}
if (!empty($imagenes)) :
?>
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-8" data-aos="fade-up">Galería</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <?php foreach ($imagenes as $i => $img) : ?>
            <a href="<?php echo esc_url($img); ?>" class="glightbox rounded-xl overflow-hidden block cursor-zoom-in" data-gallery="proyecto" data-aos="fade-up" data-aos-delay="<?php echo $i * 60; ?>">
                <img src="<?php echo esc_url($img); ?>" alt="Proyecto - imagen <?php echo $i+1; ?>" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>
