<?php // Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
function new_photography_images_customize_register( $wp_customize ) {
/***********************************************************************************
 * Home Page Images
***********************************************************************************/	
		
		$wp_customize->add_panel( 'new_photography_homa_image_panel' , array(
			'title'       => __( 'Home Page Photography', 'new-photography' ),
			'priority'		=> 3,
		) );
		
		
/********** Image 1 **********/
		 
		$wp_customize->add_section( 'new_photography_section_1' , array(
			'title'       => __( 'Image 1', 'new-photography' ),
			'panel' => 'new_photography_homa_image_panel',
			'priority'		=> 3,
		) );
		 
		$wp_customize->add_setting( 'new_photography_img1', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
			$wp_customize, 
			'new_photography_img1', 
			array(
				'label'      => __( 'Image:', 'new-photography' ),
				'description' => __( 'Load IMG from your media:', 'new-photography' ),
				'section'    => 'new_photography_section_1',
				'settings'   => 'new_photography_img1',
			) ) );
			
		$wp_customize->add_setting( 'new_photography_title1', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_photography_title1', array(
			'label'    => __( 'Image Title:', 'new-photography' ),
			'section'  => 'new_photography_section_1',
			'settings' => 'new_photography_title1',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'new_photography_text1', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_photography_text1', array(
			'label'    => __( 'Image Description:', 'new-photography' ),
			'section'  => 'new_photography_section_1',
			'settings' => 'new_photography_text1',
			'type' => 'textarea',
		) ) );
			
		$wp_customize->add_setting( 'new_photography_url1', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => '#',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_photography_url1', array(
			'label'    => __( 'Image URL:', 'new-photography' ),
			'section'  => 'new_photography_section_1',		
			'settings' => 'new_photography_url1',
		) ) );
			
		
/********** Image 2 **********/
		
		$wp_customize->add_section( 'new_photography_section_2' , array(
			'title'       => __( 'Image 2', 'new-photography' ),
			'panel' => 'new_photography_homa_image_panel',
			'priority'		=> 3,
		) );

		 
		$wp_customize->add_setting( 'new_photography_img2', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
			$wp_customize, 
			'new_photography_img2', 
			array(
				'label'      => __( 'Image:', 'new-photography' ),
				'description' => __( 'Load IMG from your media:', 'new-photography' ),
				'section'    => 'new_photography_section_2',
				'settings'   => 'new_photography_img2',
			) ) );
			
		$wp_customize->add_setting( 'new_photography_title2', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_photography_title2', array(
			'label'    => __( 'Image Title:', 'new-photography' ),
			'section'  => 'new_photography_section_2',
			'settings' => 'new_photography_title2',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'new_photography_text2', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_photography_text2', array(
			'label'    => __( 'Image Description:', 'new-photography' ),
			'section'  => 'new_photography_section_2',
			'settings' => 'new_photography_text2',
			'type' => 'textarea',
		) ) );
			
		$wp_customize->add_setting( 'new_photography_url2', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => '#',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_photography_url2', array(
			'label'    => __( 'Image URL:', 'new-photography' ),
			'section'  => 'new_photography_section_2',	
			'settings' => 'new_photography_url2',
		) ) );
		
/********** Image 3 **********/
		
		$wp_customize->add_section( 'new_photography_section_3' , array(
			'title'       => __( 'Image 3', 'new-photography' ),
			'panel' => 'new_photography_homa_image_panel',
			'priority'		=> 3,
		) );
		 
		$wp_customize->add_setting( 'new_photography_img3', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
			$wp_customize, 
			'new_photography_img3', 
			array(
				'label'      => __( 'Image:', 'new-photography' ),
				'description' => __( 'Load IMG from your media:', 'new-photography' ),
				'section'    => 'new_photography_section_3',
				'settings'   => 'new_photography_img3',
			) ) );
			
		$wp_customize->add_setting( 'new_photography_title3', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_photography_title3', array(
			'label'    => __( 'Image Title:', 'new-photography' ),
			'section'  => 'new_photography_section_3',
			'settings' => 'new_photography_title3',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'new_photography_text3', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_photography_text3', array(
			'label'    => __( 'Image Description:', 'new-photography' ),
			'section'  => 'new_photography_section_3',
			'settings' => 'new_photography_text3',
			'type' => 'textarea',
		) ) );
			
		$wp_customize->add_setting( 'new_photography_url3', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => '#',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_photography_url3', array(
			'label'    => __( 'Image URL:', 'new-photography' ),
			'section'  => 'new_photography_section_3',		
			'settings' => 'new_photography_url3',
		) ) );
}
add_action( 'customize_register', 'new_photography_images_customize_register' );		
		