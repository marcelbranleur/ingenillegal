<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
						if($block[blockName] == 'ingenillegal-blocks/intro') {
							print $block[innerHTML];
						}
					}
				?>
			</div>
		</div>
	</header>
<?php } ?>

<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// If we are not in group context, and not on a page with feautured image
		// print the ctn-post class
		// TODO: Move this to a class on main!
		if(!group_context() && !hero_image()) {
			print '<div class="ctn-post">';
		}
	?>
	<div class="container">
		<div class="row">

			<?php
				// Print the group menu if we are on a group sub-page
			 	print group_menu();
			?>

			<?php
				// Print col class, different for group sub-page with sub menu
				if(wp_get_post_parent_id() && get_page_template_slug(wp_get_post_parent_id()) == 'page-group.php') {
					echo '<div class="col-lg-8 group-content">';
				} else {
					echo '<div class="col">';
				}
			?>

				<?php
					// Start the loop
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

	<?php
		if(!group_context() || !hero_image()) {
			print '</div>';
		}
	?>

</main>

<?php
get_footer();
