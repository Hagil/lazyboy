<?php
/**
 * The main header template file
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package LazyBoy
 * @since 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header role="banner">
		<div class="wrap">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo bloginfo( 'name' ); ?></a></h1>
			<div class="navigation-top">
				<?php wp_nav_menu( array( 'lazyboy' => 'header-menu' ) ); ?>
			</div>
		</div>
	</header>

	<div id="content" class="content-area">
