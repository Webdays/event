<?php
/**
* 
*/
class Event_Page_Template
{
  protected $templates;
  public function __construct()
  {
    $this->templates=array();

    add_filter( 'page_attributes_dropdown_pages_args', array($this,'register_event_template'));
    
    $this->template=array(
      'event-list-template.php'=>__('List Events Page', 'event'));

    $templates = wp_get_theme()->get_page_templates();
    $templates = array_merge( $templates, $this->templates );
  }

  public function register_event_template ($attrs){
    return $attrs;
  }
}