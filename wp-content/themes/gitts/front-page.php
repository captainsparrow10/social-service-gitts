<?php get_header(); ?>

<!-- 1. HERO -->
<?php
$hero_page = get_page_by_path('inicio');
$hero_bg = ($hero_page && has_post_thumbnail($hero_page->ID))
    ? get_the_post_thumbnail_url($hero_page->ID, 'full')
    : get_template_directory_uri() . '/assets/img/hero/hero-lab.jpg';
?>
<div class="hero min-h-[85vh]" style="background-image: url('<?php echo esc_url($hero_bg); ?>');">
    <div class="hero-overlay bg-gradient-to-br from-slate-900/90 via-primary/75 to-primary/30"></div>
    <div class="hero-content text-left w-full max-w-7xl px-6">
        <div class="max-w-2xl" data-aos="fade-right">
            <h1 class="text-4xl lg:text-5xl font-light text-white leading-tight mb-6"><?php echo wp_kses_post(get_option('gitts_hero_titulo', 'Grupo de Investigación en Tecnologías Avanzadas de <span class="font-semibold">Telecomunicación</span> y <span class="font-semibold">Procesamiento de Señales</span>')); ?></h1>
            <p class="text-slate-200 text-lg mb-10 leading-relaxed font-light"><?php echo esc_html(get_option('gitts_hero_subtitulo', 'Investigación de frontera que conecta señales y datos con soluciones de impacto.')); ?></p>
            <a href="<?php echo home_url('/unete'); ?>" class="btn btn-lg font-medium text-base bg-white text-primary border-none hover:bg-slate-100">Únete a nosotros</a>
        </div>
    </div>
</div>

<!-- 2. ACCESOS RÁPIDOS -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-slate-800 font-semibold text-3xl">Accesos Rápidos</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $accesos = [
                ['¿Quiénes somos?', 'En GITTS exploramos la ciencia detrás de las telecomunicaciones y las señales, así como sus aplicaciones. Conoce lo que nos inspira: misión, visión y valores.', '/quienes-somos', 'bg-white border border-slate-200', 'text-primary', '<svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>'],
                ['Investigación', 'Explora nuestras líneas de investigación y conoce los proyectos que impulsan nuevos avances científicos y tecnológicos.', '/investigacion', 'bg-white border border-slate-200', 'text-secondary', '<svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714a2.25 2.25 0 0 0 .659 1.591L19 14.5M14.25 3.104c.251.023.501.05.75.082M19 14.5l-2.47 4.447A2.25 2.25 0 0 1 14.554 20.5H9.446a2.25 2.25 0 0 1-1.976-1.053L5 14.5m14 0H5"/></svg>'],
                ['Infraestructura', 'Conoce las instalaciones y capacidades que sustentan nuestra investigación y desarrollo tecnológico.', '/infraestructura', 'bg-white border border-slate-200', 'text-primary', '<svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z"/></svg>'],
                ['Producción científica', 'Resultados que generan conocimiento: publicaciones, tesis y desarrollos tecnológicos producidos por el grupo.', '/produccion-cientifica', 'bg-white border border-slate-200', 'text-secondary', '<svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"/></svg>'],
                ['Nuestro equipo', 'Las personas detrás de la investigación, la tecnología y las ideas que dan vida a GITTS.', '/miembros', 'bg-white border border-slate-200', 'text-primary', '<svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>'],
                ['Únete a nosotros', 'Conecta con GITTS y participa en proyectos de investigación, innovación y desarrollo tecnológico.', '/unete', 'bg-primary text-white border-none', 'text-white', '<svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>'],
            ];
            foreach ($accesos as $i => $a) :
            ?>
            <a href="<?php echo home_url($a[2]); ?>" class="card <?php echo $a[3]; ?> hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                <div class="card-body p-8">
                    <div class="<?php echo $a[4]; ?> mb-4"><?php echo $a[5]; ?></div>
                    <h3 class="text-lg font-semibold <?php echo strpos($a[3], 'text-white') !== false ? 'text-white' : 'text-slate-800'; ?> mb-2"><?php echo $a[0]; ?></h3>
                    <p class="text-sm leading-relaxed <?php echo strpos($a[3], 'text-white') !== false ? 'text-white/80' : 'text-slate-500'; ?>"><?php echo $a[1]; ?></p>
                    <div class="mt-4">
                        <span class="text-sm font-medium <?php echo $a[4]; ?> group-hover:underline">Explorar →</span>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 3. VALORES -->
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-slate-800 font-semibold text-3xl mb-4">Nuestros Valores</h2>
            <p class="text-slate-500 text-base max-w-2xl mx-auto">Reconocemos que la capacidad para sobresalir en investigación, desarrollo tecnológico y academia depende de:</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            <?php
            $valores_q = new WP_Query(['post_type' => 'valor', 'posts_per_page' => -1, 'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC']);
            if ($valores_q->have_posts()) :
                while ($valores_q->have_posts()) : $valores_q->the_post();
                    $desc = get_post_meta(get_the_ID(), 'descripcion', true);
            ?>
            <div class="card bg-white" data-aos="fade-up">
                <div class="card-body items-center text-center p-6">
                    <h4 class="font-medium text-slate-800 text-sm mb-1"><?php the_title(); ?></h4>
                    <p class="text-slate-400 text-xs leading-relaxed"><?php echo esc_html($desc); ?></p>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- 4. ÁREAS DE ESPECIALIZACIÓN -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <div class="mb-14" data-aos="fade-up">
            <h2 class="text-slate-800 font-semibold text-3xl">Áreas de Especialización</h2>
        </div>
        <div class="flex flex-wrap justify-center gap-3" data-aos="fade-up" data-aos-delay="100">
            <?php
            $esp_q = new WP_Query(['post_type' => 'especializacion', 'posts_per_page' => -1, 'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC']);
            if ($esp_q->have_posts()) :
                while ($esp_q->have_posts()) : $esp_q->the_post();
            ?>
                <span class="badge badge-lg badge-outline badge-primary py-3.5 px-5 text-sm font-normal"><?php the_title(); ?></span>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- 5. IMPORTANCIA DE LA INVESTIGACIÓN -->
<section class="py-24 page-header">
    <div class="max-w-3xl mx-auto px-6 text-center" data-aos="fade-up">
        <h2 class="text-white font-semibold text-3xl mb-8">Importancia de la Investigación</h2>
        <p class="text-slate-200 text-base leading-relaxed font-light">La investigación en telecomunicaciones y procesamiento de señales es fundamental para la vida moderna. Sus aplicaciones abarcan proyectos industriales, ambientales y sociales, desarrollo profesional, certificación de productos, soluciones comerciales y adopción de estándares. En GITTS, transformamos señales y datos en soluciones de impacto para Panamá y la región.</p>
    </div>
</section>

<!-- 6. ACTUALIDAD -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
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
