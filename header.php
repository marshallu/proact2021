<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package proact2021
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

<body <?php body_class(); ?> x-data="{ mobileMenuOpen: false }" :class="{ 'overflow-hidden h-full' : mobileMenuOpen }">
<?php wp_body_open(); ?>
<div id="page" class="site">

	<nav aria-labelledby="primary-mobile-navigation">
		<div id="primary-mobile-navigation">
			<?php get_template_part( 'template-parts/nav-mobile' ); ?>
		</div>
	</nav>

	<header class="w-full bg-white py-6 px-6 lg:px-0">
		<div class="w-full lg:max-w-6xl flex justify-between items-center mx-auto">
			<div><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/proact-logo.png" class="h-16 lg:h-24" alt="PROACT logo" /></div>
			<div class="block lg:hidden">
				<svg x-on:click="mobileMenuOpen = true" class="fill-current w-8 h-8 lg:hidden cursor-pointer text-blue-primary" role="button" aria-label="show mobile menu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
					<path d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
				</svg>
			</div>
			<div class="hidden lg:block">
				<navigation class="flex">
					<?php
					if ( has_nav_menu( 'page_menu' ) ) {
						site_navigation_menu( 'page_menu' );
					}
					?>
					<!-- <ul x-show="open" class="absolute right-0 bg-blue-primary border-b-4 border-blue-secondary w-64" x-cloak>
							<li><a class="text-white block py-4 px-4 border-b border-blue-secondary hover:bg-green" title="News &amp; Media" href="https://proactwv.com/about-us/news-media/">News &amp; Media</a></li>
							<li><a class="text-white block py-4 px-4 border-b border-blue-secondary hover:bg-green" title="History" href="https://proactwv.com/about-us/history/">History</a></li>
							<li><a class="text-white block py-4 px-4 border-b border-blue-secondary hover:bg-green" title="Leadership" href="https://proactwv.com/about-us/leadership/">Leadership</a></li>
							<li><a class="text-white block py-4 px-4 border-b border-blue-secondary hover:bg-green" title="Contact Us" href="https://proactwv.com/about-us/contact-us/">Contact Us</a></li>
						</ul> -->

					<!-- <a href="#" class="text-gray-darkest hover:text-blue-primary uppercase text-lg pl-3 block">Contact Us</a> -->
				</navigation>
			</div>
		</div>
	</header>
