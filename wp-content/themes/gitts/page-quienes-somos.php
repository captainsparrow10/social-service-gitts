<?php /* Template Name: Acerca de */ get_header(); ?>

<!-- Header banner -->
<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6" data-aos="fade-right">
        <h1 class="text-white font-light text-4xl">¿Quiénes Somos?</h1>
        <p class="text-slate-300 mt-3 text-lg font-light">En GITTS somos un equipo de investigadores dedicados a la ingeniería de las telecomunicaciones y el procesamiento de señales.</p>
    </div>
</div>

<!-- Introducción -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-start">
            <div class="lg:col-span-3 space-y-5" data-aos="fade-up">
                <h2 class="text-slate-800 font-semibold text-2xl mb-6">Sobre GITTS</h2>
                <p class="text-slate-600 text-base leading-relaxed">El Grupo de Investigación en Tecnologías Avanzadas de Telecomunicación y Procesamiento de Señales (GITTS) surge como una iniciativa estratégica para fortalecer las capacidades de investigación, innovación y formación de talento en áreas fundamentales para la ingeniería contemporánea.</p>
                <p class="text-slate-600 text-base leading-relaxed">El grupo articula de manera sostenida el trabajo científico en telecomunicaciones, procesamiento de señales, electrónica, sistemas de radiofrecuencia, sistemas ópticos, instrumentación y campos afines, integrando capacidades experimentales, analíticas y de diseño orientadas a la generación de conocimiento y al desarrollo de soluciones tecnológicas.</p>
                <p class="text-slate-600 text-base leading-relaxed">Las telecomunicaciones y el procesamiento de señales constituyen hoy pilares esenciales del desarrollo económico y social. La conectividad segura y eficiente es un habilitador clave para sectores como la salud, la educación, la industria, la energía y el medio ambiente.</p>
                <p class="text-slate-600 text-base leading-relaxed">A través de la investigación, la formación de estudiantes, la producción científica y el desarrollo de tecnologías, GITTS contribuye a consolidar una comunidad académica dinámica, fortalecer la colaboración con actores nacionales e internacionales y generar soluciones innovadoras con impacto en la sociedad.</p>
                <p class="text-slate-500 text-base leading-relaxed">De esta manera, el grupo aporta al fortalecimiento de la capacidad científica y tecnológica de la Universidad y del país, promoviendo el desarrollo sostenible y la formación de profesionales altamente calificados.</p>
            </div>
            <div class="lg:col-span-2 lg:sticky lg:top-24" data-aos="fade-left">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/team/quienes-somos.jpg" alt="Equipo GITTS en campo" class="rounded-xl w-full shadow-md">
            </div>
        </div>
    </div>
</section>

<!-- Misión y Visión -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Misión -->
            <div class="card bg-white" data-aos="fade-up">
                <div class="card-body p-10">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>
                        </div>
                        <h2 class="text-2xl font-semibold text-slate-800">Misión</h2>
                    </div>
                    <div class="text-slate-600 text-base leading-relaxed"><?php echo wp_kses_post(get_option('gitts_mision', 'Generar, validar y transferir conocimiento mediante investigación científica y desarrollo tecnológico en telecomunicaciones, procesamiento de señales y áreas afines (sensado electromagnético, instrumentación, electrónica, radiofrecuencia y óptica). Con un enfoque científico riguroso y prototipos experimentales, GITTS transforma señales y datos en soluciones confiables, eficientes y seguras, formando talento e impulsando la innovación para atender retos relevantes en la industria, el sector público y la sociedad de manera sostenible.')); ?></div>
                </div>
            </div>
            <!-- Visión -->
            <div class="card bg-white" data-aos="fade-up" data-aos-delay="100">
                <div class="card-body p-10">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center">
                            <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h2 class="text-2xl font-semibold text-slate-800">Visión</h2>
                    </div>
                    <div class="text-slate-600 text-base leading-relaxed"><?php echo wp_kses_post(get_option('gitts_vision', 'Ser un grupo de investigación de referencia en Panamá y la región, reconocido por la solidez de su trabajo científico-tecnológico y la pertinencia de sus líneas de investigación, así como por la calidad de su formación y su capacidad para liderar proyectos aplicados. GITTS aspira a consolidarse como un espacio de innovación y colaboración internacional, con impacto sostenido en el desarrollo científico, productivo y social (mejoras en telecomunicaciones, salud, energía, medio ambiente, etc.), actuando como puente entre la academia y la industria.')); ?></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Valores -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-3xl mb-12 text-center" data-aos="fade-up">Valores Fundamentales</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $valores_q = new WP_Query(['post_type' => 'valor', 'posts_per_page' => -1, 'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC']);
            if ($valores_q->have_posts()) :
                while ($valores_q->have_posts()) : $valores_q->the_post();
                    $desc = get_post_meta(get_the_ID(), 'descripcion', true);
            ?>
            <div class="card bg-white border border-slate-200 hover:shadow-md transition-shadow" data-aos="fade-up">
                <div class="card-body p-8">
                    <div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800 mb-2"><?php the_title(); ?></h3>
                    <p class="text-sm text-slate-500 leading-relaxed"><?php echo esc_html($desc); ?></p>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- Objetivos -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-3xl mb-12 text-center" data-aos="fade-up">Objetivos</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $obj_q = new WP_Query(['post_type' => 'objetivo', 'posts_per_page' => -1, 'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC']);
            if ($obj_q->have_posts()) :
                while ($obj_q->have_posts()) : $obj_q->the_post();
                    $desc = get_post_meta(get_the_ID(), 'descripcion', true);
            ?>
            <div class="card bg-white border border-slate-200 hover:border-primary/30 hover:shadow-md transition-all" data-aos="fade-up">
                <div class="card-body p-7">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>
                        </div>
                        <h3 class="text-base font-semibold text-slate-800"><?php the_title(); ?></h3>
                    </div>
                    <p class="text-sm text-slate-500 leading-relaxed"><?php echo esc_html($desc); ?></p>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
