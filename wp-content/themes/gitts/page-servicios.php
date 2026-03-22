<?php /* Template Name: Servicios */ get_header(); ?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6" data-aos="fade-right">
        <h1 class="text-white font-light text-4xl">Servicios Institucionales</h1>
        <p class="text-slate-300 mt-3 text-lg font-light">Oferta de valor técnico para la industria, el sector público y corporativo.</p>
    </div>
</div>

<section class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <div class="space-y-8">
            <?php
            $servicios = [
                [
                    'Consultoría Especializada',
                    'Asesoramiento experto en telecomunicaciones, procesamiento de señales, instrumentación y tecnologías de sensado. Evaluación técnica de sistemas, diseño de soluciones personalizadas y acompañamiento en proyectos de innovación tecnológica para empresas e instituciones públicas.',
                    'border-l-primary',
                    'text-primary',
                ],
                [
                    'Cursos y Talleres',
                    'Programas de formación técnica y capacitación especializada para profesionales. Talleres prácticos en óptica, procesamiento de señales, Python, machine learning, sensado remoto e instrumentación aplicada.',
                    'border-l-secondary',
                    'text-secondary',
                ],
                [
                    'I+D Corporativo',
                    'Colaboración estratégica de largo plazo. Diseño y construcción de prototipos, validación experimental de tecnologías, desarrollo de algoritmos y soluciones de software científico a la medida.',
                    'border-l-accent',
                    'text-accent',
                ],
            ];
            foreach ($servicios as $i => $s) :
            ?>
            <div class="card bg-white border-l-4 <?php echo $s[2]; ?>" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                <div class="card-body p-8 lg:p-10">
                    <h3 class="text-xl font-semibold text-slate-800 mb-3"><?php echo $s[0]; ?></h3>
                    <p class="text-slate-500 text-base leading-relaxed max-w-3xl mb-5"><?php echo $s[1]; ?></p>
                    <a href="<?php echo home_url('/unete'); ?>" class="<?php echo $s[3]; ?> text-sm font-medium hover:underline">Solicitar más información →</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
