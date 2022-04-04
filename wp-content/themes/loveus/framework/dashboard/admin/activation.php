<?php
$license            = get_option( 'envato_theme_license_key' );
$envato_clientemail = get_option( 'envato_clientemail' );
$status             = get_option( 'envato_theme_license_key_status' );
?>
<div id="activetion" class="gt-tab-pane gt-is-active">
	<div class="feature-section two-col">
	<h2><?php esc_attr_e( 'Theme License Options', 'loveus' ); ?></h2>
	<div class="activation_massage">
		<p><?php echo esc_html__( 'First enter your license key in the below field  and click the button "Save Changes". After saving "Activate License" Button will be visible.', 'loveus' ); ?></p>
		<p><?php echo esc_html__( 'Then click "Activate License" button for active theme.', 'loveus' ); ?>
	</div>
	<form method="post" action="options.php">
		<?php settings_fields( 'envato_theme_license' ); ?>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row" valign="top">
						<?php esc_attr_e( 'Your Email', 'loveus' ); ?>
					</th>
					<td>
						<input id="envato_clientemail" name="envato_clientemail" type="text" class="regular-text" value="<?php echo esc_attr( $envato_clientemail ); ?>" required />
						<p><?php echo esc_html__( 'We will send update news of this product by this email address. Don\'t worry, we hate spam', 'loveus' ); ?></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" valign="top">
						<?php esc_attr_e( 'License Key', 'loveus' ); ?>
					</th>
					<td>
						<input id="envato_theme_license_key" name="envato_theme_license_key" type="text" class="regular-text" value="<?php echo esc_attr( $license ); ?>"  required/>
					</td>
				</tr>
				<?php
				if ( $license != '' ) {
					$checkboxaction = '';
					$acbuttonstyle  = 'style="display:none"';
					if ( get_option( 'envato_theme_license_checkbox' ) ) {
						$checkboxaction = 'checked="checked"';
						$acbuttonstyle  = '';
					}
					?>
					<tr valign="top">
					<th scope="row" valign="top">
					</th>
					<td>
						<input type="checkbox" id="envato_activate_checkbox" name="envato_theme_theme_license_activate_checkbox" value="1" <?php echo esc_attr( $checkboxaction ); ?>/>
						<label for="envato_activate_checkbox">
						<?php echo esc_attr__( 'I give consent to record my site address .a purchase code <br>in order to ensure License and copyright compliance. <br>I understand,<br> that this information will be stored as long as the purchase code remains valid. ', 'loveus' ); ?>	
						</label>
					</td>
					</tr>
					<tr valign="top" class="envato-liccence-button-tr" <?php echo esc_attr( $acbuttonstyle ); ?>>
							<th scope="row" valign="top">
								<?php esc_attr_e( 'Activate License', 'loveus' ); ?>
							</th>
							<td>
								<?php if ( $status !== false && $status == 'valid' ) { ?>
									<?php wp_nonce_field( 'envato_theme_nonce', 'envato_theme_nonce' ); ?>
									<input type="submit" class="button-secondary" name="envato_theme_theme_license_deactivate" value="<?php esc_attr_e( 'Deactivate License', 'loveus' ); ?>"/>
									<?php
								} else {
									wp_nonce_field( 'envato_theme_nonce', 'envato_theme_nonce' );
									?>
									<input type="submit" class="button-secondary" name="envato_theme_theme_license_activate" value="<?php esc_attr_e( 'Activate License', 'loveus' ); ?>"/>
								<?php } ?>
							</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php submit_button(); ?>
	</form>
	</div>
</div>
