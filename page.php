<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package proact2021
 */

get_header();

get_template_part( 'template-parts/page-title' );
?>
<div class="w-full lg:max-w-6xl mx-auto px-6 lg:px-0 py-12">
	<div class="flex flex-wrap mx-0 lg:-mx-6 px-0">
		<div class="w-full lg:w-3/4 lg:px-6">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
		<div class="w-full lg:w-1/4 lg:px-6 mt-6 lg:mt-0">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	</div>
</div>
<?php
get_footer();
