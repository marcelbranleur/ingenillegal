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
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php
				$field_date = get_field('date',false,false);
				$date = new DateTime($field_date);
				print '<span class="event-date">'.$date->format('j F').'</span>';
			?>

			<?php
				$field_place = get_field('place');
				$field_city = get_field('city');

				the_title( '<div class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></div>' );
				print '<div class="event-details">';
					if($field_place) {
						print $field_place;
						print ', '.$field_city;
					} else {
						print $field_city;
					}
				print '</div>';
			?>

		</div>
	</div>
</div>
