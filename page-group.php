<?php
/**
 * Template Name: Group
 *
 * The template for displaying group start page
 *
 * @package ingenillegal
 */

get_header();
?>

<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row">

			<!-- Menu -->
			<div class="col-lg-4 group">

				<?php print '<h2><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></h2>'; ?>

				<?php if (function_exists('CFS')) {
					$fields = CFS()->get( 'social_media' );
					print '<div>';
					foreach ( $fields as $field ) {
    				echo $field['url'];
					}
					print '</div>';
				} ?>

				<?php print group_menu(); ?>

			</div>

			<div class="col-lg-8 group-content">

				<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'page' );
					endwhile;
				?>

				<!-- Local calendar -->
				<?php
				$today = date('Ymd');
				$args = array(
					'post_type' => 'post',
					'meta_query' => array(
						'relation' => 'and',
						array(
							'key' => 'date',
							'compare'	=> '>=',
							'value' => $today,
						),
						array(
							'key' => 'groups',
							'value' => '"' . get_the_ID() . '"',
							'compare' => 'LIKE'
						)
					),
					'order' => 'ASC',
					'orderby' => 'meta_value_num',
					'meta_key' => 'date',
				);
				$posts = new WP_Query( $args );

				if ( $posts->have_posts() ) { ?>

					<section class="blog">
						<div class="container">

							<div class="row">
								<div class="col">
									<h2>På gång</h2>
								</div>
							</div>

							<?php
								while ( $posts->have_posts() ) : $posts->the_post();
									print get_template_part( 'template-parts/content', 'excerpt-event' );
								endwhile;
							?>

						</div>
					</section>

				<?php }
				wp_reset_postdata();
				?>

				<!-- Local news -->
				<section class="blog">
					<div class="container">

						<?php
						 $args = array(
						 	'post_type' => 'post',
						  'meta_query' => array(
								'relation' => 'and',
						  	array(
						    	'key' => 'groups',
						      'value' => '"' . get_the_ID() . '"',
						      'compare' => 'LIKE'
						    ),
								array(
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
						  )
						 );
						 $posts = new WP_Query( $args );

						 if ( $posts->have_posts() ) {
						   while ( $posts->have_posts() ) : $posts->the_post();
						   		get_template_part( 'template-parts/content', 'excerpt' );
						   endwhile;
						 }
						 wp_reset_postdata();
						 ?>

					</div>
				</section>

			</div>
		</div>
	</div>
</main>

<?php
get_footer();
