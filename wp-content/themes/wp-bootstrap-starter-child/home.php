<?php
/**
 * The template for displaying Home page (Front Page)
 */


get_header();

?><div id="primary-wrap" class="container-fluid pt-4"><?php
      ?><div class="row"><?php
            ?><section id="primary" class="content-area col-12 col-sm-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 p-3">
                  <main id="main" class="site-main" role="main"><?php

                        if( is_active_sidebar( 'home_top_content_1' ) ){
                              ?><div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary"><?php
                                    dynamic_sidebar( 'home_top_content_1' );
                              ?></div><?php
                        }

                        while( have_posts() ){

                              the_post();

                              get_template_part( 'template-parts/content', 'page' );
                        }
                  
                  ?></main>
            </section><?php
      ?></div><?php
?></div><?php

get_sidebar();
get_footer();
