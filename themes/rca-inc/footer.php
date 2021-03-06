<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RCA_Inc.
 */

?>

	</div>
	<footer id="colophon" class="site-footer">
		<div class="site-info container">
			<div class="row">

				<!-- MOBILE/TABLET FOOTER MENUS -->
				<div class="small-12 columns hide-for-large">
					<div class="small-5 small-offset-1 columns text-center">
					<?php 
						$options = get_option('rca_theme_options');
						if ( $options['rca_twitter_textbox'] != null || $options['rca_twitter_textbox'] != "") : ?>
								<div class="footer-social-link">
									<a href="<?php echo $options['rca_twitter_textbox']; ?>" title="RCA Inc. Twitter" target="_blank"><i class="fa fa-twitter footer-social-icon" aria-hidden="true"></i></a>
								</div>
						<?php endif; 
					?>
					<?php wp_nav_menu( array( 'theme_location' => 'rca_mobile_footer_menu_left' ) ); ?>
					</div>
					<div class="small-5 end columns text-center">
					<?php 
						$options = get_option('rca_theme_options');
						if ( $options['rca_linkedin_textbox'] != null || $options['rca_linkedin_textbox'] != "") : ?>
								<div class="footer-social-link">
									<a href="<?php echo $options['rca_linkedin_textbox']; ?>" title="RCA Inc. LinkedIn" target="_blank"><i class="fa fa-linkedin footer-social-icon" aria-hidden="true"></i></a>
								</div>
						<?php endif; 
					?>
					<?php wp_nav_menu( array( 'theme_location' => 'rca_mobile_footer_menu_right' ) ); ?>
					</div>
				</div>
			</div>
			<!-- END MOBILE/TABLET FOOTER MENUS -->

			<!-- DESKTOP FOOTER MENU -->
			<div class="row">
				<div class="small-10 small-offset-1 columns show-for-large">
					<?php wp_nav_menu( array( 'theme_location' => 'rca_desktop_footer_menu' ) ); ?>
					<?php 
						$options = get_option('rca_theme_options');
						if ( $options['rca_twitter_textbox'] != null || $options['rca_twitter_textbox'] != "") : ?>
								<div class="footer-social-link">
									<a href="<?php echo $options['rca_twitter_textbox']; ?>" title="RCA Inc. Twitter" target="_blank"><i class="fa fa-twitter footer-social-icon" aria-hidden="true"></i></a>
								</div>
						<?php endif; 
					?>
					<?php 
						$options = get_option('rca_theme_options');
						if ( $options['rca_linkedin_textbox'] != null || $options['rca_linkedin_textbox'] != "") : ?>
								<div class="footer-social-link">
									<a href="<?php echo $options['rca_linkedin_textbox']; ?>" title="RCA Inc. LinkedIn" target="_blank"><i class="fa fa-linkedin footer-social-icon" aria-hidden="true"></i></a>
								</div>
						<?php endif; 
					?>
				</div>
			</div>
			<!-- /DESKTOP FOOTER MENU -->


		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
		<script>
			(function () {
				$('.hamburger-menu').on('click', function() {
					$('.bar').toggleClass('animate');
				})
			})();
		</script>
		

		<script>
			jQuery(function() {
			  jQuery(document).foundation();
			});
		</script>

		<script>
			jQuery(document).ready(function($) {
				$('.is-accordion-submenu-parent').on('click', function() {
					$(this).children("a:first-of-type").toggleClass('orange-bg');
					$(this).children("a").toggleClass('white-font');
				}),
				function(){
					$(this).children("a").toggleClass('orange-bg');
				};
			});
		</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.2/js/foundation.js"></script>
<!-- Slick Sliders -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/js/rca-sliders.js'; ?>"></script>
<!-- /Slick Sliders -->

</body>
</html>
