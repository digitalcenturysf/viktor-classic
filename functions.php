<?php
/**
 * Viktor Classic theme functions.
 *
 * Functions file for child theme, enqueues parent and child stylesheets by default.
 *
 * @version 1.0.0
 * @package Viktor Classic
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'viktor_classic_theme_setup' ) ) {
	/**
	 * Activates default theme features
	 */
	function viktor_classic_theme_setup(){

		// Make theme available for translation.
		// Translations can be filed in the /languages/ directory.
		// uncomment to enable (remove the // before load_theme_textdomain )
		load_theme_textdomain( 'viktor-classic', get_stylesheet_directory() . '/languages' );

	}
	add_action( 'after_setup_theme', 'viktor_classic_theme_setup' );
}

if ( ! function_exists( 'viktor_classic_enqueue_styles' ) ) {
	/**
	 * Enqueue Styles.
	 *
	 * Enqueue parent style and child styles where parent are the dependency
	 * for child styles so that parent styles always get enqueued first.
	 *
	 * @since 1.0.0
	 */
	function viktor_classic_enqueue_styles() { 

	    // Enqueue parent styles
		wp_enqueue_style('viktor-classic-parent-style', get_template_directory_uri() .'/style.css');
		
		// Enqueue child styles
		wp_enqueue_style('viktor-classic-style', get_stylesheet_directory_uri() .'/style.css', array('viktor-classic-parent-style'));
	
	}
}

// Add enqueue function to the desired action.
add_action( 'wp_enqueue_scripts', 'viktor_classic_enqueue_styles', 20 );


/**
 *  remove shortcode from cntent
 */ 
function viktor_classic_short_text_remove_shortcode($start=0,$end=90){
	global $post;
	/* Get Post congtent */
	$content = $post->post_content;
	/* Remove visual composer shortcode like [vc_row] link that */
	$viktor_lite_desc = strip_tags(do_shortcode($post->post_content));
	/* Remove empty spaces */
	$viktor_lite_desc = trim(preg_replace('/\s+/',' ', $viktor_lite_desc ));
	/* Get content with limit */
	$viktor_lite_desc = mb_strimwidth($viktor_lite_desc, $start, $end, '');
	$viktor_lite_desc_cut = strrpos($viktor_lite_desc,' ');
	$viktor_lite_desc = substr($viktor_lite_desc,0,$viktor_lite_desc_cut);
	echo esc_html($viktor_lite_desc);
}

/**
 *  Banner
 */ 
function vikor_classic_banner_temp(){ 
	$h1_text = (!empty(get_theme_mod( 'h1_text' ))) ? get_theme_mod( 'h1_text' ) : 'Welcome to Viktor Classic';
	$h3_text = (!empty(get_theme_mod( 'h3_text' ))) ? get_theme_mod( 'h3_text' ) : 'Viktor classic is awesome'; 
	$btn_left = (!empty(get_theme_mod( 'btn_left' ))) ? get_theme_mod( 'btn_left' ) : 'Download'; 
	$btn_left_link = (!empty(get_theme_mod( 'btn_left_link' ))) ? get_theme_mod( 'btn_left_link' ) : '#'; 
	$btn_right = (!empty(get_theme_mod( 'btn_right' ))) ? get_theme_mod( 'btn_right' ) : 'Contact Us'; 
	$btn_right_link = (!empty(get_theme_mod( 'btn_right_link' ))) ? get_theme_mod( 'btn_right_link' ) : '#';  
?>
    <div class="inner-page-header classic">
        <div class="container"> 
             <div class="header-page-title text-center"> 
                   <h1><?php echo esc_html($h1_text); ?></h1> 
                   <h3><?php echo esc_html($h3_text); ?></h3> 
                   <div class="banner-botton" >
                        <ul> 
                            <li><a href="<?php echo esc_url($btn_left_link); ?>" class="lft-btn"><?php echo esc_html($btn_left); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo esc_url($btn_right_link); ?>" class="rht-btn"><?php echo esc_html($btn_right); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
             </div>
        </div>
    </div>
<?php   
}


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function viktor_classic_customize_register( $wp_customize ) { 
  
	$wp_customize->add_setting( 'h1_text' , array(
	    'default'     		=> '',
	    'transport'  		=> 'postMessage', 
	    'sanitize_callback' => 'sanitize_text_field',
	) ); 
	$wp_customize->add_control( 'h1_text', array(
	    'label' 			=> __( 'Title', 'viktor-lite' ),
		'section'			=> 'header_image',
		'setting'			=> 'h1_text',
		'type'	 			=> 'text',
        'description'   	=> __( 'Write title here.', 'viktor-lite' ),
	) ); 
	$wp_customize->add_setting( 'h3_text' , array(
	    'default'     		=> '',
	    'transport'   		=> 'postMessage', 
	    'sanitize_callback' => 'sanitize_text_field',
	) ); 
	$wp_customize->add_control( 'h3_text', array(
	    'label' 			=> __( 'Subtitle', 'viktor-lite' ),
		'section'			=> 'header_image',
		'setting'			=> 'h3_text',
		'type'	 			=> 'text',
        'description'   	=> __( 'Write subtitle here.', 'viktor-lite' ), 
	) ); 
	$wp_customize->add_setting( 'btn_left' , array(
	    'default'     		=> '',
	    'transport'   		=> 'postMessage', 
	    'sanitize_callback' => 'sanitize_text_field',
	) ); 
	$wp_customize->add_control( 'btn_left', array(
	    'label' 			=> __( 'Button Left Title', 'viktor-lite' ),
		'section'			=> 'header_image',
		'setting'			=> 'btn_left',
		'type'	 			=> 'text',
        'description'   	=> __( 'Button left title here.', 'viktor-lite' ),
	) ); 
	$wp_customize->add_setting( 'btn_left_link' , array(
	    'default'     		=> '',
	    'transport'   		=> 'postMessage', 
	    'sanitize_callback' => 'sanitize_text_field',
	) ); 
	$wp_customize->add_control( 'btn_left_link', array(
	    'label' 			=> __( 'Button Left Link', 'viktor-lite' ),
		'section'			=> 'header_image',
		'setting'			=> 'btn_left_link',
		'type'	 			=> 'text',
        'description'   	=> __( 'Button left link here.', 'viktor-lite' ),
	) ); 
	$wp_customize->add_setting( 'btn_right' , array(
	    'default'     		=> '',
	    'transport'   		=> 'postMessage', 
	    'sanitize_callback' => 'sanitize_text_field',
	) ); 
	$wp_customize->add_control( 'btn_right', array(
	    'label' 			=> __( 'Button Right Title', 'viktor-lite' ),
		'section'			=> 'header_image',
		'setting'			=> 'btn_right',
		'type'	 			=> 'text',
        'description'   	=> __( 'Button right title here.', 'viktor-lite' ),
	) ); 
	$wp_customize->add_setting( 'btn_right_link' , array(
	    'default'     		=> '',
	    'transport'   		=> 'postMessage', 
	    'sanitize_callback' => 'sanitize_text_field',
	) ); 
	$wp_customize->add_control( 'btn_right_link', array(
	    'label' 			=> __( 'Button Right Link', 'viktor-lite' ),
		'section'			=> 'header_image',
		'setting'			=> 'btn_right_link',
		'type'	 			=> 'text',
        'description'   	=> __( 'Button right link here.', 'viktor-lite' ),
	) ); 
}
add_action( 'customize_register', 'viktor_classic_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function viktor_classic_customize_preview_js() {
	wp_enqueue_script( 'viktor_classic_customizer', get_stylesheet_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'viktor_classic_customize_preview_js' );

