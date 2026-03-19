<!-- FOOTER -->
<footer class="footer footer-gradient text-slate-200 p-14 mt-auto">
    <aside>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-digital.png" alt="GITTS" class="h-12 w-auto brightness-0 invert opacity-90 mb-3">
        <p class="max-w-xs text-sm text-slate-300 leading-relaxed">Grupo de Investigación en Tecnologías Avanzadas de Telecomunicación y Procesamiento de Señales.</p>
        <p class="text-xs text-slate-400 mt-3">Universidad Tecnológica de Panamá</p>
    </aside>
    <nav>
        <h6 class="text-white font-medium text-sm mb-3 tracking-wide">Navegación</h6>
        <a href="<?php echo home_url(); ?>" class="link link-hover text-sm text-slate-300 hover:text-white">Inicio</a>
        <a href="<?php echo home_url('/miembros'); ?>" class="link link-hover text-sm text-slate-300 hover:text-white">Miembros</a>
        <a href="<?php echo home_url('/investigacion'); ?>" class="link link-hover text-sm text-slate-300 hover:text-white">Investigación</a>
        <a href="<?php echo home_url('/servicios'); ?>" class="link link-hover text-sm text-slate-300 hover:text-white">Servicios</a>
        <a href="<?php echo home_url('/noticias'); ?>" class="link link-hover text-sm text-slate-300 hover:text-white">Noticias</a>
    </nav>
    <nav>
        <h6 class="text-white font-medium text-sm mb-3 tracking-wide">Contacto</h6>
        <p class="text-sm text-slate-300">Facultad de Ing. Eléctrica</p>
        <p class="text-sm text-slate-300">Edificio #1, Piso 1, Oficina #6</p>
        <p class="text-sm text-slate-300">Tel: (+507) 560-3061</p>
        <p class="text-sm text-slate-300">gitts@utp.ac.pa</p>
        <a href="<?php echo home_url('/unete'); ?>" class="btn btn-accent btn-sm text-sm font-medium mt-4">Únete a nosotros</a>
    </nav>
    <nav>
        <h6 class="text-white font-medium text-sm mb-3 tracking-wide">Campus</h6>
        <p class="text-sm text-slate-300">Universidad Tecnológica de Panamá</p>
        <p class="text-sm text-slate-300">Campus Víctor Levi Sasso</p>
        <p class="text-sm text-slate-300">Edificio de Laboratorios de Investigación, Piso 2</p>
        <p class="text-sm text-slate-300">Ciudad de Panamá, Panamá</p>
    </nav>
</footer>
<footer class="footer footer-center bg-[#091e30] text-slate-400 border-t border-white/5 p-4">
    <p class="text-xs">&copy; <?php echo date('Y'); ?> GITTS — Universidad Tecnológica de Panamá. Todos los derechos reservados.</p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
