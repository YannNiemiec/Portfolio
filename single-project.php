<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

    <h1><?php the_title(); ?></h1>
    <?php the_post_thumbnail('banner'); ?>

    <p>Date de création : <?php the_field('date_start') ?></p>
    <p>Date de fin : <?php the_field('date_end') ?></p>
    <?php the_content(); ?>

<?php endwhile; ?>

    <p>Compétences :
        <?php $skills = get_the_terms($post->ID, 'skill') ?>
        <?php if (is_array($skills)) : ?>
            <?php foreach ($skills as $skill): ?>
                <span class="badge">
                    <a href="<?php echo get_term_link($skill) ?>">#<?php echo $skill->name ?></a>
                </span>
            <?php endforeach ?>
        <?php endif; ?>
    </p>

    <h2>Client :</h2>
<?php $posts = get_field('project_customer');

if ($posts): ?>
    <?php foreach ($posts as $post): ?>
        <?php setup_postdata($post); ?>
        <a href="<?php the_field('url'); ?>"><?php the_field('nom'); ?></a>
        <div class="thumb container">
            <img src="<?php echo get_field('logo')['url'] ?>" alt="">
        </div>
    <?php endforeach; ?>
    <?php wp_reset_postdata();?>
<?php endif; ?>

    <hr>
<?php echo __FILE__; ?>
    <hr>

<?php get_footer(); ?>