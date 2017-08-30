<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RCA_Inc.
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://fonts.googleapis.com/css?family=Lora:400,700,700i|Roboto" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.1/foundation.min.css">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="profile" href="http://gmpg.org/xfn/11">
		<script
		  src="https://code.jquery.com/jquery-3.2.1.min.js"
		  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		  crossorigin="anonymous">
		  	
		</script>

			<?php wp_head(); ?>
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
		<!-- Add the slick-theme.css if you want default styling -->
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>
	</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rca-inc' ); ?></a>

	<header id="masthead" class="site-header">
		<section id="entire-header">

			<!-- LOGO -->
			<div class="row expanded">
				<div class="site-branding small-12 columns align-items-center text-center">
					<?php the_custom_logo(); ?>
				</div>
			</div>

			<!-- PHONE ON MOBILE BUTTON -->
			<div id="phone-icon" class="row expanded title-bar hide-for-large" data-equalizer>

				<div class="small-6 columns text-center" data-equalizer-watch>
					<p style="margin-bottom:0rem;"><i class="fa fa-phone" aria-hidden="true"></i> Contact Us</p>		
				</div>
				<div id="menu-section" class="small-6 columns relative" data-equalizer-watch style="border-left: 2px solid #fff;">
					<div class="horizontal-center" data-responsive-toggle="the-menu" data-hide-for="large" style="top:50%; transform: translate(-50%,-425%);">
						<div class="hamburger-menu" type="button" data-toggle><div class="bar"></div></div>
					</div>
				</div>
			</div>

					<!-- MAIN NAVIGATION -->
			<!-- 		<div class="row expanded" style="background-color:#f8f7f5;" data-equalizer>
						<div class="large-10 large-offset-1 columns">
							<div class="top-bar" id="the-menu">
							    <div class="top-bar-left" data-equalizer-watch>
								    <?php
										// wp_nav_menu( array(
										// 	'container'      => false,
										// 	'menu'           => 'menu-1',
										// 	'menu_class'     => 'large-horizontal menu vertical accordian-menu mega-menu',
										// 	'theme_location' => 'menu-1',
										// 	'items_wrap'     => '<ul id="%1$s" class="%2$s accordian-menu" data-hide-for="large" data-accordion-menu>%3$s</ul>',
										// 	//Recommend setting this to false, but if you need a fallback...
										// 	'walker'         => new RCA_ACCORDIAN_MENU_WALKER(),
										// ) );

										?>
							    </div>
							    <div class="top-bar-right relative show-for-large text-center" data-equalizer-watch>
							    	<a href=#" style="line-height:16px;"><p style="font-weight: bold; color: #fff; margin-bottom: 0rem; position: relative; padding: 1rem 1rem; width: 200px"><i class="fa fa-phone" aria-hidden="true"></i> Contact Us</p></a>		

							    </div>
							</div>
						</div>
					</div>
			 -->
					 <div id="top-menu">
					 <div id="top-menu" class="row">
						 <div class="large-12 columns">
					<!-- 	  <ul id="mega-menu-container" class="menu" data-dropdown-menu data-click-open="true" data-disable-hover="true">
						    <li>
						      <a href="#">University</a>
						    </li>
						    <li class="mega-menu">
						      <a href="#">Programs</a>
						      <ul class="menu">

						      </ul>

						  </ul> -->
					    <?php
							// wp_nav_menu( array(
							// 	'container'      => false,
							// 	'menu'           => 'menu-1',
							// 	'menu_class'     => 'mega-menu menu',
							// 	'menu_id' => 'mega-menu-container',
							// 	'theme_location' => 'menu-1',
							// 	'items_wrap'     => '<ul id="%1$s" class="%2$s" data-hide-for="large" data-dropdown-menu data-options="is_hover:true; hover_timeout:5000">%3$s</ul>',
							// 	//Recommend setting this to false, but if you need a fallback...
							// 	'walker' => new megaMenuWalker(),
							// ) );

						?>

						<ul id="mega-menu-container" class="dropdown menu show-for-large" data-dropdown-menu>
							<li class="mega-menu">
								<a href="#">Medical Devices</a>
									<ul class="menu">
										<li>
											<div class="row">
												<div class="small-8 columns">

													<div class="medium-6 columns">
														<h3>Regulatory Affairs</h3>
														<?php

														wp_nav_menu( 
														  array(
														    'menu' => 'Regulatory Affairs', 
														    'menu_class' => 'menu',
														  )
														); ?>
													</div>

													<div class="medium-6 columns">
														<h3>Quality Services</h3>
													</div>

													<div class="medium-6 columns">
														<h3>Compliance Assurance</h3>
														<?php wp_nav_menu( array('menu' => 'Compliance Assurance' )); ?>
													</div>

													<div class="medium-6 column end">
														<h3>Remediation Strategy and Support</h3>
														<?php wp_nav_menu( array('menu' => 'Remediation Strategy and Support' )); ?>
													</div>

												</div>
												<div class="small-4 columns">
													<div class="medium-12 column">
														<h3>Strategic Consulting</h3>
														<?php wp_nav_menu( array('menu' => 'Strategic Consulting' )); ?>
													</div>
												</div>

											</div>
										</li>
									</ul>
								</li>
								<li><a href="#">Pharmaceutical</a></li>
								<li><a href="#">Additional Services</a></li>

								<li><a href="#">About</a></li>
								<li><a href="#">News</a>
								</li>
								<li class="contact-menu-item"><a href=""><i class="fa fa-phone" aria-hidden="true"></i> Contact</a></li>
							</li>
						</ul>	 	
					</div>
				</div>
		<!-- SECONDARY NAV ON DESKTOP -->
		<div id="secondary-menu">
			<div  class="row show-for-large">
				<div class="large-12 columns" style="background-color: #9d938a; padding: 1rem;">
					<div class="row" data-equalizer>
						<div class="small-8 columns" data-equalizer-watch>
							<?php 
								wp_nav_menu( 
									$args = array( 
										'menu' => 'Secondary Menu',
										'walker' => new RCA_SECONDARY_WALKER()
								 	)
								); 
							?>
						</div>
						<div class="small-4 columns" data-equalizer-watch>
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	</header>

	<div id="content" class="site-content relative">
