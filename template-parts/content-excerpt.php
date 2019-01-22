<?php
/**
 * Template part for displaying posts excerpts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ingenillegal
 */

?>

<div class="row">
	<div class="col">

		<div id="post-<?php the_ID(); ?>" class="post" <?php // post_class(); ?>>

			<div class="post-info">
				<?php
				ingenillegal_posted_on();
				ingenillegal_groups();
				?>
			</div>

			<?php the_title( '<div class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></div>' ); ?>

			<?php // ingenillegal_event_info(); ?>

			<div class="post-excerpt">
				<?php the_excerpt(); ?>
			</div>

		</div>

	</div>
</div>
