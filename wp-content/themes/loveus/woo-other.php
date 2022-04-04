<?php
// Woocommerce Single Page
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 50 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


add_filter( 'woocommerce_show_product_images', 'loveus_show_product_images', 100 );

function loveus_show_product_images() {     ?>
<div class="image-column col-md-6 col-sm-12">
	<div class="inner">
	<div class="image-box">
		<a href="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" class="lightbox-image icon"><i
				class="fa fa-search-plus"></i></a>
	<?php
	the_post_thumbnail( 'loveus_shop_single_image' );
	?>
	</div><!-- /.img-box -->
	</div><!-- /.img-box -->
</div><!-- /.col-md-5 -->
	<?php
}

add_action( 'woocommerce_before_single_product_summary', 'loveus_before_single_product_summery', 10 );

function loveus_before_single_product_summery() {
	?>
<section class="product-details rif-single-product">
	<div class="auto-container">
		<div class="basic-details">
			<div class="row clearfix">
				<?php loveus_show_product_images(); ?>
				<div class="info-column col-md-6 col-sm-12">
					<?php
}

add_filter( 'woocommerce_template_single_title', 'loveus_template_single_title', 100 );

function loveus_template_single_title() {
	?>
					<div class="inner-column">
						<div class="content-box">
						<div class="details-header">
							<h3><?php the_title(); ?></h3>
						</div>
							<?php
}

add_filter( 'woocommerce_template_single_rating', 'loveus_single_rating', 100 );

function loveus_single_rating() {
	global $product;

	if ( ! wc_review_ratings_enabled() ) {
		return;
	}

	$rating_count = $product->get_rating_count();
	$review_count = $product->get_review_count();
	$average      = $product->get_average_rating();

	if ( $rating_count > 0 ) :
		?>
							<div class="star-box woocommerce-product-rating">
								<?php if ( comments_open() ) : ?>
                                <?php //phpcs:disable ?>
                                <a href="#reviews" class="woocommerce-review-link fa fa-star"
                                    rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'loveus' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</a>
                                <?php // phpcs:enable ?>
								<?php endif ?>
								<?php echo wc_get_rating_html( $average, $rating_count ); // WPCS: XSS ok. ?>
							</div>

	<?php endif; ?>
							<?php
}

add_filter( 'woocommerce_template_single_price', 'loveus_single_default_price_html', 100, 2 );

function loveus_single_default_price_html( $price, $product ) {
	if ( $product->get_price() > 0 ) {

		if ( $product->get_sale_price() && $product->get_regular_price() ) {
			$from = $product->get_regular_price();
			$to   = $product->get_sale_price();
			return '<p class="item-price price-line price"><span>' . ( ( is_numeric( $to ) ) ? wc_price( $to ) : $to ) . '</span>
			&nbsp;&nbsp; <del class="reg-price">' . ( ( is_numeric( $from ) ) ? wc_price( $from ) : $from ) . ' </del><hr>';
		} else {
			$to = $product->get_price();
			return '<p class="item-price price-line price"><span>' . ( ( is_numeric( $to ) ) ? wc_price( $to ) : $to ) . '</span></p>';
		}
	} else {
		return '0';
	}
}

add_filter( 'woocommerce_template_single_meta', 'loveus_template_single_meta', 100, 1 );

function loveus_template_single_meta() {
	global $product;
	?>
							<ul class="checklist">
								<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

								<li><span class="sku_wrapper"><?php esc_html__( 'SKU:', 'loveus' ); ?>
									</span><?php echo wp_kses_post( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'loveus' ); ?>
								</li>

								<?php endif; ?>
								<li><?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'loveus' ) . '</span>', '' ); ?>
								</li>
								<li><?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'loveus' ) . ' ', '</span>' ); ?>
								</li>
							</ul>

							<?php
}

add_action( 'woocommerce_single_product_summary', 'loveus_single_product_summary', 10 );

function loveus_single_product_summary() {
	global $price, $product;
	?>
							<?php
							loveus_template_single_title();
							loveus_single_rating();
							echo loveus_single_default_price_html( $price, $product );
							?>
							<?php the_excerpt(); ?>
						</div><!-- /.conten-box -->
						<?php
						woocommerce_template_single_add_to_cart();
						loveus_template_single_meta();
						?>
					</div><!-- /.text-box -->
				</div><!-- /.col-md-7 -->
			</div><!-- /.row -->
		</div><!-- /.single-shop-item -->
	<?php
}

add_filter( 'woocommerce_output_related_products', 'loveus_output_related_products', 10, 1 );

function loveus_output_related_products() {
	 global $product;
	$related_products = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), 4, $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );

	?>

	<?php foreach ( $related_products as $related_product ) : ?>
	<ul>
		<?php
		$post_object = get_post( $related_product->get_id() );

		setup_postdata( $GLOBALS['post'] =& $post_object );

		wc_get_template_part( 'content', 'product' );
		?>
	</ul>

	<?php endforeach; ?>

	<?php
}

add_action( 'woocommerce_after_single_product_summary', 'loveus_after_single_product_summary', 10 );

function loveus_after_single_product_summary() {
	?>
	</div>
</section>
	<?php
	global $product;
	$related = wc_get_related_products( $product->get_id() );
	?>
	<?php
	if ( count( $related ) > 0 ) {
		?>

<section class="related-products">
	<div class="auto-container">
		<div class="sec-title">
			<h2><?php echo esc_html__( 'Related Products', 'loveus' ); ?></h2>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<div class="related-products-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": false, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 500, "responsive":{ "0" :{ "items": "1" },"600" :{ "items": "1" }, "800" :{ "items" : "2" }, "1024":{ "items" : "3" }, "1366":{ "items" : "3" }}}'>
					
					<?php loveus_output_related_products(); ?>
					
				</div>
			</div>
		</div>
	<?php } else { ?>
					<div class="no-related-product">
	<?php } ?>
	<?php
}

add_action( 'woocommerce_after_single_product', 'loveus_after_single_product', 10 );

function loveus_after_single_product() {
	?>
	<?php
	global $product;
	$related = wc_get_related_products( $product->get_id() );
	?>
	<?php
	if ( count( $related ) > 0 ) {
		?>
</section>
</div>
		<?php
	} else {
		?>

	</div>

		<?php
	}
	?>
	<?php
}

add_action( 'woocommerce_before_cart', 'loveus_before_cart', 10 );

function loveus_before_cart() {
	?>
	<section class="cart-section sec-pad pb0">
			<div class="container">
				<!--Cart Outer-->
				<div class="cart-outer">
	<?php
}

add_action( 'woocommerce_before_cart_table', 'loveus_before_cart_table', 10 );

function loveus_before_cart_table() {
	?>
	<div class="table-outer">
	<?php
}

add_action( 'woocommerce_after_cart_table', 'loveus_after_cart_table', 10 );

function loveus_after_cart_table() {
	?>
	</div>
	<?php
}

add_action( 'woocommerce_after_cart', 'loveus_after_cart', 10 );

function loveus_after_cart() {
	?>
				</div>
			</div>
	</section>
	<?php
}


function loveus_quantity_input_max_callback( $max, $product ) {
	$max = 1000;
	return $max;
}
add_filter( 'woocommerce_quantity_input_max', 'loveus_quantity_input_max_callback', 10, 2 );
