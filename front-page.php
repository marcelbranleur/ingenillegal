<?php
/**
 * The template for displaying the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ingenillegal
 */

get_header();
?>

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

	<main>
		<div class="localgroups-wrapper">
			<div class="localgroups front">
				<img src="<?php echo get_template_directory_uri() ?>/src/img/IMaI_Illustration_Pekar.png" alt="illustration" class="img-fluid" />
				<div class="inner">
					<h2>Lokalgrupper</h2>
					<div class="groups">
						<?php
						$groups = get_pages(array(
							'meta_key' => '_wp_page_template',
							'meta_value' => 'page-group.php',
							'compare' => '='
						));
						foreach($groups as $group) {
							print '<a href="'. get_the_permalink($group->ID) .'">'. $group->post_title .'</a>';
						} ?>
					</div>
				</div>
			</div>
		</div>

		<section class="blog">
			<div class="container">
				<?php print latest_posts(); ?>
			</div>
		</section>
	</main>


<?php
get_footer();
