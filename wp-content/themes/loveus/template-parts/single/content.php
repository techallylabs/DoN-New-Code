<?php
/**
 * Template part for displaying posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package loveus
 */

    $blog_single_post_thumb = loveus_get_options('blog_single_post_thumb');

    $blog_signle_tag = loveus_get_options('blog_signle_tag');
    $blog_signle_tag_text = loveus_get_options('blog_signle_tag_text');
    $blog_signle_share = loveus_get_options('blog_signle_share');
    $blog_signle_share_text = loveus_get_options('blog_signle_share_text');

    $is_no_post_thumb = '';
    if (!has_post_thumbnail()) {
        $is_no_post_thumb = 'no-post-thumb';
    }
?>

<div class="blog-post-detail">
    <div class="inner">
       
            <?php if (has_post_thumbnail()) : ?>
                <div class="image-box">
                    <div class="image">
                        <?php loveus_post_thumbnail(); ?>
                    </div>
                </div>
            <?php endif; ?>
       
        <div class="post-meta">
            <ul class="clearfix">
                <li><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="icon fa fa-user"></span><?php echo esc_html( get_the_author() ); ?></a></li>
                <?php if ( is_single() && comments_open() ) : ?>
                <li><a href="<?php echo esc_url(get_permalink()); ?>"><span class="icon fa fa-comments"></span></a><?php loveus_comments_count(); ?></li>
                <?php endif; ?>
                <li><?php loveus_posted_on();?></li>
                <?php if($blog_signle_share == '1') : ?>
                    <li><a href="#single-post-share"><span class="icon fa fa-share-alt"></span></a></li>
                <?php endif; ?>
            </ul>
        </div>
        <h2><?php the_title(); ?></h2>
        <div class="content">
            <?php the_content(); ?>
            <?php
                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">',
                        'after' => '</div>',
                    )
                );
            ?>
        </div>
    </div>

        <div class="post-share-options clearfix">
            
                <div class="pull-left">
                    <p>
                        <?php
                            if($blog_signle_tag_text != '') :
                                echo esc_html($blog_signle_tag_text);
                            else :
                                echo esc_html__('Tags :', 'loveus');
                            endif;
                        ?>
                    </p>
                    <div class="tags">
                        <?php loveus_tag_list(); ?> 
                    </div>                               
                </div>
            
            <?php if($blog_signle_share == '1') : ?>
                <div class="social-links pull-right" id="single-post-share">
                    <p>
                        <?php
                            if($blog_signle_share_text != '') :
                                echo esc_html($blog_signle_share_text);
                            else :
                                echo esc_html__('Share :', 'loveus');
                            endif;
                        ?>
                    </p>
                    <?php
                        do_action('loveus_share_button');
                    ?>
                </div>
            <?php endif; ?>
        </div>

</div>