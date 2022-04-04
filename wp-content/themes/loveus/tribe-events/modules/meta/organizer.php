<?php
/**
 * Single Event Meta (Organizer) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/organizer.php
 *
 * @package loveus
 * @version 1.0
 */
$organizer_ids = tribe_get_organizer_ids();
$multiple = count($organizer_ids) > 1;
$phone = tribe_get_organizer_phone();
$email = tribe_get_organizer_email();
$website = tribe_get_organizer_website_link();

if (is_array($organizer_ids) && !empty($organizer_ids)) {
    foreach ($organizer_ids as $organizer_id) {
        $organizer = get_post($organizer_id);
        $organizer_image = get_post_meta($organizer_id, 'loveus_organizer_image', true);
        $organizer_image_url = wp_get_attachment_url($organizer_image);
        ?>
        <div class="tribe-events-meta-group-organizer author-box">
            <div class="inner-box">
                <div class="image-box"><img src="<?php echo esc_url($organizer_image_url); ?>" alt="<?php esc_attr_e('Alt', 'loveus'); ?>"></div>
                <h3 class="name"><?php echo tribe_get_organizer_label(!$multiple); ?></h3>
                <p><?php echo wp_kses_post($organizer->post_content); ?></p>
                <ul class="contact-info">
                    <?php
                    do_action('tribe_events_single_meta_organizer_section_start');
                    ?>
                    <?php
                    if (!$multiple) { // only show organizer details if there is one
                        if (!empty($phone)) {
                            ?>
                            <li><a href="tel:<?php echo esc_url($phone); ?>">
                                    <span class="fa fa-phone-square"></span>	
                                    <?php echo wp_kses_post($phone); ?>
                                </a>
                            </li>
                            <?php
                        }//end if
                        if (!empty($email)) {
                            ?>
                            <li>
                                <a href="mailto:<?php echo esc_url($phone); ?>"><span class="fa fa-envelope"></span>
                                    <?php echo wp_kses_post($email); ?>
                                </a>
                            </li>
                            <?php
                        }//end if
                        if (!empty($website)) {
                            ?>
                            <li>
                                <a href="<?php echo esc_url($website); ?>">
                                    <?php echo wp_kses_post($website); ?>
                                </a>
                            </li>
                            <?php
                        }//end if
                    }//end if
                    do_action('tribe_events_single_meta_organizer_section_end');
                    ?>
                </ul>
            </div>
        </div>
        <?php
    }
}