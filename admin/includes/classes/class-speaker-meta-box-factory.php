<?php
/**
* 
*/
class Speaker_Meta_Box_Factory
{
  public function __construct () {

    add_action( 'admin_enqueue_scripts', array( $this, 'register_mb_scripts' ) );

    add_action( 'add_meta_boxes', array($this,'create_meta_boxes') );
    add_action( 'save_post', array($this,'save_speaker_infos_meta_box'), 10, 2 );

    add_filter('manage_speaker_posts_columns', array($this,'event_speaker_table_header'));
    add_action( 'manage_speaker_posts_custom_column', array($this,'event_speaker_table_content'), 10, 2 );

    add_filter( 'manage_edit-speaker_sortable_columns', array($this,'event_speaker_table_sorting' ));

    add_filter( 'request', array($this, 'event_speaker_fname_column_orderby' ));
    add_filter( 'request', array($this, 'event_speaker_lname_column_orderby' ));
    add_filter( 'request', array($this, 'event_speaker_website_column_orderby' ));
    add_filter( 'request', array($this, 'event_speaker_fb_column_orderby' ));
    add_filter( 'request', array($this, 'event_speaker_twitter_column_orderby' ));
  }

  public function create_meta_boxes () {
    add_meta_box( 'speaker-meta-infos', __('Speaker information','event'),array($this,'render_meta_box'), 'speaker', 'normal', 'high');
  }


  public function render_meta_box ($post) {
    $speaker=get_post_custom($post->ID);
    wp_nonce_field( basename( __FILE__ ), 'speaker_mb_nonce' );
    include plugin_dir_path(__FILE__).'../../views/speaker/meta-boxes/infos.php';
  }

  


  public function save_speaker_infos_meta_box($post_id,$post) {

    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if(!isset($_POST['speaker_mb_nonce']) || !wp_verify_nonce( $_POST['speaker_mb_nonce'], basename( __FILE__ ) ))
      return $post_id;

    //if ( !current_user_can( 'edit_post' ) ) return;

    $new_fname = isset($_POST['speaker-fname']) ? sanitize_text_field( $_POST['speaker-fname'] ) : '' ;

    $new_lname= isset($_POST['speaker-lname']) ? sanitize_text_field( $_POST['speaker-lname'] ) : '' ;

    $new_website= isset($_POST['speaker-website']) ? sanitize_text_field( $_POST['speaker-website'] ) : '' ;

    $new_bio= isset($_POST['speaker-bio']) ? sanitize_text_field( $_POST['speaker-bio'] ) : '' ;

    $new_twitter= isset($_POST['speaker-twitter']) ? sanitize_text_field( $_POST['speaker-twitter'] ) : '' ;

    $new_fb= isset($_POST['speaker-facebook']) ? sanitize_text_field( $_POST['speaker-facebook'] ) : '' ;
    $new_gplus= isset($_POST['speaker-gplus']) ? sanitize_text_field( $_POST['speaker-gplus'] ) : '' ;

    $fname_value= get_post_meta( $post_id, '_speaker_fname', true );
    $lname_value= get_post_meta( $post_id, '_speaker_lname', true );
    $website_value= get_post_meta( $post_id, '_speaker_website', true );
    $bio_value= get_post_meta( $post_id, '_speaker_bio', true );
    $fb_value= get_post_meta( $post_id, '_speaker_fb', true );
    $twitter_value= get_post_meta( $post_id, '_speaker_twitter', true );
    $gplus_value= get_post_meta( $post_id, '_speaker_gplus', true );

    if ($new_fname && '' == $fname_value) {
      add_post_meta( $post_id, '_speaker_fname', $new_fname, true );
    } elseif($new_fname && $new_fname != $fname_value) {
      update_post_meta( $post_id, '_speaker_fname', $new_fname );
    }
    

    if ($new_lname && '' == $lname_value) {
      add_post_meta( $post_id, '_speaker_lname', $new_lname, true );
    } elseif($new_lname && $new_lname != $lname_value) {
      update_post_meta( $post_id, '_speaker_lname', $new_lname );
    }


    if ($new_website && '' == $website_value) {
      add_post_meta( $post_id, '_speaker_website', $new_website, true );
    } elseif($new_website && $new_website != $website_value) {
      update_post_meta( $post_id, '_speaker_website', $new_website );
    }else{
      delete_post_meta( $post_id, '_speaker_website');
    }

    if ($new_bio && '' == $bio_value) {
      add_post_meta( $post_id, '_speaker_bio', $new_bio, true );
    } elseif($new_website && $new_website != $bio_value) {
      update_post_meta( $post_id, '_speaker_bio', $new_bio );
    }

    if ($new_fb && '' == $fb_value) {
      add_post_meta( $post_id, '_speaker_fb', $new_fb, true );
    } elseif($new_fb && $new_fb != $fb_value) {
      update_post_meta( $post_id, '_speaker_fb', $new_fb);
    }

    if ($new_twitter && '' == $twitter_value) {
      add_post_meta( $post_id, '_speaker_twitter', $new_twitter, true );
    } elseif($new_twitter && $new_twitter != $twitter_value) {
      update_post_meta( $post_id, '_speaker_twitter', $new_twitter );
    }



    if ($new_gplus && '' == $gplus_value) {
      add_post_meta( $post_id, '_speaker_gplus', $new_gplus, true );
    } elseif($new_gplus && $new_gplus != $gplus_value) {
      update_post_meta( $post_id, '_speaker_gplus', $new_gplus);
    }
  }

  public function event_speaker_table_header($defaults){
    $defaults['speaker_fname']=__('Firstname','event');
    $defaults['speaker_lname']=__('Lastname','event');
    $defaults['speaker_website']=__('website','event');
    $defaults['speaker_facebook']=__('facebook','event');
    $defaults['speaker_twitter']=__('twitter','event');
    return $defaults;
  }

  public function event_speaker_table_content($column_name,$post_id){
    if($column_name == 'speaker_fname') {
      echo get_post_meta( $post_id, '_speaker_fname', true );
    }

    if($column_name == 'speaker_lname') {
      echo get_post_meta( $post_id, '_speaker_lname', true );
    }

    if($column_name == 'speaker_website') {
      echo esc_url(get_post_meta( $post_id, '_speaker_website', true ),'http');
    }

    if($column_name == 'speaker_facebook') {
      echo get_post_meta( $post_id, '_speaker_fb', true );
    }

    if($column_name == 'speaker_twitter') {
      echo get_post_meta( $post_id, '_speaker_twitter', true );
    }
  }


  public function event_speaker_table_sorting($columns) {
    $columns['speaker_fname']='speaker_fname';
    $columns['speaker_lname']='speaker_lname';
    $columns['speaker_website']='speaker_website';
    $columns['speaker_facebook']='speaker_facebook';
    $columns['speaker_twitter']='speaker_twitter';

    return $columns;
  }

  public function event_speaker_fname_column_orderby($vars){
    if(isset($vars['orderby']) && 'fname' === $vars['orderby']) {
      $vars=array_merge($vars,array(
        'meta_key'=>'_speaker_fname',
        'orderby'=>'meta_value'
        ));
    }
    return $vars;
  }

  public function event_speaker_lname_column_orderby($vars){
    if(isset($vars['orderby']) && 'lname' === $vars['orderby']) {
      $vars=array_merge($vars,array(
        'meta_key'=>'_speaker_lname',
        'orderby'=>'meta_value'
        ));
    }
    return $vars;
  }

  public function event_speaker_website_column_orderby($vars){
    if(isset($vars['orderby']) && 'website' === $vars['orderby']) {
      $vars=array_merge($vars,array(
        'meta_key'=>'_speaker_website',
        'orderby'=>'meta_value'
        ));
    }
    return $vars;
  }

   public function event_speaker_fb_column_orderby($vars){
    if(isset($vars['orderby']) && 'facebook' === $vars['orderby']) {
      $vars=array_merge($vars,array(
        'meta_key'=>'_speaker_fb',
        'orderby'=>'meta_value'
        ));
    }
    return $vars;
  }

  public function event_speaker_twitter_column_orderby($vars){
    if(isset($vars['orderby']) && 'twitter' === $vars['orderby']) {
      $vars=array_merge($vars,array(
        'meta_key'=>'_speaker_twitter',
        'orderby'=>'meta_value'
        ));
    }
    return $vars;
  }

  public function register_mb_scripts(){
      wp_enqueue_style('wp-media-upload');
      wp_enqueue_script('wp-media-upload');
   wp_enqueue_script( 'speaker-media-script', plugins_url( '../../assets/js/mediafile.js', __FILE__ ), array( 'jquery' ), Event::VERSION );
  }
}