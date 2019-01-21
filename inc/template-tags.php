<?php
/**
 * Custom template tags for this theme
 *
 * @package ingenillegal
 */

if ( ! function_exists( 'ingenillegal_posted_on' ) ) :
	function ingenillegal_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		echo '<div class="date">' . $time_string . '</div>'; // WPCS: XSS OK.

	}
endif;

if( !function_exists('ingenillegal_event_info')) :
	function ingenillegal_event_info() {

		$field_date = get_field('date');
		$field_place = get_field('place');
		$field_city = get_field('city');

		if($field_date) {
			print '<div class="post-event">';
			print '<span class="event-date">'. $field_date .'</span>';
			if($field_place) {
				print ', <span class="event-place">'. $field_place .'</span>';
			}
			if($field_city) {
				print ', <span class="event-city">'. $field_city .'</span>';
			}
			print '</div>';
		}

	}
endif;

if( !function_exists('ingenillegal_groups')) :
	function ingenillegal_groups() {

		if(function_exists('get_field')) {
			$groups = get_field('groups');
			if($groups) {
				$last_key = end(array_keys($groups));
				print '<div class="groups">';
				foreach($groups as $key => $group) {
					$name = $group->post_title;
					$id = $group->ID;
					$url = get_permalink($id);
					if($key == $last_key) {
						print '<a href="'. $url .'">'. $name .'</a>';
					} else {
						print '<a href="'. $url .'">'. $name .'</a>, ';
					}
				}
				print '</div>';
			}
		}

	}
endif;

if ( ! function_exists( 'ingenillegal_entry_footer' ) ) :
	function ingenillegal_entry_footer() {
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'ingenillegal' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;
