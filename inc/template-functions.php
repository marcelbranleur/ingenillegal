<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ingenillegal
 */

/**
 * Adds custom classes to the array of post classes
 */
function ingenillegal_post_classes($classes) {

	// Featured image
	if(get_post_type() == 'page' && has_post_thumbnail()) {
		$classes[] = 'featured-image';
	}

	// Group context
	$parent_post_id = wp_get_post_parent_id(get_the_ID());
	if(get_page_template_slug(get_the_ID()) == 'page-group.php') {
		$classes[] = 'group-context group-parent';
	}
  if($parent_post_id && get_page_template_slug($parent_post_id) == 'page-group.php') {
		$classes[] = 'group-context group-child';
	}

	return $classes;
}
add_filter('post_class','ingenillegal_post_classes');

/**
 * Change the length of excerpts
 */
function ingenillegal_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'ingenillegal_excerpt_length', 999 );

/**
 * Change [...] to ... in excerpts
 */
function ingenillegal_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'ingenillegal_excerpt_more');

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
 * Redirect from category, tag, date and author archives
 */
function ingenillegal_redirect_archives(){
  if( is_category() || is_tag() || is_date() || is_author() ) {
    global $wp_query;
    $wp_query->set_404();
  }
}
add_action('template_redirect', 'ingenillegal_redirect_archives');

/**
 * Check if we are on local group context
 */
function group_context() {
	$parent_post_id = wp_get_post_parent_id(get_the_ID());
	if(get_page_template_slug(get_the_ID()) == 'page-group.php') {
		return true;
	}
  if($parent_post_id && get_page_template_slug($parent_post_id) == 'page-group.php') {
		return true;
	}
	return false;
}

/**
 * Check if we are on a post type page with thumbnail image
 */
function cover_image() {
	if(get_post_type() == 'page' && has_post_thumbnail()) {
		return true;
	}
	return false;
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
	$currentpageID = get_the_ID();

	$output .= '<ul>';
  while ( $pages->have_posts() ) : $pages->the_post();
		if($currentpageID == get_the_ID()) {
    	$output .= '<li class="menu-item"><a class="active" href="'. get_the_permalink() .'" title="'. get_the_title() .'">'. get_the_title() .'</a></li>';
		} else {
      $output .= '<li class="menu-item"><a href="'. get_the_permalink() .'" title="'. get_the_title() .'">'. get_the_title() .'</a></li>';
		}
  endwhile;
  $output .= '</ul>';

	wp_reset_postdata();

  return $output;
}

/**
 * Restrict Gutenberg blocks
 * https://wpdevelopment.courses/a-list-of-all-default-gutenberg-blocks-in-wordpress-5-0/
 */
function ingenillegal_allowed_block_types( $allowed_block_types, $post ) {
	return array(
		'core/paragraph',
		'core/list',
		'core/heading',
		'core/table',
		//'core/button',
		//'core/freeform',
		'core/columns',
		//'core/cover',
		'core/file',
		'core/image',
		'core/media-text',
		//'core/nextpage',
		'core/gallery',
		'core/audio',
		'core/video',
		//'core/shortcode',
		'core/quote',
		'core/pullquote',
		//'core/verse',
		'core/code',
		//'core/preformatted',
		'core/html',
		'core/separator',
		'core/spacer',
		//'core/archives',
		//'core/categories',
		//'core/latest-comments',
		//'core/latest-posts',
		//'core/more',
		'core/embed',
		'core-embed/twitter',
		'core-embed/youtube',
		'core-embed/facebook',
		'core-embed/instagram',
		'core-embed/wordpress',
		'core-embed/soundcloud',
		'core-embed/spotify',
		'core-embed/flickr',
		'core-embed/vimeo',
		//'core-embed/animoto',
		//'core-embed/cloudup',
		//'core-embed/collegehumor',
		//'core-embed/dailymotion',
		//'core-embed/funnyordie',
		//'core-embed/hulu',
		'core-embed/imgur',
		'core-embed/issuu',
		//'core-embed/kickstarter',
		//'core-embed/meetup-com',
		//'core-embed/mixcloud',
		//'core-embed/photobucket',
		//'core-embed/polldaddy',
		'core-embed/reddit',
		//'core-embed/reverbnation',
		//'core-embed/screencast',
		//'core-embed/scribd',
		'core-embed/slideshare',
		//'core-embed/smugmug',
		//'core-embed/speaker',
		//'core-embed/ted',
		'core-embed/tumblr',
		'core-embed/videopress',
		'core-embed/wordpress-tv',
		'ingenillegal-blocks/intro',
		'ingenillegal-blocks/groups',
	);
}
add_filter( 'allowed_block_types', 'ingenillegal_allowed_block_types', 10, 2 );

/**
 * Only allow specific colors in the Gutenberg color picker.
 */
function ingenillegal_disable_custom_colors() {
	add_theme_support('editor-color-palette');
	add_theme_support('disable-custom-colors');
}
add_action( 'after_setup_theme', 'ingenillegal_disable_custom_colors' );

/**
 * Only allow one font size in editor
 */
add_theme_support( 'editor-font-sizes', array(
	array(
		'name' => __( 'Normal', 'gutenberg-test' ),
		'shortName' => __( 'N', 'gutenberg-test' ),
		'size' => 16,
		'slug' => 'normal'
	),
));
add_theme_support('disable-custom-font-sizes');

/**
 * Block template for pages
 */
function page_block_template() {
    $post_type_object = get_post_type_object( 'page' );
    $post_type_object->template = array(
			array('ingenillegal-blocks/intro'),
    );
}
add_action( 'init', 'page_block_template' );

/**
 * Remove thumbnail, categories and tags from post
 */
function ingenillegal_init() {
 	remove_post_type_support( 'post', 'thumbnail' );
	unregister_taxonomy_for_object_type('post_tag','post');
	unregister_taxonomy_for_object_type('category','post');
}
add_action( 'init', 'ingenillegal_init' );

/**
 * Restrict pages for Parent page
 * https://github.com/WordPress/gutenberg/issues/9089
 * http://woocommerce.wp-a2z.org/oik_api/wp_dropdown_pages/
 */
function ingenillegal_restrict_parents( $args ) {
	$args['show_option_none'] = 'Välj en lokalgrupp';
	$args1 = array(
		'post_type' => array('page'),
		'meta_key' => '_wp_page_template',
	  'meta_value' => 'page-group.php',
		'hierarchical' => 0,
	);
	$pages = get_posts($args1);
	foreach($pages as $page){
		$include = $page->ID.",".$include;
	}
	$args['include'] = $include;
	return $args;
}
add_filter( 'page_attributes_dropdown_pages_args', 'ingenillegal_restrict' );
add_filter( 'quick_edit_dropdown_pages_args', 'ingenillegal_restrict' );
