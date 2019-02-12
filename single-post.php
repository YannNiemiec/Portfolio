<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

    <?php the_post_thumbnail('banner'); ?>
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
    
<?php endwhile; ?>
    
<hr>
<?php echo __FILE__; ?>
<hr>

<?php get_footer(); ?>