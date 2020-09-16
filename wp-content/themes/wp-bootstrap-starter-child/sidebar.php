<?php
/**
 * The sidebar containing the main widget area
 */


?><aside id="fixed-sidebar" class="widget-area shadow-md bg-light" role="complementary"><?php

	wp_nav_menu( array(
		'menu_class' => 'list-group list-group-flush',
		'theme_location' => 'sidebar-menu'
	) );

	dynamic_sidebar( 'sidebar-1' );

?></aside>
