<?php /* Template Name: Investigación */ get_header(); ?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6" data-aos="fade-right">
        <p class="text-slate-300 text-sm font-medium tracking-wide mb-3">Nuestro trabajo</p>
        <h1 class="text-white font-light text-4xl">Investigación</h1>
        <p class="text-slate-300 mt-3 text-lg font-light">Líneas de investigación y proyectos activos del grupo.</p>
    </div>
</div>

<!-- Líneas de Investigación -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <p class="text-primary text-sm font-medium tracking-wide mb-3">Áreas de enfoque</p>
            <h2 class="text-slate-800 font-semibold text-2xl">Líneas de Investigación</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php
            $lineas = [
                ['<svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714a2.25 2.25 0 0 0 .659 1.591L19 14.5M14.25 3.104c.251.023.501.05.75.082M19 14.5l-2.47 4.447A2.25 2.25 0 0 1 14.554 20.5H9.446a2.25 2.25 0 0 1-1.976-1.053L5 14.5m14 0H5"/></svg>', 'Óptica y Fotónica', 'Adquisición de imágenes de sensado compresivo.'],
                ['<svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>', 'Procesamiento de Señales', 'Espectrometría para estudios de materiales.'],
                ['<svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h9a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 15.75 4.5h-9A2.25 2.25 0 0 0 4.5 6.75v10.5A2.25 2.25 0 0 0 6.75 19.5Zm.75-12h1.5m3 0h1.5m-6 3h1.5m3 0h1.5m-6 3h1.5m3 0h1.5"/></svg>', 'Inteligencia Artificial', 'Clasificación y estudios de materiales; procesamiento de lenguaje natural (NLP).'],
                ['<svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/></svg>', 'Sensado Remoto', 'Estimación remota de aptitud de cultivos, detección de florecimientos de algas, detección de imperfecciones en metales.'],
                ['<svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.288 15.038a5.25 5.25 0 0 1 7.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 0 1 1.06 0Z"/></svg>', 'Sistemas Avanzados de Microondas', 'Aplicaciones biomédicas.'],
                ['<svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 3.75 9.375v-4.5ZM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 0 1-1.125-1.125v-4.5ZM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 13.5 9.375v-4.5Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75ZM6.75 16.5h.75v.75h-.75v-.75ZM16.5 6.75h.75v.75h-.75v-.75ZM13.5 13.5h.75v.75h-.75v-.75ZM13.5 19.5h.75v.75h-.75v-.75ZM19.5 13.5h.75v.75h-.75v-.75ZM19.5 19.5h.75v.75h-.75v-.75ZM16.5 16.5h.75v.75h-.75v-.75Z"/></svg>', 'Sistemas de Información Inalámbrica', 'Estudios de robustez y velocidad de sistemas de transmisión de datos.'],
            ];
            foreach ($lineas as $i => $l) :
            ?>
            <div class="card bg-slate-50" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                <div class="card-body p-6">
                    <div class="mb-2"><?php echo $l[0]; ?></div>
                    <h3 class="card-title text-primary text-lg"><?php echo $l[1]; ?></h3>
                    <p class="text-sm text-slate-500 leading-relaxed"><?php echo $l[2]; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Filtros -->
<section class="pb-10 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-white rounded-2xl p-6 flex flex-wrap gap-4 items-end shadow-sm" data-aos="fade-up">
            <!-- Dropdown Año -->
            <div class="form-control flex-1 min-w-[180px]">
                <label class="label"><span class="label-text font-medium text-sm">Año de Inicio</span></label>
                <div class="dropdown w-full">
                    <div tabindex="0" role="button" class="btn btn-sm btn-outline border-slate-200 text-slate-600 font-normal w-full justify-between hover:bg-slate-50 hover:border-slate-300">
                        <span class="filter-label">Seleccionar Año</span>
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                    </div>
                    <ul tabindex="0" class="dropdown-content menu bg-white rounded-lg z-[1] w-full mt-1 p-1 shadow-lg border border-slate-200">
                        <?php foreach (['2026','2025','2024','2023','2022','2021','2020','2019','2018'] as $y) : ?>
                        <li><a class="text-sm text-slate-600 hover:text-primary hover:bg-primary/5 rounded-md filter-option" data-value="<?php echo $y; ?>"><?php echo $y; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- Dropdown Estado -->
            <div class="form-control flex-1 min-w-[180px]">
                <label class="label"><span class="label-text font-medium text-sm">Estado del Proyecto</span></label>
                <div class="dropdown w-full">
                    <div tabindex="0" role="button" class="btn btn-sm btn-outline border-slate-200 text-slate-600 font-normal w-full justify-between hover:bg-slate-50 hover:border-slate-300">
                        <span class="filter-label">Todos los estados</span>
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                    </div>
                    <ul tabindex="0" class="dropdown-content menu bg-white rounded-lg z-[1] w-full mt-1 p-1 shadow-lg border border-slate-200">
                        <li><a class="text-sm text-slate-600 hover:text-primary hover:bg-primary/5 rounded-md filter-option" data-value="all">Todos</a></li>
                        <li><a class="text-sm text-slate-600 hover:text-primary hover:bg-primary/5 rounded-md filter-option" data-value="en-progreso">En progreso</a></li>
                        <li><a class="text-sm text-slate-600 hover:text-primary hover:bg-primary/5 rounded-md filter-option" data-value="concluido">Concluido</a></li>
                    </ul>
                </div>
            </div>
            <button class="btn btn-accent btn-sm text-sm font-medium">Buscar</button>
        </div>
    </div>
</section>

<!-- Projects Grid -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <p class="text-primary text-sm font-medium tracking-wide mb-3">Portafolio</p>
            <h2 class="text-slate-800 font-semibold text-2xl">Proyectos</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <?php
            $proyectos = new WP_Query(['post_type' => 'proyecto', 'posts_per_page' => 9]);
            if ($proyectos->have_posts()) :
                $d = 0;
                while ($proyectos->have_posts()) : $proyectos->the_post();
                    $estado = get_post_meta(get_the_ID(), 'estado_proyecto', true);
                    $fecha = get_post_meta(get_the_ID(), 'fecha_inicio', true);
                    $badge = ($estado === 'Concluido') ? 'badge-info' : 'badge-success';
                    $estado_text = $estado ?: 'En progreso';
            ?>
            <div class="card bg-white" data-aos="fade-up" data-aos-delay="<?php echo $d; ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <figure><?php the_post_thumbnail('medium_large', ['class' => 'w-full h-48 object-cover']); ?></figure>
                <?php else : ?>
                    <figure><div class="w-full h-48 bg-gradient-to-br from-primary to-primary/70"></div></figure>
                <?php endif; ?>
                <div class="card-body p-6">
                    <div class="badge <?php echo $badge; ?> badge-sm font-medium"><?php echo esc_html($estado_text); ?></div>
                    <h3 class="card-title text-base"><?php the_title(); ?></h3>
                    <?php if ($fecha) : ?>
                        <p class="text-xs text-slate-400">📅 Inicio: <?php echo esc_html($fecha); ?></p>
                    <?php endif; ?>
                    <div class="card-actions justify-end mt-2">
                        <a href="<?php the_permalink(); ?>" class="text-primary text-sm font-medium hover:underline">Leer más →</a>
                    </div>
                </div>
            </div>
            <?php $d += 100; endwhile; wp_reset_postdata();
            else :
                $projects = [
                    ['Plataforma de Observación de Florecimientos de Algas en Regiones Costeras Utilizando Imágenes Hiperespectrales e Inteligencia Artificial', 'En progreso', 'SENACYT FID-21-207', 'IP: Fernando Arias', 'from-primary to-blue-900'],
                    ['Desarrollo de una Plataforma de Inspección Rápida de Buques Marinos Basada en Técnicas de Sensores Remotos', 'En progreso', 'SENACYT IOML-21-06', 'IP: Fernando Arias', 'from-secondary to-emerald-800'],
                    ['Repositorio Nacional Georeferenciado para el Sistema de Respuesta al COVID-19 y Análisis Multivariado de Efectos de la Epidemia', 'Concluido', 'SENACYT COVID-026', 'IP: Maytée Zambrano', 'from-purple-700 to-purple-900'],
                    ['Plataforma de Adquisición de Imágenes Hiperespectrales Asistida por Técnicas de Aprendizaje Automatizado para Identificación de Aptitud de Cultivos de Arroz', 'Concluido', 'SENACYT FID-18-096', 'IP: Maytée Zambrano', 'from-amber-700 to-amber-900'],
                ];
                foreach ($projects as $i => $p) :
            ?>
            <div class="card bg-white" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
                <figure><div class="w-full h-48 bg-gradient-to-br <?php echo $p[4]; ?>"></div></figure>
                <div class="card-body p-6">
                    <div class="flex flex-wrap gap-2">
                        <div class="badge <?php echo ($p[1]==='Concluido') ? 'badge-info' : 'badge-success'; ?> badge-sm font-medium"><?php echo $p[1]; ?></div>
                        <div class="badge badge-outline badge-primary badge-sm"><?php echo $p[2]; ?></div>
                    </div>
                    <h3 class="card-title text-base"><?php echo $p[0]; ?></h3>
                    <p class="text-xs text-slate-400"><?php echo $p[3]; ?></p>
                    <div class="card-actions justify-end mt-2">
                        <a href="#" class="text-primary text-sm font-medium hover:underline">Leer más →</a>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
