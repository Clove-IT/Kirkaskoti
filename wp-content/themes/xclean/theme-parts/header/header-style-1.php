<?php
/**
 *
 * @package WordPress
 * @subpackage Xclean
 * @since 1.0
 * @version 1.0
 */
?>
<?php get_template_part( 'theme-parts/header/pre-header',	pbmit_get_base_option('header-style') ); ?>
<div class="pbmit-header-overlay">
	<div class="pbmit-header-height-wrapper" style="min-height:<?php echo pbmit_get_base_option('header-height'); ?>px;">
		<div class="pbmit-main-header-area <?php pbmit_header_class(); ?> <?php pbmit_header_bg_class(); ?>">
			<div class="container">
				<div class="d-flex justify-content-between align-items-center">
					<div class="pbmit-logo">
						<div class="site-branding pbmit-logo-area">
							<div class="wrap">
								<?php echo pbmit_logo(); ?><!-- Logo area -->
							</div><!-- .wrap -->
						</div><!-- .site-branding -->
					</div>
					<!-- Top Navigation Menu -->
					<div class="navigation-top">
						<div class="wrap">
							<nav id="site-navigation" class="main-navigation pbmit-navbar <?php pbmit_nav_class(); ?>" aria-label="<?php esc_attr_e( 'Top Menu', 'xclean' ); ?>">
								<?php wp_nav_menu( array(
									'theme_location'	=> 'pbminfotech-top',
									'menu_id'			=> 'pbmit-top-menu',
									'menu_class'		=> 'menu',
									'fallback_cb'		=> false,
								) ); ?>
							</nav><!-- #site-navigation -->
						</div><!-- .wrap -->
					</div><!-- .navigation-top -->
					<div class="pbmit-right-box d-flex align-items-center">
						<div class="pbmit-search-cart-box">							
							<?php pbmit_header_search(); ?>
							<?php pbmit_cart_icon(); ?>
						</div>
						<div class="pbmit-burger-menu-wrapper">
							<div class="pbmit-mobile-menu-bg"></div>
							<?php if ( has_nav_menu( 'pbminfotech-top' ) ) { ?>							
								<button id="menu-toggle" class="nav-menu-toggle">
									<i class="pbmit-base-icon-menu-1"></i>
								</button>
							<?php } ?>
						</div>
					</div>
				</div><!-- .justify-content-between -->
			</div><!-- .container -->
		</div><!-- .pbmit-header-wrapper -->
	</div><!-- .pbmit-header-height-wrapper -->
</div>
