<?php
/*
 * Template Name: Page with Sidebar (Right)
 *
 */
?>
<?php get_header(); ?>

<!-- START: Content -->
<main class="content body__content">
	<div class="inner group">

	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
		<section class="content--sidebar alignleft">
	<?php endif; ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php //the_title(); ?>
			<?php the_content(); ?>
		<?php endwhile; // have_posts ?>
	<?php endif; // have_posts ?>

	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
		</section><!-- /.content--sidebar -->
		<aside class="sidebar body__sidebar alignright"><?php dynamic_sidebar( 'sidebar' ); ?></aside>
	<?php endif; // active_sidebar ?>

	</div><!-- /.inner -->
</main><!-- /.content -->
<!-- END: Content -->

<?php get_footer(); ?>