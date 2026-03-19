<?php /* Template Name: Acerca de */ get_header(); ?>

<!-- Header banner -->
<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6" data-aos="fade-right">
        <p class="text-slate-300 text-sm font-medium tracking-wide mb-3">Conócenos</p>
        <h1 class="text-white font-light text-4xl">Acerca del GITTS</h1>
        <p class="text-slate-300 mt-3 text-lg font-light">Misión, visión y los valores que guían nuestra investigación.</p>
    </div>
</div>

<!-- Misión & Visión — 2 col -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">
            <div data-aos="fade-right">
                <h2 class="text-primary font-semibold text-3xl mb-6">Misión y Visión</h2>
                <div class="collapse collapse-arrow bg-slate-50 mb-4">
                    <input type="radio" name="mv" checked="checked" />
                    <div class="collapse-title text-lg font-semibold text-primary">Misión</div>
                    <div class="collapse-content">
                        <p class="text-sm leading-relaxed">Generar, validar y transferir conocimiento mediante investigación científica y desarrollo tecnológico en telecomunicaciones, procesamiento de señales y áreas afines. Con un enfoque científico riguroso y prototipos experimentales, GITTS transforma señales y datos en soluciones confiables, eficientes y seguras, formando talento e impulsando la innovación.</p>
                    </div>
                </div>
                <div class="collapse collapse-arrow bg-slate-50">
                    <input type="radio" name="mv" />
                    <div class="collapse-title text-lg font-semibold text-primary">Visión</div>
                    <div class="collapse-content">
                        <p class="text-sm leading-relaxed">Ser un grupo de investigación de referencia en Panamá y la región, reconocido por la solidez de su trabajo científico-tecnológico, la calidad de su formación y su capacidad para liderar proyectos aplicados, actuando como puente entre la academia y la industria.</p>
                    </div>
                </div>
            </div>
            <div data-aos="fade-left">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/team-field.jpg" alt="Equipo GITTS" class="rounded-2xl shadow-2xl w-full">
            </div>
        </div>
    </div>
</section>

<!-- Valores — DaisyUI cards -->
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <p class="text-primary text-sm font-medium tracking-wide mb-3">Lo que nos define</p>
            <h2 class="text-slate-800 font-semibold text-2xl">Valores Fundamentales</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <?php
            $valores = [
                ['⚖️', 'Integridad', 'Honestidad, responsabilidad y transparencia en cada etapa de la investigación.'],
                ['📚', 'Conocimiento', 'Calidad metodológica, validación experimental y mejora continua.'],
                ['💡', 'Imaginación', 'Ideas novedosas con disciplina para convertirlas en tecnología útil.'],
                ['🔬', 'Creatividad', 'Creamos tendencias tecnológicas, no solo las seguimos.'],
                ['🌍', 'Diversidad', 'Entorno diverso como fuente de creatividad y mejores soluciones.'],
                ['🤝', 'Trabajo en Equipo', 'Proyectos interdisciplinarios que aprovechan fortalezas diversas.'],
            ];
            foreach ($valores as $i => $v) :
            ?>
            <div class="card bg-white" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                <div class="card-body p-6 items-center text-center">
                    <div class="text-4xl mb-2"><?php echo $v[0]; ?></div>
                    <h4 class="card-title text-primary text-lg"><?php echo $v[1]; ?></h4>
                    <p class="text-sm text-slate-500"><?php echo $v[2]; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Objetivos — DaisyUI timeline/steps -->
<section class="py-20 bg-white">
    <div class="max-w-3xl mx-auto px-6">
        <h2 class="text-primary font-semibold text-3xl mb-10 text-center" data-aos="fade-up">Objetivos</h2>
        <ul class="steps steps-vertical w-full">
            <?php
            $objetivos = [
                'Impulsar investigación de frontera en telecomunicaciones, procesamiento de señales, IA aplicada y tecnologías emergentes.',
                'Desarrollar metodologías, prototipos e instrumentos para la medición, adquisición y análisis de señales.',
                'Formar talento humano de alto nivel, integrando estudiantes en proyectos de investigación.',
                'Fortalecer redes de colaboración nacionales e internacionales.',
                'Transferir conocimiento y tecnología a la sociedad.',
            ];
            foreach ($objetivos as $i => $obj) :
            ?>
            <li class="step step-primary" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
                <div class="text-left pl-4">
                    <p class="text-sm leading-relaxed"><?php echo $obj; ?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?php get_footer(); ?>
