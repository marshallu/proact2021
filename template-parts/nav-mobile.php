<?php
/**
 * Template part for displaying the mobile navigation on the pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package marsha
 */

?>
<div class="relative">
	<div class="flex z-50 w-full h-full fixed top-0 left-0 mobile-nav off-canvas" :class="{ 'active' : mobileMenuOpen }">
		<div class="w-1/5">
			<div class="h-10 w-10 bg-white text-gray-800 shadow-lg rounded-full p-3 mx-auto mt-6 border-2 border-black" x-on:click="mobileMenuOpen = false">
				<svg role="button" aria-label="hide mobile menu" x-on:click="mobileMenuOpen = false" class="fill-current shadow-lg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
					<path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z" /></svg>
			</div>
		</div>
		<div class="w-4/5 h-full shadow-lg overflow-x-hidden overflow-y-auto pb-16 bg-blue-primary">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-white hover:text-white">
				<div class="font-serif uppercase text-lg font-semibold mb-3 text-center px-4 text-white mt-8 leading-tight"><?php bloginfo( 'name' ); ?></div>
			</a>
			<?php
			if ( has_nav_menu( 'page_menu' ) ) {
				site_navigation_menu( 'page_menu', true );
			}
			?>
		</div>
	</div>
</div>
