<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ingenillegal
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ingenillegal_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'ingenillegal_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ingenillegal_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'ingenillegal_pingback_header' );

/**
 * Filter for ACF. Display only pages with local groups template in Group selection list
 * https://www.advancedcustomfields.com/resources/acf-fields-post_object-query
 */
function groups_object_query( $args, $field, $post_id ) {
  $args['meta_query'] = array(
	  array(
		  'key' => '_wp_page_template',
		  'value' => 'page-group.php',
	    'compare' => '='
    )
	);
  return $args;
}
add_filter('acf/fields/post_object/query/name=groups', 'groups_object_query', 10, 3);

/**
 * Add custom category for Gutenberg blocks
 */
add_filter( 'block_categories', function( $categories, $post ) {
  return array_merge(
    $categories,
    array(
      array(
        'slug'  => 'imai',
        'title' => 'Ingen människa är illegal',
      ),
    )
  );
}, 10, 2 );


/**
 * Get the latest posts for the front page
 */
function latest_posts() {
  $args = array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'order'          => 'DESC',
    'orderby'        => 'date'
  );
  $posts = new WP_Query( $args );

  $output = '';
  if ( $posts->have_posts() ) {
    while ( $posts->have_posts() ) : $posts->the_post();
      $output .= get_template_part( 'template-parts/content', 'excerpt' );
    endwhile;
  }
  wp_reset_postdata();

  return $output;
}

/**
 * Get the local posts for the local group start page
 */
function group_posts() {
  $args = array(
    'post_type' => 'post',
    'meta_query' => array(
      array(
        'key' => 'groups',
        'value' => '"' . get_the_ID() . '"',
        'compare' => 'LIKE'
      )
    )
  );
  $posts = new WP_Query( $args );

  $output = '';
  if ( $posts->have_posts() ) {
    $output .= '<section class="blog"><div class="container">';
    while ( $posts->have_posts() ) : $posts->the_post();
      get_template_part( 'template-parts/content', 'excerpt' );
    endwhile;
    $output .= '<div></section>';
  }
  wp_reset_postdata();
  return $output;
 }

/**
 * Get the local menu if in the local group context
 */
function group_menu() {
  $parent_post_id = wp_get_post_parent_id(get_the_ID());
  $headline_title = '';
  $headline_url = '';

  // If on a page with local group template
  if(get_page_template_slug(get_the_ID()) == 'page-group.php') {
    $args = array(
      'post_type'      => 'page',
      'posts_per_page' => -1,
      'post_parent'    => get_the_ID(),
      'order'          => 'ASC',
      'orderby'        => 'menu_order'
    );

    $headline_title =  get_the_title();
    $headline_url = get_the_permalink();

  }

  // If we are on a local sub page
  if($parent_post_id && get_page_template_slug($parent_post_id) == 'page-group.php') {
    $parent_post = get_post($parent_post_id);
  	$parent_post_title = $parent_post->post_title;
  	$parent_post_url = get_permalink($parent_post_id);

    $args = array(
  	  'post_type'      => 'page',
  		'posts_per_page' => -1,
  		'post_parent'    => $parent_post_id,
  		'order'          => 'ASC',
  		'orderby'        => 'menu_order'
  	);

    $headline_title =  $parent_post_title;
    $headline_url = $parent_post_url;
  }

  $output = '';

  $pages = new WP_Query( $args );
  if ( $pages->have_posts() ) {
    $output .= '<div class="menu-local-menu-container"><h2><a href="'. $headline_url .'">'. $headline_title .'</a></h2><ul id="local-menu" class="menu nav-menu">';
    while ( $pages->have_posts() ) : $pages->the_post();
      $output .= '<li class="menu-item"><a href="'. get_the_permalink() .'" title="'. get_the_title() .'">'. get_the_title() .'</a></li>';
    endwhile;
    $output .= '</ul></div>';
  }
  wp_reset_postdata();

  return $output;
}
