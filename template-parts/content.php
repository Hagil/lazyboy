<?php
/**
 * A generic template for posts.
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2><?php the_title(); ?></h2>

	<?php
	if ( ! function_exists( 'hagil_posted_on' ) ) :
		/**
		 * Prints HTML with meta information for the current post-date/time and author
		 */
		function hagil_posted_on() {
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf(
				$time_string,
				esc_attr( get_the_date( 'c' ) ), // %1$s: Original post date, formatted as ISO 8601, e.g. "2004-02-12T15:19:21+00:00".
				esc_html( get_the_date() ), // %2$s: Original post date formatted per "WP Admin > General" settings, e.g. "April 3, 2018".
				esc_attr( get_the_modified_date( 'c' ) ), // %3$s: Updated post date, formatted as ISO 8601, e.g. "2004-02-12T15:19:21+00:00".
				esc_html( get_the_modified_date() ) // %2$s: Updated post date formatted per "WP Admin > General" settings, e.g. "April 3, 2018".
			);

			$posted_on = sprintf(

				/*
				* translators: %s is the post date.
				*/
				esc_html_x( '%1$s%2$s', 'post date', 'lazyboy' ),
				'<span class="screen-reader-text">Posted on </span>',
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);

			echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

		}
endif;
	?>

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
