<?php get_header(); ?>

    <section class="section__container">
        <?php while(have_posts()) : the_post(); ?>
            <div>
                <h1 class="section__header"><?php the_title(); ?></h1>
                <div class="article__content">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; ?>
    </section>

<?php get_footer(); ?>