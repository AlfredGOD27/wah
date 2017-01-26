<?php
/*
Template Name: Page - Home
*/
?>

<?php get_header(); ?>
			
	<div id="content">
    	
		<?php $slider = get_field('_slider'); ?>		
		
        <?php echo do_shortcode($slider); ?>
        
        <div class="subheader">
        	<div class="row">
            	<div class="columns large-12 medium-12 text-center large-centered">
                	<h4><?php the_field('_subheader_title'); ?></h4>
                	<p><img src="<?php the_field('_subheader_image'); ?>"></p>
                    <div class="columns small-4">
                    	<?php the_field('_subheader_step1'); ?>
                    </div>
                    <div class="columns small-4">
                    	<?php the_field('_subheader_step2'); ?>
                    </div>
                    <div class="columns small-4">
                    	<?php the_field('_subheader_step3'); ?>
                    </div>
                </div>
            </div>
        </div>
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="large-10 medium-12 columns entry-content large-centered" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php the_content(); ?>
					
				<?php endwhile; endif; ?>							

			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content -->

<?php get_footer(); ?>
