<?php /* Template Name: Actualidad */ get_header(); ?>

<div class="page-header py-20">
    <div class="max-w-7xl mx-auto px-6">
        <h1 class="text-white font-light text-4xl">Noticias</h1>
        <p class="text-slate-300 mt-3 text-lg font-light"><?php echo esc_html(get_option('gitts_intro_noticias', 'Conferencias, premios, defensas de tesis, workshops y eventos del grupo.')); ?></p>
    </div>
</div>

<!-- Filtros -->
<section class="py-8 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex gap-1">
            <button class="tab-underline tab-active news-tab" data-filter="all">Todos</button>
            <button class="tab-underline news-tab" data-filter="tesis">Defensas de tesis</button>
            <button class="tab-underline news-tab" data-filter="pasantia">Pasantía</button>
            <button class="tab-underline news-tab" data-filter="premios">Premios y reconocimientos</button>
            <button class="tab-underline news-tab" data-filter="eventos">Eventos</button>
            <button class="tab-underline news-tab" data-filter="conferencias">Conferencias</button>
        </div>
    </div>
</section>

<!-- Grid de noticias -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div id="noticias-grid" class="grid grid-cols-1 md:grid-cols-3 gap-10"></div>
        <div id="noticias-loading" class="text-center py-8 hidden">
            <span class="loading loading-spinner loading-md text-primary"></span>
        </div>
        <div id="noticias-empty" class="text-center py-16 hidden">
            <p class="text-slate-400 text-lg">No hay noticias en esta categoría.</p>
        </div>
        <div class="text-center mt-16">
            <button id="noticias-load-more" class="btn btn-outline btn-primary font-medium hidden">Cargar más noticias</button>
        </div>
    </div>
</section>

<script>
(function(){
    var grid = document.getElementById('noticias-grid');
    var loadMoreBtn = document.getElementById('noticias-load-more');
    var loadingEl = document.getElementById('noticias-loading');
    var emptyEl = document.getElementById('noticias-empty');
    var currentFilter = 'all';
    var currentPage = 1;
    var perPage = 12;
    var hasMore = true;

    function loadNoticias(page, filter, append) {
        loadingEl.classList.remove('hidden');
        loadMoreBtn.classList.add('hidden');
        emptyEl.classList.add('hidden');

        var url = '<?php echo admin_url("admin-ajax.php"); ?>';
        var params = 'action=gitts_load_noticias&page=' + page + '&per_page=' + perPage + '&category=' + filter;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            loadingEl.classList.add('hidden');
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                if (!append) grid.innerHTML = '';
                if (data.html) {
                    grid.insertAdjacentHTML('beforeend', data.html);
                }
                if (!data.html && !append) {
                    emptyEl.classList.remove('hidden');
                }
                hasMore = data.has_more;
                if (hasMore) {
                    loadMoreBtn.classList.remove('hidden');
                } else {
                    loadMoreBtn.classList.add('hidden');
                }
            }
        };
        xhr.send(params);
    }

    // Initial load
    loadNoticias(1, 'all', false);

    // Filter tabs
    document.querySelectorAll('.news-tab').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.news-tab').forEach(function(t) { t.classList.remove('tab-active'); });
            btn.classList.add('tab-active');
            currentFilter = btn.getAttribute('data-filter');
            currentPage = 1;
            loadNoticias(1, currentFilter, false);
        });
    });

    // Load more
    loadMoreBtn.addEventListener('click', function() {
        currentPage++;
        loadNoticias(currentPage, currentFilter, true);
    });
})();
</script>

<?php get_footer(); ?>
