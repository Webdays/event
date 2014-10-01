<?php

add_filter( 'the_title', 'the_speaker_title',10,2);

function the_speaker_title($title) {
  $post=get_post();
  if( is_admin() || !in_the_loop()) {
    return $title;
  }
  if($post->post_type==='speaker'){
      $speaker_model=new Speaker();
      return  $speaker_model->speaker_name($post);
    }else{
      return $title;
  }
}

require 'speaker.php';

