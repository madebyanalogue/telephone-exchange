	<div class="row journal">
		<div class="col one-half" id="fixedarticle">
			<div class="absolute">
				<div class="wrapper ">
					<div class="featured">
						<section class="">
							
							<?php query_posts('offset=0&showposts=1&order=DSC'); ?>
							<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

								<article class="ajax" onclick="ga('send', 'event', 'journal', 'click', '<?php the_title(); ?>');" data-title="<?php the_title(); ?>" <?php if (get_field('author')) { ?>data-category="by <?php the_field('author'); ?>"<?php } ?> data-image="<?php the_post_thumbnail_url('full'); ?>">
									<div class="thumb"><div class="thumb-inner" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>')"></div></div>
									<div class="content">
										<div class="inner">
											<p><?php $category = get_the_category(); echo $category[0]->cat_name; ?></p>
											<h4><?php the_title(); ?></h4>
											<p><?php the_excerpt(); ?></p>
											<div class="journalcontent"><?php the_content(); ?></div>
										</div>
									</div>
								</article>
							
							<?php endwhile; endif; ?>
							
						</section>
					</div>
				</div>
			</div>
		</div>
		<div class="col one-half" id="journalright">
			<div class="row" id="parallaxrow">
				<div class="col one-half blog-col" id="parallaxcolone">
					<div id="leftcol" >
						
						<?php query_posts('offset=1&showposts=6&order=DSC'); ?>
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
							<article class="ajax" onclick="ga('send', 'event', 'journal', 'click', '<?php the_title(); ?>');" data-title="<?php the_title(); ?>" <?php if (get_field('author')) { ?>data-category="by <?php the_field('author'); ?>"<?php } ?> data-image="<?php the_post_thumbnail_url('large'); ?>">
								<div class="thumb"><div class="thumb-inner" style="background-image: url('<?php the_post_thumbnail_url('large'); ?>')"></div></div>
								<div>
									<p><?php $category = get_the_category(); echo $category[0]->cat_name; ?></p>
									<h4><?php the_title(); ?></h4>
									<p><?php the_excerpt(); ?></p>
									<div class="journalcontent"><?php the_content(); ?></div>
								</div>
							</article>
						<?php endwhile; endif; ?>
						
					</div>
				</div>
				<div class="col one-half blog-col" id="parallaxcoltwo">
					<div id="rightcol">
						
						<?php query_posts('offset=7&showposts=7&order=DSC'); ?>
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
							
							<article class="ajax" onclick="ga('send', 'event', 'journal', 'click', '<?php the_title(); ?>');" data-title="<?php the_title(); ?>" <?php if (get_field('author')) { ?>data-category="by <?php the_field('author'); ?>"<?php } ?> data-image="<?php the_post_thumbnail_url('large'); ?>">
								<div class="thumb"><div class="thumb-inner" style="background-image: url('<?php the_post_thumbnail_url('large'); ?>')"></div></div>
								<div>
									<p><?php $category = get_the_category(); echo $category[0]->cat_name; ?></p>
									<h4><?php the_title(); ?></h4>
									<p><?php the_excerpt(); ?></p>
									<div class="journalcontent"><?php the_content(); ?></div>
								</div>
							</article>
						
						<?php endwhile; endif; ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>