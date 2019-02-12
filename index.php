 <?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

    <h2><?php the_title(); ?></h2>
    <p><?php the_excerpt(); ?></p>
    <a href="<?php the_permalink(); ?>">Voir plus</a>

<?php endwhile; ?>

<hr>
<?php echo __FILE__; ?>
<hr>


<?php get_footer(); ?>