<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>   <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>   <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, maximum-scale=1.0" />
	
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<section class="top">
		<!-- START: Header -->
		<header class="header body__header">
			<div class="inner group">
				<a href="<?php echo home_url(); ?>" id="logo" class="logo"><img src="/wp-content/uploads/2016/02/daetwyler-elastomer-logo.png" alt="Logo" /></a>
				<?php wp_nav_menu(array('theme_location' => 'menu_top', 'container' => false, 'depth' => 0)); ?>
			    <?php get_search_form(); ?>

				<a href="#menu-off-canvas" id="menu-toggler" class="border-menu"></a>
			</div><!-- /.inner -->
		</header><!-- /.header -->
		<!-- END: Header -->

		<!-- START: Nav -->
		<?php wp_nav_menu(array('theme_location' => 'menu_main', 'container' => 'nav', 'container_class' => 'menu-main body__nav', 'menu_class' => 'menu inner group')); ?>

	</section>

	<?php wp_nav_menu(array('theme_location' => 'menu_main', 'container' => 'div', 'container_class' => 'menu-off-canvas sidr', 'container_id' => 'menu-off-canvas')); ?>
	<!-- END: Nav -->

	<?php if ( is_front_page() ) : ?>
	<!-- START: Slideshow home -->
	<section class="slider body__slider">
		<?php echo get_new_royalslider(1); ?>
	</section>
	<!-- END: Slideshow home -->
	<?php endif; ?>

	<?php if ( function_exists('yoast_breadcrumb') && ! is_front_page() ) : ?>
	<!-- START: Breadcrumbs -->
	<section class="breadcrumbs">
		<div class="inner group">
			<?php yoast_breadcrumb('<p class="breadcrumbs--list">','</p>'); ?>
		</div>
	</section>
	<!-- END: Breadcrumbs -->
	<?php endif; // yoast_bredcrumb ?>