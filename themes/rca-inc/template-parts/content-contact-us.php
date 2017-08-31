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

	<div class="row section-padding-60">
		<div class="small-10 small-offset-1 medium-8 medium-offset-2 text-center columns">
			<div class="entry-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rca-inc' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<!-- THIS DISPLAYS THE LOCATIONS FOR DESKTOP -->
			<div class="row">
				<div id="all-locations" class="small-10 small-offset-1 show-for-medium">
					<?php
						$args = array(
							'post_type' => 'locations',
						);

						$locations = new WP_Query($args);
						//var_dump($locations);

						if ( $locations->have_posts() ) {
							while ( $locations->have_posts() ) {
								$locations->the_post(); 
								//
								// Post Content here
								for($i=0;$i<count($locations); $i++) {
									$location_address = get_field('location_address');
									$location_phone = get_field('location_phone');
									$location_fax = get_field('location_fax');
									$location_email = get_field('location_email');

									$block = '<div id="location-block" class="row text-left">';
									$block .= '<div class="small-6 columns">';
									$block .= '<img src="'. get_the_post_thumbnail_url() . '"/>';
									$block .= '</div>';
									$block .= '<div class="small-6 columns">';
									$block .= '<div class="location-name">' . get_the_title() . '</div>';

									if($location_address):
										$block .= '<div class="location-address"><i class="fa fa-map-marker" aria-hidden="true"></i> <p>' . $location_address . '</p></div>';
									endif;
									if($location_phone):
										$block .= '<div class="location-phone"><i class="fa fa-phone" aria-hidden="true"></i> ' . $location_phone . '</div>';
									endif;
									if($location_email):
										$block .= '<div class="location-email"><i class="fa fa-envelope" aria-hidden="true"></i> ' . $location_email . '</div>';
									endif;
									if($location_fax):
										$block .= '<div class="location-fax"><i class="fa fa-fax" aria-hidden="true"></i> ' . $location_fax . '</div>';
									endif;								
									$block .= '</div>';
									$block .= '</div>';
									echo $block;

								} // end for loop
							} // end while
						} // end if
						wp_reset_postdata();
					?>

				</div>
			</div>
			<!-- END DESKTOP LAYOUT HERE -->
		</div>

	</div>
		<!-- MOBILE CONTACT PAGE LAYOUT -->
		<ul id="location-accordian" class="accordion hide-for-medium" data-accordion  data-allow-all-closed="true">

			<?php
				$args = array(
					'post_type' => 'locations',
				);

				$locations = new WP_Query($args);
				//var_dump($locations);
				//
				if ( $locations->have_posts() ) {
					while ( $locations->have_posts() ) {
						$locations->the_post(); 
						//
						// Post Content here
						for($i=0;$i<count($locations); $i++) {
							$location_address = get_field('location_address');
							$location_phone = get_field('location_phone');
							$location_fax = get_field('location_fax');
							$location_email = get_field('location_email');

							$block = '<li class="accordion-item" data-accordion-item>';
							$block .= '<a href="#" class="accordion-title location-name">' . get_the_title() . '</a>';
							$block .= '<div class="accordion-content" data-tab-content>';
							$block .= '<div class="row"><div class="small-10 small-offset-1 columns">';
							if($location_address):
								$block .= '<div class="location-address"><i class="fa fa-map-marker" aria-hidden="true"></i> <p>' . $location_address . '</p></div>';
							endif;
							if($location_phone):
								$block .= '<div class="location-phone"><i class="fa fa-phone" aria-hidden="true"></i> ' . $location_phone . '</div>';
							endif;
							if($location_email):
								$block .= '<div class="location-email"><i class="fa fa-envelope" aria-hidden="true"></i> ' . $location_email . '</div>';
							endif;
							if($location_fax):
								$block .= '<div class="location-fax"><i class="fa fa-fax" aria-hidden="true"></i> ' . $location_fax . '</div>';
							endif;	
							$block .= '</div></div>';
							$block .= '</li>';
							echo $block;

						} // end for loop
					} // end while
				} // end if
				wp_reset_postdata();
			?>
		</ul>
		<!-- /MOBILE CONTACT PAGE LAYOUT -->

</article><!-- #post-<?php the_ID(); ?> -->
