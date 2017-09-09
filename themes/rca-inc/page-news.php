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


	<?php

	get_template_part( 'template-parts/section', 'breadcrumbs-social' ); ?>

	<!-- Buttons -->
	<div id="news-all-buttons" class="row">
		<div class="small-12 medium-2 medium-offset-1 columns">
			<button id="filter-news" class="news-filter" onclick="ajaxFilterNews('<?php echo get_stylesheet_directory_uri(); ?>')" title="News" news_filter="news">News</button>
		</div>
		<div class="small-12 medium-2 columns">
			<button id="press" class="news-filter" onclick="ajaxFilterNews('<?php echo get_stylesheet_directory_uri(); ?>')" title="Press Releases" news_filter="press-releases">Press Releases</button>
		</div>
		<div class="small-12 medium-2 columns">
			<button id="events" class="news-filter" onclick="ajaxFilterNews('<?php echo get_stylesheet_directory_uri(); ?>')" title="Events" news_filter="events">Events</button>
		</div>
		<div class="small-12 medium-2 columns">
			<button id="all" class="news-filter" onclick="ajaxFilterNews('<?php echo get_stylesheet_directory_uri(); ?>')" title="" news_filter="all">View All</button>
		</div>
		<div class="small-12 medium-2 columns end" onclick="ajaxFilterNews('<?php echo get_stylesheet_directory_uri(); ?>')" news_filter="Year Published">

			<!-- Dynamically Set Year in Dropdown -->
			<select id="newsFilterSelect" class="news-filter" onclick="ajaxFilterNews('<?php echo get_stylesheet_directory_uri(); ?>')">
			<?php 
				$beginning_year = 2016;
				$current_year = date("Y");
				var_dump($current_year);
				echo '<option value="Year Published">Year Published</option>';
				for ($i = $beginning_year; $i <= $current_year; $i++ ){ ?>
					<center><option class="news-filter" value="<?php echo $i;?>" news_filter="<?php echo $i; ?>"><?php echo $i; ?></option></center>
			<?php	}
			?>
			</select>
			<!-- /Dynamically Set Year in Dropdown -->

		</div>
	</div>
	<!-- /Buttons -->


	<div class="post-container">

				
	</div>


<?php
//get_sidebar();
get_footer();