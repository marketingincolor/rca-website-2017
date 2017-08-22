<?php
/**
 * Purpose: Adds breadcrumbs and social links to pages that need it.
 */
?>

<div class="row">
	<div class="small-10 small-offset-1">
		<div class="small-12 medium-6 columns">
			<div id="breadcrumbs">
				<?php if( function_exists('simple_breadcrumb') ) { simple_breadcrumb(); }?>
			</div>
		</div>
		<div class="small-12 medium-6 columns text-right">
			<div id="share">
				<p style="display:inline-block;">Share on Social Media</p>
				<a href="#"><i class="fa fa-facebook share-section-btn-color" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-twitter share-section-btn-color" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-linkedin share-section-btn-color" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-envelope share-section-btn-color" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-share share-section-btn-color" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
</div>