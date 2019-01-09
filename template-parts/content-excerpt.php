<?php
/**
 * Template part for displaying posts excerpts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ingenillegal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-header">

		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

		<div class="entry-meta">
			<?php
				ingenillegal_posted_on();
				ingenillegal_groups();
				ingenillegal_event_info();
			?>
		</div>

	</div>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>

</article>
