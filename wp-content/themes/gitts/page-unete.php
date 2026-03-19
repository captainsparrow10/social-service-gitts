<?php /* Template Name: Únete a Nosotros */ get_header(); ?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6" data-aos="fade-right">
        <p class="text-slate-300 text-sm font-medium tracking-wide mb-3">Colabora</p>
        <h1 class="text-white font-light text-4xl">Únete a Nosotros</h1>
        <p class="text-slate-300 mt-3 text-lg font-light">Conecta con GITTS y participa en proyectos de investigación, innovación y desarrollo tecnológico.</p>
    </div>
</div>

<!-- Invitación -->
<section class="py-20 bg-white">
    <div class="max-w-3xl mx-auto px-6 text-center" data-aos="fade-up">
        <p class="text-slate-600 text-base leading-relaxed">Estamos en la búsqueda continua de nuevos estudiantes brillantes y creativos que muestren un fuerte interés en la investigación y en ser altamente competitivos. Si estás motivado, sientes un gran interés en los avances científicos e innovación en telecomunicaciones y procesamiento de señales, eres ambicioso y comprometido, queremos que seas parte de nuestro equipo.</p>
    </div>
</section>

<!-- How to collaborate — DaisyUI cards -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <p class="text-primary text-sm font-medium tracking-wide mb-3">Formas de participar</p>
            <h2 class="text-slate-800 font-semibold text-2xl">Cómo Colaborar</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <?php
            $colabs = [
                ['<svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/></svg>', 'Estudiantes', 'Desarrolla tu tesis con nosotros. Formación en óptica, procesamiento de señales, Python, machine learning y trabajo experimental.'],
                ['<svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714a2.25 2.25 0 0 0 .659 1.591L19 14.5M14.25 3.104c.251.023.501.05.75.082M19 14.5l-2.47 4.447A2.25 2.25 0 0 1 14.554 20.5H9.446a2.25 2.25 0 0 1-1.976-1.053L5 14.5m14 0H5"/></svg>', 'Investigadores', 'Colabora en proyectos conjuntos, publica con nosotros y amplía redes de investigación internacionales.'],
                ['<svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z"/></svg>', 'Patrocinadores', 'Personas naturales o jurídicas interesadas en la misión del grupo que se asocien y contribuyan con recursos económicos o en especie.'],
                ['<svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>', 'Aliados Estratégicos', 'Organizaciones sin fines de lucro, sociedades civiles o mercantiles, centros de investigación o de educación superior interesados en el trabajo conjunto.'],
            ];
            foreach ($colabs as $i => $c) :
            ?>
            <div class="card bg-white" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
                <div class="card-body p-8">
                    <div class="mb-2"><?php echo $c[0]; ?></div>
                    <h3 class="card-title text-primary"><?php echo $c[1]; ?></h3>
                    <p class="text-sm text-slate-600 leading-relaxed"><?php echo $c[2]; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact info + form -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Contacto directo -->
            <div data-aos="fade-right">
                <h2 class="text-primary font-semibold text-2xl mb-6">Contacto Directo</h2>
                <div class="space-y-6">
                    <div class="card bg-slate-50">
                        <div class="card-body p-6">
                            <h4 class="font-semibold text-base-content">Dra. Maytée Zambrano, Ph.D.</h4>
                            <p class="text-sm text-slate-500">UTP, Campus Víctor Levi Sasso</p>
                            <p class="text-sm text-slate-500">FIE, Edificio #1, Piso 1, Oficina #6</p>
                            <p class="text-sm mt-2">✉️ <a href="mailto:maytee.zambrano@utp.ac.pa" class="link link-primary">maytee.zambrano@utp.ac.pa</a></p>
                            <p class="text-sm">📞 (+507) 560-3061</p>
                        </div>
                    </div>
                    <div class="card bg-slate-50">
                        <div class="card-body p-6">
                            <h4 class="font-semibold text-base-content">Dr.-Ing. Carlos A. Medina C.</h4>
                            <p class="text-sm text-slate-500">UTP, Campus Víctor Levi Sasso</p>
                            <p class="text-sm text-slate-500">FIE, Decanato</p>
                            <p class="text-sm mt-2">✉️ <a href="mailto:carlos.medina@utp.ac.pa" class="link link-primary">carlos.medina@utp.ac.pa</a></p>
                            <p class="text-sm">📞 (+507) 560-3061</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulario -->
            <div data-aos="fade-left">
                <div class="card bg-slate-50 shadow-xl">
                    <div class="card-body p-8">
                        <h2 class="card-title text-primary text-2xl justify-center mb-2">¿Interesado?</h2>
                        <p class="text-center text-slate-500 text-sm mb-6">Envíanos tu información y nos pondremos en contacto.</p>
                        <form method="post" action="#" class="space-y-4">
                            <div class="form-control">
                                <label class="label"><span class="label-text font-medium text-sm">Nombre Completo</span></label>
                                <input type="text" name="nombre" placeholder="Tu nombre" class="input input-bordered w-full" required>
                            </div>
                            <div class="form-control">
                                <label class="label"><span class="label-text font-medium text-sm">Correo Electrónico</span></label>
                                <input type="email" name="email" placeholder="correo@ejemplo.com" class="input input-bordered w-full" required>
                            </div>
                            <div class="form-control">
                                <label class="label"><span class="label-text font-medium text-sm">Tipo de Colaboración</span></label>
                                <input type="hidden" name="tipo" id="tipo-hidden" value="">
                                <div class="dropdown w-full">
                                    <div tabindex="0" role="button" class="btn btn-outline border-slate-200 text-slate-600 font-normal w-full justify-between hover:bg-slate-50 hover:border-slate-300">
                                        <span class="filter-label">Seleccionar...</span>
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                                    </div>
                                    <ul tabindex="0" class="dropdown-content menu bg-white rounded-lg z-[1] w-full mt-1 p-1 shadow-lg border border-slate-200">
                                        <?php foreach (['Tesis de pregrado','Tesis de maestría / doctorado','Investigación conjunta','Patrocinador','Aliado estratégico'] as $opt) : ?>
                                        <li><a class="text-sm text-slate-600 hover:text-primary hover:bg-primary/5 rounded-md filter-option" data-value="<?php echo $opt; ?>"><?php echo $opt; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-control">
                                <label class="label"><span class="label-text font-medium text-sm">Mensaje</span></label>
                                <textarea name="mensaje" class="textarea textarea-bordered w-full h-28" placeholder="Cuéntanos sobre tu interés..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-accent w-full text-sm font-medium tracking-wide">Enviar Solicitud</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
