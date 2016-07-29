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

			<header>
				<h1><?php echo $wp_query->found_posts; ?> <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>"</h1>
			</header>

	<?php if ( have_posts() ) : ?>
			<section class="articles article--list">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="article-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<h2 class="article--title"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					</header>
					<?php the_excerpt(); ?>
				</article>
			<?php endwhile; // have_posts ?>
				<?php do_action('pagination'); ?>
			</section>
	<?php endif; // have_posts ?>

	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
		</section><!-- /.content--sidebar -->
		<aside class="sidebar body__sidebar alignright"><?php dynamic_sidebar( 'sidebar' ); ?></aside>
	<?php endif; // active_sidebar ?>

	</div><!-- /.inner -->
</main><!-- /.content -->
<!-- END: Content -->

<?php get_footer(); ?>