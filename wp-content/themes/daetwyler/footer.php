    <!-- START: Footer -->
	<footer class="footer body__footer">
	    <div class="inner group">
	        <div class="copyright">&copy; <?php echo date('Y'); ?> Daetwyler USA | <a href="http://www.kompanigroup.com" target="_blank"><span class="developed-by-kg">Website Developed by Kompani Group</span></a></div>
	        <?php wp_nav_menu(array('theme_location' => 'menu_footer', 'container' => false, 'depth' => 1)); ?>
	    </div><!-- /.inner -->
    </footer><!-- /.footer -->
    <!-- END: Footer -->

<?php wp_footer(); ?>
</body>
</html>