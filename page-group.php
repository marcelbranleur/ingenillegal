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
