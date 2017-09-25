<?php
get_header(); ?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/item', 'type' );
				
				$terms      = wp_get_post_terms($post->ID,'expertise');
				$terms_desc = $terms[0]->description;
				if (strpos($terms_desc, 'gated') !== false) {
					get_template_part('template-parts/section', 'takeover-modal');
				  echo '<a href="#" data-open="takeover-modal">Takeover</a>';
				}
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