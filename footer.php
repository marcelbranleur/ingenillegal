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

	<footer id="colophon" class="site-footer">
		<div class="container">

			<div class="row">
				<div class="col">
					<img src="<?php echo get_template_directory_uri(); ?>/src/img/IMaI_Ikon_fot_sprak_.svg" alt="footer-icon-sprak" class="img-fluid">
				</div>
			</div>

			<div class="row">
				<div class="col">
					<?php wp_nav_menu(array('theme_location' => 'languages-menu')); ?>
				</div>
			</div>
			
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
