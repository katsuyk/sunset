<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package sunset
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area col-md-3 col-lg-3" role="complementary">
	<div class="well">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- .class -->
</div><!-- #secondary -->
</div><!-- .row -->
</div><!-- .container -->
