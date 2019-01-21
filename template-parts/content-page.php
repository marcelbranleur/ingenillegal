<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ingenillegal
 */

?>

<section class="post-content">

<?php the_title( '<h1>', '</h1>' ); ?>

<?php the_content(); ?>

<div class="entry-footer">
	<?php ingenillegal_entry_footer(); ?>
</div>

</section>
