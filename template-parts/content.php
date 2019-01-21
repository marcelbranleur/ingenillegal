<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ingenillegal
 */

?>

<div class="post-content">

<?php
	ingenillegal_posted_on();
	ingenillegal_groups();
?>

<?php the_title( '<h1>', '</h1>' ); ?>

<?php ingenillegal_event_info(); ?>

<?php the_content(); ?>

<div class="entry-footer">
	<?php ingenillegal_entry_footer(); ?>
</div>

</div>
