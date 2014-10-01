<?php
/**
 *
 */
class CPT_Factory {

  protected $plugin_slug;

  public function __construct($slug) {
    $this->plugin_slug=$slug;
    add_action( 'init', array( $this, 'create_cpts' ), 0 );
  }

  public function create_cpts() {
    Event::get_instance()->load_plugin_textdomain();
    $this->create_speaker_cpt();
    $this->create_event_cpt();
    $this->create_location_cpt();
    $this->create_talk_cpt();
    flush_rewrite_rules();
  }

  public function create_talk_cpt() {

    $labels = array(
      'name'                => _x( 'Talks', 'Post Type General Name', $this->plugin_slug),
      'singular_name'       => _x( 'Talk', 'Post Type Singular Name', $this->plugin_slug),
      'menu_name'           => __( 'Talk', $this->plugin_slug ),
      'parent_item_colon'   => __( 'Parent Talk:', $this->plugin_slug),
      'all_items'           => __( 'All Talks', $this->plugin_slug ),
      'view_item'           => __( 'View Talk', $this->plugin_slug),
      'add_new_item'        => __( 'Add New Talk', $this->plugin_slug ),
      'add_new'             => __( 'Add New', $this->plugin_slug ),
      'edit_item'           => __( 'Edit Talk', $this->plugin_slug ),
      'update_item'         => __( 'Update Talk', $this->plugin_slug ),
      'search_items'        => __( 'Search Talk', $this->plugin_slug ),
      'not_found'           => __( 'Not found', $this->plugin_slug ),
      'not_found_in_trash'  => __( 'Not found in Trash', $this->plugin_slug ),
    );
    $args = array(
      'label'               => __( 'talk', $this->plugin_slug ),
      'description'         => __( 'Talk Description', $this->plugin_slug ),
      'labels'              => $labels,
      'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', ),
      'hierarchical'        => false,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 20,
      'can_export'          => true,
      'menu_icon'           =>'dashicons-microphone',
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
    );
    register_post_type( 'talk', $args );
  }

  public function create_location_cpt() {
    $labels = array(
      'name'                => _x( 'Locations', 'Post Type General Name', $this->plugin_slug ),
      'singular_name'       => _x( 'Location', 'Post Type Singular Name', $this->plugin_slug ),
      'menu_name'           => __( 'Location', $this->plugin_slug ),
      'parent_item_colon'   => __( 'Parent location:', $this->plugin_slug ),
      'all_items'           => __( 'All Locations', $this->plugin_slug ),
      'view_item'           => __( 'View Location', $this->plugin_slug ),
      'add_new_item'        => __( 'Add New Location', $this->plugin_slug ),
      'add_new'             => __( 'Add New', $this->plugin_slug ),
      'edit_item'           => __( 'Edit Location', $this->plugin_slug ),
      'update_item'         => __( 'Update Location', $this->plugin_slug ),
      'search_items'        => __( 'Search Location', $this->plugin_slug ),
      'not_found'           => __( 'Not found', $this->plugin_slug ),
      'not_found_in_trash'  => __( 'Not found in Trash', $this->plugin_slug ),
    );
    $args = array(
      'label'               => __( 'location', $this->plugin_slug ),
      'description'         => __( 'Location Description', $this->plugin_slug ),
      'labels'              => $labels,
      'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', ),
      'hierarchical'        => false,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 20,
      'can_export'          => true,
      'menu_icon'           => 'dashicons-location',
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
    );
    register_post_type( 'location', $args );
  }

  public function create_speaker_cpt() {
    $labels = array(
      'name'                => _x( 'Speakers', 'Post Type General Name', $this->plugin_slug ),
      'singular_name'       => _x( 'Speaker', 'Post Type Singular Name', $this->plugin_slug ),
      'menu_name'           => __( 'Speaker', $this->plugin_slug ),
      'parent_item_colon'   => __( 'Parent Item:', $this->plugin_slug ),
      'all_items'           => __( 'All Speakers', $this->plugin_slug ),
      'view_item'           => __( 'View Speaker', $this->plugin_slug ),
      'add_new_item'        => __( 'Add New Speaker', $this->plugin_slug ),
      'add_new'             => __( 'Add New', $this->plugin_slug ),
      'edit_item'           => __( 'Edit Speaker', $this->plugin_slug ),
      'update_item'         => __( 'Update Speaker', $this->plugin_slug ),
      'search_items'        => __( 'Search Speaker', $this->plugin_slug ),
      'not_found'           => __( 'Not found', $this->plugin_slug ),
      'not_found_in_trash'  => __( 'Not found in Trash', $this->plugin_slug ),
    );
    $args = array(
      'label'               => __( 'speaker', $this->plugin_slug ),
      'description'         => __( 'Event speaker', $this->plugin_slug ),
      'labels'              => $labels,
      'supports'            => array( 'title', 'thumbnail', 'page-attributes' ),
      'hierarchical'        => false,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => false,
      'show_in_admin_bar'   => false,
      'menu_position'       => 20,
      'can_export'          => true,
      'menu_icon'           => 'dashicons-businessman',
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
    );
    register_post_type( 'speaker', $args );

  }

  public function create_event_cpt() {
    $labels = array(
      'name'                => _x( 'Events', 'Post Type General Name', $this->plugin_slug),
      'singular_name'       => _x( 'Event', 'Post Type Singular Name', $this->plugin_slug),
      'menu_name'           => __( 'Event', $this->plugin_slug),
      'parent_item_colon'   => __( 'Parent Event:',$this->plugin_slug ),
      'all_items'           => __( 'All Events', $this->plugin_slug ),
      'view_item'           => __( 'View Event', $this->plugin_slug ),
      'add_new_item'        => __( 'Add New Event', $this->plugin_slug ),
      'add_new'             => __( 'Add New', $this->plugin_slug ),
      'edit_item'           => __( 'Edit Event', $this->plugin_slug ),
      'update_item'         => __( 'Update Event', $this->plugin_slug ),
      'search_items'        => __( 'Search Event', $this->plugin_slug ),
      'not_found'           => __( 'Not found', 'event' ),
      'not_found_in_trash'  => __( 'Not found in Trash', $this->plugin_slug ),
    );
    $args = array(
      'label'               => __( 'event', $this->plugin_slug),
      'description'         => __( 'Event custom post type', $this->plugin_slug),
      'labels'              => $labels,
      'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
      'hierarchical'        => false,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 20,
      'menu_icon'           => 'dashicons-calendar',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
    );
    register_post_type( 'event', $args );
  }
}
