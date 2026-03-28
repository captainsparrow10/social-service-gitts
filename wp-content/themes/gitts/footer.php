<!-- FOOTER -->
<?php
$telefono = get_option('gitts_telefono', '(+507) 560-3061');
$email = get_option('gitts_email_contacto', 'gitts@utp.ac.pa');
$direccion = get_option('gitts_direccion', 'Edificio de Investigación e Innovación (ELII), Piso 2');
$campus = get_option('gitts_campus', 'Campus Víctor Levi Sasso, Universidad Tecnológica de Panamá, Ciudad de Panamá');
?>
<footer class="footer footer-gradient text-slate-200 p-14 mt-auto">
    <aside>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/logo-utp.png" alt="Universidad Tecnológica de Panamá" class="h-24 w-auto mb-4">
    </aside>
    <aside>
        <div class="flex items-center gap-3 mb-3">
            <img src="<?php echo esc_url(gitts_get_logo_url()); ?>" alt="<?php bloginfo('name'); ?>" class="h-14 w-auto">
            <span class="text-white font-semibold text-lg tracking-tight"><?php bloginfo('name'); ?></span>
        </div>
        <p class="max-w-xs text-sm text-slate-300 leading-relaxed"><?php echo esc_html(get_option('gitts_descripcion_grupo', 'Grupo de Investigación en Tecnologías Avanzadas de Telecomunicación y Procesamiento de Señales.')); ?></p>
        <p class="text-xs text-slate-400 mt-3"><?php echo esc_html(get_option('gitts_institucion', 'Universidad Tecnológica de Panamá')); ?></p>
    </aside>
    <nav>
        <h6 class="text-white font-medium text-sm mb-3 tracking-wide">Navegación</h6>
        <a href="<?php echo home_url(); ?>" class="link link-hover text-sm text-slate-300 hover:text-white block">Inicio</a>
        <a href="<?php echo home_url('/quienes-somos'); ?>" class="link link-hover text-sm text-slate-300 hover:text-white block">¿Quiénes somos?</a>
        <a href="<?php echo home_url('/investigacion'); ?>" class="link link-hover text-sm text-slate-300 hover:text-white block">Investigación</a>
        <a href="<?php echo home_url('/infraestructura'); ?>" class="link link-hover text-sm text-slate-300 hover:text-white block">Infraestructura</a>
        <a href="<?php echo home_url('/produccion-cientifica'); ?>" class="link link-hover text-sm text-slate-300 hover:text-white block">Producción científica</a>
        <a href="<?php echo home_url('/equipo'); ?>" class="link link-hover text-sm text-slate-300 hover:text-white block">Nuestro equipo</a>
        <a href="<?php echo home_url('/noticias'); ?>" class="link link-hover text-sm text-slate-300 hover:text-white block">Noticias</a>
    </nav>
    <nav>
        <h6 class="text-white font-medium text-sm mb-3 tracking-wide">Contacto</h6>
        <p class="text-sm text-slate-300"><?php echo esc_html($direccion); ?></p>
        <p class="text-sm text-slate-300">Tel: <?php echo esc_html($telefono); ?></p>
        <p class="text-sm text-slate-300"><?php echo esc_html($email); ?></p>
        <a href="<?php echo home_url('/unete'); ?>" class="btn btn-sm text-sm font-medium mt-4 bg-white text-primary border-none hover:bg-slate-100">Únete a nosotros</a>
    </nav>
    <nav>
        <h6 class="text-white font-medium text-sm mb-3 tracking-wide">Campus</h6>
        <p class="text-sm text-slate-300"><?php echo esc_html($campus); ?></p>
    </nav>
</footer>
<footer class="footer footer-center text-slate-400 border-t border-white/5 p-4">
    <p class="text-xs">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> — <?php echo esc_html(get_option('gitts_institucion', 'Universidad Tecnológica de Panamá')); ?>. Todos los derechos reservados.</p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
