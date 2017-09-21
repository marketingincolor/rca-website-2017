<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RCA_Inc.
 */

get_header(); ?>

	<!-- TOP SLIDER -->
	<section class="top-slider">

			<!-- Use this php if making a custom post type for sliders -->
			<?php
				// Get post count of slider with home-top category

				// $my_query = new WP_Query(array('post_type' => 'slider','category_name' => 'home-top'));
				// $slider_count = $my_query->post_count;

				// Query custom post type slider

				// $args = array(
				// 	'post_type' => 'slider', 
				// 	'category_name' => 'home-top',
				// 	'posts_per_page' => -1
				// );
				// $slider_query = new WP_Query( $args );
				// while ( $slider_query->have_posts() ) : $slider_query->the_post();
			?>

		<style>
			.orbit-slide{
				padding: 30px 0;
			}
			.slide-meta{
				/*position: absolute;*/
				left: 0;
				padding: 30px;
				background-color: rgba(196,97,43,0.8);
				color: #FFF
			}
			.slide-meta p{
				margin-bottom: 30px;
				font-size: 22px;
				font-weight: 700;
			}
			.slide-meta a{
				color: #FFF;
				border: 2px solid #FFF;
				padding: 5px 15px;
				font-size: 16px;
		  }
		</style>

		<div class="orbit" id="home-top-slider" role="region" aria-label="Favorite Space Pictures" data-orbit>
		  <div class="orbit-wrapper">
		    <ul class="orbit-container">
		      <li class="is-active orbit-slide" style="background-image: url(http://fillmurray.com/1500/501);">
		        <div class="row">
		        	<div class="small-4 columns">
		        		<div class="slide-meta">
		        			<p>Sign up our Managing Challenging Submissions Webinar</p>
		        			<p class="text-center"><a href="#!">Sign Up Here</a></p>
		        		</div>
		        	</div>
		        </div>
		      </li>
		      <li class="orbit-slide" style="background-image: url(http://fillmurray.com/1500/500);">
		        <div class="row">
		        	<div class="small-4 columns">
		        		<div class="slide-meta">
		        			<p>Sign up our Managing Challenging Submissions Webinar</p>
		        			<p class="text-center"><a href="#!">Sign Up Here</a></p>
		        		</div>
		        	</div>
		        </div>
		      </li>
		      <li class="orbit-slide" style="background-image: url(http://fillmurray.com/1500/499);">
		        <div class="row">
		        	<div class="small-4 columns">
		        		<div class="slide-meta">
		        			<p>Sign up our Managing Challenging Submissions Webinar</p>
		        			<p class="text-center"><a href="#!">Sign Up Here</a></p>
		        		</div>
		        	</div>
		        </div>
		      </li>
		    </ul>
		  </div>

			<?php //endwhile; wp_reset_postdata(); ?>

		  <nav class="orbit-bullets">

			  <?php 
			  	// use total post count to determine number of dots
			  	#for ($i=0; $i < $slider_count; $i++) { 
			  		
			  ?>
			  <!-- <button class="<?php //if($i==0){echo 'is-active';} ?>" data-slide="<?php #echo $i; ?>"></button> -->
		    <?php //} ?>
			  
		    <button class="is-active" data-slide="0"></button>
		    <button data-slide="1"></button>
		    <button data-slide="2"></button>
		  </nav>
		</div>
	</section>
	<!-- /TOP SLIDER -->

	
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<!-- CONTENT -->

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'front-page' );


			endwhile; // End of the loop.
			?>

			<!-- /CONTENT -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>