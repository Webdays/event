
<div class="wrap">
  <label for="location-longitude">
    <span>Longitude</span>
    <input type="text" id="location-longitude" name="location-longitude" value="<?php echo esc_attr( get_post_meta( $post->ID, '_location_longitude', true ) ); ?>" size="30">
  </label>
  
  <label for="location-altitude">
    <span>Altitude</span>
    <input type="text" id="location-altitude" name="location-altitude" value="<?php echo esc_attr( get_post_meta( $post->ID, '_location_altitude', true ) ); ?>" size="30">
  </label>
</div>