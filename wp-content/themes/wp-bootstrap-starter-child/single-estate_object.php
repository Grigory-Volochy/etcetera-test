<?php
/**
 * The template for displaying Estate Object post type
 */


get_header();

?><div id="primary-wrap" class="container-fluid pt-4"><?php
      ?><div class="row"><?php
            ?><section id="primary" class="content-area col-12 col-sm-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 p-3">
                  <main id="main" class="site-main" role="main"><?php

                        while( have_posts() ){

                              the_post();

                              ?><article class="shadow-md"><?php

                                    // Standard post title
                                    ?><header class="entry-header">
                                          <h1 class="entry-title"><?php the_title(); ?></h1>
                                    </header><?php

                                    // Building image - ACF
                                    ?><img class="img-thumbnail" src="<?php the_field( 'image' ); ?>" alt="<?php the_field( 'building_name' ); ?>" /><?php
                                    
                                    // Standard post content
                                    ?><div class="entry-content"><?php
                                          ?><p><?php the_content(); ?></p><?php
                                    ?></div><?php

                                    // Building name - ACF
                                    ?><h2 class="pt-4 pl-2"><?php the_field( 'building_name' ) . esc_html_e( ' Details', 'wp-bootstrap-starter-child' ); ?></h2><?php

                                    ?><table class="table building-properties mt-4"><?php
                                          ?><tbody><?php

                                                // Location Coordinates - ACF
                                                wpbs_child_the_building_property( 'Location Coordinates:', 'location_coordinates' );

                                                // Floors Amount - ACF
                                                wpbs_child_the_building_property( 'Floors Amount:', 'floors_amount' );

                                                // Building Type - ACF
                                                wpbs_child_the_building_property( 'Building Type:', 'building_type' );

                                                // Ecological - ACF
                                                wpbs_child_the_building_property( 'Ecological:', 'ecological' );

                                          ?></tbody><?php
                                    ?></table><?php
                                    
                                    // Quarters - ACF fields group
                                    $quarters = get_field( 'quarters' );
                                    
                                    $quarter_index = 0;
                                    foreach( $quarters as $quarter ){

                                          $quarter_index++;

                                          if( empty( $quarter['square'] ) || empty( $quarter['image'] ) ){
                                                break;
                                          }

                                          ?><h5 class="mb-0 mt-5 p-3 bg-light"><?php echo wp_sprintf( esc_html( 'Quarter %s', 'wp-bootstrap-starter-child' ), $quarter_index ); ?></h5><?php
                                          ?><table class="table quarters-properties mb-0"><?php
                                                ?><tbody><?php
                                                
                                                      // Square - ACF
                                                      wpbs_child_the_building_sub_property( $quarter, 'Square:', 'square' );

                                                      // Rooms Amount - ACF
                                                      wpbs_child_the_building_sub_property( $quarter, 'Rooms Amount:', 'rooms_amount' );
            
                                                      // Balcony - ACF
                                                      wpbs_child_the_building_sub_property( $quarter, 'Balcony:', 'balcony' );
            
                                                      // Balcony - ACF
                                                      wpbs_child_the_building_sub_property( $quarter, 'Bathroom:', 'bathroom' );

                                                ?></tbody><?php
                                          ?></table><?php
                                          ?><p class="pt-3"><?php
                                                ?><span class="font-weight-bold align-top p-3"><?php esc_html_e( 'Image:', 'wp-bootstrap-starter-child' ); ?></span><?php
                                                ?><span><img class="img-thumbnail" src="<?php echo $quarter['image']; ?>" alt="<?php the_field( 'building_name' ) . esc_html_e( ' Quarters', 'wp-bootstrap-starter-child' ) ?>"></span><?php
                                          ?></p><?php
                                    }

                              ?></article><?php
                        }
                  
                  ?></main>
            </section><?php
      ?></div><?php
?></div><?php

get_sidebar();
get_footer();
