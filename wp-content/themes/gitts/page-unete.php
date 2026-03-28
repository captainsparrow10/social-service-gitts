<?php /* Template Name: Únete a Nosotros */ get_header(); ?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6">
        <h1 class="text-white font-light text-4xl">Únete a Nosotros</h1>
        <p class="text-slate-300 mt-3 text-lg font-light max-w-3xl">Conecta con GITTS y participa en proyectos de investigación, innovación y desarrollo tecnológico.</p>
    </div>
</div>

<!-- Imagen -->
<section>
    <?php
    $unete_img = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_template_directory_uri() . '/assets/img/team/unete-hero.jpg';
    ?>
    <img src="<?php echo esc_url($unete_img); ?>" alt="Equipo GITTS" class="w-full h-[800px] object-cover">
</section>

<!-- Introducción -->
<section class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-6 text-center space-y-4">
        <p class="text-slate-600 text-base leading-relaxed"><?php echo wp_kses_post(get_option('gitts_intro_unete', '')); ?></p>
    </div>
</section>

<!-- Cómo Colaborar -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-10 text-center"><?php echo esc_html(get_option('gitts_sec_como_colaborar', 'Cómo Colaborar')); ?></h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php
            $colabs_q = new WP_Query(['post_type' => 'colaboracion', 'posts_per_page' => -1, 'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC']);
            if ($colabs_q->have_posts()) :
                while ($colabs_q->have_posts()) : $colabs_q->the_post();
                    $descripcion = get_post_meta(get_the_ID(), 'descripcion', true);
            ?>
            <div class="card bg-white border border-slate-200 hover:border-primary/30 transition-colors">
                <div class="card-body p-8">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary mb-3">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800 mb-2"><?php the_title(); ?></h3>
                    <p class="text-sm text-slate-500 leading-relaxed"><?php echo esc_html($descripcion); ?></p>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- Servicios Institucionales -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-slate-800 font-semibold text-2xl mb-10 text-center"><?php echo esc_html(get_option('gitts_sec_servicios', 'Servicios Institucionales')); ?></h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <?php
            $serv_q = new WP_Query(['post_type' => 'servicio', 'posts_per_page' => -1, 'meta_key' => 'orden', 'orderby' => 'meta_value_num', 'order' => 'ASC']);
            if ($serv_q->have_posts()) :
                while ($serv_q->have_posts()) : $serv_q->the_post();
                    $descripcion = get_post_meta(get_the_ID(), 'descripcion', true);
            ?>
            <div class="card bg-white border border-slate-200 hover:shadow-md transition-all">
                <div class="card-body p-8">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary mb-3">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155"/></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800 mb-2"><?php the_title(); ?></h3>
                    <p class="text-sm text-slate-500 leading-relaxed"><?php echo esc_html($descripcion); ?></p>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- Contacto + Formulario -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Contacto -->
            <div>
                <h2 class="text-slate-800 font-semibold text-2xl mb-6">Contacto</h2>
                <div class="card bg-white border border-slate-200">
                    <div class="card-body p-8 space-y-4">
                        <div class="flex gap-3 items-start">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                            <div>
                                <p class="text-sm font-medium text-slate-700"><?php echo esc_html(get_option('gitts_direccion', '')); ?></p>
                                <p class="text-sm text-slate-500"><?php echo esc_html(get_option('gitts_campus', '')); ?></p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-center">
                            <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
                            <p class="text-sm text-slate-700"><?php echo esc_html(get_option('gitts_telefono', '')); ?></p>
                        </div>
                        <div class="flex gap-3 items-center">
                            <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                            <a href="mailto:<?php echo esc_attr(get_option('gitts_email_contacto', 'gitts@utp.ac.pa')); ?>" class="text-sm text-primary hover:underline"><?php echo esc_html(get_option('gitts_email_contacto', 'gitts@utp.ac.pa')); ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulario -->
            <div>
                <div class="card bg-white border border-slate-200">
                    <div class="card-body p-8">
                        <h2 class="text-slate-800 font-semibold text-xl mb-2 text-center"><?php echo esc_html(get_option('gitts_unete_form_titulo', '¿Interesado?')); ?></h2>
                        <p class="text-center text-slate-500 text-sm mb-6"><?php echo esc_html(get_option('gitts_unete_form_subtitulo', 'Envíanos tu información y nos pondremos en contacto.')); ?></p>
                        <?php
                        if (isset($_POST['gitts_unete_submit'])) {
                            $to = get_option('gitts_email_contacto', 'gitts@utp.ac.pa');
                            $nombre = sanitize_text_field($_POST['nombre'] ?? '');
                            $email_from = sanitize_email($_POST['email'] ?? '');
                            $tipo = sanitize_text_field($_POST['tipo'] ?? 'No especificado');
                            $mensaje = sanitize_textarea_field($_POST['mensaje'] ?? '');
                            $subject = 'Nueva solicitud de colaboración — ' . $nombre;
                            $body = "Nombre: $nombre\nCorreo: $email_from\nTipo: $tipo\n\nMensaje:\n$mensaje";
                            $headers = ['From: ' . $nombre . ' <' . $email_from . '>', 'Reply-To: ' . $email_from];
                            $sent = wp_mail($to, $subject, $body, $headers);
                            if ($sent) {
                                echo '<div class="alert alert-success mb-4 text-sm"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg> Solicitud enviada correctamente. Nos pondremos en contacto.</div>';
                            } else {
                                echo '<div class="alert alert-error mb-4 text-sm">Error al enviar. Intenta de nuevo o escríbenos a ' . esc_html($to) . '</div>';
                            }
                        }
                        ?>
                        <form method="post" action="" class="space-y-4">
                            <input type="hidden" name="gitts_unete_submit" value="1">
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
                                        <?php
                                        $opciones_form = json_decode(get_option('gitts_unete_opciones', '[]'), true);
                                        if (!$opciones_form) $opciones_form = [['titulo'=>'Tesis de pregrado'],['titulo'=>'Tesis de maestría / doctorado'],['titulo'=>'Investigación conjunta'],['titulo'=>'Patrocinador'],['titulo'=>'Aliado estratégico']];
                                        foreach ($opciones_form as $opt_item) : $opt = $opt_item['titulo']; ?>
                                        <li><a class="text-sm text-slate-600 hover:text-primary hover:bg-primary/5 rounded-md filter-option" data-value="<?php echo $opt; ?>"><?php echo $opt; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-control">
                                <label class="label"><span class="label-text font-medium text-sm">Mensaje</span></label>
                                <textarea name="mensaje" class="textarea textarea-bordered w-full h-28" placeholder="Cuéntanos sobre tu interés..."></textarea>
                            </div>
                            <button type="submit" class="btn w-full text-sm font-medium tracking-wide bg-primary text-white border-none hover:bg-primary/90"><?php echo esc_html(get_option('gitts_unete_form_btn', 'Enviar Solicitud')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
