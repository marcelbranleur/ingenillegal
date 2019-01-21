<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ingenillegal
 */

get_header();
?>

<main>
	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1>Nyheter</h1>
				</div>
			</div>
			<?php echo do_shortcode('[ajax_load_more
				posts_per_page="5"
				scroll="false"
				post_type="post"
				button_label="Fler nyheter"
				button_loading_label="Laddar"
			]'); ?>
		</div>
	</div>>
</main>

<?php
get_footer();
