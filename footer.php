<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ingenillegal
 */

?>

	</div><!-- #content -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/img/IMaI_Ikon_fot_sprak_.svg" alt="footer-icon-sprak" class="img-fluid">
				</div>
			</div>
			<div class="row">
				<div class="col">
					<?php wp_nav_menu(array('theme_location' => 'languages-menu')); ?>
				</div>
			</div>
		</div>
	</footer>

</div><!-- #page -->

<nav id="menu" aria-hidden="true" aria-labelledby="menu-toggle" role="navigation">

	<div class="nav-mobile">
		<a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
			<?php echo file_get_contents( get_stylesheet_directory_uri() . '/dist/img/IMaI_Logo_.svg' ); ?>
		</a>
		<a id="close"><i class="fas fa-times"></i></a>
	</div>

	<div class="nav-menu">
		<div class="left">
			<?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
		</div>
		<div class="right">
			<?php wp_nav_menu(array('theme_location' => 'groups-menu')); ?>
		</div>
	</div>
</nav>

<div id="lang" class="lang-overlay" aria-hidden="true" aria-labelledby="lang-toggle" role="navigation">
	<div class="nav-mobile">
		<a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
			<?php echo file_get_contents( get_stylesheet_directory_uri() . '/dist/img/IMaI_Logo_.svg' ); ?>
		</a>
		<a id="close-lang"><i class="fas fa-times"></i></a>
	</div>
		<?php wp_nav_menu(array('theme_location' => 'languages-menu')); ?>
</div>

<?php wp_footer(); ?>

</body>
</html>
