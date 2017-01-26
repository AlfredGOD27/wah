<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 
		do_action( 'woocommerce_before_main_content' );
		*/
	?>

		<?php // while ( have_posts() ) : the_post(); ?>

			<?php // wc_get_template_part( 'content', 'single-product' ); ?>

		<?php // endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 
		do_action( 'woocommerce_after_main_content' );
		*/
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		
		do_action( 'woocommerce_sidebar' );
		 */
		 
		 global $post;
		 global $product;
	?>
    
    <div id="content">
    	
		<div id="inner-content" class="row">
	
		    <main id="main" class="large-12 medium-12 columns entry-content large-centered" role="main">
            	
                <div class="row">

                    <div class="columns large-3 medium-12 small-12">
                    	<h4 class="text-left page-subtitle left-panel">Our Modules</h4>
                        
                        <ul class="side-menu-top">
                        	<?php
								$shop_page = get_permalink( woocommerce_get_page_id( 'shop' ) );
								$url =  "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

								if ($url == $shop_page) {
									$active_class = 'active_page';
								}
							?>
                            <li class="<?php echo $active_class; ?>"><a href="<?php echo $shop_page; ?>">Module Introduction</a></li>
                            
                        	<?php 
							
							$current_id = get_the_ID();
							$user_id = get_current_user_id();
							$current_user= wp_get_current_user();
							$customer_email = $current_user->email;
							
							$args = array(
								'nopaging' => 0, 
								'post_type'=>'product', 
								'post__not_in' => array(143),
								'post_status' => 'publish', 
								'orderby' => 'title',
								'order' => 'ASC',
							);
							
							$query = new WP_Query( $args );
							if ( $query->have_posts() ) : ?>
								<?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                
                                <?php
									if ( $current_id == $post->ID ) {
										$active_tab = 'active';
										$submenu = '';
									} else {
										$active_tab = '';
										$submenu = 'hide';
									}
									
								?>
                    
                                         <li class="has-submenu <?php echo $active_tab; ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                         
                                                <ul id="example-tabs" class="tabs vertical side-menu-sub <?php echo $submenu; ?>" data-tabs="sdbmx6-tabs">
                                                    
                                                    <?php 
                                                    if( have_rows('_modules', $post->ID) ):  
                                                      $count = 0;
                                                      while ( have_rows('_modules', $post->ID) ) : 
                                                        the_row(); 
                                                        if (!$count) {
                                                            $active = 'is-active';
                                                            $hidden = 'true';
                                                        } else {
                                                            $active = '';
                                                            $hidden = 'false';
                                                        }
                                                        ?>
                                                          <li class="tabs-title <?php echo $active; ?>" role="presentation"><a href="#panel-<?php echo $post->ID.'-'.$count; ?>" role="tab" aria-controls="panel1-<?php echo $post->ID.'-'.$count; ?>" aria-selected="<?php $false; ?>" id="panel1-label"><?php the_sub_field('_module_title'); ?></a></li>
                                                             
                                                            <?php 
                                                            $count++;
                                                          endwhile;
                                                        endif; 
                                                      ?>
                                                 
                                                </ul>
                                            
                                        </li>
									<?php endwhile;  ?>
                            	<?php endif; ?>
							<?php wp_reset_postdata(); ?>
                        </ul>
                        
                    </div>
                    
                    <div class="columns large-9 medium-12 small-12">
                        
                        <div class="tabs-content" data-tabs-content="example-tabs">

							<?php 
								if( have_rows('_modules', $post->ID) ):  
								  $count = 0;
								  while ( have_rows('_modules', $post->ID) ) : 
									the_row(); 
									if (!$count) {
										$active = 'is-active';
										$hidden = 'false';
									} else {
										$active = '';
										$hidden = 'true';
									}
									
									
									if (wc_customer_bought_product($customer_email, $user_id,$product->id)){
										$module_video = get_sub_field('_module_video');
									} else {
										$module_video = get_sub_field('_module_free_video');
									}
									
									$video = $module_video['url'];
									?>
									  <div id="panel-<?php echo $post->ID.'-'.$count; ?>" class="tabs-panel tabs-panel <?php echo $active; ?>" aria-hidden="<?php echo $hidden; ?>" role="tabpanel" aria-labelledby="panel1-label">
                                            <h3 class="text-left page-subtitle"><?php the_sub_field('_module_title'); ?></h3>
                                            <?php echo do_shortcode('[video width="1280" height="720" mp4="'.$video.'"][/video]'); ?>
                                            <?php the_sub_field('_module_content'); ?>
                                        </div>
									  </li>
                                         
									<?php 
									$count++;
								  endwhile;
								endif; 
								
								wp_reset_postdata();
							  ?>
                        
                            
                        </div>
                    </div>
                
                </div>	

			</main> <!-- end #main -->
            
		</div> <!-- end #inner-content -->
        
	
	</div> <!-- end #content -->

<?php get_footer( 'shop' ); ?>
