<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The header for our theme
 *
 */
?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/WebPage" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
		<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } else { do_action( 'wp_body_open' ); } ?>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'new-photography' ); ?></a>
		<?php new_photography__header ();
		
		if ( get_theme_mod('new_photography_home_activate_breadcrumb') and ( !is_front_page() || !is_home()) ) {
		    do_action('breadcrumbs');
		}
		
		if (get_theme_mod('new_photography_home_page_breadcrumb') && (is_front_page() || is_home())) {
		    do_action('breadcrumbs');
		}
?>

		<?php if ( is_front_page() or is_home() ) { ?>
			
			<div class="container-images">
			
			<?php if(get_theme_mod('new_photography_img1') ) : ?>
					<a href="<?php echo esc_url(get_theme_mod('new_photography_url1')); ?>">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title"><?php echo esc_html(get_theme_mod('new_photography_title1')); ?></div>
							<div class="sp-description"><?php echo esc_html(get_theme_mod('new_photography_text1')); ?></div>
							<img src="<?php echo esc_url(get_theme_mod('new_photography_img1')); ?>" alt="img-1" />
						</div>
					</a>				
			<?php endif; ?>

			<?php if(get_theme_mod('new_photography_img2') ) : ?>
					<a href="<?php echo esc_url(get_theme_mod('new_photography_url2')); ?>">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title"><?php echo esc_html(get_theme_mod('new_photography_title2')); ?></div>
							<div class="sp-description"><?php echo esc_html(get_theme_mod('new_photography_text2')); ?></div>
							<img src="<?php echo esc_url(get_theme_mod('new_photography_img2')); ?>" alt="img-2" />
						</div>
					</a>				
			<?php endif; ?>

			<?php if(get_theme_mod('new_photography_img3') ) : ?>
					<a href="<?php echo esc_url(get_theme_mod('new_photography_url3')); ?>">
						<div class="sp-image">
							<div class="sp-overlay"></div>
							<div class="sp-title"><?php echo esc_html(get_theme_mod('new_photography_title3')); ?></div>
							<div class="sp-description"><?php echo esc_html(get_theme_mod('new_photography_text3')); ?></div>
							<img src="<?php echo esc_url(get_theme_mod('new_photography_img3')); ?>" alt="img-3" />
						</div>
					</a>				
			<?php endif; ?>
				
			</div><!-- .container-images -->
			
		<?php } ?>	
		<div id="content" class="site-content">