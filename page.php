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
				if(wp_get_post_parent_id(get_the_ID()) && get_page_template_slug(wp_get_post_parent_id(get_the_ID())) == 'page-group.php') {
					echo '<div class="col-lg-4 group">'. group_menu() .'</div>';
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
