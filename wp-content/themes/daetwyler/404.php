<?php get_header(); ?>

	<!-- START: Content -->
	<main class="content body__content">
		<div class="inner group">

			<h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'daetwyler' ); ?></h2>
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'daetwyler' ); ?></p>
			<p><?php echo sprintf( __( 'Or <a href="javascript:history.go(-1);">%s</a> to the previous page.', 'daetwyler' ), __('go back', 'daetwyler') ); ?></p>

		</div><!-- /.inner -->
	</main><!-- /.content -->
	<!-- END: Content -->

<?php get_footer(); ?>