<?php if( ! defined( 'ABSPATH' ) ) exit;
add_action( 'customize_register', 'new_photography__back_to_top_customize_register' );
function new_photography__back_to_top_customize_register( $wp_customize ) {
/**************************************
 * Back to top button Options
***************************************/
		$wp_customize->add_section( 'back_to_top' , array(
			'title'       => __( 'Back To Top Button Options', 'new-photography' ),
			'priority'   => 98,
		) );
		$wp_customize->add_setting( 'activate_back_to_top', array (
		    'default'     => true,
			'sanitize_callback' => 'new_photography__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'activate_back_to_top', array(
			'label'    => __( 'Activate Back To Top Button', 'new-photography' ),
			'section'  => 'back_to_top',
			'settings' => 'activate_back_to_top',
			'type' => 'checkbox',
		) ) );
		$wp_customize->add_setting('back_button_background_color', array(         
		'default'     => ' ',
		'sanitize_callback' => 'sanitize_hex_color'
		) ); 	
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'back_button_background_color', array(
		'label' => __('Button Background Color', 'new-photography'),        
		'section' => 'back_to_top',
		'settings' => 'back_button_background_color'
		) ) );	
		$wp_customize->add_setting('back_button_background_hover_color', array(         
		'default'     => ' ',
		'sanitize_callback' => 'sanitize_hex_color'
		) ); 	
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'back_button_background_hover_color', array(
		'label' => __('Button Background Hover Color', 'new-photography'),        
		'section' => 'back_to_top',
		'settings' => 'back_button_background_hover_color'
		) ) );
}
/********************************************
* Back to top styles
*********************************************/ 	
add_action( 'wp_enqueue_scripts', 'new_photography__back_top_method' );	
function new_photography__back_top_method() {
        $back_top_button_color_mod = esc_attr( get_theme_mod( 'back_top_button_color' ) );
        $back_top_button_hover_color_mod = esc_attr( get_theme_mod( 'back_top_button_hover_color' ) );
        $back_button_background_color_mod = esc_attr( get_theme_mod( 'back_button_background_color' ) );
        $back_button_background_hover_color_mod = esc_attr( get_theme_mod( 'back_button_background_hover_color' ) );
		if( $back_top_button_color_mod ) { $back_top_button_color = "#totop {color: {$back_top_button_color_mod} !important;}";} else { $back_top_button_color =""; }
		if( $back_top_button_hover_color_mod ) { $back_top_button_hover_color = "#totop:hover {color: {$back_top_button_hover_color_mod} !important;}";} else {$back_top_button_hover_color ="";}
		if( $back_button_background_color_mod ) { $back_button_background_color = "#totop {background: {$back_button_background_color_mod} !important;}";} else {$back_button_background_color ="";}
		if( $back_button_background_hover_color_mod ) { $back_button_background_hover_color = "#totop:hover {background: {$back_button_background_hover_color_mod} !important;}";} else {$back_button_background_hover_color ="";}
        wp_add_inline_style( 'custom-style-css', 
		$back_top_button_color.$back_top_button_hover_color.$back_button_background_color.$back_button_background_hover_color
		);
}	
/********************************************
* Back to top
*********************************************/			
function new_photography__to_top() {
    echo '<span class="totop-animated"><a id="totop" title="Back to top" href="#"><span class="dashicons dashicons-arrow-up"></span></a></span>';
    }
    add_action( 'wp_head', 'new_photography__back_to_top_style' );
    function new_photography__back_to_top_style() {
    echo '<style>
		#totop {
			position: fixed;
			transform: rotate(45deg);
			right: 40px;
			z-index: 9999999;
			bottom: -56px;
			display: none;
			outline: none;
			background: #8ab928;
			width: 89px;
			height: 88px;
			text-align: center;
			color: #FFFFFF;
			-webkit-transition: all 0.1s linear 0s;
			-moz-transition: all 0.1s linear 0s;
			-o-transition: all 0.1s linear 0s;
			transition: all 0.1s linear 0s;
			font-family: "Tahoma", sans-serif;
			opacity: 0.8;	
			}
			#totop .dashicons {
				font-size: 46px;
				transform: rotate(-45deg );
				position: relative;
				right: 18px;
				padding: 0px;

			}
		#totop:hover {
			opacity: 1;	
		}
	#totop .dashicons{
		display: none;
		top: 19%;
		left: 0;
		right: 0;
	}
    </style>';
    }