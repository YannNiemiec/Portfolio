<?php get_header(); ?>

    <div class="projets">
        <?php while (have_posts()) : the_post(); ?>
            <article class="encart">
                <h1><?php the_title(); ?></h1>

                <div class="thumb">
                    <img src="<?php echo get_field('logo')['url'] ?>" alt="">
                </div>

                <a href="<?php the_field('url') ?>"><?php the_field('url') ?></a>

                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="cta">Voir les projets associés</a>
            </article>
        <?php endwhile; ?>
    </div>

    <hr>
<?php echo __FILE__; ?>
    <hr>


<?php get_footer(); ?>