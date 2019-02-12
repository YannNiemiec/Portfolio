<?php
/*
Template Name: page-contact
Template Post Type: page
*/
?>

<?php get_header(); ?>

<?php the_title(); ?>

<p>Téléphone : <?php the_field('telephone'); ?></p>
<p>Adresse : <?php the_field('adresse'); ?></p>
<p>E-mail : <?php the_field('mail'); ?></p>

<?php get_footer(); ?>
