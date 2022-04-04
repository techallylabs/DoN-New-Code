<?php
$footer_copyright = loveus_get_options( 'footer_copyright' );
$footer_link      = loveus_get_options( 'footer_link' );
?>
<footer class="main-footer">
	<div class="footer-bottom">
		<div class="auto-container">
			<div class="clearfix">
				<?php
					$copy_rightcenter = '';
				if ( ! $footer_link ) :
					$copy_rightcenter = 'copyright-ceanter';
					endif;
				?>
				<div class="copyright <?php echo esc_attr( $copy_rightcenter ); ?>">
					<?php
					if ( $footer_copyright != '' ) :
						echo sprintf( __( '%s', 'loveus' ), $footer_copyright );
						else :
							echo esc_html__( '&copy; 2019 LoveUs. All rights reserved.', 'loveus' );
						endif;
						?>
				</div>
				<?php
				if ( $footer_link ) :
					echo sprintf( __( '%s', 'loveus' ), $footer_link );
					endif;
				?>
			</div>
		</div>
	</div>
</footer>
