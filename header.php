<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ingenillegal
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,500|Roboto:300,400,500,700,900&amp;subset=latin-ext" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ingenillegal' ); ?></a>

	<header id="masthead" class="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php echo get_template_directory_uri(); ?>/src/img/IMaI_Logo_.svg" alt="logo" class="img-fluid logo">
		</a>

		<!-- Display the menues -->
		<?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
		<?php wp_nav_menu(array('theme_location' => 'groups-menu')); ?>
		<?php wp_nav_menu(array('theme_location' => 'languages-menu')); ?>

	</header>

	<div id="content" class="site-content">
