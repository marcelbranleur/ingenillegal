<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ingenillegal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php
				ingenillegal_posted_on();
				ingenillegal_groups();
				ingenillegal_event_info();
			?>
		</div>

	</div>

	<?php ingenillegal_post_thumbnail(); ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<div class="entry-footer">
		<?php ingenillegal_entry_footer(); ?>
	</div>

</article>
