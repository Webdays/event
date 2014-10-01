<?php
/**
 *
 */
class Location_Metat_Box {

  public function __construct() {
    add_action( 'add_meta_boxes', array( $this, 'create_meta_box' ) );
    add_action( 'save_post', array( $this,'save_location_md' ), 10, 2 );
  }

  public function create_meta_box() {
    add_meta_box( 'location-infos-mb', __( 'Location information', 'event' ), array( $this, 'render_meta_box' ), 'location', 'side' );
  }

  public function render_meta_box( $post ) {
    $location=get_post_custom( $post->ID );
    wp_nonce_field( basename( __FILE__ ), 'location_mb_nonce' );
    include plugin_dir_path( __FILE__ ).'../../views/location/meta-boxes/longitude-altitude.php';
  }

  public function save_location_md( $post_id, $post ) {
    // Bail if we're doing an auto save
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if ( !isset( $_POST['location_mb_nonce'] ) || !wp_verify_nonce( $_POST['location_mb_nonce'], basename( __FILE__ ) ) )
      return $post_id;

    $new_longitude= isset( $_POST['location-longitude'] ) ? sanitize_text_field( $_POST['location-longitude'] ) : '' ;

    $new_altitude= isset( $_POST['location-altitude'] ) ? sanitize_text_field( $_POST['location-altitude'] ) : '' ;

    $longitude_value= get_post_meta( $post_id, '_location_longitude', true );
    $altitude_value= get_post_meta( $post_id, '_location_altitude', true );

    if ( $new_longitude && '' == $longitude_value ) {
      add_post_meta( $post_id, '_location_longitude', $new_longitude, true );
    } elseif ( $new_longitude && $new_longitude != $longitude_value ) {
      update_post_meta( $post_id, '_location_longitude', $new_longitude );
    }

    if ( $new_altitude && '' == $altitude_value ) {
      add_post_meta( $post_id, '_location_altitude', $new_altitude, true );
    } elseif ( $new_altitude && $new_altitude != $altitude_value ) {
      update_post_meta( $post_id, '_location_altitude', $new_altitude );
    }
  }
}
