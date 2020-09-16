<?php
/**
 * Shortcodes
 */


class EstateAssets_Shortcodes{

      const GET_FILTERED_BUILDINGS_ACTION = 'estateassets_get_filtered_buildings';

      const FILTER_BUILDING_NAME_DEFAULT = 'any';
      const FILTER_LOCATION_COORDINATES_DEFAULT = 'any';
      const FILTER_FLOORS_AMOUNT_DEFAULT = 'any';
      const FILTER_BUILDING_TYPE_DEFAULT = 'any';
      const FILTER_ECOLOGICAL_DEFAULT = 'any';
      const FILTER_SQUARE_DEFAULT = 'any';
      const FILTER_ROOMS_AMOUNT_DEFAULT = 'any';
      const FILTER_BALCONY_DEFAULT = 'any';
      const FILTER_BATHROOM_DEFAULT = 'any';

      public static function init(){

            // Register shortcodes
            add_shortcode( 'estateassets-filters-block', array( __CLASS__, 'add_filters_block_shortcode' ) );

            // Define AJAX handlers
            add_action( 'wp_ajax_' . self::GET_FILTERED_BUILDINGS_ACTION, array( __CLASS__, 'get_filtered_buildings' ) );
            add_action( 'wp_ajax_nopriv_' . self::GET_FILTERED_BUILDINGS_ACTION, array( __CLASS__, 'get_filtered_buildings' ) );
      }

      public static function add_filters_block_shortcode(){

            // Enqueue scripts
            wp_register_script(
                  'estateassets-functions',
                  plugin_dir_url( __FILE__ ) . './../static/js/filters-block.min.js',
                  array(
                        'jquery'
                  ),
                  EstateAssets_Plugin::get_plugin_version()
            );
            $estateassets_js_vars = array(
                  'ajax_url' => admin_url( 'admin-ajax.php' )
            );
            wp_localize_script( 'estateassets-functions', 'estateassets_js_vars', $estateassets_js_vars );
            wp_enqueue_script( 'estateassets-functions' );

            // Return HTML
            ob_start();

            ?><div id="estateassets-filters-block" class="shadow-md p-3 mb-4"><?php

                  // Filters form
                  ?><form id="filters-block-form"><?php
                        ?><input type="hidden" name="action" value="<?php echo self::GET_FILTERED_BUILDINGS_ACTION; ?>"><?php
                        ?><input type="hidden" name="current_page" value="1"><?php
                        ?><h3 class="p-3"><?php esc_html_e( 'Filter Buildings by Properties', 'estateassets' ); ?></h3><?php

                        // Main building properties
                        ?><h5 class="p-1 pl-3 border-bottom border-gray"><?php esc_html_e( 'Main Properties', 'estateassets' ); ?></h5><?php
                        ?><div class="row"><?php
                              ?><div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"><?php
                                    self::get_filter_list_field(
                                          'Building Name',
                                          'building_name',
                                          array(
                                                'asc' => 'ASC',
                                                'desc' => 'DESC',
                                                'any' => 'Any'
                                          ),
                                          self::FILTER_BUILDING_NAME_DEFAULT
                                    );
                              ?></div><?php
                              ?><div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"><?php
                                    self::get_filter_list_field(
                                          'Location Coordinates',
                                          'location_coordinates',
                                          array(
                                                'asc' => 'ASC',
                                                'desc' => 'DESC',
                                                'any' => 'Any'
                                          ),
                                          self::FILTER_LOCATION_COORDINATES_DEFAULT
                                    );
                              ?></div><?php
                        ?></div><?php

                        ?><div class="row"><?php
                              ?><div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"><?php
                                    self::get_filter_list_field(
                                          'Floors Amount',
                                          'floors_amount',
                                          array(
                                                'asc' => 'ASC',
                                                'desc' => 'DESC',
                                                'any' => 'Any'
                                          ),
                                          self::FILTER_FLOORS_AMOUNT_DEFAULT
                                    );
                              ?></div><?php
                              ?><div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"><?php
                                    self::get_filter_list_field(
                                          'Building Type',
                                          'building_type',
                                          array(
                                                'panel' => 'Panel',
                                                'brick' => 'Brick',
                                                'foamblock' => 'Foam Block',
                                                'any' => 'Any'
                                          ),
                                          self::FILTER_BUILDING_TYPE_DEFAULT
                                    );
                              ?></div><?php
                        ?></div><?php

                        ?><div class="row pb-4"><?php
                              ?><div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"><?php
                                    self::get_filter_list_field(
                                          'Ecological',
                                          'ecological',
                                          array(
                                                'asc' => 'ASC',
                                                'desc' => 'DESC',
                                                'any' => 'Any'
                                          ),
                                          self::FILTER_ECOLOGICAL_DEFAULT
                                    );
                              ?></div><?php
                        ?></div><?php

                        // Quarters properties
                        ?><h5 class="p-1 pl-3 border-bottom border-gray"><?php esc_html_e( 'Quarters Properties', 'estateassets' ); ?></h5><?php
                        ?><div class="row"><?php
                              ?><div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"><?php
                                    self::get_filter_list_field(
                                          'Square',
                                          'square',
                                          array(
                                                'asc' => 'ASC',
                                                'desc' => 'DESC',
                                                'any' => 'Any'
                                          ),
                                          self::FILTER_SQUARE_DEFAULT
                                    );
                              ?></div><?php
                              ?><div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"><?php
                                    self::get_filter_list_field(
                                          'Rooms Amount',
                                          'rooms_amount',
                                          array(
                                                'asc' => 'ASC',
                                                'desc' => 'DESC',
                                                'any' => 'Any'
                                          ),
                                          self::FILTER_ROOMS_AMOUNT_DEFAULT
                                    );
                              ?></div><?php
                        ?></div><?php

                        ?><div class="row"><?php
                              ?><div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"><?php
                                    self::get_filter_list_field(
                                          'Balcony',
                                          'balcony',
                                          array(
                                                'yes' => 'Yes',
                                                'no' => 'No',
                                                'any' => 'Any'
                                          ),
                                          self::FILTER_BALCONY_DEFAULT
                                    );
                              ?></div><?php
                              ?><div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"><?php
                                    self::get_filter_list_field(
                                          'Bathroom',
                                          'bathroom',
                                          array(
                                                'yes' => 'Yes',
                                                'no' => 'No',
                                                'any' => 'Any'
                                          ),
                                          self::FILTER_BATHROOM_DEFAULT
                                    );
                              ?></div><?php
                        ?></div><?php

                  ?></form><?php

                  // Results box
                  ?><div id="filters-block-result"><?php
                        self::get_filtered_buildings( false, false );
                  ?></div><?php
                  
            ?></div><?php

            return ob_get_clean();
      }

      public static function get_filtered_buildings( $atts, $is_ajax = true ){

            $current_page = ( $is_ajax && isset( $_GET['current_page'] ) && intval( $_GET['current_page'] ) > 0 ) ? intval( $_GET['current_page'] ) : 1;
            
            $query_args = array(
                  'posts_per_page'        => 5,
                  'paged'                  => $current_page,
                  'post_type'             => EstateAssets_Plugin::POST_TYPE_ID,
                  'post_status'           => array( 'publish' ),
                  'meta_query'            => array(
                        'relation' => 'AND'
                  ),
                  /* ISSUE: multiple "orderby" works only for first clause for some reason, however separately works fine */
                  'orderby' => array()
            );


            $building_name = self::FILTER_BUILDING_NAME_DEFAULT;
            $location_coordinates = self::FILTER_LOCATION_COORDINATES_DEFAULT;
            $floors_amount = self::FILTER_FLOORS_AMOUNT_DEFAULT;
            $building_type = self::FILTER_BUILDING_TYPE_DEFAULT;
            $ecological = self::FILTER_ECOLOGICAL_DEFAULT;

            if( $is_ajax ){
                  if( isset( $_GET['by_building_name'] ) ){
                        $building_name = sanitize_text_field( $_GET['by_building_name'] );
                  }
                  if( isset( $_GET['by_location_coordinates'] ) ){
                        $location_coordinates = sanitize_text_field( $_GET['by_location_coordinates'] );
                  }
                  if( isset( $_GET['by_floors_amount'] ) ){
                        $floors_amount = sanitize_text_field( $_GET['by_floors_amount'] );
                  }
                  if( isset( $_GET['by_building_type'] ) ){
                        $building_type = sanitize_text_field( $_GET['by_building_type'] );
                  }
                  if( isset( $_GET['by_ecological'] ) ){
                        $ecological = sanitize_text_field( $_GET['by_ecological'] );
                  }
            }

            if( $building_name !== 'any' ){
                  $query_args['meta_query']['building_name_clause'] = array(
                        'key' => 'building_name'
                  );
                  $query_args['orderby']['building_name_clause'] = $building_name;
            }
            if( $location_coordinates !== 'any' ){
                  $query_args['meta_query']['location_coordinates_clause'] = array(
                        'key' => 'location_coordinates'
                  );
                  $query_args['orderby']['location_coordinates_clause'] = $location_coordinates;
            }
            if( $floors_amount !== 'any' ){
                  $query_args['meta_query']['floors_amount_clause'] = array(
                        'key' => 'floors_amount'
                  );
                  $query_args['orderby']['floors_amount_clause'] = $floors_amount;
            }
            if( $building_type !== 'any' ){
                  array_push( $query_args['meta_query'], array(
                        'key'       => 'building_type',
                        'value'     => $building_type,
                        'compare'   => '='
                  ) );
            }
            if( $ecological !== 'any' ){
                  $query_args['meta_query']['ecological_clause'] = array(
                        'key' => 'ecological'
                  );
                  $query_args['orderby']['ecological_clause'] = $ecological;
            }

            $buildings_query = new WP_Query( $query_args );

            // Filter by Quarters properties
            if( isset( $_GET['by_square'] ) ){
                  
            }
            if( isset( $_GET['by_rooms_amount'] ) ){
                  
            }
            if( isset( $_GET['by_balcony'] ) ){
                  
            }
            if( isset( $_GET['by_bathroom'] ) ){
                  
            }

            // Build output HTML
            if( $buildings_query->have_posts() ){

                  while( $buildings_query->have_posts() ){

                        $buildings_query->the_post();

                        ?><div class="p-3"><?php
                              ?><h5><?php
                                    the_field( 'building_name' );
                              ?></h5 class="pl-3"><?php
                              ?><div class="row"><?php
                                    ?><div class="col-sm-12 col-md-6 col-lg-4 col-xl-3"><?php
                                          ?><img class="img-thumbnail" src="<?php the_field( 'image' ); ?>" alt="<?php the_field( 'building_name' ); ?>"><?php
                                    ?></div><?php  
                                    ?><div class="col-sm-12 col-md-6 col-lg-8 col-xl-9"><?php
                                          ?><div><?php
                                                echo self::generate_post_excerpt( get_the_content() );
                                          ?></div><?php
                                          ?><div class="text-right font-italic"><?php
                                                ?><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'See Details', 'estateassets' ); ?></a><?php
                                          ?></div><?php
                                    ?></div><?php
                              ?></div><?php
                        ?></div><?php   
                  }
                  ?><div id="filters-block-pagination"><?php
                        ?><ul class="pagination justify-content-center"><?php
                              for( $i = 1; $i <= $buildings_query->max_num_pages; $i++ ){
                                    ?><li class="page-item<?php echo $i === $current_page ? ' disabled' : ''; ?>"><a class="page-link" href="#" data-page="<?php echo $i; ?>"><?php echo $i; ?></a></li><?php
                              }
                        ?></ul><?php
                  ?></div><?php
            }

            wp_reset_postdata();

            if( $is_ajax ){
                  wp_die();
            }
      }

      private static function generate_post_excerpt( $full_content, $words_count = 30, $more = ' &hellip;'  ){
            $full_content = strip_shortcodes( $full_content );
            $full_content = apply_filters( 'the_content', $full_content );
            $full_content = str_replace( ']]>', ']]&gt;', $full_content );
            return wp_trim_words( $full_content, $words_count, $more );
      }

      private static function get_filter_list_field( $label = '', $field_name = '', $choices = '', $default = '' ){
            ?><div class="form-group"><?php
                  ?><label class="pl-1 font-italic font-weight-light" for="by_<?php echo $field_name; ?>"><?php esc_html_e( $label, 'estateassets' ); ?></label><?php
                  ?><select id="by_<?php echo $field_name; ?>" name="by_<?php echo $field_name; ?>" class="form-control" autocomplete="false"><?php
                        
                        foreach( $choices as $choice_value => $choice_label ){
                              ?><option value="<?php echo $choice_value; ?>"<?php echo $default === $choice_value ? ' selected' : ''; ?>><?php esc_html_e( $choice_label, 'estateassets' ); ?></option><?php
                        }
                        
                  ?></select><?php
            ?></div><?php
      }
}