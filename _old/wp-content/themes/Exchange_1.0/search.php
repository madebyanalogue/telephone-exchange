<?php
/**
 * @package WordPress
 * @subpackage Exchange_1.0
 * @since Exchange 1.0
 */
 get_header(); ?>

 <article class="post" id="post-<?php the_ID(); ?>">
 	<div class="row pad-xs-30 pad-md-40 pad-top-bottom">
		<div class="wrapper">
			<div class="row center-xs between-md text-left">

				<?php if (have_posts()) : ?>

					<div class="col-xs-12 col-sm-10 pad-xs-10">
						<h2><b><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></b></h2>
						<div class="sp-20"></div>
					</div>
					<div class="col-xs-12">
						<div class="row">
							<?php while (have_posts()) : the_post(); ?>
								<?php include(locate_template('template-parts/content-thumbnail.php')); ?>
							<?php endwhile; ?>
						</div>

						<?php post_navigation(); ?>

					</div>
					
				<?php else : ?>

					<div class="col-xs-12 pad-xs-10">
						<h2><b><?php _e('Nothing Found','html5reset'); ?></b></h2>
						<div class="sp-20"></div>
					</div>

				<?php endif; ?>

			</div>
		</div>
	</div>
</article>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
