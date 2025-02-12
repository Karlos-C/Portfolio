<?php get_header(); ?>

    <section class="section__container">
        <h1 class="section__header">Mes Projets</h1>
        <div class="work-list">
            <?php while(have_posts()) : the_post(); ?>
                <div class="work">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                        <div class="layer">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
</section>

<?php get_footer(); ?>