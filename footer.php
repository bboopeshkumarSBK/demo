<?php
// Do not allow direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 */
?>
	</div><!-- #content -->
	<footer id="colophon" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
			<div class="footer-center">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<div class="footer-widgets">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<div class="footer-widgets">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<div class="footer-widgets">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<div class="footer-widgets">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>
				<?php endif; ?>
			</div>		
		<div class="site-info">
		<?php
		if ( get_theme_mod( 'new_photography__copyright' ) ) {
			echo wp_kses_post( get_theme_mod( 'code_copyright_text' ) );
		}
		else { ?>
			<a class="powered" href="<?php echo esc_url( __( 'https://wordpress.org/', 'new-photography' ) ); ?>">
				<?php
				esc_html_e( 'Powered by WordPress', 'new-photography' );
				?>
			</a>
			<p>
				<?php esc_html_e( 'All rights reserved', 'new-photography' ); ?>  &copy; <?php bloginfo( 'name' ); ?>			
				<a title="Seos Theme - New Photography" href="<?php echo esc_url( 'https://seosthemes.com/', 'new-photography' ); ?>" target="_blank"><?php esc_html_e( 'New Photography Theme by Seos Themes', 'new-photography' ); ?></a>
			</p>
		<?php } ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<?php if( get_theme_mod( 'activate_back_to_top', true ) ) { ?>
	<a href="#" class="cd-top text-replace js-cd-top"><span class="dashicons dashicons-arrow-up-alt2"></span></a>
	<?php } ?>
<?php wp_footer(); ?>
</body>
</html>