  <p>
    <label for="speaker-bio"><?php __('Biography','event'); ?></label>
   <?php wp_editor( '', 'speakerbio', array( 'textarea_name' => 'speaker_bio', 'media_buttons' => false,
   'tinymce' => array( 'theme_advanced_buttons1' => 'formatselect,forecolor,|,bold,italic,underline,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,spellchecker,wp_fullscreen,wp_adv' ) )  ); ?>
  </p>