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
