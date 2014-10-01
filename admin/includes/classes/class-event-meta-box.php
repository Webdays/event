<?php
/**
* 
*/
class Event_Meta_Box
{
  
  public function __construct()
  {
     add_action( 'add_meta_boxes', array( $this, 'create_meta_box' ) );
     add_action( 'save_post', array( $this,'save_event_location' ), 10, 2 );
  }

  public function create_meta_box(){
    add_meta_box( 'event_location_mb', __('Event location','event'), array($this,'render_meta_box'), 'event', 'advanced');
  }

  public function render_meta_box($post){
    $event=get_post_custom( $post->ID );
    wp_nonce_field( basename(__FILE__), 'event_location_mb');
    include plugin_dir_path( __FILE__ ) . '../../views/event/meta-boxes/event-location.php';
  }

  public function save_event_location($post_id,$post) {
    $event_location = get_post_meta($post_id, '_eventlocation',true);
    
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if(!isset($_POST['event_location_mb']) || !wp_verify_nonce( $_POST['event_location_mb'], basename( __FILE__ ) ))
      return $post_id;

    $new_event_location=sanitize_text_field($_POST['event_location']);

    $old_event_location=get_post_meta( $post_id, '_eventlocation', true );

    if ($new_event_location && '' == $old_event_location) {
      add_post_meta($post_id, '_eventlocation', $new_event_location,true);
    }else{
      update_post_meta($post_id, '_eventlocation', $new_event_location);  
    }
  }

}