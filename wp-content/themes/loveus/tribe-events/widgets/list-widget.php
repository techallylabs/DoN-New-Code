<?php
/**
 * Events List Widget Template
 * This is the template for the output of the events list widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is needed.
 *
 * This view contains the filters required to create an effective events list widget view.
 *
 * You can recreate an ENTIRELY new events list widget view by doing a template override,
 * and placing a list-widget.php file in a tribe-events/widgets/ directory
 * within your theme directory, which will override the /views/widgets/list-widget.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @version 1.0
 * @return string
 *
 * @package loveus
 *
 */
if (!defined('ABSPATH')) {
    die('-1');
}
$events_label_plural = tribe_get_event_label_plural();
$events_label_plural_lowercase = tribe_get_event_label_plural_lowercase();

$loveus_posts = tribe_get_events(array(
    'posts_per_page' => 3,
    'tribe_events_cat' => 'sidebar' //to capture the Events category of choice
        ));
// Check if any event posts are found.
if ($loveus_posts) :
    ?>
    <div class="widget-content">
        <!-- Event Block -->
        <!-- Event Block -->
        <?php
        // Setup the post data for each event.
        foreach ($loveus_posts as $loveus_post) {
            setup_postdata($loveus_post);
            $loveus_pmeta_image = get_post_meta($loveus_post->ID, 'loveus_event_meta_image', TRUE);
            $loveus_image_url = wp_get_attachment_image_src($loveus_pmeta_image, 'full');
            ?>
            <div class="event-block-two">
                <div class="inner-box">
                    <figure class="image"><a href="<?php echo esc_url($loveus_post->guid); ?>">
                            <img src="<?php echo esc_url($loveus_image_url[0]); ?>" alt="<?php esc_attr_e('Alt', 'loveus'); ?>">
                        </a>
                    </figure>
                    <div class="date">
                        <?php
                        echo tribe_get_start_date($loveus_post->ID, false, 'd F, Y');
                        ?>
                    </div>
                    <h5><a href="<?php echo esc_url($loveus_post->guid); ?>"><?php echo wp_kses_post($loveus_post->post_title); ?></a></h5>
                </div>
            </div>
            <?php
        }
        wp_reset_postdata();
        ?>
    </div>
    <?php
// No events were found.
else :
    ?>
    <p><?php printf(esc_html__('There are no upcoming %s at this time.', 'loveus'), $events_label_plural_lowercase); ?></p>
<?php
endif;