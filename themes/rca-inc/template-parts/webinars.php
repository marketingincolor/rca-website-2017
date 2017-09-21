<?php
/**
 * Template for webinars
 * 
 */

global $post;

// Get Webinar Information
$date  = new DateTime(get_field('when', false, false));
$time  = get_field('time_range');
$where = get_field('where');
$people = get_field('who_will_benefit');
$webinar_form_title = get_field('webinar_form_title');
$webinar_form_copy = get_field('webinar_form_copy');
$webinar_title = get_field('webinar_title');
$presenters = get_field('presenters');

$presenters = explode(',', $presenters);
// Header BG
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 

?>

<!-- Featured Image -->
<div id="featured-img-wrapper" class="row expanded">
	<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
            rgba(196,97,43,0.7) url('<?php echo $backgroundImg[0]; ?>'); background-size: cover;">
			<div class="featured-img-title"><h1><?php the_title(); ?></h1></div>
	</div>
</div>
<!-- / Featured Image -->


		
<div style="background-color: #f8f7f5;">
	<div id="webinar-information-block" class="row" data-equalizer>

		<div class="small-10 small-offset-1 columns">

			<!-- Calendar -->
			<?php if($date != NULL || $time != NULL): ?>
			<div class="when-block text-center medium-4 columns text-center" data-equalizer-watch>
				<i class="fa fa-calendar fa-3x" aria-hidden="true"></i>
				<h2>When</h2>
				<p class="meta"><?php echo $date->format('l, F d, Y'); ?>
				<p class="meta"><?php echo $time; ?></p>
			</div>
			<?php endif; ?>
			<!-- /Calendar -->


			<!-- People Block -->
			<div class="who-block medium-4 columns text-center" data-equalizer-watch>
				<i class="fa fa-users fa-3x" aria-hidden="true"></i>
				<h2>Who Will Benefit</h2>
				<?php
				$count = 0;
				foreach ($people as $person) {
					if($count%3):
						$addClass='medium-6';
					endif;
					echo '<div class="">';
					echo '<p class="meta">'.$person.'</p>';
					echo '</div>';
					$count++;
				}
				?>
			</div>
			<!-- /People Block -->

			<!-- Where Block -->
			<?php if($where != NULL): ?>
			<div class="where-block medium-4 columns text-center" data-equalizer-watch>
				<i class="fa fa-map-marker fa-3x" aria-hidden="true"></i>
				<h2>Where</h2>
				<p class="meta"><?php echo $where; ?></p>
			</div>
			<?php endif; ?>
			<!-- /Where Block -->



		</div>
	</div>
</div>


<div id="webinar-form-block">
	<div class="row">
		<div id="form" class="small-10 small-offset-1 columns">
			
			<h1 class="text-center"><?php echo $webinar_form_title; ?></h1>
			<p class="text-center"><?php echo $webinar_form_copy; ?></p>

			<form action="">
				<div class="small-12 medium-4 columns"><input type="text"></div>
				<div class="small-12 medium-4 columns"><input type="text"></div>
				<div class="small-12 medium-4 columns"><input type="text"></div>
				<div class="small-12 medium-4 columns"><input type="text"></div>
				<div class="small-12 medium-4 columns"><input type="text"></div>
				<div class="small-12 medium-4 columns"><input type="text"></div>
				<div class="small-12 columns text-center"><input type="submit"></div>
			</form>
			
		</div>
	</div>
</div>

<div class="row">
	<div class="small-10 small-offset-1 columns">
		<?php get_template_part( 'template-parts/section', 'breadcrumbs-social' ); ?>
	</div>
</div>

<div id="">

	<!-- Title -->
	<div id="webinar-title" class="row">
		<div class="small-10 small-offset-1 columns text-left">
			<h1><?php echo $webinar_title; ?></h1>
		</div>
	</div>
	<!-- /Title -->

	<!-- Content -->
	<div id="webinar-content" class="row">
		<div class="small-10 small-offset-1 columns" >
			<?php the_content(); ?>
		</div>
	</div>
	<!-- /Content -->


</div>

<div id="your-expert-presenters">

	<div id="title" class="row">
		<div class="small-10 small-offset-1">
			<div class="medium-8 medium-offset-2 columns">
				<h2 class="text-center medium-text-left">Your Expert Presenters</h2>
			</div>
		</div>
	</div>		

	<div class="row">
		<div class="small-10 small-offset-1 columns">

			<?php foreach($presenters as $presenter) {
				//get user data
				$user_data = get_userdata($presenter);
				$user_meta = get_user_meta($user_data->ID);
				// var_dump($user_meta);

				echo '<div id="presenter-block" class="row">';
				echo '<div class="small-12 medium-2 columns">';
				echo get_wp_user_avatar($user_data->ID);
				echo '</div>';
				echo '<div class="small-12 medium-8 columns end">';
				echo '<h3>' . $user_data->display_name . '</h3>';
				echo '<p>' . $user_meta["position"][0] . '</p>';
				echo '<p>' . $user_meta["webinar_biography"][0] . '</p>';
				echo '</div>';
				echo '</div>';


			}
			?>
			
		</div>
	</div>
</div>