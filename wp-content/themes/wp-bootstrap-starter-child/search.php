<?php
/**
 * The template for displaying search results pages
 */


get_header();

?><div id="primary-wrap" class="container-fluid pt-4"><?php
      ?><div class="row"><?php
            ?><section id="primary" class="content-area col-12 col-sm-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 p-3">
                  <main id="main" class="site-main pt-3" role="main"><?php

				if ( have_posts() ){
					?><header class="page-header">
						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'wp-bootstrap-starter-child' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header><?php
					
					while( have_posts() ){

						the_post();

						get_template_part( 'template-parts/content', 'search' );

					}

				} else {
					get_template_part( 'template-parts/content', 'none' );
				}

			?></main>
            </section><?php
      ?></div><?php
?></div><?php	

get_sidebar();
get_footer();
