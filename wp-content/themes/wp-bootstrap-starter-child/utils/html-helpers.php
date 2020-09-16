<?php
/**
 * HTML Helpers
 */


function wpbs_child_the_building_property( $property_title = '', $property_name = '' ){
      ?><tr><?php
            ?><td><?php
                  esc_html_e( $property_title, 'wp-bootstrap-starter-child' );
            ?></td><?php
            ?><td><?php
                  the_field( $property_name );
            ?></td><?php
      ?></tr><?php
}


function wpbs_child_the_building_sub_property( $property_set = array(), $sub_property_title = '', $sub_property_name = '' ){

      if( !is_array( $property_set ) || !isset( $property_set[$sub_property_name] ) ){
            return '';
      }

      ?><tr><?php
            ?><td><?php
                  esc_html_e( $sub_property_title, 'wp-bootstrap-starter-child' );
            ?></td><?php
            ?><td><?php
                  echo $property_set[$sub_property_name];
            ?></td><?php
      ?></tr><?php
}
