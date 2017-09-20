<?php

global $post;
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

get_header(); ?>
	
	<!-- Featured Image -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $backgroundImg[0]; ?>'); background-size: cover;">
				<div class="featured-img-title"><h1><?php the_title(); ?></h1></div>
		</div>
	</div>
	<!-- / Featured Image -->

	<!-- No Breadcrumbs on this page -->
	<?php #get_template_part( 'template-parts/section', 'breadcrumbs-social'); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main contact-page">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'contact-us' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div id="share-bar" class="row expanded">
		<div class="row text-center">
			<p>Share on Social Media</p>
			<a href="" title="RCA Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="" title="RCA Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<a href="" title="RCA LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
			<a href="" title="RCA eMail"><i class="fa fa-envelope" aria-hidden="true"></i></a>
			<a href="" title="Share"><i class="fa fa-share" aria-hidden="true"></i></a>
		</div>
	</div>
	
	<div id="contact-learn-more-wrapper">
		<?php get_template_part('template-parts/section', 'learn-more-form-container-white'); ?>
	</div>
<?php
//get_sidebar();
get_footer();