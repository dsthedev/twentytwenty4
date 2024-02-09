<?php

/**
 * Default Search Form
 *
 * This snippet gets used when get_search_form() is called.  It's a simple, inline, narrow search form designed to fit in tight places such as a sidebar.
 */

?>
<form role="search" method="get" action="<?php echo home_url('/'); ?>">
	<div class="field has-addons">
		<div class="control">
			<input type="text" class="input m-0" placeholder="<?php echo esc_attr_x('Search ...', PP_TEXT_DOMAIN); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x('Search for:', PP_TEXT_DOMAIN); ?>" />
		</div>

		<div class="control">
			<button type="submit" class="button round is-info m-0">
				<span class="icon is-small">
					<i class="fas fa-search"></i>
				</span>
			</button>
		</div>
	</div>
</form>