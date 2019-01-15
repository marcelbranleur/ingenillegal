<?php
/**
 * Template part for displaying page content - with hero image - in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ingenillegal
 */

?>

<section class="post-content">

	<?php
		// Print all blocks except the intro block which is printed in header
		$blocks = parse_blocks(get_the_content());
		foreach( $blocks as $block ) {
			if($block[blockName] != 'ingenillegal-blocks/intro') {
				print render_block($block);
			}
		}
	?>

	<div class="entry-footer">
		<?php ingenillegal_entry_footer(); ?>
	</div>

</section>
