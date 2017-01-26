<?php get_header(); ?>
	
	<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="columns" role="main">
            	
                <div class="row">
                	<div class="column">
                    
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
                        <?php get_template_part( 'parts/loop', 'page' ); ?>
                    
                    <?php endwhile; endif; ?>	
                    
                	</div>
                </div>						
			    					
			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>