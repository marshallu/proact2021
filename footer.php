<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package proact2021
 */

?>
	<footer class="w-full bg-blue-primary py-16">
		<div class="w-full lg:max-w-6xl px-6 lg:px-0 lg:mx-auto">
			<div class="flex flex-wrap lg:-mx-4 space-y-8 lg:space-y-0">
				<div class="w-full lg:w-1/2 lg:px-4">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/proact-logo.png" alt="PROACT logo" />
				</div>
				<div class="w-full lg:w-1/4 lg:px-4 lg:mt-0">
					<?php if ( is_active_sidebar( 'footer-left' ) ) { ?>
						<div>
							<?php dynamic_sidebar( 'footer-left' ); ?>
						</div>
					<?php } ?>
				</div>
				<div class="w-full lg:w-1/4 lg:px-4 lg:mt-0">
					<?php if ( is_active_sidebar( 'footer-right' ) ) { ?>
						<div>
							<?php dynamic_sidebar( 'footer-right' ); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
