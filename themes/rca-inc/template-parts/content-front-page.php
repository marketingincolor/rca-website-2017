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
	
	<!-- CTA -->
	<div id="sign-up-cta" class="">

		<!-- mobile cta -->
		<div class="row text-center hide-for-medium">
			<div class="small-10 small-offset-1 columns">
				<h3>Sign up for our Free Combination Products Webinar</h3><br />
				<button id="learn-more-btn">Sign Up Here</button>
			</div>
		</div>
		<!-- end mobile cta -->

		<!-- desktop cta -->
		<div class="row text-center show-for-medium" data-equalizer>
			<div class="medium-7 medium-offset-1 columns" data-equalizer-watch>
				<h3>Sign up for our Free Combination Products Webinar</h3><br />
			</div>
			<div class="medium-3 columns end relative" data-equalizer-watch>
				<button id="learn-more-btn">Sign Up Here</button>
			</div>
		</div>
		<!-- end desktop cta -->

	</div>
	<!-- END CTA -->
	
		<div id="all-case-studies">
			<!-- CASE STUDIES FIRST LOOP-->
			<div id="case-studies" class="row" style="padding-bottom: 0em;">
				<div class="small-10 small-offset-1 columns">
					<h1 class="text-center">Case Studies</h1>
					<?php

					   $args = array(
					      'post_type' => 'case_study',
					      'posts_per_page' => 1
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
				<div class="small-10 small-offset-1 columns">
					<div class="row">
					
							<?php

							   $args = array(
							      'post_type' => 'case_study',
							      'posts_per_page' => 2,
							      'offset' => 1
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
					<div class="small-10 small-offset-1 medium-4 medium-offset-4 large-2 large-offset-5 columns">
						<button class="orange-btn">View All Case Studies</button>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	<!-- END CASE STUDIES -->

	<!-- LEARN MORE -->
	<div id="learn-more-form-container">
		<div class="row">
			<div class="small-10 small-offset-1 columns text-center">
				<h1>I'm interested in Learning More About RCA</h1>
			</div>
		</div>
		<div class="row">
			<div class="small-10 small-offset-1">
				<form>
					    <legend></legend>
					    <div class="large-4 columns">
					    	<input type="text" name="first_name" id="" placeholder="&#61447; First Name">
					    </div>
					    <div class="large-4 columns">
					    	<input type="text" name="first_name" id="" placeholder="&#61447; Last Name">
					    </div>
					    <div class="large-4 columns">
					 		<input type="email" name="email_address" id="" placeholder="&#xf0e0; Email Address">
					    </div>
					    <div class="large-4 columns">
					    	<input type="text" name="phone_number" id="" placeholder="&#xf095; Phone Number">
					    </div>
						<div class="large-4 columns">
					    	<input type="text" name="address" id="" placeholder="&#xf041; Address">
						</div>
						<div class="large-4 columns">
					    	<input type="text" name="city" id="" placeholder="&#xf041; City">
						</div>
						<div class="large-4 columns">
							<input type="text" name="state" id="" placeholder="&#xf041; State">
						</div>
						<div class="large-4 columns">
					    	<input type="text" name="country" id="" placeholder="&#xf041; Country">
						</div>
						<div class="large-4 columns">
					    	<input type="text" name="zip_code" id="" placeholder="&#xf041; Zip Code">
						</div>
						<div class="large-12 columns">
					    	<input type="text" name="company" id="" placeholder="&#xf0b1; Company">
						</div>
						<div class="large-12 columns">
							<input type="text" name="industry" id="" placeholder="&#xf0f7; Industry">
						</div>
						<div class="large-12 columns">
							<label for="">&#xf086; Comments/Questions</label>
							<textarea name="" id="" cols="30" rows="4"></textarea>
						</div>
						<div class="large-12 columns">
							<input type="submit" value="Submit">
						</div>
				</form>
			</div>
		</div>
	</div>
	
	<!-- /LEARN MORE -->

	<!-- NEWS -->
	<?php echo do_shortcode('[rca-news-slider category="news" items=1 autoPlay=true itemsDesktop=1000,2]'); ?>
	<!-- /NEWS -->

	<!-- EDIT -->
	<?php #get_template_part('template-parts/section', 'edit'); ?>
	<!-- /EDIT -->

</article><!-- #post-<?php the_ID(); ?> -->
