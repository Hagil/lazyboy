<?php
/**
 * The main template file
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

		// End the loop.
		endwhile;
		?>
		<?php if ( is_single() ) : ?>
		<nav class="nav">
			<h2>Read more from <?php echo bloginfo( 'name' ); ?></h2>
			<ul>
				<li>Next up: <?php next_post_link(); ?></li>
				<li>Previous: <?php previous_post_link(); ?></li>
			</ul>
		</nav>
		<?php elseif ( ! is_singular() ) : ?>
		<nav>
			<h2>Post navigation</h2>
			<?php
			the_posts_pagination(
				array(
					'prev_text'          => '<span>' . __( 'Previous page', 'lazyboy' ) . '</span>',
					'next_text'          => '<span>' . __( 'Next page', 'lazyboy' ) . '</span>',
					'before_page_number' => '<span class="meta-nav">' . __( 'Page', 'lazyboy' ) . ' </span>',
				)
			);
			?>
		</nav>
		<?php endif; // is_singular() ?>
	</main>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
