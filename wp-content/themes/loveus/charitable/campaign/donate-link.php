<?php
/**
 * The template used to display the default form.
 *
 * Override this template by copying it to yourtheme/charitable/donation-form/form-donation.php
 *
 * @author  Studio 164a
 * @package Charitable/Templates/Donation Form
 * @since   1.0.0
 * @version 1.5.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form     = $view_args['form'];
$user     = wp_get_current_user();
$use_ajax = 'make_donation' == $form->get_form_action() && (int) Charitable_Gateways::get_instance()->gateways_support_ajax();
$form_id  = isset( $view_args['form_id'] ) ? $view_args['form_id'] : 'charitable-donation-form';

if ( ! $form ) {
	return;
}

?>
<form method="post" id="<?php echo esc_attr( $form_id ); ?>" class="charitable-donation-form charitable-form"
	data-use-ajax="<?php echo esc_attr( $use_ajax ); ?>">
	<?php
	/**
	 * Do something before rendering the form fields.
	 *
	 * @since 1.0.0
	 * @since 1.6.0 Added $view_args parameter.
	 *
	 * @param Charitable_Form $form      The form object.
	 * @param array           $view_args All args passed to template.
	 */
	do_action( 'charitable_form_before_fields', $form, $view_args );

	?>
	<div class="charitable-form-fields cf">
	<?php $form->view()->render(); ?>
	</div><!-- .charitable-form-fields -->
	<?php
	/**
	 * Do something after rendering the form fields.
	 *
	 * @since 1.0.0
	 * @since 1.6.0 Added $view_args parameter.
	 *
	 * @param Charitable_Form $form      The form object.
	 * @param array           $view_args All args passed to template.
	 */
	?>
	<div class="link-box charitable-form-field charitable-submit-field">
		<button
			class="<?php echo esc_attr( charitable_get_button_class( 'donate' ) ); ?> button button-primary theme-btn btn-style-one"
			type="submit" name="donate"><?php _e( 'Donate', 'loveus' ); ?></button>
		<div class="charitable-form-processing" style="display: none;">
			<img src="<?php echo esc_url( charitable()->get_path( 'assets', false ) ); ?>/images/charitable-loading.gif"
				width="60" height="60" alt="<?php esc_attr_e( 'Loading&hellip;', 'loveus' ); ?>" />
		</div>
	</div>
	<?php
	do_action( 'charitable_form_after_fields', $form, $view_args );

	?>
</form>
