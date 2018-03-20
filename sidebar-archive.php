<?php
/**
 * The main template for the archive sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LazyBoy
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'archive' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Archive Sidebar', 'lazyboy' ); ?>">
	<?php dynamic_sidebar( 'archive' ); ?>
</aside><!-- #secondary -->
