<?php
/**
* 
*/
class Talk_Meta_Box_Factory
{
  
  public function __construct()
  {
    add_action( 'add_meta_boxes', array($this,'create_meta_boxes') );
    add_action( 'save_post', array($this,'save_talk_speaker_meta_box'), 10, 2 );
  }

  public function create_meta_boxes() {
    add_meta_box( 'talk-meta', __('Speakers','event_text_demain'), array($this,'render_meta_boxes'), 'talk', 'advanced', 'high');
  }

  public function render_meta_boxes ($post){
    $talk=get_post_custom( $post->ID );
    wp_nonce_field( basename(__FILE__), 'talk_mb_nonce');
    include plugin_dir_path(__FILE__ ) . '../../views/talk/meta-boxes/speakers.php';
  }

   public function save_talk_speaker_meta_box($post_id,$post) {
    $talk_speakers = get_post_meta($post_id, '_talkspeakers',true);
    
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if(!isset($_POST['talk_mb_nonce']) || !wp_verify_nonce( $_POST['talk_mb_nonce'], basename( __FILE__ ) ))
      return $post_id;

    $new_speakers=sanitize_text_field($_POST['speakers']);

    $old_speakers=get_post_meta( $post_id, '_talkspeakers', true );


    if ($new_speakers && '' == $old_speakers) {
      add_post_meta($post_id, '_talkspeakers', $new_speakers,true);
    }else{
      update_post_meta($post_id, '_talkspeakers', $new_speakers);  
    }
  }
}