<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ingenillegal
 */

get_header();
?>

<?php
	// If on a page with featured image, add the hero image
	// Close header element opened in header.php
	if(hero_image()) { ?>
		<div class="container">
			<div class="header-wrapper">
				<?php print '<h1>' . get_the_title() . '</h1>'; ?>
				<?php
					// Print the intro block
					$blocks = parse_blocks($post->post_content);
					foreach($blocks as $block) {
						if($block['blockName'] == 'ingenillegal-blocks/intro') {
							print $block['innerHTML'];
						}
					}
				?>
			</div>
		</div>
	</header>
<?php } ?>

<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="container">
		<div class="row">

			<?php
				// Print two columns and group menu if on group sub-page
				$parent_id = wp_get_post_parent_id(get_the_ID());
				$parent_template = get_page_template_slug($parent_id);

				if($parent_id && $parent_template == 'page-group.php') {

					// Print the sidebar
					echo '<div class="col-lg-4 group">';
					echo '<h2><a href="'. get_the_permalink($parent_id) .'">'. get_the_title($parent_id) .'</a></h2><ul>';

					// Print the custom social media fields
					if(function_exists('CFS')) {
						$fields = CFS()->get( 'social_media', $parent_id );
						print '<div>';
						foreach ( $fields as $field ) {
							echo $field['url'];
						}
						print '</div>';
					}

					// Print the menu
					echo group_menu();
					echo '</div>';

					// Print the content
					echo '<div class="col-lg-8 group-content">';

				} else {
					echo '<div class="col">';
				}
			?>


				<?php
					while ( have_posts() ) : the_post();
						if(hero_image()) {
							get_template_part('template-parts/content', 'page-hero');
						} else {
							get_template_part( 'template-parts/content', 'page' );
						}
					endwhile;
				?>

			</div>

		</div>
	</div>

</main>

<?php
get_footer();
