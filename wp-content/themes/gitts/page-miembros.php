<?php /* Template Name: Gente */ get_header(); ?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6" data-aos="fade-right">
        <p class="text-slate-300 text-sm font-medium tracking-wide mb-3">Nuestro equipo</p>
        <h1 class="text-white font-light text-4xl">Miembros</h1>
        <p class="text-slate-300 mt-3 text-lg font-light">Conozca a los investigadores, estudiantes y profesionales que impulsan la innovación en GITTS.</p>
    </div>
</div>

<!-- Miembros Core -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-12" data-aos="fade-up">
            <p class="text-primary text-sm font-medium tracking-wide mb-2">Equipo principal</p>
            <h2 class="text-slate-800 font-semibold text-2xl">Miembros</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $miembros = new WP_Query([
                'post_type' => 'miembro', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_miembro', 'field' => 'slug', 'terms' => 'miembros-core']],
            ]);
            if ($miembros->have_posts()) :
                $d = 0;
                while ($miembros->have_posts()) : $miembros->the_post();
                    $cargo = get_post_meta(get_the_ID(), 'cargo_oficial', true);
                    $email = get_post_meta(get_the_ID(), 'email_institucional', true);
                    $orcid = get_post_meta(get_the_ID(), 'link_orcid', true);
                    $rg = get_post_meta(get_the_ID(), 'link_researchgate', true);
                    $li = get_post_meta(get_the_ID(), 'link_linkedin', true);
            ?>
            <div class="card bg-white" data-aos="fade-up" data-aos-delay="<?php echo $d; ?>">
                <div class="card-body items-center text-center p-8">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('thumbnail', ['class' => 'w-32 h-32 rounded-full object-cover ring-2 ring-slate-100']); ?>
                    <?php else : ?>
                        <div class="avatar placeholder"><div class="bg-primary text-primary-content w-32 rounded-full"><span class="text-3xl font-light"><?php echo mb_substr(get_the_title(), 0, 1); ?></span></div></div>
                    <?php endif; ?>
                    <h3 class="mt-5 text-base font-medium text-slate-800"><?php the_title(); ?></h3>
                    <p class="text-slate-500 text-sm"><?php echo esc_html($cargo); ?></p>
                    <?php if ($email) : ?><p class="text-xs text-slate-400 mt-1"><?php echo esc_html($email); ?></p><?php endif; ?>
                    <div class="flex gap-2 mt-4">
                        <?php if ($email) : ?><a href="mailto:<?php echo esc_attr($email); ?>" class="btn btn-ghost btn-xs btn-square text-slate-400 hover:text-primary" title="Email">✉</a><?php endif; ?>
                        <?php if ($orcid) : ?><a href="<?php echo esc_url($orcid); ?>" target="_blank" class="btn btn-ghost btn-xs btn-square text-slate-400 hover:text-primary" title="ORCID">ID</a><?php endif; ?>
                        <?php if ($rg) : ?><a href="<?php echo esc_url($rg); ?>" target="_blank" class="btn btn-ghost btn-xs btn-square text-slate-400 hover:text-primary" title="ResearchGate">RG</a><?php endif; ?>
                        <?php if ($li) : ?><a href="<?php echo esc_url($li); ?>" target="_blank" class="btn btn-ghost btn-xs btn-square text-slate-400 hover:text-primary" title="LinkedIn">in</a><?php endif; ?>
                    </div>
                </div>
            </div>
            <?php $d += 80; endwhile; wp_reset_postdata();
            else :
                $demo = [
                    ['Dra. Maytée Zambrano', 'Investigadora Principal', 'maytee.zambrano@utp.ac.pa'],
                    ['Dr. Fernando Arias', 'Facultad de Ing. Eléctrica, UTP', 'fernando.arias@utp.ac.pa'],
                    ['Dr. Edson Galagarza', 'Facultad de Ing. Eléctrica, UTP', 'edson.galagarza@utp.ac.pa'],
                    ['Dr. Carlos A. Medina C.', 'Facultad de Ing. Eléctrica, UTP', 'carlos.medina@utp.ac.pa'],
                ];
                foreach ($demo as $i => $m) :
            ?>
            <div class="card bg-white" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                <div class="card-body items-center text-center p-8">
                    <div class="avatar placeholder"><div class="bg-primary text-primary-content w-32 rounded-full"><span class="text-3xl font-light"><?php echo mb_substr($m[0], 0, 1); ?></span></div></div>
                    <h3 class="mt-5 text-base font-medium text-slate-800"><?php echo $m[0]; ?></h3>
                    <p class="text-slate-500 text-sm"><?php echo $m[1]; ?></p>
                    <p class="text-xs text-slate-400 mt-1"><?php echo $m[2]; ?></p>
                    <div class="flex gap-2 mt-4">
                        <a href="mailto:<?php echo $m[2]; ?>" class="btn btn-ghost btn-xs btn-square text-slate-400 hover:text-primary" title="Email">✉</a>
                        <a href="#" class="btn btn-ghost btn-xs btn-square text-slate-400 hover:text-primary" title="ORCID">ID</a>
                        <a href="#" class="btn btn-ghost btn-xs btn-square text-slate-400 hover:text-primary" title="ResearchGate">RG</a>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>

        <!-- Colaboradores -->
        <div class="mt-20 mb-12" data-aos="fade-up">
            <p class="text-secondary text-sm font-medium tracking-wide mb-2">Aliados de investigación</p>
            <h2 class="text-slate-800 font-semibold text-2xl">Colaboradores</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $colab = new WP_Query([
                'post_type' => 'miembro', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_miembro', 'field' => 'slug', 'terms' => 'colaborador']],
            ]);
            if ($colab->have_posts()) :
                while ($colab->have_posts()) : $colab->the_post();
                    $cargo = get_post_meta(get_the_ID(), 'cargo_oficial', true);
            ?>
            <div class="card bg-white" data-aos="fade-up">
                <div class="card-body items-center text-center p-8">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('thumbnail', ['class' => 'w-28 h-28 rounded-full object-cover ring-2 ring-slate-100']); ?>
                    <?php else : ?>
                        <div class="avatar placeholder"><div class="bg-secondary text-secondary-content w-28 rounded-full"><span class="text-2xl font-light"><?php echo mb_substr(get_the_title(), 0, 1); ?></span></div></div>
                    <?php endif; ?>
                    <h3 class="mt-4 text-base font-medium text-slate-800"><?php the_title(); ?></h3>
                    <p class="text-slate-500 text-sm"><?php echo esc_html($cargo); ?></p>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata();
            else :
                $colab_demo = [
                    ['Guadalupe González', 'Ph.D. en Ingeniería Eléctrica, Texas A&M. Docente UTP. Intereses: teoría electromagnética, diseño y control de máquinas eléctricas.'],
                    ['Ariel Guerra-Adames', 'Asistente de investigación en GITTS. Ingeniero de telecomunicaciones (UTP, 2021). Intereses: señales biomédicas, IA, NLP.'],
                ];
                foreach ($colab_demo as $i => $c) :
            ?>
            <div class="card bg-white" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                <div class="card-body items-center text-center p-8">
                    <div class="avatar placeholder"><div class="bg-secondary text-secondary-content w-28 rounded-full"><span class="text-2xl font-light"><?php echo mb_substr($c[0], 0, 1); ?></span></div></div>
                    <h3 class="mt-4 text-base font-medium text-slate-800"><?php echo $c[0]; ?></h3>
                    <p class="text-slate-500 text-xs leading-relaxed mt-2"><?php echo $c[1]; ?></p>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>

        <!-- Colaboradores Externos -->
        <div class="mt-20 mb-12" data-aos="fade-up">
            <p class="text-accent text-sm font-medium tracking-wide mb-2">Red internacional</p>
            <h2 class="text-slate-800 font-semibold text-2xl">Colaboradores Externos</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php
            $ext = new WP_Query([
                'post_type' => 'miembro', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_miembro', 'field' => 'slug', 'terms' => 'colaborador-externo']],
            ]);
            if ($ext->have_posts()) :
                while ($ext->have_posts()) : $ext->the_post();
                    $cargo = get_post_meta(get_the_ID(), 'cargo_oficial', true);
            ?>
            <div class="card bg-white" data-aos="fade-up">
                <div class="card-body p-8">
                    <div class="flex gap-5 items-start">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('thumbnail', ['class' => 'w-20 h-20 rounded-full object-cover ring-2 ring-slate-100 flex-shrink-0']); ?>
                        <?php else : ?>
                            <div class="avatar placeholder flex-shrink-0"><div class="bg-accent text-accent-content w-20 rounded-full"><span class="text-xl font-light"><?php echo mb_substr(get_the_title(), 0, 1); ?></span></div></div>
                        <?php endif; ?>
                        <div>
                            <h3 class="text-base font-medium text-slate-800"><?php the_title(); ?></h3>
                            <p class="text-slate-500 text-sm mt-1"><?php echo esc_html($cargo); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata();
            else :
                $ext_demo = [
                    ['Emmanuel Arzuaga', 'Profesor asistente en UPRM. Ph.D. de Northeastern University. Investigación en sensado remoto y reconocimiento de patrones.'],
                    ['Edwin A. Marengo', 'Profesor asociado en Northeastern University. B.S. de la UTP (Summa Cum Laude). Más de 100 publicaciones.'],
                ];
                foreach ($ext_demo as $i => $e) :
            ?>
            <div class="card bg-white" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                <div class="card-body p-8">
                    <div class="flex gap-5 items-start">
                        <div class="avatar placeholder flex-shrink-0"><div class="bg-accent text-accent-content w-20 rounded-full"><span class="text-xl font-light"><?php echo mb_substr($e[0], 0, 1); ?></span></div></div>
                        <div>
                            <h3 class="text-base font-medium text-slate-800"><?php echo $e[0]; ?></h3>
                            <p class="text-slate-500 text-xs leading-relaxed mt-2"><?php echo $e[1]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>

        <!-- Estudiantes Activos -->
        <div class="mt-20 mb-12" data-aos="fade-up">
            <p class="text-primary text-sm font-medium tracking-wide mb-2">Formación e investigación</p>
            <h2 class="text-slate-800 font-semibold text-2xl">Estudiantes Activos</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            $est = new WP_Query([
                'post_type' => 'miembro', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_miembro', 'field' => 'slug', 'terms' => 'estudiante-activo']],
            ]);
            if ($est->have_posts()) :
                while ($est->have_posts()) : $est->the_post();
                    $cargo = get_post_meta(get_the_ID(), 'cargo_oficial', true);
            ?>
            <div class="card bg-white" data-aos="fade-up">
                <div class="card-body items-center text-center p-8">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('thumbnail', ['class' => 'w-28 h-28 rounded-full object-cover ring-2 ring-slate-100']); ?>
                    <?php else : ?>
                        <div class="avatar placeholder"><div class="bg-primary text-primary-content w-28 rounded-full"><span class="text-2xl font-light"><?php echo mb_substr(get_the_title(), 0, 1); ?></span></div></div>
                    <?php endif; ?>
                    <h3 class="mt-4 text-base font-medium text-slate-800"><?php the_title(); ?></h3>
                    <p class="text-slate-500 text-sm"><?php echo esc_html($cargo); ?></p>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata();
            else :
            ?>
            <div class="card bg-white" data-aos="fade-up">
                <div class="card-body items-center text-center p-8">
                    <div class="avatar placeholder"><div class="bg-primary text-primary-content w-28 rounded-full"><span class="text-2xl font-light">L</span></div></div>
                    <h3 class="mt-4 text-base font-medium text-slate-800">Lucas Rivas</h3>
                    <p class="text-slate-500 text-xs leading-relaxed mt-2">Completando B.S. en Ingeniería Electrónica. Intereses: data science, machine learning, telecomunicaciones.</p>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- Estudiantes Egresados -->
        <div class="mt-20 mb-12" data-aos="fade-up">
            <p class="text-slate-400 text-sm font-medium tracking-wide mb-2">Alumni</p>
            <h2 class="text-slate-800 font-semibold text-2xl">Estudiantes Egresados</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $egresados = new WP_Query([
                'post_type' => 'miembro', 'posts_per_page' => -1,
                'tax_query' => [['taxonomy' => 'tipo_miembro', 'field' => 'slug', 'terms' => 'estudiante-egresado']],
            ]);
            if ($egresados->have_posts()) :
                while ($egresados->have_posts()) : $egresados->the_post();
                    $cargo = get_post_meta(get_the_ID(), 'cargo_oficial', true);
            ?>
            <div class="card bg-slate-50 border-0" data-aos="fade-up">
                <div class="card-body p-6">
                    <h3 class="text-sm font-medium text-slate-700"><?php the_title(); ?></h3>
                    <p class="text-slate-500 text-xs leading-relaxed"><?php echo esc_html($cargo); ?></p>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata();
            else :
                $egr_demo = [
                    ['Raúl Paz Tamayo', 'Ingeniería de telecomunicaciones, UPM Madrid. Actualmente consultor en INDRA Sistemas.'],
                    ['Kiara Navarro', 'Fundadora del proyecto Clase911. Investigación en VLC con técnicas MIMO.'],
                    ['Juan Cedeño', '5to año de Ingeniería Electrónica. Investigación: eficiencia energética con muestreo compresivo.'],
                    ['Stella Chie', '5to año de Ingeniería Electrónica. Investigación: análisis de transmisión de TV digital.'],
                    ['Emigdio Iglesias', 'Tesis sobre modelado y análisis de códigos LDPC. Intereses: IA y robótica.'],
                    ['Wilfredo Rodríguez', 'Certificado CCNA. Intereses: procesamiento de señales en FPGA, codificación de canal.'],
                ];
                foreach ($egr_demo as $i => $eg) :
            ?>
            <div class="card bg-slate-50 border-0" data-aos="fade-up" data-aos-delay="<?php echo $i * 60; ?>">
                <div class="card-body p-6">
                    <h3 class="text-sm font-medium text-slate-700"><?php echo $eg[0]; ?></h3>
                    <p class="text-slate-500 text-xs leading-relaxed"><?php echo $eg[1]; ?></p>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
