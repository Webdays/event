<?php
$old_speakers_meta = get_post_meta( $post->ID, '_talkspeakers', true );



$query = new WP_Query('post_type=speaker&posts_per_page=-1');

if(!$query->have_posts())
 echo __('Empty speakers list');

while ($query->have_posts()) : $query->the_post(); ?>
 
  <input type="checkbox" value="<?php the_ID(); ?>" name="speakers[]" <?php if(is_array($old_speakers_meta) && in_array(get_the_id(), $old_speakers_meta)) echo 'checked="checked"';  ?> > <label for="speakers[]"><?php the_title() ; ?></label>

<?php endwhile ; ?>
