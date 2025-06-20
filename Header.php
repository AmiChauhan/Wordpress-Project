<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package creative
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'creative' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="header-main">
				<div class="site-branding">
			<?php
			the_custom_logo();
			
			$creative_description = get_bloginfo( 'description', 'display' );
			if ( $creative_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $creative_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu(
				array(
					'menu' => 'Header',
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
			<div class="togglebutton">
		<span class="one"></span>
		<span class="two"></span>
        <span class="three"></span>
    </div>
		</nav><!-- #site-navigation -->
            </div>
        </div>
	</header><!-- #masthead -->
