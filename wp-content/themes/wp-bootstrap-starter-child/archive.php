<?php
/**
 * The template for displaying archive pages
 */


get_header();

?><div id="primary-wrap" class="container-fluid pt-4"><?php
	?><div class="row"><?php
		?><section id="primary" class="content-area col-12 col-sm-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 p-3">
			<main id="main" class="site-main" role="main"><?php

				if( have_posts() ){
					
					?><header class="page-header"><?php

						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					
					?></header><?php

					
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
