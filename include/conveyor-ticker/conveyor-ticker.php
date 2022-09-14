<?php 
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'new_photography_customize_register_posts' );

function new_photography_customize_register_posts( $wp_customize ) {
	
/**
 * Recent Posts
 */
		$wp_customize->add_section( 'seos_recent_posts_section' , array(
			'title'       => __( 'Recent Posts Slider', 'new-photography' ),
			'priority'    => 1,	
			//'description' => __( 'Social media buttons', 'seos-white' ),
		) ); 
 
 		$wp_customize->add_setting( 'new_photography_activate_conveyor_ticker_home', array (
            'default' => '',		
			'sanitize_callback' => 'new_photography__sanitize_checkbox',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_photography_activate_conveyor_ticker_home', array(
			'label'    => __( 'Activate Recent Posts on Home Page', 'new-photography' ),
			'section'  => 'seos_recent_posts_section',
			'priority'    => 1,				
			'settings' => 'new_photography_activate_conveyor_ticker_home',
			'type' => 'checkbox',
		) ) );
  
 		$wp_customize->add_setting( 'new_photography_activate_conveyor_ticker_all', array (
            'default' => '',		
			'sanitize_callback' => 'new_photography__sanitize_checkbox',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_photography_activate_conveyor_ticker_all', array(
			'label'    => __( 'Activate on all pages without the home page', 'new-photography' ),
			'section'  => 'seos_recent_posts_section',
			'priority'    => 3,				
			'settings' => 'new_photography_activate_conveyor_ticker_all',
			'type' => 'checkbox',
		) ) );
 
		$wp_customize->add_setting( 'mav_number_setting', array (
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mav_number_setting', array(
			'section'  => 'seos_recent_posts_section',
			'priority'    => 4,
			'settings' => 'mav_number_setting',
			'label'       => __( 'Slider Speed', 'new-photography' ),			
			'type'     =>  'number',
			'default'     => 80000,
			'input_attrs'     => array(
				'min'  => 10000,
				'max'  => 500000,
				'step' => 10000,
			),
		)
		) ); 
		$wp_customize->add_setting( 'mav_number_post_setting', array (
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mav_number_post_setting', array(
			'section'  => 'seos_recent_posts_section',
			'priority'    => 4,
			'settings' => 'mav_number_post_setting',
			'label'       => __( 'Number of Recent Posts', 'new-photography' ),			
			'type'     =>  'number',
			'default'     => 5,
			'input_attrs'     => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)
		) );
}

function new_photography_slider_sticky (){ ?>

			<div style="background-image: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/video.jpg);" class="simple-marquee-container">
	
				<div class="marquee">

					<ul class="marquee-content-items">
					
		<?php
				

		/* Get all sticky posts */
		$sticky = get_option( 'sticky_posts' );
		 
		/* Sort the stickies with the newest ones at the top */
		rsort( $sticky );
		 
		/* Get the 5 newest stickies (change 5 for a different number) */
		$sticky = array_slice( $sticky, 0, 50 );
		 
		/* Query sticky posts */
		$the_query1 = new WP_Query( array( 
		//'post__in' => $sticky, 
		//'ignore_mav_posts' => 1, 
		'posts_per_page' => get_theme_mod('mav_number_post_setting',5) ) 
		);
		// The Loop
		if ( $the_query1->have_posts() ) { ?>
				<?php while ( $the_query1->have_posts() ) {
					$the_query1->the_post(); ?>
				
						<li>
					<a href="<?php echo esc_url(get_permalink()); ?>">
						<div class="absolute-slide">
						
						<span><?php echo esc_html(get_the_title()); ?></span>
						<?php 
						if ( has_post_thumbnail() ) { 
							the_post_thumbnail( 'custom-size' );
						} else { ?>
						<img width="300" src="<?php echo esc_url(get_template_directory_uri()). "/images/no-img.webp"; ?>" />
						<?php } ?>
						</div>
					</a>
						</li>	
				<?php
				
			}
		}
		/* Restore original Post Data */
		wp_reset_postdata();
		?>	
					</ul>
				</div>
			</div>
<script>
    jQuery.fn.SimpleMarquee.defaults = {
	    autostart: true,
            property: 'value',
            onComplete: null,
            duration: <?php if (get_theme_mod('mav_number_setting')) { echo esc_html(get_theme_mod('mav_number_setting')); } else{ echo "80000";} ?>,
            padding: 10,
            marquee_class: '.marquee',
            container_class: '.simple-marquee-container',
            sibling_class: 0,
            hover: true
    };

			jQuery(function (){

				jQuery('.simple-marquee-container').SimpleMarquee();
				
			});
</script>
<?php }

/********************************************
* Back to top styles
*********************************************/ 

add_action( 'wp_enqueue_scripts', 'new_photography_slider_css' );

function new_photography_slider_css() {
		wp_enqueue_style( 'jquery-jConveyorTicker-css', get_template_directory_uri() . '/include/conveyor-ticker/marquee.css' );	
		wp_enqueue_script( 'jquery-jConveyorTicker-js', get_template_directory_uri() . '/include/conveyor-ticker/marquee.js' );	
        $conveyor_ticker_height_mod = esc_attr(get_option( 'conveyo_ticker_height' ));
		
		if($conveyor_ticker_height_mod) { $conveyo_ticker_height = ".autoplay1 .slick-slide, .autoplay1 div img {height: {$conveyor_ticker_height_mod}vw !important;}";} else {$conveyo_ticker_height ="";}
		
        wp_add_inline_style( 'style-css', 
		    $conveyo_ticker_height
		);
}