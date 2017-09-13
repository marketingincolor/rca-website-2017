<?php 
require('../../../wp-blog-header.php');
header("HTTP/1.1 200 OK"); 
?>

<?php
	
	// Retrieve Query Vars.
	$category  = $_POST['category'];
	$dropdown_query = $_POST['dropdown_query'];
  
  	// Change News Query Based on whats clicked in rca-filter-news.js
  	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$news_query = new WP_Query( array(
    	'post_type' => 'post',
    	'category_name' => $category,
    	'posts_per_page' => 5,
    	'paged' => $paged,
    	'date_query' => array(
    		'year' => $dropdown_query
    	)
	));

	if($news_query->have_posts()) { while($news_query->have_posts()) { $news_query->the_post(); 
?>

	<a href="#!"><?php the_post_thumbnail(); ?></a>

	<div class="row">
		<div class="small-10 small-offset-1 columns">
			<div class="story-container">
				<h2><?php the_title(); ?></h2>
				<p class="story-date"><?php echo get_the_date(); ?></p>
				<?php echo wp_trim_words(get_the_content(), 40, '...<a href="#">Read More</a>'); ?>
			</div>
		</div>
	</div>

<?php 
	}
	next_posts_link();
	previous_posts_link();

	}
	else{
		echo '<h3 class="">Sorry, no ' . $query . ' stories at this time.</p>';
	}
?>
