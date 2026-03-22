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
    <div class="max-w-4xl mx-auto px-6" data-aos="fade-up">
        <div class="prose prose-lg max-w-none space-y-5">
            <p class="text-slate-600 text-base leading-relaxed">El Grupo de Investigación en Tecnologías Avanzadas de Telecomunicación y Procesamiento de Señales (GITTS) surge como una iniciativa estratégica para fortalecer las capacidades de investigación, innovación y formación de talento en áreas fundamentales para la ingeniería contemporánea.</p>
            <p class="text-slate-600 text-base leading-relaxed">El grupo articula de manera sostenida el trabajo científico en telecomunicaciones, procesamiento de señales, electrónica, sistemas de radiofrecuencia, sistemas ópticos, instrumentación y campos afines, integrando capacidades experimentales, analíticas y de diseño orientadas a la generación de conocimiento y al desarrollo de soluciones tecnológicas.</p>
            <p class="text-slate-600 text-base leading-relaxed">Las telecomunicaciones y el procesamiento de señales constituyen hoy pilares esenciales del desarrollo económico y social. La conectividad segura y eficiente es un habilitador clave para sectores como la salud, la educación, la industria, la energía y el medio ambiente. En este contexto, fortalecer capacidades científicas y tecnológicas a nivel local resulta fundamental para diseñar, evaluar e implementar sistemas de comunicación modernos.</p>
            <p class="text-slate-600 text-base leading-relaxed">A través de la investigación, la formación de estudiantes, la producción científica y el desarrollo de tecnologías, GITTS contribuye a consolidar una comunidad académica dinámica, fortalecer la colaboración con actores nacionales e internacionales y generar soluciones innovadoras con impacto en la sociedad.</p>
            <p class="text-slate-500 text-base leading-relaxed">De esta manera, el grupo aporta al fortalecimiento de la capacidad científica y tecnológica de la Universidad y del país, promoviendo el desarrollo sostenible y la formación de profesionales altamente calificados.</p>
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
                    <p class="text-slate-600 text-base leading-relaxed">Generar, validar y transferir conocimiento mediante investigación científica y desarrollo tecnológico en telecomunicaciones, procesamiento de señales y áreas afines (sensado electromagnético, instrumentación, electrónica, radiofrecuencia y óptica). Con un enfoque científico riguroso y prototipos experimentales, GITTS transforma señales y datos en soluciones confiables, eficientes y seguras, formando talento e impulsando la innovación para atender retos relevantes en la industria, el sector público y la sociedad de manera sostenible.</p>
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
                    <p class="text-slate-600 text-base leading-relaxed">Ser un grupo de investigación de referencia en Panamá y la región, reconocido por la solidez de su trabajo científico-tecnológico y la pertinencia de sus líneas de investigación, así como por la calidad de su formación y su capacidad para liderar proyectos aplicados. GITTS aspira a consolidarse como un espacio de innovación y colaboración internacional, con impacto sostenido en el desarrollo científico, productivo y social (mejoras en telecomunicaciones, salud, energía, medio ambiente, etc.), actuando como puente entre la academia y la industria.</p>
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
            $valores = [
                ['Integridad y ética científica', 'Honestidad, responsabilidad y transparencia en cada etapa de la investigación.', '<svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>'],
                ['Rigor y excelencia', 'Calidad metodológica, validación experimental y mejora continua en nuestro trabajo.', '<svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>'],
                ['Creatividad e innovación', 'Aplicamos ideas novedosas con disciplina para convertirlas en tecnología útil. Creamos tendencias, no solo las seguimos.', '<svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18"/></svg>'],
                ['Colaboración y trabajo en equipo', 'Proyectos interdisciplinarios e interinstitucionales que aprovechan fortalezas diversas.', '<svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>'],
                ['Diversidad e inclusión', 'Entorno diverso como fuente de creatividad y mejores soluciones, alineado con estándares globales que promueven comunidad inclusiva.', '<svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"/></svg>'],
                ['Compromiso con la sociedad', 'Foco en necesidades reales; difusión clara de resultados y transferencia responsable de tecnologías.', '<svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>'],
                ['Sostenibilidad', 'Visión de largo plazo con eficiencia energética, impacto ambiental y social positivos en todos los desarrollos.', '<svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.877.293a1.125 1.125 0 01-1.3-.49l-.18-.27a1.125 1.125 0 00-1.687-.202l-.073.066"/></svg>'],
            ];
            foreach ($valores as $i => $v) :
            ?>
            <div class="card bg-white border border-slate-200 hover:shadow-md transition-shadow" data-aos="fade-up" data-aos-delay="<?php echo $i * 60; ?>">
                <div class="card-body p-8">
                    <div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">
                        <?php echo $v[2]; ?>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800 mb-2"><?php echo $v[0]; ?></h3>
                    <p class="text-sm text-slate-500 leading-relaxed"><?php echo $v[1]; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Objetivos -->
<section class="py-20 bg-slate-50">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-3xl mb-12 text-center" data-aos="fade-up">Objetivos</h2>
        <div class="space-y-6">
            <?php
            $objetivos = [
                'Impulsar investigación de frontera en telecomunicaciones, procesamiento de señales, inteligencia artificial aplicada y tecnologías emergentes, con producción científica en revistas y conferencias internacionales.',
                'Desarrollar metodologías, prototipos e instrumentos para la medición, adquisición, transmisión y análisis de señales y datos (RF, óptica, sensado avanzado, entre otros), orientados a aplicaciones científicas, industriales y sociales.',
                'Formar talento humano de alto nivel, integrando activamente a estudiantes de pregrado y posgrado en proyectos de investigación, experimentación y publicaciones científicas.',
                'Fortalecer redes de colaboración nacionales e internacionales con universidades, centros de investigación, industria y sector público para desarrollar proyectos conjuntos y acceder a financiamiento competitivo.',
                'Transferir conocimiento y tecnología a la sociedad, mediante servicios especializados, desarrollo tecnológico, consultoría y actividades de difusión científica.',
            ];
            foreach ($objetivos as $i => $obj) :
            ?>
            <div class="flex gap-5 items-start" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-semibold text-sm flex-shrink-0 mt-0.5"><?php echo $i + 1; ?></div>
                <p class="text-slate-600 text-base leading-relaxed"><?php echo $obj; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
