<?php
get_header(); ?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/item', 'type' );

			endwhile;
			?>

		</main>
	</div>

	<!-- LEARN MORE -->
	<?php get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	<!-- /LEARN MORE -->

<!-- NEWS -->
<?php get_template_part('template-parts/section', 'news'); ?>
<!-- /NEWS -->
	
<?php
//get_sidebar();
get_footer();