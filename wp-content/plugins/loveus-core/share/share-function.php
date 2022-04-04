<?php
function loveus_share_button_func() {
	?>
	<ul class="social-icons">
		<li>
			<a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>"><span class="fab fa-facebook-f"></span></a>
		</li>
		<li>
			<a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://twitter.com/home?status=<?php echo urlencode( get_the_title() ); ?>-<?php echo esc_url( get_permalink() ); ?>"><span class="fab fa-twitter"></span></a>
		</li>
		<li>
			<a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url( get_permalink() ); ?>" target="_blank">
				<span class="fab fa-linkedin-in"></span>
			</a>
		</li>
		<li>
			<a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="http://www.stumbleupon.com/submit?url=<?php echo esc_url( get_permalink() ); ?>&amp;text=<?php echo urlencode( get_the_title() ); ?>"><span class="fab fa-mix"></span></a>
		</li>
		<li>
			<a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="http://vkontakte.ru/share.php?url=<?php echo esc_url( get_permalink() ); ?>&amp;text=<?php echo urlencode( get_the_title() ); ?>" target="_blank"><span class="fab fa-vk"></span></a>
		</li>
		<li>
			<a href="mailto:?Subject=<?php echo urlencode( get_the_title() ); ?>&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20<?php echo esc_url( get_permalink() ); ?>"><span class="fas fa-envelope"></span></a>
		</li>
	</ul>
	<?php
}
add_action( 'loveus_share_button', 'loveus_share_button_func' );
