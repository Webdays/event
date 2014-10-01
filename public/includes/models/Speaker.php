<?php
/**
* 
*/
class Speaker
{
  public function speaker_name($post){
    $fname=esc_attr(get_post_meta( $post->ID,'_speaker_fname' , true ));
    $lname=esc_attr(get_post_meta( $post->ID,'_speaker_lname' , true ));

    return $fname . ' ' . $lname;
  }
}