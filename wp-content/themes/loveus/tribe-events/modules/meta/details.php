<?php
/**
 * Single Event Meta (Details) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package loveus
 * @version 4.6.19
 */
$time_format = get_option('time_format', Tribe__Date_Utils::TIMEFORMAT);
$time_range_separator = tribe_get_option('timeRangeSeparator', ' - ');

$start_datetime = tribe_get_start_date();
$start_date = tribe_get_start_date(null, false);
$start_time = tribe_get_start_date(null, false, $time_format);
$start_ts = tribe_get_start_date(null, false, Tribe__Date_Utils::DBDATEFORMAT);

$end_datetime = tribe_get_end_date();
$end_date = tribe_get_display_end_date(null, false);
$end_time = tribe_get_end_date(null, false, $time_format);
$end_ts = tribe_get_end_date(null, false, Tribe__Date_Utils::DBDATEFORMAT);

$time_formatted = null;
if ($start_time == $end_time) {
    $time_formatted = esc_html($start_time);
} else {
    $time_formatted = esc_html($start_time . $time_range_separator . $end_time);
}

$event_id = Tribe__Main::post_id_helper();

/**
 * Returns a formatted time for a single event
 *
 * @var string Formatted time string
 * @var int Event post id
 */
$time_formatted = apply_filters('tribe_events_single_event_time_formatted', $time_formatted, $event_id);

/**
 * Returns the title of the "Time" section of event details
 *
 * @var string Time title
 * @var int Event post id
 */
$time_title = apply_filters('tribe_events_single_event_time_title', esc_html__('Time:', 'loveus'), $event_id);

$cost = tribe_get_formatted_cost();
$website = tribe_get_event_website_link();
?>

<div class="tribe-events-meta-group-details post-share-options clearfix">
    <div class="float-left">
        <ul class="event-info">

            <?php
            do_action('tribe_events_single_meta_details_section_start');

// All day (multiday) events
            if (tribe_event_is_all_day() && tribe_event_is_multiday()) :
                ?>

                <dt class="tribe-events-start-date-label"> <?php echo esc_html__('Start:', 'loveus') ?> </dt>
                <dd>
                    <abbr class="tribe-events-abbr tribe-events-start-date published dtstart" title="<?php echo esc_attr($start_ts); ?>"> <?php echo esc_html($start_date) ?> </abbr>
                </dd>

                <dt class="tribe-events-end-date-label"> <?php echo esc_html__('End:', 'loveus') ?> </dt>
                <dd>
                    <abbr class="tribe-events-abbr tribe-events-end-date dtend" title="<?php echo esc_attr($end_ts) ?>"> <?php echo esc_html($end_date) ?> </abbr>
                </dd>

                <?php
// All day (single day) events
            elseif (tribe_event_is_all_day()):
                ?>

                <dt class="tribe-events-start-date-label"> <?php echo esc_html__('Date:', 'loveus') ?> </dt>
                <dd>
                    <abbr class="tribe-events-abbr tribe-events-start-date published dtstart" title="<?php echo esc_attr($start_ts) ?>"> <?php echo esc_html($start_date) ?> </abbr>
                </dd>

                <?php
// Multiday events
            elseif (tribe_event_is_multiday()) :
                ?>

                <dt class="tribe-events-start-datetime-label"> <?php echo esc_html__('Start:', 'loveus') ?> </dt>
                <dd>
                    <abbr class="tribe-events-abbr tribe-events-start-datetime updated published dtstart" title="<?php echo esc_attr($start_ts) ?>"> <?php echo esc_html($start_datetime) ?> </abbr>
                </dd>

                <dt class="tribe-events-end-datetime-label"> <?php echo esc_html__('End:', 'loveus') ?> </dt>
                <dd>
                    <abbr class="tribe-events-abbr tribe-events-end-datetime dtend" title="<?php echo esc_attr($end_ts) ?>"> <?php echo esc_html($end_datetime) ?> </abbr>
                </dd>

                <?php
// Single day events
            else :
                ?>
                <li class="tribe-events-start-time-label"> <span><?php echo esc_html($time_title); ?></span>
                    <?php echo wp_kses_post($time_formatted); ?>
                <li>
                <li class="tribe-events-start-time-label"><span><?php echo esc_html('Location:', 'loveus'); ?></span><?php echo tribe_get_venue() ?></li>

            <?php endif ?>

            <?php
            // Event Cost
            if (!empty($cost)) :
                ?>
                <li>
                    <span class="tribe-events-event-cost-label"> <?php echo esc_html('Cost:', 'loveus') ?> </span>
                    <?php echo esc_html($cost); ?>
                </li>
            <?php endif ?>
            <li>
                <?php
                echo tribe_get_event_categories(
                        get_the_id(), array(
                    'before' => '',
                    'sep' => ', ',
                    'after' => '',
                    'label' => null, // An appropriate plural/singular label will be provided
                    'label_before' => '<span class="tribe-events-event-categories-label">',
                    'label_after' => '</span>',
                    'wrap_before' => '',
                    'wrap_after' => '',
                        )
                );
                ?>
                <?php echo tribe_meta_event_tags(sprintf(esc_html__('%s Tags:', 'loveus'), tribe_get_event_label_singular()), ', ', false) ?>
            </li>
            <?php
            // Event Website
            if (!empty($website)) :
                ?>
                <li><span class="tribe-events-event-url-label"><?php echo esc_html__('Website:', 'loveus') ?> </span>
                    <?php echo wp_kses_post($website); ?>
                </li>
            <?php endif ?>
            <?php do_action('tribe_events_single_meta_details_section_end') ?>
        </ul>
    </div>
    <?php
        do_action('loveus_post_share');
    ?>
</div>