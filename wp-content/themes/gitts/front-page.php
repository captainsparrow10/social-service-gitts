<?php get_header(); ?>

<!-- 1. HERO -->
<div class="hero min-h-[85vh]" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero-lab.jpg');">
    <div class="hero-overlay bg-gradient-to-br from-slate-900/90 via-primary/75 to-primary/30"></div>
    <div class="hero-content text-left w-full max-w-7xl px-6">
        <div class="max-w-2xl" data-aos="fade-right">
            <p class="text-slate-300 text-sm font-medium tracking-wide mb-4">GITTS — Universidad Tecnológica de Panamá</p>
            <h1 class="text-4xl lg:text-5xl font-light text-white leading-tight mb-6">Grupo de Investigación en Tecnologías Avanzadas de <span class="font-semibold">Telecomunicación</span> y <span class="font-semibold">Procesamiento de Señales</span></h1>
            <p class="text-slate-200 text-lg mb-10 leading-relaxed font-light">Investigación de frontera que conecta señales y datos con soluciones de impacto.</p>
            <a href="<?php echo home_url('/unete'); ?>" class="btn btn-accent btn-lg font-medium text-base">Únete a nosotros</a>
        </div>
    </div>
</div>

<!-- 2. BIENVENIDOS -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <p class="text-primary text-sm font-medium tracking-wide mb-3">Sobre nosotros</p>
                <h2 class="text-slate-800 font-semibold text-3xl mb-8 leading-tight">¡Bienvenidos!</h2>
                <p class="text-slate-600 text-base leading-relaxed mb-5">GITTS es un grupo de investigación de la Universidad Tecnológica de Panamá enfocado en generar, aplicar y divulgar conocimiento y desarrollar proyectos de investigación a diversos niveles en telecomunicaciones y procesamiento de señales.</p>
                <p class="text-slate-600 text-base leading-relaxed mb-5">Nuestras áreas de enfoque actuales incluyen: procesamiento de señales electromagnéticas, inteligencia artificial, sistemas de comunicación aplicados a energía, biomedicina, agricultura de precisión, medio ambiente y materiales.</p>
                <p class="text-slate-500 text-sm leading-relaxed mb-8">Estamos compuestos por académicos de la UTP y otras organizaciones, así como estudiantes de pregrado y posgrado.</p>
                <a href="<?php echo home_url('/unete'); ?>" class="btn btn-accent btn-sm font-medium">Únete a nosotros</a>
            </div>
            <div data-aos="fade-left">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/team-field.jpg" alt="Equipo GITTS" class="rounded-xl w-full">
            </div>
        </div>
    </div>
</section>

<!-- 3. VALORES -->
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <p class="text-primary text-sm font-medium tracking-wide mb-3">Lo que nos define</p>
            <h2 class="text-slate-800 font-semibold text-3xl mb-4">Nuestros Valores</h2>
            <p class="text-slate-500 text-base max-w-2xl mx-auto">Reconocemos que la capacidad para sobresalir en investigación, desarrollo tecnológico y academia depende de:</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            <?php
            $valores = [
                ['Integridad', 'La base de toda investigación rigurosa'],
                ['Conocimientos', 'Dominio profundo de nuestras disciplinas'],
                ['Imaginación', 'Visión para anticipar soluciones'],
                ['Creatividad', 'Nuevos enfoques para problemas complejos'],
                ['Diversidad', 'Perspectivas que enriquecen'],
                ['Trabajo en Equipo', 'Colaboración como motor de avance'],
            ];
            foreach ($valores as $i => $v) :
            ?>
            <div class="card bg-white" data-aos="fade-up" data-aos-delay="<?php echo $i * 60; ?>">
                <div class="card-body items-center text-center p-6">
                    <h4 class="font-medium text-slate-800 text-sm mb-1"><?php echo $v[0]; ?></h4>
                    <p class="text-slate-400 text-xs leading-relaxed"><?php echo $v[1]; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 4. ÁREAS DE ESPECIALIZACIÓN -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <div class="mb-14" data-aos="fade-up">
            <p class="text-primary text-sm font-medium tracking-wide mb-3">Nuestro enfoque</p>
            <h2 class="text-slate-800 font-semibold text-3xl">Áreas de Especialización</h2>
        </div>
        <div class="flex flex-wrap justify-center gap-3" data-aos="fade-up" data-aos-delay="100">
            <?php
            $tags = ['Óptica y Fotónica', 'Procesamiento de Señales', 'Inteligencia Artificial', 'Sensado Remoto', 'Sistemas de Microondas', 'Telecomunicaciones', 'IoT', 'Imágenes Hiperespectrales', 'Machine Learning', 'Sensado Compresivo', 'Radiocomunicaciones', 'Agricultura de Precisión', 'Deep Learning', 'NLP'];
            foreach ($tags as $tag) :
            ?>
                <span class="badge badge-lg badge-outline badge-primary py-3.5 px-5 text-sm font-normal"><?php echo $tag; ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 5. IMPORTANCIA DE LA INVESTIGACIÓN -->
<section class="py-24 page-header">
    <div class="max-w-3xl mx-auto px-6 text-center" data-aos="fade-up">
        <p class="text-slate-300 text-sm font-medium tracking-wide mb-4">Por qué importa</p>
        <h2 class="text-white font-semibold text-3xl mb-8">Importancia de la Investigación</h2>
        <p class="text-slate-200 text-base leading-relaxed font-light">La investigación en telecomunicaciones y procesamiento de señales es fundamental para la vida moderna. Sus aplicaciones abarcan proyectos industriales, ambientales y sociales, desarrollo profesional, certificación de productos, soluciones comerciales y adopción de estándares. En GITTS, transformamos señales y datos en soluciones de impacto para Panamá y la región.</p>
    </div>
</section>

<!-- 6. ACTUALIDAD -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <p class="text-primary text-sm font-medium tracking-wide mb-3">Últimas novedades</p>
            <h2 class="text-slate-800 font-semibold text-3xl">Actualidad</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <?php
            $news = new WP_Query(['post_type' => 'post', 'posts_per_page' => 3]);
            if ($news->have_posts()) :
                $d = 0;
                while ($news->have_posts()) : $news->the_post();
            ?>
                <div class="card bg-white" data-aos="fade-up" data-aos-delay="<?php echo $d; ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <figure><?php the_post_thumbnail('medium_large', ['class' => 'w-full h-56 object-cover']); ?></figure>
                    <?php else : ?>
                        <figure><div class="w-full h-56 bg-gradient-to-br from-slate-800 to-primary"></div></figure>
                    <?php endif; ?>
                    <div class="card-body p-6">
                        <p class="text-slate-400 text-xs font-medium"><?php echo get_the_date('d M Y'); ?></p>
                        <h3 class="card-title text-base font-medium text-slate-800"><?php the_title(); ?></h3>
                        <p class="text-sm text-slate-500 leading-relaxed"><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
                        <div class="card-actions justify-end mt-3">
                            <a href="<?php the_permalink(); ?>" class="text-primary text-sm font-medium hover:underline">Leer más →</a>
                        </div>
                    </div>
                </div>
            <?php $d += 100; endwhile; wp_reset_postdata();
            else :
                $placeholders = [
                    ['Nuevo artículo publicado en IEEE Transactions', 'Publicación sobre procesamiento de imágenes hiperespectrales con aprendizaje profundo.', 'from-slate-800 to-primary'],
                    ['Inicio del proyecto de radar para cultivos', 'Sistema de radar a bordo de drone para estimación de humedad en suelos de arroz.', 'from-slate-800 to-secondary'],
                    ['Programa UMass Dartmouth–UTP activo', 'Intercambio académico internacional en telecomunicaciones y procesamiento de señales.', 'from-slate-800 to-slate-600'],
                ];
                foreach ($placeholders as $i => $p) :
            ?>
                <div class="card bg-white" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
                    <figure><div class="w-full h-56 bg-gradient-to-br <?php echo $p[2]; ?>"></div></figure>
                    <div class="card-body p-6">
                        <p class="text-slate-400 text-xs font-medium">Mar 2026</p>
                        <h3 class="card-title text-base font-medium text-slate-800"><?php echo $p[0]; ?></h3>
                        <p class="text-sm text-slate-500 leading-relaxed"><?php echo $p[1]; ?></p>
                        <div class="card-actions justify-end mt-3">
                            <a href="#" class="text-primary text-sm font-medium hover:underline">Leer más →</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
