<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ingenillegal
 */

get_header();
?>

<main>
	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1>Nyheter</h1>
				</div>
			</div>

		<?php
		if ( have_posts() ) :

			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'excerpt' );
			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</div>
</div>
</main>


<?php
get_footer();
