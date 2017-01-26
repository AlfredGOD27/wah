<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->

<div class="top-bar" id="top-bar-menu">
	<div class="row">
        <div class="top-bar-left float-left">
            <ul class="menu">
                <li class="site-logo"><a href="<?php echo home_url(); ?>" class="site-logo"><img src="<?php the_field('_site_logo','option'); ?>"></a></li>
            </ul>
        </div>
        <div class="topbar-cart show-for-medium text-right">
        	<?php
				global $woocommerce;
				$cart_url = $woocommerce->cart->get_cart_url();
			?>
        	<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>">&nbsp;</a>
        </div>
        <div class="topbar-login show-for-medium text-right">
        	<?php if ( is_user_logged_in() ) { 
				$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
				if ( $myaccount_page_id ) {
				  $myaccount_page_url = get_permalink( $myaccount_page_id );
				}
			?>
            	<a href="<?php echo $myaccount_page_url; ?>">My Account</a>
            <?php } else { ?>
            	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">Login</a>
			<?php } ?>
        </div>
        
        <div class="top-bar-right show-for-medium">
            <?php joints_top_nav(); ?>	
        </div>
        <div class="top-bar-right float-right show-for-small-only text-right">
            <ul class="menu">
                <!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
                <li class="menu-bar-container"><a data-toggle="off-canvas" class="menu-bar"><?php _e( '<div class="bar"><div></div><div></div><div></div></div> <span>MENU</span>', 'jointswp' ); ?></a></li>
            </ul>
        </div>
    </div>
</div>