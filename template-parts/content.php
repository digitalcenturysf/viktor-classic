<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @version 1.2.9
 * @package Viktor_Classic
 */

?>
 
<div id="post-<?php the_ID(); ?>">
    <div class="single-news-area">
        <?php $viktor_classic_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'viktor-lite-blog');
            $viktor_classic_img = $viktor_classic_image[0];
            $viktor_classic_img_alt = get_post_meta( get_the_ID() , '_wp_attachment_image_alt', true);
            $viktor_img = false;
        if($viktor_classic_img): ?>
            <div class="news-featured-image ">
                <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($viktor_classic_img); ?>" alt="<?php echo esc_attr($viktor_classic_img_alt); ?>"></a>
                <div class="date-area">
                    <ul>
                        <li><?php echo esc_html(get_the_time('d')); ?></li>
                        <li><?php echo esc_html(get_the_time('M')); ?></li>
                    </ul>
                </div>
            </div>
        <?php $viktor_img = true;
        endif; ?>
        <div class="vcontent <?php echo ($viktor_img==false) ? 'no-img' : ''; ?>">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 
            <ul class="ptags"> 
            <?php   if ( is_sticky() ) {
                printf( '<li><span class="dashicons dashicons-admin-post sticky-icon"></span> %s |</li>', esc_html__( 'Sticky ','viktor-classic' ) );
            } ?>  
                <li><span><?php esc_html_e('by','viktor-classic'); ?></span> <?php the_author(); ?> |</li> 
                <li><?php  comments_popup_link( 
                '<span>0</span> Comment',
                '<span>1</span> Comment',
                '<span>%</span> Comments',
                ' ', 
                'Comments off'
                ); ?></li>
            </ul>
            <p><?php viktor_classic_short_text_remove_shortcode(); ?></p>
            <a class="redmor" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','viktor-classic'); ?></a>
        </div>
    </div>
</div> 

