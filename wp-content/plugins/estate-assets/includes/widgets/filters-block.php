<?php
/**
 * Filters Block Widget
 */


class EstateAssetsFiltersBlock_Widget extends WP_Widget{
 
      function __construct(){

            parent::__construct(
                  'filters-block',
                  'EstateAssets Filters Block'
            );
      
            add_action( 'widgets_init', function(){
                  register_widget( 'EstateAssetsFiltersBlock_Widget' );
            });
      }
   
      public $args = array();
   
      public function widget( $args, $instance ) {
            echo do_shortcode( '[estateassets-filters-block]' );
      }
   
      public function form( $instance ){}
   
      public function update( $new_instance, $old_instance ){
          $instance = array();
          return $instance;
      }
}
