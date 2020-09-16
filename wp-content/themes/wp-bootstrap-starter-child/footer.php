<?php
/**
 * The template for displaying the footer
 */


    ?><footer id="colophon" class="footer text-center shadow-md <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
        <div class="container p-3">
            <div class="site-info">
                &copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
            </div>
        </div>
    </footer><?php

?></div><?php

wp_footer();

?></body>
</html>