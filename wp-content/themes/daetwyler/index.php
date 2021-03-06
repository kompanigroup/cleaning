<?php get_header(); ?>

<?php
$pid = get_option('page_for_posts');
$tpl = str_replace( '.php', '', get_post_meta( $pid, '_wp_page_template', true) );
?>
	<!-- START: Content -->
	<main class="content body__content">
		<div class="inner group">

			<?php if ( is_active_sidebar( 'sidebar' ) && ( $tpl != 'template-nosidebar' ) ) : ?>
			<section class="content--sidebar alignright">
				<?php endif; ?>

				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="article-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header>
								<h2 class="article--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php do_action('post_info', true); ?>
							</header>
							<?php the_excerpt(); ?>
						</article>
					<?php endwhile; // have_posts ?>
					<?php
					do_action( 'pagination' );
					?>
				<?php endif; // have_posts ?>

				<?php if ( is_active_sidebar( 'sidebar' ) && ( $tpl != 'template-nosidebar' ) ) : ?>
			</section>
			<aside class="sidebar body__sidebar alignleft"><?php dynamic_sidebar( 'sidebar' ); ?></aside>
		<?php endif; // active_sidebar ?>

		</div><!-- /.inner -->
	</main><!-- /.content -->
	<!-- END: Content -->

<?php get_footer(); ?>