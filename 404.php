<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package ingenillegal
 */

get_header();
?>

<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row">
			<div class="col">

				<section class="post-content">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found', 'ingenillegal' ); ?></h1>
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'ingenillegal' ); ?></p>
				</section>

			</div>
		</div>
	</div>
</main>

<?php
get_footer();
