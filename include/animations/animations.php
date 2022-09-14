<?php if( ! defined( 'ABSPATH' ) ) exit;
/**
 * Enqueue scripts and styles.
 */
function new_photography__animations_scripts() {	
	wp_enqueue_style( 'style-aos-css', get_template_directory_uri() . '/include/animations/aos.css' );
	wp_enqueue_script( 'style-aos-js', get_template_directory_uri() . '/include/animations/aos.js', array(), '', true);
	wp_enqueue_script( 'style-aos-options-js', get_template_directory_uri() . '/include/animations/aos-options.js', array(), '', true);
}
add_action( 'wp_enqueue_scripts', 'new_photography__animations_scripts' );
function  new_photography__animation ($animation) {
	if ( get_theme_mod( $animation ) != "none" and get_theme_mod( $animation ) != ""  )  {
		return "data-aos-delay='100'"." ".
		"data-aos-duration='500'"." ".
		"data-aos='".esc_html ( get_theme_mod( $animation ) )."'";
	}
	if ( get_theme_mod( $animation  ) == "" ) {
		return "data-aos-delay='100'"." ".
		"data-aos-duration='500'"." ".
		"data-aos='zoom-out-down'";		
	}
}
function new_photography__animations() {
	$array = array(
				'' => esc_attr__( 'Default', 'new-photography' ),			
				'none' => esc_attr__( 'Deactivate Animation', 'new-photography' ),			
				'fade' => esc_attr__( 'fade', 'new-photography' ),
				'fade-up' => esc_attr__( 'fade-up', 'new-photography' ),
				'fade-down' => esc_attr__( 'fade-down', 'new-photography' ),
				'fade-left' => esc_attr__( 'fade-left', 'new-photography' ),
				'fade-right' => esc_attr__( 'fade-right', 'new-photography' ),
				'fade-up-right' => esc_attr__( 'fade-up-right', 'new-photography' ),
				'fade-up-left' => esc_attr__( 'fade-up-left', 'new-photography' ),
				'fade-down-right' => esc_attr__( 'fade-down-right', 'new-photography' ),
				'fade-down-left' => esc_attr__( 'fade-down-left', 'new-photography' ),
				'flip-up' => esc_attr__( 'flip-up', 'new-photography' ),
				'flip-down' => esc_attr__( 'flip-down', 'new-photography' ),
				'flip-left' => esc_attr__( 'flip-left', 'new-photography' ),
				'flip-right' => esc_attr__( 'flip-right', 'new-photography' ),
				'slide-up' => esc_attr__( 'slide-up', 'new-photography' ),
				'slide-down' => esc_attr__( 'slide-down', 'new-photography' ),
				'slide-left' => esc_attr__( 'slide-left', 'new-photography' ),
				'slide-right' => esc_attr__( 'slide-right', 'new-photography' ),
				'zoom-in' => esc_attr__( 'zoom-in', 'new-photography' ),
				'zoom-in-up' => esc_attr__( 'zoom-in-up', 'new-photography' ),
				'zoom-in-down' => esc_attr__( 'zoom-in-down', 'new-photography' ),
				'zoom-in-left' => esc_attr__( 'zoom-in-left', 'new-photography' ),
				'zoom-in-right' => esc_attr__( 'zoom-in-right', 'new-photography' ),
				'zoom-out' => esc_attr__( 'zoom-out', 'new-photography' ),
				'zoom-out-up' => esc_attr__( 'zoom-out-up', 'new-photography' ),
				'zoom-out-down' => esc_attr__( 'zoom-out-down', 'new-photography' ),
				'zoom-out-left' => esc_attr__( 'zoom-out-left', 'new-photography' ),
				'zoom-out-right' => esc_attr__( 'zoom-out-right', 'new-photography' ),
				);
	return $array;
}
		function new_photography__sanitize_animations( $input ) {
			$valid = new_photography__animations();
			if ( array_key_exists( $input, $valid ) ) {
				return $input;
			} else {
				return '';
			}
		}
function new_photography__animations_customize_register( $wp_customize ) {
		$wp_customize->add_panel( 'panel_animations' , array(
			'title'       => __( 'Animations', 'new-photography' ),
			'priority'   => 1,
		) );
/************************************
* Animation Site Title
************************************/
		$wp_customize->add_section( 'new_photography_animations_section_site_title' , array(
			'title'       => __( 'Animation Site Title', 'new-photography' ),
			'panel'       => 'panel_animations',
			'priority'   => 64,
		) );
		$wp_customize->add_setting( 'animation_site_title', array (
			'sanitize_callback' => 'new_photography__sanitize_animations',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'animation_site_title', array(
			'label'    => __( 'Animation Articles', 'new-photography' ),
			'section'  => 'new_photography_animations_section_site_title',
			'settings' => 'animation_site_title',
			'type'     =>  'select',
            'choices'  => new_photography__animations(),		
		) ) );		
/************************************
* Animation Articles
************************************/
		$wp_customize->add_section( 'new_photography__animations_section_articles' , array(
			'title'       => __( 'Animation Articles', 'new-photography' ),
			'panel'       => 'panel_animations',
			'priority'   => 64,
		) );
		$wp_customize->add_setting( 'new_photography__articles_animation', array (
			'sanitize_callback' => 'new_photography__sanitize_animations',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_photography__articles_animation', array(
			'label'    => __( 'Animation Articles', 'new-photography' ),
			'section'  => 'new_photography__animations_section_articles',
			'settings' => 'new_photography__articles_animation',
			'type'     =>  'select',
            'choices'  => new_photography__animations(),		
		) ) );
}
add_action( 'customize_register', 'new_photography__animations_customize_register' );