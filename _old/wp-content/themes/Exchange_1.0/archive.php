<?php
/**
 * @package WordPress
 * @subpackage Exchange_1.0
 * @since Exchange 1.0
 */
 get_header(); ?>


	<section>
		<div class="row pad-xs-30 pad-md-40 pad-top-bottom">
			<div class="wrapper">
				
				<!-- SECTION HEADER -->
				<div class="row">
					
					<?php include(locate_template('template-parts/content-section-header.php')); ?>
				</div>

				
				<!-- CONTENT -->
				<div class="row grid">
					<?php $post_type = 'any'; //include(locate_template('template-parts/content-posts.php')); ?>
					
						<?php include(locate_template('template-parts/content-thumbnail.php')); ?>
					
				</div>

			</div>
		</div>
	</section>
 


<?php get_footer(); ?>
