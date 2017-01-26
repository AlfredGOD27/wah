<?php
/*
Template Name: Page - FAQs
*/
?>

<?php get_header(); ?>
			
	<div id="content">
    	
		<div id="inner-content" class="row">
	
		    <main id="main" class="large-12 medium-12 columns entry-content large-centered faq-grid" role="main">
            	
                <div class="row">
                
                	<h3 class="text-center page-title"><?php the_title(); ?></h3>
				
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

			</main> <!-- end #main -->
            
		</div> <!-- end #inner-content -->
        
	
	</div> <!-- end #content -->

<?php get_footer(); ?>
