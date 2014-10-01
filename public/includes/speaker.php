<?php


function the_speaker_website($before='',$after='',$output=true){

  $website= get_speaker_website();

  if(strlen($website)==0)
    return;

  $website= $before . $website . $after;

  

  if($output)
    echo $website;
  else
    return $website;
}

function get_speaker_website(){

  $post=get_post();
  $type=get_post_type( $post );
  
  if('speaker'!=$type)
    return;

  $post_id=$post->ID;

  $website=get_post_meta( $post_id, '_speaker_website', true );

  if(isset($website))
    $website=$website;
  else
    $website='';

  
  return apply_filters( 'the_speaker_website', $website,$post_id );
}