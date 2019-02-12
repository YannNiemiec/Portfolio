<?php get_header(); ?>

    <section>
        <h1>Nos clients</h1>
        <?php $customers = new WP_Query(['post_type' => 'customer']); ?>
        <?php $projects = new WP_Query(['post_type' => 'project']); ?>


        <div class="clients">
            <?php while ($customers->have_posts()) : $customers->the_post(); ?>


                <a href="<?php the_permalink() ?>">
                    <div class="thumb container">
                        <img src="<?php echo get_field('logo')['url'] ?>" alt="">
                    </div>
                </a>

            <?php endwhile; ?>
        </div>

        <?php wp_reset_query(); ?>
    </section>


    <hr>
<?php echo __FILE__; ?>
    <hr>


<?php get_footer(); ?>