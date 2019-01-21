<?php
/**
 * The template for displaying the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ingenillegal
 */

get_header();
?>

		<div class="container">
			<div class="header-wrapper">
				<?php print '<h1>' . get_the_title() . '</h1>'; ?>
				<?php
					// Print the intro block
					$blocks = parse_blocks($post->post_content);
					foreach($blocks as $block) {
						if($block['blockName'] == 'ingenillegal-blocks/intro') {
							print $block['innerHTML'];
						}
					}
				?>
			</div>
		</div>
	</header>

	<main>
		<div class="localgroups-wrapper">
			<div class="localgroups front">
				<img src="<?php echo get_template_directory_uri() ?>/dist/img/IMaI_Illustration_Pekar.png" alt="illustration" class="img-fluid" />
				<div class="inner">
					<h2>Lokalgrupper</h2>
					<div class="groups">
						<?php
						$groups = get_pages(array(
							'meta_key' => '_wp_page_template',
							'meta_value' => 'page-group.php',
							'compare' => '='
						));
						foreach($groups as $group) {
							print '<a href="'. get_the_permalink($group->ID) .'">'. $group->post_title .'</a>';
						} ?>
					</div>
				</div>
			</div>
		</div>

	<section class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2>På gång</h2>
				</div>
			</div>

<?php
		$today = date('Ymd');

		$args = array(
			'post_type' => 'post',
    	'meta_query' => array(
				array(
	        'key'		=> 'date',
	        'compare'	=> '>=',
	        'value'		=> $today,
	    	),
    	),
	    'order'          => 'ASC',
	    'orderby'        => 'meta_value_num',
			'meta_key'			 => 'date',
	  );
	  $posts = new WP_Query( $args );

	  if ( $posts->have_posts() ) {
	    while ( $posts->have_posts() ) : $posts->the_post();
	      print get_template_part( 'template-parts/content', 'excerpt-event' );
	    endwhile;
	  }
	  wp_reset_postdata();

		?>
	</div>
</section>


		<section class="blog">
			<div class="container">
				<div class="row">
					<div class="col">
						<h2>Nyheter</h2>
					</div>
				</div>
				<?php print latest_posts(); ?>
				<a href="/nyheter" class="all">Fler nyheter</a>
			</div>
		</section>
	</main>


<?php
get_footer();
