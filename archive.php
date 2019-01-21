<?php
/**
 * The template for displaying archive pages
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
						<h1><?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?></h1>
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
		</div>
	</main>

<?php
get_footer();
