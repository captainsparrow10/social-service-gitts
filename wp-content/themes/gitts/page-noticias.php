<?php /* Template Name: Actualidad */ get_header(); ?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6" data-aos="fade-right">
        <p class="text-slate-300 text-sm font-medium tracking-wide mb-3">Mantente informado</p>
        <h1 class="text-white font-light text-4xl">Noticias</h1>
        <p class="text-slate-300 mt-3 text-lg font-light">Actividades, logros y novedades de GITTS.</p>
    </div>
</div>

<!-- Filtros — tabs underline -->
<section class="py-8 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex gap-1" data-aos="fade-up">
            <button class="tab-underline tab-active news-tab" data-filter="all">Todas</button>
            <button class="tab-underline news-tab" data-filter="investigacion">Investigación</button>
            <button class="tab-underline news-tab" data-filter="proyectos">Proyectos y Colaboraciones</button>
            <button class="tab-underline news-tab" data-filter="vida">Vida Académica</button>
        </div>
    </div>
</section>

<!-- Grid de noticias -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <?php
            $noticias = new WP_Query(['post_type' => 'post', 'posts_per_page' => 9]);
            if ($noticias->have_posts()) :
                $d = 0;
                while ($noticias->have_posts()) : $noticias->the_post();
                    $cats = get_the_category();
                    $cat_name = $cats ? $cats[0]->name : 'General';
                    $badge_class = 'badge-outline badge-primary';
                    if ($cats) {
                        $slug = $cats[0]->slug;
                        if (strpos($slug, 'proyecto') !== false || strpos($slug, 'colabora') !== false) $badge_class = 'badge-outline badge-secondary';
                        elseif (strpos($slug, 'vida') !== false || strpos($slug, 'academ') !== false) $badge_class = 'badge-outline badge-accent';
                    }
            ?>
                <div class="card bg-white" data-aos="fade-up" data-aos-delay="<?php echo $d; ?>">
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
            <?php $d += 80; endwhile; wp_reset_postdata();
            else :
                $placeholders = [
                    ['Investigación', 'badge-outline badge-primary', 'Artículo publicado en IEEE sobre sensado compresivo hiperespectral', 'Publicación de F. Arias, M. Zambrano y E. Arzuaga sobre adquisición de imágenes hiperespectrales con detector de un solo píxel presentada en LACCEI.', 'from-slate-800 to-primary'],
                    ['Proyectos', 'badge-outline badge-secondary', 'SENACYT aprueba proyecto FID-21-207 de florecimientos de algas', 'Nuevo financiamiento para plataforma de observación de florecimientos de algas en regiones costeras utilizando imágenes hiperespectrales e inteligencia artificial.', 'from-slate-800 to-secondary'],
                    ['Vida Académica', 'badge-outline badge-accent', 'Publicación del libro "Fundamentos de Ingeniería de Comunicación"', 'El Dr. Carlos Medina publica libro de texto a través de Editorial Tecnológica UTP, recurso fundamental para cursos de telecomunicaciones.', 'from-slate-800 to-slate-600'],
                    ['Proyectos', 'badge-outline badge-secondary', 'Plataforma de inspección rápida de buques marinos', 'Proyecto SENACYT IOML-21-06 para desarrollo de plataforma basada en sensores remotos para inspección de buques del Canal de Panamá.', 'from-slate-800 to-secondary'],
                    ['Investigación', 'badge-outline badge-primary', 'Capítulo publicado en Encyclopedia of Modern Optics II', 'E.A. Marengo, M. Zambrano y E.S. Galagarza contribuyen capítulo a la enciclopedia de Elsevier sobre óptica moderna.', 'from-slate-800 to-primary'],
                    ['Vida Académica', 'badge-outline badge-accent', 'Participación en CONCAPAN XXXIV', 'Presentaciones del grupo en el congreso centroamericano sobre códigos LDPC y reconstrucción de objetos mediante muestreo compresivo.', 'from-slate-800 to-slate-600'],
                    ['Proyectos', 'badge-outline badge-secondary', 'Repositorio Nacional Georeferenciado COVID-19', 'Proyecto SENACYT COVID-026 para análisis multivariado de efectos de la epidemia en Panamá. IP: Dra. Maytée Zambrano.', 'from-slate-800 to-secondary'],
                    ['Investigación', 'badge-outline badge-primary', 'Publicación sobre localización de blancos con muestreo compresivo', 'Artículo de M. Zambrano, C. Medina y E. Galagarza en IEEE Latin America Transactions.', 'from-slate-800 to-primary'],
                    ['Vida Académica', 'badge-outline badge-accent', 'Defensa de tesis sobre comunicación por luz visible (VLC)', 'Estudiante defiende exitosamente tesis de pregrado sobre sistemas de comunicación por luz visible.', 'from-slate-800 to-slate-600'],
                ];
                foreach ($placeholders as $i => $p) :
            ?>
                <div class="card bg-white" data-aos="fade-up" data-aos-delay="<?php echo $i * 60; ?>">
                    <figure><div class="w-full h-56 bg-gradient-to-br <?php echo $p[4]; ?>"></div></figure>
                    <div class="card-body p-6">
                        <div class="flex items-center gap-3">
                            <span class="badge <?php echo $p[1]; ?> badge-sm font-normal"><?php echo $p[0]; ?></span>
                        </div>
                        <h3 class="text-base font-medium text-slate-800 mt-2"><?php echo $p[2]; ?></h3>
                        <p class="text-sm text-slate-500 leading-relaxed"><?php echo $p[3]; ?></p>
                        <div class="card-actions justify-end mt-3">
                            <a href="#" class="text-primary text-sm font-medium hover:underline">Leer más →</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>

        <div class="text-center mt-16">
            <button class="btn btn-outline btn-primary font-medium">Cargar más noticias</button>
        </div>
    </div>
</section>

<?php get_footer(); ?>
