<?php if( ! defined( 'ABSPATH' ) ) exit;
function new_photography_customize_register_header_buttons( $wp_customize ) {
	
		$wp_customize->add_section( 'seos_header_buttons_section' , array(
			'title'       => __( 'Header Buttons', 'new-photography' ),
			'priority'    => 2,	
			//'description' => __( 'Social media buttons', 'seos-white' ),
		) );
		
		$wp_customize->add_setting( 'button_1', array (
            'default' => '',		
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_1', array(
			'label'    => __( 'Button 1 Text', 'new-photography' ),
			'section'  => 'seos_header_buttons_section',			
			'settings' => 'button_1',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'button_1_link', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_1_link', array(
			'label'    => __( 'Button 1 URL', 'new-photography' ),		
			'section'  => 'seos_header_buttons_section',
			'settings' => 'button_1_link',
		) ) );	
/************************************
* Animation Articles
************************************/

		$wp_customize->add_setting( 'new_photography_button_1_animation', array (
			'sanitize_callback' => 'new_photography_sanitize_menu_animations',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_photography_button_1_animation', array(
			'label'    => __( 'Button 1 Animation', 'new-photography' ),
			'section'  => 'seos_header_buttons_section',
			'settings' => 'new_photography_button_1_animation',
			'type'     =>  'select',
            'choices'  => new_photography_animations_menu(),		
		) ) );		
		
		
		
		$wp_customize->add_setting( 'button_2', array (
            'default' => '',		
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_2', array(
			'label'    => __( 'Button 2 Text', 'new-photography' ),
			'section'  => 'seos_header_buttons_section',			
			'settings' => 'button_2',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'button_2_link', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_2_link', array(
			'label'    => __( 'Button 2 URL', 'new-photography' ),		
			'section'  => 'seos_header_buttons_section',
			'settings' => 'button_2_link',
		) ) );
		
		$wp_customize->add_setting( 'new_photography_button_2_animation', array (
			'sanitize_callback' => 'new_photography_sanitize_menu_animations',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_photography_button_2_animation', array(
			'label'    => __( 'Button 2 Animation', 'new-photography' ),
			'section'  => 'seos_header_buttons_section',
			'settings' => 'new_photography_button_2_animation',
			'type'     =>  'select',
            'choices'  => new_photography_animations_menu(),		
		) ) );					
}
add_action( 'customize_register', 'new_photography_customize_register_header_buttons' );



function new_photography_buttons () {
	$button1 = esc_html( get_theme_mod( 'button_1' ) );
	$button2 = esc_html( get_theme_mod( 'button_2' ) );
	$button_1_link = esc_url( get_theme_mod( 'button_1_link' ) );
	$button_2_link = esc_url( get_theme_mod( 'button_2_link' ) );
	$button_1_animation = esc_html( get_theme_mod( 'new_photography_button_1_animation' ) );
	$button_2_animation = esc_html( get_theme_mod( 'new_photography_button_2_animation' ) );

	?>
	<?php if($button1) { ?>	
	<div class='h-button-1 animated <?php if($button_1_animation) { echo $button_1_animation; } else { echo "fadeInLeft"; } ?>'>	
		<a href='<?php echo $button_1_link; ?>'><?php echo $button1; ?></a>
	</div>
	<?php } ?>
	<?php if($button2) { ?>	
	<div class='h-button-2 animated <?php if($button_2_animation) { echo $button_2_animation; } else { echo "fadeInRight"; } ?>'>	
		<a href='<?php echo $button_2_link; ?>'><?php echo $button2; ?></a>	
	</div>
	<?php } ?>
<?php
}
add_action('new_photography_buttons_header', 'new_photography_buttons');

	//Menu Animations
function new_photography_animations_menu(){
	$array = array(
				'none' => esc_attr__( 'Deactivate Animation', 'new-photography' ),
				'fadeInUp' => esc_attr__( 'Default', 'new-photography' ),				
				'fadeIn' => esc_attr__( 'fadeIn', 'new-photography' ),		
				'bounce' => esc_attr__( 'bounce', 'new-photography' ),
				'bounceIn' => esc_attr__( 'bounceIn', 'new-photography' ),
				'bounceInDown' => esc_attr__( 'bounceInDown', 'new-photography' ),
				'bounceInLeft' => esc_attr__( 'bounceInLeft', 'new-photography' ),
				'bounceInRight' => esc_attr__( 'bounceInRight', 'new-photography' ),
				'bounceInUp' => esc_attr__( 'bounceInUp', 'new-photography' ),
				'fadeInDownBig' => esc_attr__( 'fadeInDownBig', 'new-photography' ),
				'fadeInLeft' => esc_attr__( 'fadeInLeft', 'new-photography' ),
				'fadeInLeftBig' => esc_attr__( 'fadeInLeftBig', 'new-photography' ),
				'fadeInRight' => esc_attr__( 'fadeInRight', 'new-photography' ),
				'fadeInRightBig' => esc_attr__( 'fadeInRightBig', 'new-photography' ),
				'fadeInUp' => esc_attr__( 'fadeInUp', 'new-photography' ),
				'fadeInUpBig' => esc_attr__( 'fadeInUpBig', 'new-photography' ),
				'flash' => esc_attr__( 'flash', 'new-photography' ),
				'lightSpeedIn' => esc_attr__( 'lightSpeedIn', 'new-photography' ),
				'pulse' => esc_attr__( 'pulse', 'new-photography' ),
				'rollIn' => esc_attr__( 'rollIn', 'new-photography' ),
				'rotateIn' => esc_attr__( 'rotateIn', 'new-photography' ),
				'rotateInDownLeft' => esc_attr__( 'rotateInDownLeft', 'new-photography' ),
				'rotateInDownRight' => esc_attr__( 'rotateInDownRight', 'new-photography' ),
				'rotateInUpLeft' => esc_attr__( 'rotateInUpLeft', 'new-photography' ),
				'rotateInUpRight' => esc_attr__( 'rotateInUpRight', 'new-photography' ),
				'shake' => esc_attr__( 'shake', 'new-photography' ),
				'slideInDown' => esc_attr__( 'slideInDown', 'new-photography' ),
				'slideInLeft' => esc_attr__( 'slideInLeft', 'new-photography' ),
				'slideInRight' => esc_attr__( 'slideInRight', 'new-photography' ),
				'slideInUp' => esc_attr__( 'slideInUp', 'new-photography' ),
				'swing' => esc_attr__( 'swing', 'new-photography' ),
				'tada' => esc_attr__( 'tada', 'new-photography' ),
				'wobble' => esc_attr__( 'wobble', 'new-photography' ),
				'zoomInDown' => esc_attr__( 'zoomInDown', 'new-photography' ),
				'zoomInLeft' => esc_attr__( 'zoomInLeft', 'new-photography' ),
				'zoomInRight' => esc_attr__( 'zoomInRight', 'new-photography' ),
				'zoomInUp' => esc_attr__( 'zoomInUp', 'new-photography' ),
				);
	return $array;
}

		function new_photography_sanitize_menu_animations( $input ) {
			$valid = new_photography_animations_menu();
			if ( array_key_exists( $input, $valid ) ) {
				return $input;
			} else {
				return '';
			}
		}