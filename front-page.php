<?php
/**
 * The template for displaying the front page
 *
 * @package ingenillegal
 */

get_header();
?>

		<!-- Header -->
		<div class="container">
			<div class="header-wrapper">
				<?php print '<h1>' . get_the_title() . '</h1>'; ?>
				<?php
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

	<!-- Localgroups -->
	<main>
		<div class="localgroups-wrapper">
			<div class="localgroups front">
				<img src="<?php echo get_template_directory_uri() ?>/dist/img/IMaI_Illustration_Pekar.png" alt="illustration" class="img-fluid" />
				<div class="inner">
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

		<!-- Calendar -->
		<?php
		$today = date('Ymd');
		$args = array(
			'post_type' => 'post',
    	'meta_query' => array(
				array(
	        'key' => 'date',
	        'compare'	=> '>=',
	        'value' => $today,
	    	),
    	),
	    'order' => 'ASC',
	    'orderby' => 'meta_value_num',
			'meta_key' => 'date',
	  );
	  $posts = new WP_Query( $args );

	  if ( $posts->have_posts() ) { ?>

			<section class="blog calendar">
				<div class="container">

	    		<?php
						while ( $posts->have_posts() ) : $posts->the_post();
	      			print get_template_part( 'template-parts/content', 'excerpt-event' );
	    			endwhile;
					?>

				</div>

				<span class="divider"></span>
				
			</section>

		<?php }
	  wp_reset_postdata();
		?>

		<!-- Latest news -->
		<section class="blog">
			<div class="container">

				<?php
				$today = date('Ymd');
				$args = array(
				  'post_type' => 'post',
				  'posts_per_page' => 3,
					'meta_query' => array(
						'relation' => 'or',
						array(
							'key' => 'date',
							'compare' => 'NOT EXISTS'
						),
						array(
							'key' => 'date',
							'compare'	=> '<=',
							'value' => $today,
						)
					),
				 );
				 $posts = new WP_Query( $args );

				 while ( $posts->have_posts() ) : $posts->the_post();
				 	$output .= get_template_part( 'template-parts/content', 'excerpt' );
				 endwhile;
				 wp_reset_postdata();
				 ?>
				<a href="/nyheter" class="all">Fler nyheter</a>

			</div>
		</section>
	</main>


<?php
get_footer();
