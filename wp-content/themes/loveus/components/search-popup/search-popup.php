<?php
$header_search_onoff = loveus_get_options( 'header_search_onoff' );
?>
<?php if ( $header_search_onoff === '1' ) : ?>
	<!--Search Popup-->
	<div id="search-popup" class="search-popup">
		<div class="close-search theme-btn"><span class="flaticon-cancel"></span></div>
		<div class="popup-inner">
			<div class="overlay-layer"></div>
			<div class="search-form">
				<form method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="form-group">
						<fieldset>
							<input type="search" class="form-control" name="s" value="" placeholder="<?php esc_attr_e( 'Search Here', 'loveus' ); ?>" required>
							<input type="submit" value="<?php esc_attr_e( 'Search Now!', 'loveus' ); ?>" class="theme-btn">
						</fieldset>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endif; ?>
