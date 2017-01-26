					<footer class="footer" role="contentinfo">
						<div id="inner-footer" class="row">
							<div class="large-5 medium-6 columns small-centered footer-form">
                            	<h3 class="text-center">Send us a message</h3>
								<?php echo do_shortcode('[contact-form-7 id="38" title="Contact form 1"]'); ?>
		    				</div>
							<div class="large-6 medium-6 columns small-centered text-center">
                            	<a href="<?php the_field('_facebook','option'); ?>" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                                <a href="<?php the_field('_twitter','option'); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="<?php the_field('_instagram','option'); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="<?php the_field('_youtube','option'); ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
								<p class="source-org copyright">Copyright &copy; <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>. All Rights Reserved.</p>
							</div>
						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
				</div>  <!-- end .main-content -->
			</div> <!-- end .off-canvas-wrapper-inner -->
		</div> <!-- end .off-canvas-wrapper -->
		<?php wp_footer(); ?>
        <?php the_field('_footer_code','option'); ?>
        <link rel="stylesheet" id="fontawesome" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" media="all">
	</body>
</html> <!-- end page -->