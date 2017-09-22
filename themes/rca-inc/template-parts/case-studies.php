<?php
/**
 * Template for Case Studies
 * 
 */
	$background_text  = get_field('background_text');
	$background_title = get_field('background_title');
	$solution_title   = get_field('solution_title');
	$solution_text    = get_field('solution_text');
	$result_title   = get_field('result_title');
	$result_text    = get_field('result_text');
?>
<div id="all-expertise-content">

	<!-- Title -->
	<div class="row">
		<div class="small-10 small-offset-1 columns text-left">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	<!-- /Title -->

	<!-- Button -->
	<div class="row">
		<div class="small-10 small-offset-1 columns">
			<button style="margin: 1rem 0rem 0rem; width: auto;" class="text-left"><i class="fa fa-download" aria-hidden="true"></i> Download</button>
		</div>
	</div>
	<!-- /Button -->

	<!-- Content -->
	<div id="expertise-content" class="row case-study-content">
		<div class="small-10 small-offset-1 columns">
			<h3>sdvfsvdfv<?php echo $background_title; ?></h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae repellendus omnis iure expedita quae sunt? Fuga eos quasi sequi distinctio ipsum iure illo dolorem expedita. Doloribus deleniti quam nobis provident.</p>
			<h3>sdvfsdvf<?php echo $solution_title; ?></h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio nostrum suscipit vitae, minima, debitis ex. Laborum deserunt, aperiam harum molestiae vitae quod, provident similique, explicabo optio animi suscipit totam laboriosam.</p>
			<div class="case-study-quote">
				<p>"RCA understood our needs and helped design a CAPA process that aligns with industry best practices and takes us to the next level."</p>
			</div>
			<h3>sdvfsdv<?php echo $result_title; ?></h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, totam sunt tenetur aliquam deleniti culpa dignissimos, doloribus nulla, maiores facere, architecto pariatur fuga asperiores! Unde iste, magni officiis veniam error?</p>
		</div>
	</div>
	<!-- /Content -->

	<!-- Button -->
	<div class="row">
		<div class="text-center">
			<button style="margin: 1rem 0rem 0rem; width: auto;"><i class="fa fa-download" aria-hidden="true"></i> Download</button>
		</div>
	</div>
	<!-- /Button -->

</div>

<style>
	.case-study-content h3{
		font-size: 22px;
		font-weight: bold;
		color: #2b2b2b;
		display: inline;
	}
	.case-study-quote{
		float: right;
		width: 41.6667%;
		padding: 40px;
		color: #FFF;
		background-color: #1a365d;
		display: inline;
	}
</style>