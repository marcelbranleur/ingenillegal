<?php
/**
 * The template for displaying all pages
 *
 * @package ingenillegal
 */

get_header();
?>

<!-- Coverimage -->
<?php if(cover_image()) { ?>
		<div class="container">
			<div class="header-wrapper">
				<?php print '<h1>' . get_the_title() . '</h1>'; ?>
				<?php
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

<!-- Main content -->
<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row">

			<!-- Group menu and content -->
			<?php
				$parent_id = wp_get_post_parent_id(get_the_ID());
				$parent_template = get_page_template_slug($parent_id);

				if($parent_id && $parent_template == 'page-group.php') {

					// Sidebar
					echo '<div class="col-lg-4 group">';
					echo '<h2><a href="'. get_the_permalink($parent_id) .'">'. get_the_title($parent_id) .'</a></h2><ul>';

					// Social media fields
					if(function_exists('CFS')) {
						$fields = CFS()->get( 'social_media', $parent_id );
						print '<div>';
						foreach ( $fields as $field ) {
							echo $field['url'];
						}
						print '</div>';
					}

					// Menu
					echo group_menu();
					echo '</div>';

					// Content
					echo '<div class="col-lg-8 group-content">';

				} else {
					echo '<div class="col">';
				}
			?>

				<?php
					while ( have_posts() ) : the_post();
						if(cover_image()) {
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
