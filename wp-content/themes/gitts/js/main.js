document.addEventListener('DOMContentLoaded', function() {
    // Init AOS — subtler, faster
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 500,
            easing: 'ease-out',
            once: true,
            offset: 40,
        });
    }

    // Navbar scroll shadow
    var navbar = document.querySelector('.navbar');
    if (navbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 10) {
                navbar.classList.add('shadow-sm');
            } else {
                navbar.classList.remove('shadow-sm');
            }
        });
    }

    // Producción Científica tabs
    document.querySelectorAll('.pub-tab').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.pub-tab').forEach(function(t) { t.classList.remove('tab-active'); });
            btn.classList.add('tab-active');
            var tab = btn.getAttribute('data-tab');
            document.querySelectorAll('.tab-panel').forEach(function(p) { p.classList.add('hidden'); });
            var target = document.getElementById('tab-' + tab);
            if (target) target.classList.remove('hidden');
        });
    });

    // GLightbox — galería de imágenes con zoom y navegación
    if (typeof GLightbox !== 'undefined') {
        GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true,
            closeOnOutsideClick: true,
        });
    }

    // Carousel navigation buttons
    document.querySelectorAll('.carousel-prev').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var target = document.getElementById(this.getAttribute('data-target'));
            if (target) target.scrollBy({ left: -340, behavior: 'smooth' });
        });
    });
    document.querySelectorAll('.carousel-next').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var target = document.getElementById(this.getAttribute('data-target'));
            if (target) target.scrollBy({ left: 340, behavior: 'smooth' });
        });
    });

    // Producción científica filters
    document.querySelectorAll('.prod-filter').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var section = this.getAttribute('data-section');
            document.querySelectorAll('.prod-filter').forEach(function(b) {
                b.classList.remove('filter-active', 'bg-primary', 'text-white', 'border-none');
                b.classList.add('btn-outline', 'border-slate-300', 'text-slate-600');
            });
            this.classList.add('filter-active', 'bg-primary', 'text-white', 'border-none');
            this.classList.remove('btn-outline', 'border-slate-300', 'text-slate-600');
            document.querySelectorAll('.prod-section').forEach(function(s) {
                if (section === 'all' || s.getAttribute('data-section') === section) {
                    s.style.display = '';
                } else {
                    s.style.display = 'none';
                }
            });
        });
    });

    // Project filters (investigacion page)
    document.querySelectorAll('.project-filter').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var filter = this.getAttribute('data-filter');
            // Update active button style
            document.querySelectorAll('.project-filter').forEach(function(b) {
                b.classList.remove('filter-active');
                b.classList.remove('bg-primary', 'text-white', 'border-none');
                b.classList.add('btn-outline', 'border-slate-300', 'text-slate-600');
            });
            this.classList.add('filter-active', 'bg-primary', 'text-white', 'border-none');
            this.classList.remove('btn-outline', 'border-slate-300', 'text-slate-600');

            // Filter cards
            document.querySelectorAll('.project-card').forEach(function(card) {
                var estado = card.getAttribute('data-estado');
                var tipo = card.getAttribute('data-tipo');
                if (filter === 'all' || estado === filter || tipo === filter) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Custom dropdown filters
    document.querySelectorAll('.filter-option').forEach(function(opt) {
        opt.addEventListener('click', function(e) {
            e.preventDefault();
            var dropdown = this.closest('.dropdown');
            var label = dropdown.querySelector('.filter-label');
            if (label) label.textContent = this.textContent;
            // Set hidden input if exists (for forms)
            var hidden = dropdown.parentElement.querySelector('input[type="hidden"]');
            if (hidden) hidden.value = this.getAttribute('data-value') || this.textContent;
            // Close dropdown
            document.activeElement.blur();
        });
    });

    // Noticias tabs
    document.querySelectorAll('.news-tab').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.news-tab').forEach(function(t) { t.classList.remove('tab-active'); });
            btn.classList.add('tab-active');
        });
    });
});
