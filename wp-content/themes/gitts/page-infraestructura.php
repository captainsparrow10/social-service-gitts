<?php /* Template Name: Infraestructura */ get_header(); ?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6" data-aos="fade-right">
        <p class="text-slate-300 text-sm font-medium tracking-wide mb-3">Recursos</p>
        <h1 class="text-white font-light text-4xl">Infraestructura</h1>
        <p class="text-slate-300 mt-3 text-lg font-light">Conoce las instalaciones y capacidades que sustentan nuestra investigación y desarrollo tecnológico.</p>
    </div>
</div>

<!-- Laboratorios -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <p class="text-primary text-sm font-medium tracking-wide mb-3">Espacios equipados para investigación y experimentación</p>
            <h2 class="text-slate-800 font-semibold text-2xl">Nuestros Laboratorios</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <?php
            $labs = [
                ['from-primary to-primary/70', 'Laboratorio de Óptica y Sensado', 'Equipado con espectrómetros, dispositivos DMD, cámaras hiperespectrales y sistemas de iluminación controlada para adquisición de imágenes espectrales.'],
                ['from-secondary to-emerald-800', 'Laboratorio de Telecomunicaciones y RF', 'Analizadores de espectro, generadores de señales, equipos de radiofrecuencia y antenas para investigación en comunicaciones inalámbricas.'],
                ['from-purple-700 to-purple-900', 'Laboratorio de Procesamiento de Señales', 'Estaciones de trabajo con GPU para procesamiento intensivo, servidores de cómputo y software especializado para análisis de datos y machine learning.'],
            ];
            foreach ($labs as $i => $l) :
            ?>
            <div class="card bg-white" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
                <figure><div class="w-full h-48 bg-gradient-to-br <?php echo $l[0]; ?>"></div></figure>
                <div class="card-body p-6">
                    <h3 class="card-title text-primary"><?php echo $l[1]; ?></h3>
                    <p class="text-sm text-slate-500 leading-relaxed"><?php echo $l[2]; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Equipamiento -->
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <p class="text-primary text-sm font-medium tracking-wide mb-3">Instrumentación</p>
            <h2 class="text-slate-800 font-semibold text-2xl">Equipamiento Principal</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-10">
            <?php
            $equipos = [
                ['🔬', 'Espectrómetros', 'Equipos de alta resolución para análisis espectral en rangos visible e infrarrojo cercano.'],
                ['💻', 'DMD', 'Dispositivos de microespejos digitales para muestreo compresivo y adquisición de imágenes.'],
                ['✈️', 'Drones con Sensores', 'Vehículos aéreos no tripulados equipados con cámaras y sensores para teledetección.'],
                ['📷', 'Cámaras Hiperespectrales', 'Sistemas de imagen que capturan información en cientos de bandas espectrales.'],
                ['📡', 'Analizadores de Espectro', 'Instrumentos para medición y análisis de señales en el dominio de frecuencia.'],
                ['🖥️', 'Servidores de Cómputo', 'Estaciones de trabajo con GPUs de alto rendimiento para entrenamiento de modelos de IA.'],
            ];
            foreach ($equipos as $i => $e) :
            ?>
            <div class="card bg-white" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                <div class="card-body p-6 items-center text-center">
                    <div class="text-4xl mb-2"><?php echo $e[0]; ?></div>
                    <h4 class="card-title text-primary text-base"><?php echo $e[1]; ?></h4>
                    <p class="text-xs text-slate-500"><?php echo $e[2]; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Capacidades -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <p class="text-primary text-sm font-medium tracking-wide mb-3">Competencias</p>
            <h2 class="text-slate-800 font-semibold text-2xl">Capacidades Técnicas</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10">
            <?php
            $caps = [
                ['Sensado Remoto', 'Adquisición y análisis de datos desde plataformas aéreas y satelitales.'],
                ['Óptica Avanzada', 'Diseño y construcción de sistemas ópticos especializados.'],
                ['Procesamiento de Señales', 'Algoritmos avanzados para análisis, filtrado y clasificación.'],
                ['Radiofrecuencia', 'Diseño y medición de sistemas de comunicación inalámbrica.'],
            ];
            foreach ($caps as $i => $c) :
            ?>
            <div class="card bg-primary text-primary-content shadow-lg" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
                <div class="card-body p-6 items-center text-center">
                    <h4 class="card-title text-lg"><?php echo $c[0]; ?></h4>
                    <p class="text-primary-content/70 text-xs"><?php echo $c[1]; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
