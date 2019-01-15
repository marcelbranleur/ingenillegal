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
		// Todo: Change class to something else + remove image from css
		if(hero_image()) {
			print '<header class="engagera-header" style="background-image: url(' . get_the_post_thumbnail_url() . ');">';
		}
		if(is_front_page()) {
			print '<header>';
		}
		?>

	<div class="navigation">
		<a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
			<?php echo file_get_contents( get_stylesheet_directory_uri() . '/src/img/IMaI_Logo_.svg' ); ?>
		</a>

		<div class="menu-wrapper">
			<a href="#" class="menu" id="menu-toggle" arial-label="Menu" aria-expanded="false" aria-controls="menu">
				Meny
				<!-- <img src="img/IMaI_Ikon_meny_.svg" alt="menu" class="img-fluid"> -->
        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 27"><defs></defs><title>IMaI_Ikon_meny_</title><rect class="cls-1" x="6" y="7.5" width="17" height="2"/><rect class="cls-1" x="6" y="15.5" width="17" height="2"/><rect class="cls-1" x="6" y="11.5" width="17" height="2"/><path class="cls-1" d="M26.08,1H2.92A1.91,1.91,0,0,0,1,2.9V22.1A2.06,2.06,0,0,0,2.92,24H26.08A1.91,1.91,0,0,0,28,22.1V2.9A1.91,1.91,0,0,0,26.08,1Zm.52,21.1a.51.51,0,0,1-.52.5H2.92c-.21,0-.51-.35-.52-.5V2.9a.51.51,0,0,1,.52-.5H26.08a.51.51,0,0,1,.52.5Z"/></svg>
			</a>
			<a href="#" class="language" id="lang-toggle" aria-label="Lang" aria-expanded="false" aria-controls="lang">
				Språk
				<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 27"><defs></defs><title>IMaI_Ikon_Sprak_</title><path class="cls-1" d="M8.49,5.4,4.86,15H6.6l.77-2.23h3.72L11.88,15h1.74L10,5.4Zm-.65,6,1.39-4,1.39,4Z"/><path class="cls-1" d="M20,6.17H18.36V7.84H14.22V9.46H20.8a16.14,16.14,0,0,1-1.92,2.64,10.68,10.68,0,0,1-1.35-1.77l-1.44.84a21,21,0,0,0,1.66,2.12,22.08,22.08,0,0,1-2.61,2.22l.94,1.41A22.13,22.13,0,0,0,19,14.49a30.38,30.38,0,0,0,3.52,2.45l.78-1.45a17.37,17.37,0,0,1-3.19-2.2,21.77,21.77,0,0,0,2.6-3.83h1.44V7.84H20Z"/><path class="cls-1" d="M26.08,1H2.92A1.91,1.91,0,0,0,1,2.89V26.53L10.31,21H26.08A1.91,1.91,0,0,0,28,19.11V2.89A1.91,1.91,0,0,0,26.08,1Zm.52,18.11a.5.5,0,0,1-.52.49H9.93L2.4,24.07V2.89a.5.5,0,0,1,.52-.49H26.08a.5.5,0,0,1,.52.49Z"/></svg>
			</a>
		</div>
	</div>

	<div id="content" class="site-content">
