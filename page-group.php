<?php
/**
 * Template Name: Group
 *
 * The template for displaying group start page
 * *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ingenillegal
 */

get_header();
?>

<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row">

			<div class="col-lg-4 group">

				<?php print '<h2><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></h2>'; ?>

				<?php if (function_exists('CFS')) {
					$fields = CFS()->get( 'social_media' );
					print '<div>';
					foreach ( $fields as $field ) {
    				echo $field['url'];
					}
					print '</div>';
				} ?>

				<?php print group_menu(); ?>
			</div>

			<div class="col-lg-8 group-content">
				<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'page' );
					endwhile;
				?>
			</div>

		</div>
	</div>

	<!--<section class="blog">
		<div class="container">
			<?php // print group_posts(); ?>
		</div>
	</section>-->

</main>

<?php
get_footer();
