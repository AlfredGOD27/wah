<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
						
	<header class="article-header">
    	<?php
			global $woocommerce;
			$cart_url = $woocommerce->cart->get_cart_url();
			$checkout_url = $woocommerce->cart->get_checkout_url();
		?>
    	<?php if (is_wc_endpoint_url( 'order-received' )) { ?>
        	<div class="row">
                <ul id="progress">
                    <li><a href="<?php echo $cart_url; ?>">SHOPPING BASKET</a></li>
                    <li><a href="<?php echo $checkout_url; ?>">CHECKOUT DETAILS</a></li>
                    <li class="active">ORDER CONFIRMATION</li>
                </ul>
            </div>
        <?php } elseif (is_checkout()) { ?>
        	<div class="row">
                <ul id="progress">
                    <li><a href="<?php echo $cart_url; ?>">SHOPPING BASKET</a></li>
                    <li class="active"><a href="<?php echo $checkout_url; ?>">CHECKOUT DETAILS</a></li>
                    <li>ORDER CONFIRMATION</li>
                </ul>
            </div>
        <?php } else if (is_cart()) { ?>
        	<div class="row">
                <ul id="progress">
                    <li class="active">SHOPPING BASKET</li>
                    <li><a href="<?php echo $checkout_url; ?>">CHECKOUT DETAILS</a></li>
                    <li>ORDER CONFIRMATION</li>
                </ul>
            </div>
        <?php } else { ?>
        	<h4 class="page-title"><?php the_title(); ?></h4>
		<?php }  ?>
	</header> <!-- end article header -->
					
    <section class="entry-content" itemprop="articleBody">
	    <?php the_content(); ?>
	    <?php wp_link_pages(); ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
		
	</footer> <!-- end article footer -->
						    
	<?php comments_template(); ?>
					
</article> <!-- end article -->