<?php
/**
 * A generic template for posts.
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2><?php the_title(); ?></h2>

	<?php if ( ! is_singular() ) : ?>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>">Read more<span class="screen-reader-text"> about <?php the_title(); ?></span></a>
	<?php endif; // is_singular() ?>

	<?php if ( is_singular() ) : ?>
		<?php the_content(); ?>
	<?php endif; ?>

	<?php if ( is_single() ) : ?>
	<nav>
		<h2>Read more from <?php echo bloginfo( 'name' ); ?></h2>
		<ul>
		<?php
		next_post_link(
			'<li>%link</li>',
			// translators: %s is the title of next post in the same category.
			__( 'Next post<span class="screen-reader-text">: %title</span>', 'lazyboy' ),
			true
		);
		?>
		<?php
		previous_post_link(
			'<li>%link</li>',
			// translators: %s is the title of the previous post in the same category.
			__( 'Previous post<span class="screen-reader-text">: %title</span>', 'lazyboy' ),
			true
		);
		?>
		</ul>
	</nav>
	<?php endif; ?>
</article>
<?php
