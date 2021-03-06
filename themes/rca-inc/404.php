<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package RCA_Inc.
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="row">
				<div class="small-10 small-offset-1 columns">
					<div class="row">
						<div class="small-12 medium-3 medium-offset-3 columns text-center">
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/404.jpg';?>" alt="RCA - 404 Page">
						</div>
						<div class="small-12 medium-6 columns text-center medium-text-left">
							<section class="error-404 not-found">
								<header class="page-header">
									<h1 class="page-title"><?php esc_html_e( 'Oops! This page does not exist. Please check the URL or use our search bar to start over. 
				', 'rca-inc' ); ?></h1>
									<a href="<?php echo get_site_url(); ?>"><?php get_template_part('template-parts/button', 'back-to-home' ); ?></a>
								</header><!-- .page-header -->
							</section><!-- .error-404 -->
						</div>
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
