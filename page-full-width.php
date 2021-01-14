<?php
/**
 * Template Name: Full Width
 *
 * @package proact2021
 */

get_header();

get_template_part( 'template-parts/page-title' );
?>
<div class="w-full lg:max-w-6xl mx-auto px-6 lg:px-0 py-6 lg:py-12">
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
<?php
get_footer();
