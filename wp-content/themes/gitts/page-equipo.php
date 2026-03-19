<?php /* Template Name: Nuestro Equipo */ get_header(); ?>

<section class="hero hero-small">
    <div class="container">
        <h1>Nuestro Equipo</h1>
        <p>Las personas detrás de la investigación, la tecnología y las ideas que dan vida a GITTS.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 style="font-size:1.5rem;color:var(--navy);margin-bottom:25px;">Investigadores</h2>
        <div class="cards-grid">
            <?php
            $investigadores = new WP_Query(array(
                'post_type' => 'miembro',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array('taxonomy' => 'rol_miembro', 'field' => 'slug', 'terms' => 'investigador'),
                ),
            ));
            if ($investigadores->have_posts()) :
                while ($investigadores->have_posts()) : $investigadores->the_post();
                    $cargo = get_post_meta(get_the_ID(), '_miembro_cargo', true);
                    $orcid = get_post_meta(get_the_ID(), '_miembro_orcid', true);
                    $scholar = get_post_meta(get_the_ID(), '_miembro_scholar', true);
                    $rg = get_post_meta(get_the_ID(), '_miembro_researchgate', true);
            ?>
                <div class="team-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('thumbnail', array('style'=>'width:120px;height:120px;border-radius:50%;object-fit:cover;margin:0 auto 15px;')); ?>
                    <?php else : ?>
                        <div style="width:120px;height:120px;border-radius:50%;background:var(--light-gray);margin:0 auto 15px;display:flex;align-items:center;justify-content:center;font-size:2rem;color:var(--text-light);">&#128100;</div>
                    <?php endif; ?>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="role"><?php echo esc_html($cargo); ?></p>
                    <div class="team-links">
                        <?php if ($orcid) : ?><a href="<?php echo esc_url($orcid); ?>" target="_blank">ORCID</a><?php endif; ?>
                        <?php if ($scholar) : ?><a href="<?php echo esc_url($scholar); ?>" target="_blank">Scholar</a><?php endif; ?>
                        <?php if ($rg) : ?><a href="<?php echo esc_url($rg); ?>" target="_blank">RG</a><?php endif; ?>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="team-card">
                    <div style="width:120px;height:120px;border-radius:50%;background:var(--light-gray);margin:0 auto 15px;display:flex;align-items:center;justify-content:center;font-size:2rem;color:var(--text-light);">&#128100;</div>
                    <h3>Dra. Mayteé Zambrano de Rojas</h3>
                    <p class="role">Investigadora Principal</p>
                    <div class="team-links">
                        <a href="#">ORCID</a>
                        <a href="#">Scholar</a>
                        <a href="#">RG</a>
                    </div>
                </div>
                <div class="team-card">
                    <div style="width:120px;height:120px;border-radius:50%;background:var(--light-gray);margin:0 auto 15px;display:flex;align-items:center;justify-content:center;font-size:2rem;color:var(--text-light);">&#128100;</div>
                    <h3>Dr. Fernando Arias</h3>
                    <p class="role">Co-investigador</p>
                    <div class="team-links">
                        <a href="#">ORCID</a>
                        <a href="#">Scholar</a>
                    </div>
                </div>
                <div class="team-card">
                    <div style="width:120px;height:120px;border-radius:50%;background:var(--light-gray);margin:0 auto 15px;display:flex;align-items:center;justify-content:center;font-size:2rem;color:var(--text-light);">&#128100;</div>
                    <h3>Dr. Carlos Medina</h3>
                    <p class="role">Co-investigador</p>
                    <div class="team-links">
                        <a href="#">ORCID</a>
                        <a href="#">Scholar</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <h2 style="font-size:1.5rem;color:var(--navy);margin:50px 0 25px;">Estudiantes Activos</h2>
        <div class="cards-grid">
            <div class="team-card">
                <div style="width:120px;height:120px;border-radius:50%;background:#e8f5e9;margin:0 auto 15px;display:flex;align-items:center;justify-content:center;font-size:2rem;">&#127891;</div>
                <h3>Edson Galagarza</h3>
                <p class="role">Apoyo técnico y matemático</p>
            </div>
            <div class="team-card">
                <div style="width:120px;height:120px;border-radius:50%;background:#e3f2fd;margin:0 auto 15px;display:flex;align-items:center;justify-content:center;font-size:2rem;">&#127891;</div>
                <h3>Kathia Broce</h3>
                <p class="role">Análisis de materia orgánica</p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
