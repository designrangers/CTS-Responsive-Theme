<!doctype html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<title><?php wp_title(''); ?></title>

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<!-- mobile meta -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- icons & favicons -->
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

  	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>
		
		<!-- drop Google Analytics Here -->
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?>>

	<div class="off-canvas-wrap">
		<div class="inner-wrap">
			<header class="header-full fixed" role="banner">
				<div class="row">
				    <div class="large-4 small-12 columns">
				      <h1 class="logo">
				        <a href="<?php echo home_url(); ?>" title="Carmichael Training Systems">
				           <img src="<?php bloginfo('template_directory'); ?>/library/images/cts-logo.png" alt="Carmichael Training Systems">
				         </a>
				      </h1>
				    </div>
				    <div class="large-8 small-12 columns">
				        <!-- smaller top navigation -->
				        <?php joints_top_secondary_nav(); ?>
				        <!-- main navigation -->
				    </div>
			  	</div>
			  	<?php get_template_part( 'partials/nav', 'header' ); ?>
			  	<?php get_template_part( 'partials/nav', 'offcanvas' ); ?>
			</header><!-- end header -->