<?php
/**
 * Template for webinars
 * 
 */

global $post;

// Get External URL of Article
// Need to add these fields to ACF
$article_link      = get_field('article_link'); 
$article_link_text = get_field('article_link_text'); 

?>

<div class="row">
	<div class="small-10 small-offset-1 columns">
		<?php get_template_part( 'template-parts/section', 'breadcrumbs-social' ); ?>
	</div>
</div>

<?php
	$args = array(
    'post_type' => 'items',
    'posts_per_page' => 1,
    'tax_query' => array(
		array(
			'taxonomy' => 'expertise',
			'field'    => 'slug',
			'terms'    => 'published-articles',
			),
		),
	);
	$pub_articles = new WP_Query($args);
	if($pub_articles ->have_posts()) : 

		while($pub_articles ->have_posts()) : $pub_articles->the_post();
?>

	<!-- Title/Date -->
	<div id="webinar-title" class="row">
		<div class="small-10 small-offset-1 columns text-left">
			<h1><?php the_title(); ?></h1>
			<p class="date"><?php the_date('F d, Y') ?></p>
		</div>
	</div>
	<!-- /Title/Date -->

	<!-- Content -->
	<div id="webinar-content" class="row">
		<div class="small-10 small-offset-1 columns" >
			<p><?php echo wp_trim_words(get_the_content(),70,'...'); ?></p>
			<a href="<?php echo $article_link; ?>" class="orange-btn"><?php echo $article_link_text; ?></a>
		</div>
	</div>
	<!-- /Content -->

<?php endwhile;endif;wp_reset_postdata(); ?>
