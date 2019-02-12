<?php get_header(); ?>

<?php $field = get_term(get_queried_object()->term_id) ?>
<h1>Domaine : <?php echo $field->name ?></h1>

<?php while (have_posts()) : the_post(); ?>

    <h2><?php the_title(); ?></h2>
    <?php the_post_thumbnail('medium'); ?>

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
    <a href="<?php the_permalink(); ?>">Voir plus</a>

<?php endwhile; ?>

<hr>
<?php echo __FILE__; ?>
<hr>


<?php get_footer(); ?>



<?php  ?>