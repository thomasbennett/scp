    <footer class="row">
        <hr>

        <nav>
            <?php wp_nav_menu('menu=footer&fallback_cb=&container='); ?>
        </nav>

        <p class="copyright">Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
    </footer>
    
    <?php wp_footer(); ?>
</body>
</html>
