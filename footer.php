
</main>

<footer class="footer-main">
    <?php dynamic_sidebar('footer-sidebar'); ?>
    <article class="container">
        <h2>Menu secondaire</h2>
        <?php wp_nav_menu(['theme_location' => 'footer-menu', 'container' => 'nav']); ?>
    </article>
</footer>

<?php wp_footer(); ?>
</body>
</html>