<?php
/**
 * The template for displaying the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ingenillegal
 */

get_header();
?>

	<div id="primary" class="content-area">
<!--		<main id="main" class="site-main">-->
	<div class="header">
			<div class="container">
				<div class="header-wrapper">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</div>
		</div>
</div>
<!--		</main><!-- #main -->

	<main>
		<section class="lokalgrupper">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<img src="<?php echo get_template_directory_uri(); ?>/src/img/IMaI_Illustration_Pekar.png" alt="illustation" class="img-fluid">
					</div>
					<div class="col-lg-6">
						<h2>Lokalgrupper</h2>
						<div class="buttons">
							<?php
							$groups = get_pages(array(
								'meta_key' => '_wp_page_template',
								'meta_value' => 'page-group.php',
								'compare' => '='
							));

							foreach($groups as $group) {
								print '<a href="'. get_the_permalink($group->ID) .'" class="button">'. $group->post_title .'</a>';
							} ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="blog">
			<div class="container">
				<?php print latest_posts(); ?>
			</div>
		</section>
	</main>

	</div><!-- #primary -->

<?php
get_footer();
