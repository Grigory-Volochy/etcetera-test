<?php
/**
 * The template for displaying 404 pages (not found)
 */


get_header();

?><div id="primary-wrap" class="container-fluid pt-4"><?php
	?><div class="row"><?php
		?><section id="primary" class="content-area col-12 col-sm-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 p-3">
			<main id="main" class="site-main" role="main">
				<section class="error-404 not-found">

					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wp-bootstrap-starter-child' ); ?></h1>
					</header>

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'wp-bootstrap-starter-child' ); ?></p><?php
							
						get_search_form();

					?></div>
				</section>
			</main>
		</section><?php
	?></div><?php
?></div><?php

get_sidebar();
get_footer();
