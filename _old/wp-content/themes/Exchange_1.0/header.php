<?php
/**
 * @package WordPress
 * @subpackage Exchange_1.0
 * @since Exchange 1.0
 */
?><!doctype html>

<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head id="<?php echo of_get_option('meta_headid'); ?>" data-template-set="exchange-1.0">

	<meta charset="<?php bloginfo('charset'); ?>">

	<!-- Always force latest IE rendering engine (even in intranet) -->
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
	<?php
		if (is_search())
			echo '<meta name="robots" content="noindex, nofollow" />';
	?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
	<?php
		if (true == of_get_option('meta_author'))
			echo '<meta name="author" content="' . of_get_option("meta_author") . '" />';
		if (true == of_get_option('meta_google'))
			echo '<meta name="google-site-verification" content="' . of_get_option("meta_google") . '" />';
	?>
	<meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">
	<?php
		if (true == of_get_option('meta_viewport'))
			echo '<meta name="viewport" content="' . of_get_option("meta_viewport") . ' minimal-ui" />';
		if (true == of_get_option('head_favicon')) {
			echo '<meta name=”mobile-web-app-capable” content=”yes”>';
			echo '<link rel="shortcut icon" sizes=”1024x1024” href="' . of_get_option("head_favicon") . '" />';
		}
		if (true == of_get_option('head_apple_touch_icon'))
			echo '<link rel="apple-touch-icon" href="' . of_get_option("head_apple_touch_icon") . '">';
	?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
    <script src="<?php echo get_template_directory_uri(); ?>/_/js/prefixfree.min.js"></script>
	<?php
		// Windows 8
		if (true == of_get_option('meta_app_win_name')) {
			echo '<meta name="application-name" content="' . of_get_option("meta_app_win_name") . '" /> ';
			echo '<meta name="msapplication-TileColor" content="' . of_get_option("meta_app_win_color") . '" /> ';
			echo '<meta name="msapplication-TileImage" content="' . of_get_option("meta_app_win_image") . '" />';
		}

		// Twitter
		if (true == of_get_option('meta_app_twt_card')) {
			echo '<meta name="twitter:card" content="' . of_get_option("meta_app_twt_card") . '" />';
			echo '<meta name="twitter:site" content="' . of_get_option("meta_app_twt_site") . '" />';
			echo '<meta name="twitter:title" content="' . of_get_option("meta_app_twt_title") . '" />';
			echo '<meta name="twitter:description" content="' . of_get_option("meta_app_twt_description") . '" />';
			echo '<meta name="twitter:url" content="' . of_get_option("meta_app_twt_url") . '" />';
		}

		// Facebook
		if (true == of_get_option('meta_app_fb_title')) {
			echo '<meta property="og:title" content="' . of_get_option("meta_app_fb_title") . '" />';
			echo '<meta property="og:description" content="' . of_get_option("meta_app_fb_description") . '" />';
			echo '<meta property="og:url" content="' . of_get_option("meta_app_fb_url") . '" />';
			echo '<meta property="og:image" content="' . of_get_option("meta_app_fb_image") . '" />';
		}
	?>
	<meta property="og:image" content="<?php the_post_thumbnail_url('full'); ?>" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_/css/normalize.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_/css/main.css">
	<?php wp_head(); ?>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body <?php body_class(); ?> data-subscription-success="<?php the_field('subscription-success', 'option');?>" data-subscription-failure="<?php the_field('subscription-failure', 'option');?>" data-subscribed-already="<?php the_field('subscribed-already', 'option');?>">

<div class="guide">
	<div class="wrapper row">
		<div class="col-xs"></div>
		<div class="col-xs"></div>
		<div class="col-xs"></div>
		<div class="col-xs"></div>
		<div class="col-xs"></div>
		<div class="col-xs"></div>
		<div class="col-xs"></div>
		<div class="col-xs"></div>
		<div class="col-xs"></div>
		<div class="col-xs"></div>
		<div class="col-xs"></div>
		<div class="col-xs"><span></span></div>
	</div>
</div>
	
	<div id="main" class="row">

		<header>
			<div class="fullheight row middle-xs mainmenu">

				<div class="menubackground absolute fullheight fullwidth backdrop"></div>

				<div class="row wrapper between-xs middle-xs">
					<div class="col-xs col-md-unset flex-1">
						<div class="row fullheight start-xs middle-xs">
							<div class="col-xs-12 pad-xs-10 pad-left">
								<a href="<?php echo get_site_url(); ?>" class="block logo">
									<?php the_field('logo_svg_code', 'options'); ?>
									<h1 class="fs-28">EXCHANGE</h1>
								</a>
							</div>
						</div>
					</div>
					<!-- <div class="col-xs-12 col-sm-unset pad-sm-40 pad-left show-lg">
						<form role="search" method="get" id="searchform" class="searchform row middle-xs" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="position: relative;">
							<div class="search-icon"><input type="submit" id="searchsubmit" class="" value=""></div>
							<input type="text" value="" placeholder="Search" name="s" id="s">
						</form>
					</div> -->
					<div class="col-xs flex-1 pad-xs-10 pad-left-right show-md">
						<div class="row fullheight middle-xs">
							<div class="col-xs-12 end-xs">
								<nav class="nav-desktop marker">
									<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => '', 'menu_class'=> 'row main_menu', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>')); ?>
								</nav>
							</div>
						</div>
					</div>
					<div class="col flex-1 pad-xs-10 pad-left-right hide-md">
						<div class="row middle-xs end-xs">
							<button id="hamburger" class="button">Menu</button>
						</div>
					</div>

				</div>
			</div>

			<div id="menu" class="row white-text dark middle-xs center-xs fullheight fixed">
				<div class="col-xs-12 relative pad-xs-40">
					<nav class="nav-primary amerigo fs-28 fs-48-sm">
						<?php wp_nav_menu( array(
							'theme_location'  => 'primary',
							'container'       => 'false'
						) ); ?>
					</nav>
					<div class="sp-40"></div>
				</div>
			</div>

		</header>

		<?php 
			global $post;
			$args = array ('parent' => $post->ID);
			$children = get_pages( $args );
			if (( is_page() && $post->post_parent ) || ( is_page() && count( $children ) > 0 )) :
			get_template_part( 'template-parts/content-subnavigation', 'page' );
		endif; ?>
			
	<div class="sceneElement col-xs <?php if(get_field('show_subnavigation')) : ?>sub-nav-initiated<?php endif; ?>">
			  