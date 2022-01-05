<footer class="footer-website">
    <div class="footer-website-inner">
        <?php for($i = 1; $i <= 4; $i++) {
            if (is_active_sidebar( 'footer-widget-'.$i )) {
                dynamic_sidebar( 'footer-widget-'.$i );
            } 
        } 
        ?>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>