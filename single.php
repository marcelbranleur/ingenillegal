<?php
/**
 * The template for displaying all single posts
 *
 * @package ingenillegal
 */

get_header();
?>

	<main>
		<div class="row">
			<div class="col">
				<div class="container">
					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					?>
				</div>
			</div>
		</div>
	</main>

<?php
get_footer();
