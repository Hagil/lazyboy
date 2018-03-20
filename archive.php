<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LazyBoy
 * @since 1.0.0
 */

get_header(); ?>

<div class="wrap">

	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) {
		}
		?>
		<?php
			/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content' );

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
		</main><!-- #main -->
	</div><!-- #primary -->
    <?php get_sidebar( 'archive' ); ?>
</div><!-- .wrap -->

<?php
get_footer();
