<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	</label>
	<?php /*<input type="submit" class="search-submit icon-search Defaults-search" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />*/ ?>
	<i class="Defaults-search" onclick="javascript:this.parentNode.submit();"></i>

</form>