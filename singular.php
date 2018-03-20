<?php
/**
 * The main template file for singular posts
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package LazyBoy
 * @since 1.0.0
 */
get_header();
?>
<div class="wrap">
	<main role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content' );
		endwhile; // End the loop.
		?>
	</main>
</div>
<?php get_footer(); ?>
