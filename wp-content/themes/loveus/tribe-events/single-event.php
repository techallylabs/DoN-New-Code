<?php

/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package loveus
 * @version 1.0
 *
 */
if (!defined('ABSPATH')) {
    die('-1');
}
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



$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();
$event_id = get_the_ID();
if (is_active_sidebar('sidebar-1')) :
    $blog_class = 'col-lg-8';
else :
    $blog_class = 'col-lg-12';
endif;
$blog_page_header_img = loveus_get_options('blog_page_header_img');
$blog_page_header = loveus_get_options('blog_page_header');
$blog_page_breadcrumbs = loveus_get_options('blog_page_breadcrumbs');

?>
<?php if ($blog_page_header == '1') : ?>
<section class="page-banner brd-event">
  <div class="image-layer"></div>
  <div class="bottom-rotten-curve"></div>
  <div class="auto-container">
    <h1><?php echo esc_html__('Single Events', 'loveus'); ?></h1>
    <?php if ($blog_page_breadcrumbs == '1') : ?>
    <?php if (function_exists('bcn_display')) : ?>
    <div class="bread-crumb clearfix">
      <?php bcn_display(); ?>
    </div>
    <?php endif; ?>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
<div class="sidebar-page-container">
  <div class="auto-container">
    <div class="row clearfix">
      <!--Content Side / Blog Sidebar-->
      <div class="content-side <?php echo esc_attr($blog_class); ?> col-md-12 col-sm-12">
        <div class="event-details">
          <div class="inner-box">
            <div class="image-box">
              <?php echo tribe_event_featured_image($event_id, 'full', false); ?>
              <div class="date">
                <?php
                                echo tribe_get_start_date(get_the_ID(), false, 'j');
                                ?>

                <span class="month">
                  <?php
                                    echo tribe_get_start_date(get_the_ID(), false, 'M');
                                    ?>
                </span>
              </div>
            </div>
            <div class="lower-content">
              <h2><?php the_title(); ?></h2>
              <ul class="info clearfix"><?php echo tribe_get_event_meta( get_the_ID(), '_EventURL', true ); ?>
                <li><span class="icon far fa-clock"></span>
                  <?php echo esc_html__($start_time . ' - ' . $end_time, 'loveus'); ?></li>
                <li><span class="icon fa fa-map-marker-alt"></span> <?php echo tribe_get_venue() ?></li>
              </ul>
              <?php while (have_posts()) : the_post(); ?>
              <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <!-- Event content -->
                <?php do_action('tribe_events_single_event_before_the_content') ?>
                <div class="tribe-events-single-event-description tribe-events-content">
                  <?php the_content(); ?>
                </div>
              </div> <!-- #post-x -->
              <div class="map-box">
                <div class="map-canvas">
                  <?php $loveus_map = tribe_get_embedded_map();
                                        if (empty($loveus_map)) {
                                            return;
                                        }
                                        echo sprintf('%s', $loveus_map);
                                        ?>
                </div>
              </div>
              <?php if (get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option('showComments', false)) comments_template() ?>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
      </div>
      <!--Sidebar Side-->
      <?php if (is_active_sidebar('sidebar-1')) { ?>
      <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
        <?php get_sidebar(); ?>
      </div>
      <?php } ?>
    </div>
  </div>
</div>