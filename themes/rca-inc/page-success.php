<?php 
	/* Template Name: Success */
	get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

<section class="success" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)">
	<div class="row">
		<div class="small-10 medium-8 large-6 small-centered columns text-center">
			<i class="fa fa-check-circle-o" aria-hidden="true"></i>
			<h1><?php the_title(); ?></h1>
			<p><?php the_content(); ?></p>
			<a href="#!" class="white-btn">Follow us on LinkedIn</a>
		</div>
	</div>
</section>

<?php endwhile;endif;get_footer(); ?>

<style>
	/*========================================*/
	/*======== SUCCESS PAGE TEMPLATE =========*/
	/*========================================*/
	.success{
		padding: 8% 0;
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center center;
	}
	.success i,.success h1,.success p{
		margin-bottom: 5%;
		color: #FFF;
	}
	.success i{
		font-size: 14em;
	}
	.success p{
		margin-bottom: 10%;;
	}
	/* ==== White button w/transparent bg style  ==== */
	.white-btn{
		background-color: transparent;
		border: 2px solid #FFF;
		color: #FFF;
		padding: 10px 25px;
		transition: all 0.25s ease-in-out;
		font-weight: 700;
	}
	.white-btn:hover{
		background-color: #FFF;
		color: #1a365d;
	}
</style>