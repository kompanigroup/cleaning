<?php
/*
 * Template Name: No Sidebar
 *
 */
?>
<?php get_header(); ?>

	<!-- START: Content -->
	<main class="content body__content">
		<div class="inner group">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php //the_title(); ?>
					<?php the_content(); ?>
				<?php endwhile; // have_posts ?>
			<?php endif; // have_posts ?>
		</div><!-- /.inner -->
	</main><!-- /.content -->
	<!-- END: Content -->

<?php get_footer(); ?>