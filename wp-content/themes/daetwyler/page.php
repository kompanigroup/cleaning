<?php get_header(); ?>

	<!-- START: Content -->
	<main class="content body__content">
		<div class="inner group">

			
			<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
			<section class="content--sidebar alignright">
				<?php endif; ?>
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php //the_title(); ?>
						<?php the_content(); ?>
					<?php endwhile; // have_posts ?>
				<?php endif; // have_posts ?>

				<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
			</section>
			<aside class="sidebar body__sidebar alignleft"><?php dynamic_sidebar( 'sidebar' ); ?></aside>
		<?php endif; // active_sidebar ?>
			

		</div><!-- /.inner -->
	</main><!-- /.content -->
	<!-- END: Content -->

<?php get_footer(); ?>