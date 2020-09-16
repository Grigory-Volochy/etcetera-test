<?php
/**
 * The main template file
 */

 
get_header();

?><div id="primary-wrap" class="container-fluid pt-4"><?php
      ?><div class="row"><?php
            ?><section id="primary" class="content-area col-12 col-sm-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 p-3">
                  <main id="main" class="site-main" role="main"><?php

				if( have_posts() ){

					if( is_home() && ! is_front_page() ){
						?><header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header><?php
					}

					while( have_posts() ){
						the_post();
						get_template_part( 'template-parts/content', get_post_format() );
					}

					the_posts_navigation();

				} else {
					get_template_part( 'template-parts/content', 'none' );
				}
		
			?></main>
            </section><?php
      ?></div><?php
?></div><?php

get_sidebar();
get_footer();
