<?php /* Template Name: Producción Científica */ get_header(); ?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6" data-aos="fade-right">
        <p class="text-slate-300 text-sm font-medium tracking-wide mb-3">Resultados</p>
        <h1 class="text-white font-light text-4xl">Producción Científica</h1>
        <p class="text-slate-300 mt-3 text-lg font-light">Resultados que generan conocimiento: publicaciones, tesis y desarrollos tecnológicos producidos por el grupo.</p>
    </div>
</div>

<section class="py-20 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <!-- DaisyUI Tabs -->
        <div class="tabs tabs-boxed bg-slate-50 inline-flex mb-10" data-aos="fade-up">
            <button class="tab tab-active pub-tab" data-tab="publicaciones">Publicaciones</button>
            <button class="tab pub-tab" data-tab="libros">Libros</button>
            <button class="tab pub-tab" data-tab="tesis">Tesis</button>
            <button class="tab pub-tab" data-tab="conferencias">Conferencias Nacionales</button>
        </div>

        <!-- PUBLICACIONES -->
        <div id="tab-publicaciones" class="tab-panel" data-aos="fade-up">
            <h3 class="text-primary font-semibold text-xl mb-6">Artículos en Revistas y Conferencias Internacionales</h3>
            <?php
            $pubs = new WP_Query(['post_type' => 'publicacion', 'posts_per_page' => 20]);
            if ($pubs->have_posts()) :
                while ($pubs->have_posts()) : $pubs->the_post();
                    $autores = get_post_meta(get_the_ID(), '_publicacion_autores', true);
                    $revista = get_post_meta(get_the_ID(), '_publicacion_revista', true);
                    $anio = get_post_meta(get_the_ID(), '_publicacion_anio', true);
                    $doi = get_post_meta(get_the_ID(), '_publicacion_doi', true);
            ?>
                <div class="border-l-4 border-primary pl-4 mb-6">
                    <h4 class="font-semibold text-base-content text-sm"><?php the_title(); ?></h4>
                    <p class="text-xs text-slate-500 mt-1"><?php echo esc_html($autores); ?></p>
                    <p class="text-xs text-slate-400"><?php echo esc_html($revista); ?> — <?php echo esc_html($anio); ?>
                        <?php if ($doi) : ?> | <a href="<?php echo esc_url($doi); ?>" class="link link-accent text-xs" target="_blank">DOI</a><?php endif; ?>
                    </p>
                </div>
            <?php endwhile; wp_reset_postdata();
            else :
                $articulos = [
                    ['Compressive sensing approach to hyperspectral image acquisition using a single-pixel detector', 'F. Arias, M. Zambrano, E. Arzuaga', 'LACCEI — 2016'],
                    ['Target localization through compressive sampling', 'M. Zambrano, C. Medina, E. Galagarza', 'IEEE Latin America Transactions — 2015'],
                    ['A survey of LED visible light communication applications', 'C. Medina, M. Zambrano, K. Navarro', 'IJAET — 2015'],
                    ['Sparse objects localization using compressive sampling', 'M. Zambrano, C. Medina, R. Tamayo', 'IEEE Latin America Transactions — 2015'],
                    ['Direct product convolutional codes', 'C. Medina, M. Zambrano', 'LATINCOM — 2014'],
                    ['LDPC codes GUI for teaching and learning', 'C. Medina, M. Zambrano, E. Iglesias', 'CONCAPAN XXXIV — 2014'],
                    ['Object reconstruction with compressive sampling', 'M. Zambrano, C. Medina, E. Galagarza', 'CONCAPAN XXXIV — 2014'],
                    ['Sparse signal reconstruction algorithms comparison', 'M. Zambrano, F. Arias, C. Medina', 'LACCEI — 2014'],
                    ['Hand detection with computer vision', 'L. Cheung, C. Medina', 'Revista I+D Tecnológico — 2013'],
                    ['Power line communication effects analysis', 'M. Zambrano, J. Montiel', 'LACCEI — 2013'],
                    ['Graphic modules for communications teaching', 'C. Medina', 'Revista I+D Tecnológico — 2012'],
                    ['Compressive MIMO target localization', 'M. Zambrano, R. Paz', 'APANAC — 2012'],
                    ['Cramér-Rao bound for signal parameter estimation', 'E. Marengo, M. Zambrano, P. Berestesky', 'Intl J. Antennas and Propagation — 2012'],
                    ['Cramér-Rao study for compressed sensing', 'M. Zambrano, E. Marengo, D. Brady', 'IASTED — 2010'],
                    ['Coherent single-detector imaging system', 'M. Zambrano, E. Marengo, J. Fisher', 'IEEE Workshop on SPS — 2010'],
                    ['Cramér-Rao study Part II', 'E. Marengo, M. Zambrano, D. Brady', 'IASTED — 2009'],
                    ['Product convolutional codes', 'C. Medina, V. Sidorenko', 'I+D Tecnológico — 2009'],
                    ['Block to convolutional codes construction', 'V. Sidorenko, C. Medina, M. Bossert', 'ISIT — 2007'],
                    ['Error exponent for product convolutional codes', 'C. Medina, V. Sidorenko, V. Zyablov', 'Problems in Info. Transmission — 2006'],
                    ['Space-time product codes', 'C. Medina, M. Gabrowska', 'IEEE Zurich Seminar — 2006'],
                    ['Product convolutional codes construction', 'M. Bossert, C. Medina, V. Sidorenko', 'ISIT — 2005'],
                ];
                foreach ($articulos as $a) :
            ?>
                <div class="border-l-4 border-primary pl-4 mb-6">
                    <h4 class="font-semibold text-base-content text-sm"><?php echo $a[0]; ?></h4>
                    <p class="text-xs text-slate-500 mt-1"><?php echo $a[1]; ?></p>
                    <p class="text-xs text-slate-400"><?php echo $a[2]; ?></p>
                </div>
            <?php endforeach; endif; ?>
        </div>

        <!-- LIBROS -->
        <div id="tab-libros" class="tab-panel hidden">
            <h3 class="text-primary font-semibold text-xl mb-6">Libros</h3>
            <div class="border-l-4 border-secondary pl-4 mb-6">
                <h4 class="font-semibold text-base-content text-sm">Encyclopedia of Modern Optics II (capítulo)</h4>
                <p class="text-xs text-slate-500 mt-1">E.A. Marengo, M. Zambrano, E.S. Galagarza</p>
                <p class="text-xs text-slate-400">Elsevier — 2017</p>
            </div>
            <div class="border-l-4 border-secondary pl-4 mb-6">
                <h4 class="font-semibold text-base-content text-sm">Fundamentos de Ingeniería de Comunicación</h4>
                <p class="text-xs text-slate-500 mt-1">C. Medina</p>
                <p class="text-xs text-slate-400">Editorial Tecnológica UTP — 2012 | ISBN 978-9962-5534-1-0</p>
            </div>
        </div>

        <!-- TESIS -->
        <div id="tab-tesis" class="tab-panel hidden">
            <h3 class="text-primary font-semibold text-xl mb-6">Tesis de Pregrado</h3>
            <?php
            $tesis = [
                ['Sistema de comunicación por luz visible (VLC)', '2016'],
                ['Red de sensores inalámbricos para monitoreo ambiental', '2015'],
                ['Análisis de transmisión de televisión digital', '2015'],
                ['Modelado y análisis de códigos LDPC', '2014'],
                ['Reconstrucción de señales mediante sensado compresivo', '2014'],
                ['Diseño de carro radio-controlado', '2013'],
                ['Reconocimiento de gestos de mano por computadora', '2012'],
                ['Simulador de sistemas DSSS-CDMA', '2010'],
            ];
            foreach ($tesis as $t) :
            ?>
                <div class="border-l-4 border-accent pl-4 mb-6">
                    <h4 class="font-semibold text-base-content text-sm"><?php echo $t[0]; ?></h4>
                    <p class="text-xs text-slate-400">Pregrado en Ingeniería Electrónica — <?php echo $t[1]; ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- CONFERENCIAS NACIONALES -->
        <div id="tab-conferencias" class="tab-panel hidden">
            <h3 class="text-primary font-semibold text-xl mb-6">Conferencias Nacionales (APANAC)</h3>
            <?php
            $conf = [
                ['Modelado de parásitos de malaria', 'APANAC — 2016'],
                ['Modelado de eritrocitos', 'APANAC — 2016'],
                ['Propiedades de sangre para microscopía', 'APANAC — 2016'],
                ['Códigos LDPC para comunicaciones', 'APANAC — 2014'],
                ['Estimación de posición de blancos', 'APANAC — 2014'],
                ['Localización por muestreo compresivo MIMO', 'APANAC — 2012'],
                ['Análisis de señales para telecomunicaciones', 'APANAC — 2012'],
            ];
            foreach ($conf as $c) :
            ?>
                <div class="border-l-4 border-neutral pl-4 mb-6">
                    <h4 class="font-semibold text-base-content text-sm"><?php echo $c[0]; ?></h4>
                    <p class="text-xs text-slate-400"><?php echo $c[1]; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
