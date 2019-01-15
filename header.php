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

	<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
	<link rel="manifest" href="favicon/site.webmanifest">
	<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#f6f6f4">
	<meta name="theme-color" content="#F6F6F4">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="site">

		<?php
		// Add a header wrapper if on a page with featured image
		if(hero_image()) {
			print '<header class="coverimage-header" style="background-image: url(' . get_the_post_thumbnail_url() . ');">';
		}
		if(is_front_page()) {
			print '<header>';
		}
		?>

	<div class="navigation">
		<a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
			<?php echo file_get_contents(get_stylesheet_directory_uri() . '/dist/img/IMaI_Logo_.svg'); ?>
		</a>

		<div class="menu-wrapper">
			<a href="#" class="menu" id="menu-toggle" arial-label="Menu" aria-expanded="false" aria-controls="menu">
				Meny
				<?php echo file_get_contents(get_stylesheet_directory_uri() . '/dist/img/IMaI_Ikon_meny_.svg'); ?>
			</a>
			<a href="#" class="language" id="lang-toggle" aria-label="Lang" aria-expanded="false" aria-controls="lang">
				Språk
				<?php echo file_get_contents(get_stylesheet_directory_uri() .'/dist/img/IMaI_Ikon_Sprak_.svg'); ?>
			</a>
		</div>
	</div>

	<div id="content" class="site-content">
