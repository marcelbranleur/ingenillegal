<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
						<h1><?php printf( esc_html__( 'Search Results for: %s', 'ingenillegal' ), '<span>' . get_search_query() . '</span>' );?></h1>
					</div>
				</div>

				<?php if ( have_posts() ) : ?>

					<?php
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
