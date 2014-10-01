<div class="wrap">
  <table class="form-table">
    <tr valign="top">
      <th scope="row">
        <label for="speaker-fname"><?php echo __('firstname','event') ; ?></label>
    
      </th>
      <td><input size="30" id="speaker-fname" type="text" name="speaker-fname" value="<?php echo esc_attr( get_post_meta( $post->ID, '_speaker_fname', true ) ); ?>">
  </td>
      
    </tr>
    <tr valign="top">
      <th><label for="speaker-lname"><?php echo __('lastname','event') ; ?></label></th>  
      <td>
        <input size="30" type="text" name="speaker-lname" id="speaker-lname" value="<?php echo esc_attr( get_post_meta( $post->ID, '_speaker_lname', true ) ); ?>" >
      </td>
    </tr>
    <tr>
      <th scope="row">
        <label for="website"><?php echo __('website','event') ; ?></label>
      </th>
      <td>
        <input id="website" size="30" type="text" name="speaker-website"  value="<?php echo esc_attr( get_post_meta( $post->ID, '_speaker_website', true ) ); ?>">
        </td>
    </tr>
</table>  

  
    <?php wp_editor( esc_textarea( get_post_meta( $post->ID, '_speaker_bio', true ) ), 'speakerbio', array( 'textarea_name' => 'speaker-bio', 'media_buttons' => false,
   'tinymce' => array( 'theme_advanced_buttons1' => 'formatselect,forecolor,|,bold,italic,underline,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,spellchecker,wp_fullscreen,wp_adv' ) )  ); ?>
  
<table class="form-table">
  <tr>
    <th scope="row">
      <label for="speaker-twitter"><?php echo __('Twitter','event') ; ?></label>
    </th>
    <td>
    <input id="speaker-twitter" size="30" type="text" name="speaker-twitter" value="<?php echo esc_attr( get_post_meta( $post->ID, '_speaker_twitter', true ) ); ?>"></td>
  </tr>
    <tr>
    <th scope="row">
     <label for="speaker-facebook"><?php echo __('Facebook','event') ; ?></label>
   </th>
    <td><input id="speaker-facebook" size="30" type="text" name="speaker-facebook" value="<?php echo esc_attr( get_post_meta( $post->ID, '_speaker_fb', true ) ); ?>">
      </td>
    </tr>
    <tr> 
      <th scope="row"><label for="speaker-gplus"><?php echo __('Google+','event') ; ?></label></th>
    <td><input id="speaker-gplus" size="30" type="text" name="speaker-gplus" value="<?php echo esc_attr( get_post_meta( $post->ID, '_speaker_gplus', true ) ); ?>">
      </td>
    </tr>
    </table>
</div>
