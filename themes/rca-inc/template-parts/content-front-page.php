<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RCA_Inc.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div id="front-page-main-content">

		<!-- TITLE -->
		<div class="row">
			<div class="small-10 small-offset-1 columns text-center">
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
			</div>
		</div>
		<!-- END TITLE -->

		<!-- CONTENT -->
		<div class="row">
			<div class="small-10 small-offset-1 columns  text-center">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rca-inc' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		</div>
		<!-- END CONTENT -->
		
		<!-- SERVICES -->
		<div id="front-page-services" class="row text-center">
				<?php 

				$img_array = array(
					get_field('medical_device_image'), 
					get_field('pharmaceutical_image'), 
					get_field('additional_services_image')
				);


				$title_array = array(
					get_field('medical_device_title'), 
					get_field('pharmaceutical_title'), 
					get_field('additional_services_title')
				);

				$content_array = array(
					get_field('medical_device_content'), 
					get_field('pharmaceutical_content'), 
					get_field('additional_services_content')
				);

				$button_array = array(
					get_field('medical_device_link'),
					get_field('pharmaceutical_link'),
					get_field('additional_services_link')
				);
				echo '<div class="small-10 small-offset-1 columns">';

				for($i=0;$i<3;$i++) {

					if( $i == 2 ){
						$additional_class = 'end';
					}

					else{
						$additional_class = '';
					}

					echo '<div class="small-12 medium-4 ' . $additional_class . ' columns">';
					echo '<img src="' . $img_array[$i]['url'] . '" />';
					echo '<h4>' . $title_array[$i] . '</h4>';
					echo '<p>' . $content_array[$i] . '</p>';
					echo '<a href="'.$button_array[$i].'"><button>Learn More</button></a>';
					echo '</div>';
				}
				echo '</div>';
				?>

		</div>
		<!-- /SERVICES -->

	</div>

	<!-- CTA -->
	<div id="sign-up-cta" class=""  style="background: url('<?php echo get_stylesheet_directory_uri() . '/images/blue-cta.jpg'; ?>'); background-size: cover; height: auto;">

		<!-- mobile cta -->
		<div class="row text-center hide-for-medium">
			<div class="small-10 small-offset-1 columns">
				<h3>Sign up for our Free Combination Products Webinar</h3><br />
				<button id="learn-more-btn">Sign Up Here</button>
			</div>
		</div>
		<!-- end mobile cta -->

		<!-- desktop cta -->
		<div class="row text-center medium-text-left show-for-medium" data-equalizer>
			<div class="medium-6 medium-offset-2 columns" data-equalizer-watch>
				<h3>Sign up for our Free Combination Products Webinar</h3><br />
			</div>
			<div class="medium-2 columns end relative" data-equalizer-watch>
				<button id="learn-more-btn">Sign Up Here</button>
			</div>
		</div>
		<!-- end desktop cta -->

	</div>
	<!-- END CTA -->
	
		<div id="all-case-studies">
			<!-- CASE STUDIES FIRST LOOP-->
			<div id="case-studies" class="row" style="padding-bottom: 0em;">
				<div class="small-10 small-offset-1 medium-8 medium-offset-2 columns">
					<h1 class="text-center">Case Studies</h1>
					<?php

					   $args = array(
					      'post_type' => 'items',
					      'posts_per_page' => 1,
					      'tax_query' => array(
							array(
								'taxonomy' => 'expertise',
								'field'    => 'slug',
								'terms'    => 'case-studies',
							),
						),

					   );

						$case_studies = new WP_Query($args);
						if($case_studies ->have_posts()) : 

							while($case_studies ->have_posts()) : $case_studies->the_post();

								echo '<div class="individual-case-study">';
									echo '<h3 class="text-left">' . get_the_title() . '</h3>';
									echo '<p class="text-left">' . wp_trim_words( get_the_content(), 40, '...</br><a href="#" title="Read More" class="read-more">Read More</a>' ) . '</p>';
								echo '</div>';
							endwhile;

						endif;

						?>

						<?php wp_reset_postdata();
					?>
				</div>
			</div>
			<!-- /CASE STUDIES FIRST LOOP -->

			<!-- CASE STUDIES SECOND LOOP -->
			<div class="row">
				<div class="small-10 small-offset-1 medium-8 medium-offset-2 columns">
					<div class="row">
					
							<?php

							   	$args = array(
									'post_type' => 'items',
									'posts_per_page' => 2,
									'offset' => 1,
									  'tax_query' => array(
										array(
											'taxonomy' => 'expertise',
											'field'    => 'slug',
											'terms'    => 'case-studies',
										),
									)
							   	);

								$case_studies = new WP_Query($args);
								if($case_studies ->have_posts()) : 

									while($case_studies ->have_posts()) : $case_studies->the_post();
								?>

										<div class="small-12 medium-6 columns">
								<?php
										echo '<div class="individual-case-study">';
											echo '<h3 class="text-left">' . get_the_title() . '</h3>';
											echo '<p class="text-left">' . wp_trim_words( get_the_content(), 40, '...</br><a href="#" title="Read More" class="read-more">Read More</a>' ) . '</p>';
										echo '</div>';
										echo '</div>';
									endwhile;

								endif;

								?>

								<?php wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
				<!-- CASE STUDIES SECOND LOOP -->
				<div class="row">
					<div class="small-10 small-offset-1 columns">
						<button class="home-cs-orange-btn">View All Case Studies</button>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	<!-- END CASE STUDIES -->

	<!-- LEARN MORE -->
	<?php get_template_part('template-parts/section', 'learn-more'); ?>
	<!-- /LEARN MORE -->

	<!-- NEWS -->
	<?php #echo do_shortcode('[rca-news-slider category="news" items=1 autoPlay=true itemsDesktop=1000,2]'); ?>
	<div id="news-container">
		<div style="background: url('<?php echo get_stylesheet_directory_uri() . '/images/news-section.jpg';?>'); background-size: cover; height: auto; padding: 2.5rem 0rem;">
			
			<div class="row">
				<div class="small-12 columns text-center" style="color: white;">
					<h3>News</h3>
				</div>
			</div>
			<div id="news-snippets-wrapper" class="row text-center">
					
					<?php
						wp_reset_postdata();
						$category_id = get_cat_ID('news');

						$args = array(
							'post_type' => 'post',
							'cat' => $category_id,
							// 'orderby' => 'date',
							// 'order' => 'ASC',
							'posts_per_page' => 3

						);

						$news_query = new WP_Query($args);

						if ( $news_query->have_posts() ) { 
							while ( $news_query->have_posts() ) {
								$news_query->the_post();
								echo '<div class="small-12 medium-6 large-4 columns" style="Color: white;">';
								#the_title();
								echo wp_trim_words(get_the_content(), $num_words = 15, '...<br/>Read More');
								echo '</div>';
							}
						}




					?>

			</div>
		</div>		
	
	</div>
	</div>
	<!-- /NEWS -->

	<!-- EDIT -->
	<?php #get_template_part('template-parts/section', 'edit'); ?>
	<!-- /EDIT -->

</article><!-- #post-<?php the_ID(); ?> -->
