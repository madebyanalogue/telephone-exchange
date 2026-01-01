<?php
/**
 * @package WordPress
 * @subpackage Exchange_1.0
 * @since Exchange 1.0
 */
 get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article class="post" id="post-<?php the_ID(); ?>">

			<div class="row pad-xs-30 pad-md-50 pad-top-bottom">
				<div class="wrapper">
					<div class="row center-xs between-md text-left">
						<div class="col-xs-12 col-sm-10 col-md-4 col-lg-3 pad-xs-10">
							<div class="sticky-md">
								<h2><b><?php the_title(); ?></b></h2>
								<div class="sp-20"></div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-10 col-md-7 pad-xs-10 rte">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
			
		</article>
		
	
	<?php endwhile; endif; ?>

<?php get_footer(); ?>
