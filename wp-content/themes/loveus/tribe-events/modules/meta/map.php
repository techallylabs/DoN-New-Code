<?php
/**
 * Single Event Meta (Map) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/map.php
 *
 * @package loveus
 * @version 1.0
 */
$loveus_map = tribe_get_embedded_map();
if (empty($loveus_map)) {
    return;
}
?>
<div class="tribe-events-venue-map">
    <?php
    do_action('tribe_events_single_meta_map_section_start');
    echo sprintf('%s', $loveus_map);
    do_action('tribe_events_single_meta_map_section_end');
    ?>
</div>