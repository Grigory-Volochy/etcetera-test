<?php
/*
 * Plugin Name: Estate Assets
 * Description: Provides useful shortcodes and widgets for various Estate sites
 * Version: 1.0.7
 * Requires at least: 5.0
 * Requires PHP: 7.2
 * Author: Grigoriy Volochiy
 * License: GPL v2 or later
 * Text Domain: estateassets
 * Domain Path: /languages
 */


if ( !class_exists( 'EstateAssets_Plugin' ) ){

      class EstateAssets_Plugin{

            const PLUGIN_VERSION = '1.0.7';

            const POST_TYPE_ID = 'estate_object';
            const POST_TYPE_NAME = 'Estate Object';
            const POST_TYPE_NAME_PLURAL = 'Estate Objects';

            const TAXONOMY_ID = 'estate_region';
            const TAXONOMY_NAME = 'Region';
            const TAXONOMY_NAME_PLURAL = 'Regions';

            public static function init(){

                  include_once plugin_dir_path( __FILE__ ) . '/includes/shortcodes.php';
                  include_once plugin_dir_path( __FILE__ ) . '/includes/widgets/filters-block.php';
                  
                  add_action( 'init', array( __CLASS__, 'create_post_types' ) );
                  add_action( 'plugins_loaded', array( 'EstateAssets_Shortcodes', 'init' ) );

                  $filtersblock_widget = new EstateAssetsFiltersBlock_Widget();
            }

            public static function create_post_types(){

                  // Estate Object post type
                  register_post_type(
                        self::POST_TYPE_ID,
				array(
					'labels'            => array(
						'name'                        => esc_html__( self::POST_TYPE_NAME_PLURAL, 'estateassets' ),
						'singular_name'               => esc_html__( self::POST_TYPE_NAME, 'estateassets' ),
						'add_new'                     => esc_html__( 'Add New', 'estateassets' ),
						'add_new_item'                => esc_html__( 'Add New ' . self::POST_TYPE_NAME, 'estateassets' ),
						'edit_item'                   => esc_html__( 'Edit ' . self::POST_TYPE_NAME, 'estateassets' ),
						'new_item'                    => esc_html__( 'New ' . self::POST_TYPE_NAME, 'estateassets' ),
						'view_item'                   => esc_html__( 'View ' . self::POST_TYPE_NAME, 'estateassets' ),
						'view_items'                  => esc_html__( 'View ' . self::POST_TYPE_NAME_PLURAL, 'estateassets' ),
						'search_items'                => esc_html__( 'Search ' . self::POST_TYPE_NAME_PLURAL, 'estateassets' ),
						'not_found'                   => esc_html__( 'No ' . self::POST_TYPE_NAME_PLURAL . ' found.', 'estateassets' ),
						'not_found_in_trash'          => esc_html__( 'No ' . self::POST_TYPE_NAME_PLURAL . ' found in Trash.', 'estateassets' ),
						'parent_item_colon'           => esc_html__( 'Parent ' . self::POST_TYPE_NAME_PLURAL . ':', 'estateassets' ),
                                    'all_items'                   => esc_html__( 'All ' . self::POST_TYPE_NAME_PLURAL, 'estateassets' ),
                                    'archives'                    => esc_html__( self::POST_TYPE_NAME . ' Archives', 'estateassets' ),
                                    'attributes'                  => esc_html__( self::POST_TYPE_NAME . ' Attributes', 'estateassets' ),
                                    'insert_into_item'            => esc_html__( 'Insert into ' . self::POST_TYPE_NAME, 'estateassets' ),
                                    'uploaded_to_this_item'       => esc_html__( 'Uploaded to this ' . self::POST_TYPE_NAME, 'estateassets' ),
                                    'featured_image'              => esc_html__( 'Featured image', 'estateassets' ),
                                    'set_featured_image'          => esc_html__( 'Set featured image', 'estateassets' ),
                                    'remove_featured_image'       => esc_html__( 'Remove featured image', 'estateassets' ),
                                    'use_featured_image'          => esc_html__( 'Use as featured image', 'estateassets' ),
                                    'menu_name'                   => esc_html__( self::POST_TYPE_NAME_PLURAL, 'estateassets' ),
                                    'filter_items_list'           => esc_html__( 'Filter ' . self::POST_TYPE_NAME_PLURAL . ' list', 'estateassets' ),
                                    'items_list_navigation'       => esc_html__( self::POST_TYPE_NAME_PLURAL . ' list navigation', 'estateassets' ),
                                    'items_list'                  => esc_html__( self::POST_TYPE_NAME_PLURAL . ' list', 'estateassets' ),
                                    'item_published'              => esc_html__( self::POST_TYPE_NAME . ' published.', 'estateassets' ),
                                    'item_published_privately'    => esc_html__( self::POST_TYPE_NAME . ' published privately.', 'estateassets' ),
                                    'item_reverted_to_draft'      => esc_html__( self::POST_TYPE_NAME . ' reverted to draft.', 'estateassets' ),
                                    'item_scheduled'              => esc_html__( self::POST_TYPE_NAME . ' scheduled.', 'estateassets' ),
                                    'item_updated'                => esc_html__( self::POST_TYPE_NAME . ' updated.', 'estateassets' ),
					),
					'show_in_admin_bar' => false,
					'public'            => true,
					'has_archive'       => false,
					'description'       => esc_html__( self::POST_TYPE_NAME_PLURAL, 'estateassets' ),
					'supports'          => array(
                                    'title',
                                    'editor',
                                    'author',
                                    'custom-fields',
                              ),
                              // 'show_in_rest'      => true,
					'menu_icon'         => 'dashicons-bank',
                              'taxonomies'        => array( self::TAXONOMY_ID )
				)
			);

                  // Taxonomy (Region) for Estate Object post type
			register_taxonomy(
                        self::TAXONOMY_ID,
                        self::POST_TYPE_ID,
                        array(
                              'hierarchical'      => true,
                              'labels'            => array(
                                    'name'                       => esc_html__( self::TAXONOMY_NAME_PLURAL, 'estateassets' ),
                                    'singular_name'              => esc_html__( self::TAXONOMY_NAME, 'estateassets' ),
                                    'search_items'               => esc_html__( 'Search ' . self::TAXONOMY_NAME_PLURAL, 'estateassets' ),
                                    'popular_items'              => esc_html__( 'Popular ' . self::TAXONOMY_NAME_PLURAL, 'estateassets' ),
                                    'all_items'                  => esc_html__( 'All ' . self::TAXONOMY_NAME_PLURAL, 'estateassets' ),
                                    'parent_item'                => null,
                                    'parent_item_colon'          => null,
                                    'edit_item'                  => esc_html__( 'Edit ' . self::TAXONOMY_NAME, 'estateassets' ),
                                    'view_item'                  => esc_html__( 'View ' . self::TAXONOMY_NAME, 'estateassets' ),
                                    'update_item'                => esc_html__( 'Update ' . self::TAXONOMY_NAME, 'estateassets' ),
                                    'add_new_item'               => esc_html__( 'Add New ' . self::TAXONOMY_NAME, 'estateassets' ),
                                    'new_item_name'              => esc_html__( 'New Custom ' . self::TAXONOMY_NAME, 'estateassets' ),
                                    'separate_items_with_commas' => esc_html__( 'Separate ' . self::TAXONOMY_NAME_PLURAL . ' with commas', 'estateassets' ),
                                    'add_or_remove_items'        => esc_html__( 'Add or remove ' . self::TAXONOMY_NAME_PLURAL, 'estateassets' ),
                                    'choose_from_most_used'      => esc_html__( 'Choose from the most used ' . self::TAXONOMY_NAME_PLURAL, 'estateassets' ),
                                    'not_found'                  => esc_html__( 'No ' . self::TAXONOMY_NAME_PLURAL . ' found.', 'estateassets' ),
                                    'no_terms'                  => esc_html__( 'No ' . self::TAXONOMY_NAME_PLURAL, 'estateassets' ),
                              ),
                              'show_ui'           => true,
                              'show_admin_column' => true,
                              // 'show_in_rest'      => true,
                              'query_var'         => true,
                              'rewrite'           => array(
                                    'slug'            => 'testslug',  // self::TAXONOMY_ID,
                                    'hierarchical'    => true
                              ),
                        )
                  );
            }

            public static function get_plugin_version(){
                  return self::PLUGIN_VERSION;
            }
      }

      EstateAssets_Plugin::init();
}
