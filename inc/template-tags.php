<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ingenillegal
 */

if ( ! function_exists( 'ingenillegal_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function ingenillegal_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		echo '<span class="posted-on">' . $time_string . '</span>'; // WPCS: XSS OK.

	}
endif;

if( !function_exists('ingenillegal_event_info')) :
	/**
	 * Prints HTML with meta information about an event
	 */
	function ingenillegal_event_info() {

		$field_date = get_field('date');
		$field_place = get_field('place');
		$field_city = get_field('city');

		if($field_date) {
			print '<div class="event">';
			print '<span class="event-date">'. $field_date .'</span>';
			if($field_place) {
				print '<span class="event-place">'. $field_place .'</span>';
			}
			if($field_city) {
				print '<span class="event-city">'. $field_city .'</span>';
			}
		}

	}
endif;

if( !function_exists('ingenillegal_groups')) :
	/**
	 * Prints HTML with meta information about groups
	 */
	function ingenillegal_groups() {

		if(function_exists('get_field')) {
			$groups = get_field('groups');
			if($groups) {
				$last_key = end(array_keys($groups));
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
			}
		}

	}
endif;

if ( ! function_exists( 'ingenillegal_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function ingenillegal_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'ingenillegal' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'ingenillegal_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
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

if ( ! function_exists( 'ingenillegal_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function ingenillegal_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;
