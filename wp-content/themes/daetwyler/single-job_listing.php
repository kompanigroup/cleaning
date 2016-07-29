<?php get_header(); ?>

<!-- START: Content -->
<main class="content body__content">
	<div class="inner group">

	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
		<section class="content--sidebar alignleft">
	<?php endif; ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="content--article article">
				<header class="article--header">
					<h1 class="article--title title"><?php the_title(); ?></h1>
				</header>
				<?php //do_action('post_info', true); ?>
				<?php the_content(); ?>
			</article>
		<?php endwhile; // have_posts ?>
	<?php endif; // have_posts ?>

	<?php comments_template(); ?>

	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
		</section><!-- /.content--sidebar -->
		<aside class="sidebar body__sidebar alignright"><?php dynamic_sidebar( 'sidebar' ); ?></aside>
	<?php endif; // active_sidebar ?>

	</div><!-- /.inner -->
</main><!-- /.content -->
<!-- END: Content -->

<?php get_footer(); ?>