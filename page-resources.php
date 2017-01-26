<?php
/*
Template Name: Page - Resources
*/
?>

<?php get_header(); ?>
			
	<div id="content">
    	
		<div id="inner-content" class="row">
	
		    <main id="main" class="large-12 medium-12 columns entry-content large-centered resource-grid" role="main">
            	
                <div class="row archive-grid" data-equalizer>
                
                	<?php if ( is_user_logged_in() ) { ?>
                
                	<h3 class="text-center page-title"><?php the_title(); ?></h3>
				
                   

						<?php
                        if( have_rows('_resources') ):
                        
                            while ( have_rows('_resources') ) : the_row();
                        ?>
                                <div class="large-4 medium-4 small-12 columns panel" data-equalizer-watch>
								
                                    <div class="resource-box text-center">
                                    
                                        <div class="resource-image"><img src="<?php the_sub_field('_logo'); ?>"></div>
                                        <p class="resource-title"><?php the_sub_field('_title'); ?></p>
                                        
                                    </div>
                                    
                                </div>
                        <?php
						
                            endwhile;
                        
                        else :
                        
                            echo '<p>No resources found.</p>';
                        
                        endif;
                        
                        ?>
                        
                <?php  } else { ?>
						
                    <div class="column not-logged-in" >
                        Please <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">login</a> to view this page.
                    </div>
                
                <?php } ?>
                
                </div>	

			</main> <!-- end #main -->
            
		</div> <!-- end #inner-content -->
        
        
        <?php if ( is_user_logged_in() ) { ?>
        <section class="resource-faq">
            <div class="row">
            	
                <h3 class="page-title text-center">Frequently Asked Questions</h3>
            
                <ul class="accordion" data-accordion="8vop90-accordion" role="tablist">
                
                	<?php
                        if( have_rows('_faqs') ):
                        
                            while ( have_rows('_faqs') ) : the_row();
                        ?>
                             <li class="accordion-item"><a id="panel1d-label" class="accordion-title" href="#panel1d" aria-controls="panel1d" role="tab" aria-expanded="false" aria-selected="false"><?php the_sub_field('_title'); ?></a>
                                <div id="panel1d" class="accordion-content" data-tab-content="" role="tabpanel" aria-labelledby="panel1d-label" aria-hidden="true"><?php the_sub_field('_content'); ?></div>
                            </li>
                                
                        <?php
                            endwhile;
                        else :
                            echo '<p>No FAQs found.</p>';
                        endif;
                        ?>
                   
                </ul>
            </div>	
        </section>
        
        <?php } ?>

	</div> <!-- end #content -->
    
    

<?php get_footer(); ?>
