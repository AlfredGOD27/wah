<?php
/*
Template Name: Page - Testimonials
*/
?>

<?php get_header(); ?>
			
	<div id="content">
    	
		<div id="inner-content" class="row">
	
		    <main id="main" class="large-12 medium-12 columns entry-content large-centered testi-grid" role="main">
            	
                <div class="row archive-grid" data-equalizer>
                
                	<h3 class="text-center page-title"><?php the_title(); ?></h3>
				
                   

						<?php
                        if( have_rows('_testimonials') ):
                        
                            while ( have_rows('_testimonials') ) : the_row();
                        ?>
                                <div class="large-4 medium-4 small-12 columns panel" data-equalizer-watch>
								
                                    <div class="testi-box text-center">
                                    
                                        <p class="testi-image"><a id="example1" href="<?php the_sub_field('_image'); ?>"><img src="<?php the_sub_field('_image'); ?>"></a></p>
                                        <p><?php the_sub_field('_message'); ?></p>
										<p class="testi-name"><?php the_sub_field('_name_title'); ?></p>
                                        
                                    </div>
                                    
                                </div>
                        <?php
						
                            endwhile;
                        
                        else :
                        
                            echo '<p>No testimonials found.</p>';
                        
                        endif;
                        
                        ?>
                
                </div>					

			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content -->

<?php get_footer(); ?>
