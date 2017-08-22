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

	<div class="row">
		<div class="small-10 small-offset-1 columns">
			<div class="entry-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rca-inc' ),
						'after'  => '</div>',
					) );
				?>


				<!-- board of directors -->
				<div class="row">
					<div class="small-12 columns text-center">
						<div class="team-wrapper">
							<div class="team-wrapper-title">
								<h2>Board of Directors</h2>
							</div>
						</div>
						<?php get_template_part('template-parts/query', 'board-directors-team'); ?>
					</div>
				</div>

				<!-- end board of directors -->

				<!-- operations team-->
				<div class="row">
					<div class="small-12 columns text-center">
						<div class="team-wrapper">
							<div class="team-wrapper-title">
								<h2>Operations</h2>
							</div>
						</div>
						<?php get_template_part('template-parts/query', 'operations-team'); ?>
					</div>
				</div>
				<!-- end operations team -->


			</div><!-- .entry-content -->
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
