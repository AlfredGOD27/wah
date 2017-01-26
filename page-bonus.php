<?php
/*
Template Name: Page - Bonus Training
*/
?>

<?php get_header(); global $post;  ?>
			
	<div id="content">
    	
		<div id="inner-content" class="row">
	
		    <main id="main" class="large-12 medium-12 columns entry-content large-centered" role="main">
            	
                <div class="row">
                
                	<?php if ( is_user_logged_in() ) { ?>

                    <div class="columns large-3 medium-12 small-12">
                    	<h4 class="text-left page-subtitle left-panel">Our Modules</h4>
                        
                        <ul class="side-menu-top">
                        	<?php
								$bonus_page = get_page_link(112);
								$url =  "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

								if ($url == $bonus_page) {
									$active_class = 'active_page';
								}
							?>
                            <li class="<?php echo $active_class; ?>"><a href="<?php echo $bonus_page; ?>">Module Introduction</a></li>
                            
                        	<?php 
							
							$current_id = get_the_ID();
							
							$args = array(
								'nopaging' => 0, 
								'post_type'=>'post', 
								'post_status' => 'publish', 
								'cat' => 7,
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
                    	<h3 class="text-left page-subtitle"><?php the_title(); ?></h3>
                        
                         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php the_content(); ?>
                            
                        <?php endwhile; endif; ?>	
                    </div>
                	
                    <?php  } else { ?>
						
                        <div class="column not-logged-in" >
                        	Please <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">login</a> to view this page.
                        </div>
					
					<?php } ?>
                </div>	

			</main> <!-- end #main -->
            
		</div> <!-- end #inner-content -->
        
	
	</div> <!-- end #content -->

<?php get_footer(); ?>
