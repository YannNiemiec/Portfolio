<?php get_header(); ?>

    <div class="projets">
        <?php while (have_posts()) : the_post(); ?>
            <article class="encart">
                <h1><?php the_title(); ?></h1>
                <div class="thumb">
                    <?php the_post_thumbnail('medium'); ?>
                </div>

                <p>Domaines :
                    <?php $fields = get_the_terms($post->ID, 'field') ?>
                    <?php if (is_array($fields)) : ?>
                        <?php foreach ($fields as $field): ?>
                            <span class="badge">
                    <a href="<?php echo get_term_link($field) ?>">#<?php echo $field->name ?></a>
                </span>
                        <?php endforeach ?>
                    <?php endif; ?>
                </p>

                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="cta">Voir plus</a>
            </article>
        <?php endwhile; ?>
    </div>

    <hr>
<?php echo __FILE__; ?>
    <hr>


<?php get_footer(); ?>


<?php ?>