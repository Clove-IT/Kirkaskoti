<?php
/**
 * Template for displaying search forms in Xclean
 *
 * @package WordPress
 * @subpackage Xclean
 * @since 1.0
 * @version 1.0
 */
$unique_id = esc_attr( uniqid( 'search-form-' ) );
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr($unique_id); ?>">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'xclean' ); ?></span>
	</label>
	<input type="search" id="<?php echo esc_attr($unique_id); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'xclean' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit " title="<?php echo esc_html_x( 'Search', 'submit button', 'xclean' ); ?>"><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'xclean' ); ?></span></button>
</form>
