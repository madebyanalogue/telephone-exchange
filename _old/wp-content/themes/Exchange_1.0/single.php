<?php
/**
 * @package WordPress
 * @subpackage Exchange_1.0
 * @since Exchange 1.0
 */
 get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php 
					// POSTTYPE
					$postype = get_post_type(get_the_ID());
				
					// THUMBNAIL
					$size               = 'large';
					$featured_img_url 	= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size)[0];

					
					//PROFESSIONS
					$professions = wp_get_object_terms( $post->ID , 'profession' );
					if (!empty($professions) && ! is_wp_error($professions) ){
						foreach($professions as $profession) {
							$professionsArray[]     .= $profession->name;
							$professionsSlugArray[] .= $profession->slug;
						}
						$professionsListComma   = implode(', ', $professionsArray);
						$professionsList        = implode(' ', $professionsSlugArray);
					}

					// COUNTRIES
					$countries = wp_get_object_terms( $post->ID , 'country' );
					if (!empty($countries) && ! is_wp_error($countries) ){
						foreach($countries as $countrie) {
							$countriesArray[] .= $countrie->name;
						}
						$countriesList = implode(', ', $countriesArray);
					}

			?>

		<article class="post white" id="post-<?php the_ID(); ?>">

			<?php if(is_singular('staff') || is_singular('trustee') || is_singular('collaborator')): ?>

			<!-- THE FEATURED IMAGE PROFILE -->

				<div class="relative bg" style="background-image:url('<?php echo $featured_img_url; ?>');">
					<div class="absolute fullheight fullwidth blur"></div>
					<div class="row pad-xs-30 pad-md-50 pad-top">
						<div class="wrapper">
							<div class="row start-xs text-left">
								<div class="col-xs-12 col-sm-10 col-md-3 col-lg-3">
								</div>
								<div class="col-xs-12 col-md-8 col-lg-7 col-md-offset-1 pad-xs-10 pad-left-right">
									<div class="ratio-5-3 bg" style="background-image:url('<?php echo $featured_img_url; ?>');"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			
			<?php endif; ?>
		

			<?php if(is_singular('project')): ?>
				
			<!-- THE FEATURED IMAGE PROJECT -->

				<div class="post__header relative overflow show-md">
					<div class="ratio-16-9"></div>
					<div id="post__thumbnail" class="post__thumbnail absolute-md fullheight fullwidth bg" style="background-image:url('<?php echo $featured_img_url; ?>');"></div>
					<div class="row bottom-xs absolute-md" style="bottom:0;">
						<div class="col-xs-12 relative">
							<div class="absolute white-text title__holder fullheight fullwidth"></div>
							<div class="wrapper">
								<div class="row start-xs text-left">
									<div class="col-xs-12 col-md-3 col-lg-3"></div>
									<div class="col-xs-12 col-md-8 col-lg-7 col-md-offset-1 pad-xs-10">
										<div class="row">
											<div class="col-xs-12 pad-xs-10 pad-sm-20 pad-top-bottom">
												<h1 class="fs-32 white-text"><b><?php the_title(); ?></b></h1>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			
			<?php endif; ?>
				
				<!-- THE CONTENT -->
				<div class="row pad-xs-30 pad-md-50 pad-top-bottom">
					<div class="wrapper">
						<div class="row start-xs text-left">

							<!--CONTENT-->
							<div class="col-xs-12 col-md-8 col-lg-7 col-md-offset-1 pad-xs-10">

								<div class="row">
									<div class="col-xs-12 spaced-items">

										<?php if(is_singular('project')): ?>
											<h1 class="fs-28 hide-md"><b><?php the_title(); ?></b></h1>
										<?php endif; ?>

										<?php if($postype == 'event'): ?>
											<h1 class="fs-28 fs-40-sm raster"><?php the_title(); ?></h1>
										<?php endif; ?>
																				
										<?php if($postype == 'event'): ?>
											<h5 class="fs-16"><b>Event date:</b> <?php $date = get_field('event_date'); echo date("j F, Y", strtotime($date)); ?></h5>
										<?php endif; ?>

										<!--TITLE-->
										<?php if($postype == 'post' || $postype == 'news'): ?>
											<h1 class="fs-28 fs-40-sm amerigo lineheight"><?php the_title(); ?></h1>
											<h5 class="fs-16"><?php echo get_the_date('d.m.Y'); ?></h5>
										<?php endif; ?>
										
										<?php if($postype == 'collaborator' || $postype == 'staff' || $postype == 'trustee'): else : ?>
											<div class="ratio-5-3 bg <?php if(is_singular('project')): echo 'hide-md'; endif; ?>" style="background-image:url('<?php echo $featured_img_url; ?>');margin-top:30px;"></div>
										<?php endif; ?>

										<?php if($postype == 'collaborator' || $postype == 'staff' || $postype == 'trustee'): ?>
											<h1 class="fs-28 fs-40-sm"><b><?php the_title(); ?></b></h1>
										<?php endif; ?>

										<?php if($postype == 'collaborator'): ?>
											<?php if(!empty($professions)): ?><div><h5 class="fs-16"><?php print_r($professionsListComma); 	?><?php if(!empty($countries)): ?>, <?php print_r($countriesList); ?><?php endif; ?></h5></div><?php endif; ?>
										<?php endif; ?>

										<?php if($postype == 'staff' || $postype == 'trustee'): ?>
											<h5 class="fs-16"><?php the_field('job_title'); ?></h5>
										<?php endif; ?>

										<div class="sp-5"></div>
									</div>
								</div>

								<div class="rte">
									<?php the_content(); ?>
								</div>

							</div>


							<!--LINKED CONTENT-->
							<div class="col-xs-12 col-sm-10 col-md-3 col-lg-3 first-md">
								<div <?php if($postype == 'project'): echo 'id="sticky-project"'; endif; ?>class="sticky-md">
									<?php if(get_field('collaborators')): ?>
										<div class="row">
											<?php if(!$postype == 'project'):?>
												<div class="col-xs-12 pad-xs-10">
													<h4><b>Related Content</b></h4>
													<div class="sp-20"></div>
												</div>
											<?php endif; ?>
											<div class="col-xs-12">
												<div class="row single__collaborators">
													<?php 
													
														$posts_to_display 		= 'linked_content';
														$thumbnail_size         = 'full';
														include(locate_template('template-parts/content-posts.php'));
														unset($posts_to_display);
														unset($thumbnail_size);
													?>
												</div>
											</div>
										</div>
									<?php endif; ?>
									<?php if(is_singular('staff') || is_singular('trustee') || is_singular('collaborator')): ?>
										<div class="row pad-xs-10">
											<div class="col-xs-12 pad-md-10 pad-top">
												<?php if(is_singular('staff') || is_singular('trustee')): ?>
													<?php $link = '/team'; ?>
												<?php elseif(is_singular('collaborator')): ?>
													<?php $link = '/collaborators'; ?>
												<?php endif; ?>
												<a class="titlecase button button--hyperion" href="<?php echo get_site_url(); echo $link; ?>"><span><span><?php echo $postype; ?></span></span></a>
											</div>
										</div>
									<?php endif; ?>
								</div>
							</div>

						</div>
					</div>
				</div>

		</article>

		<?php if(is_singular('project') || is_singular('post')): ?>

			<!--TAGS-->
			<div class="row border-top pad-xs-20 pad-top-bottom">
				<div class="wrapper">
					<div class="row">
						<div class="col-xs-12 pad-xs-10">
							<div class="row">
								<div class="col-xs-12 col-sm-3 col-lg-3 pad-xs-5 pad-top-bottom">
									<h4><b>Tags</b></h4>
									<div class="sp-10 hide-md"></div>
								</div>
								<div class="col-xs col-md-8 col-lg-7 col-md-offset-1 pad-md-10 pad-left-right">
									<?php
										$post_tags = get_the_tags();
										if ( ! empty( $post_tags ) ) {
											echo '<div class="row">';
											foreach( $post_tags as $post_tag ) {
												echo '<a class="__tag" href="' . get_tag_link( $post_tag ) . '">' . $post_tag->name . '</a>';
											}
											echo '</div>';
										}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--SHARE-->
			<div class="row border-top pad-xs-20 pad-top-bottom">
				<div class="wrapper">
					<div class="row">
						<div class="col-xs-12 pad-xs-10">
							<div class="row middle-xs">
								<div class="col-xs-12 col-sm-3 col-lg-3">
									<h4><b>Share</b></h4>
									<div class="sp-20 hide-md"></div>
								</div>
								<div class="col-xs col-md-8 col-lg-7 col-md-offset-1 pad-md-10 pad-left-right">
									<div class="row" id="social">
										<div class="col"><a href="<?php the_field('twitter', 	'options'); ?>"     						class="social-icon" target="_blank"   	><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38"><path d="M33.31,9.88a11.76,11.76,0,0,1-3.3.9A5.79,5.79,0,0,0,32.53,7.6,11.53,11.53,0,0,1,28.88,9a5.75,5.75,0,0,0-9.79,5.23,16.24,16.24,0,0,1-11.83-6A5.75,5.75,0,0,0,9,15.9a5.62,5.62,0,0,1-2.6-.72A5.75,5.75,0,0,0,11,20.89a5.8,5.8,0,0,1-2.6.1,5.77,5.77,0,0,0,5.37,4,11.55,11.55,0,0,1-8.5,2.38A16.34,16.34,0,0,0,30.44,12.85,11.74,11.74,0,0,0,33.31,9.88Z"/></svg></a></div>
										<div class="col"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"   class="social-icon" target="_blank"  	><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38"><path d="M33,18.77A14,14,0,1,0,16.81,32.6V22.81H13.26v-4h3.55V15.68c0-3.51,2.09-5.44,5.29-5.44a21.74,21.74,0,0,1,3.13.27V14H23.47a2,2,0,0,0-2.28,2.19v2.63h3.88l-.62,4H21.19V32.6A14,14,0,0,0,33,18.77Z" /></svg></a></div>
										<div class="col"><a href="mailto:?body=<?php the_permalink(); ?>"     								class="social-icon"    					><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38"><path d="M31,28H7a2,2,0,0,1-2-2V14a.5.5,0,0,1,.79-.4l12,8.6a2,2,0,0,0,2.32,0l12.09-8.61A.5.5,0,0,1,33,14V26A2,2,0,0,1,31,28Z"/><path d="M6.27,10.91l12.11,8.67a1,1,0,0,0,1.16,0l12.19-8.68a.5.5,0,0,0-.29-.91H6.56A.5.5,0,0,0,6.27,10.91Z"/></svg></a></div>
										<div class="col tooltip"><span class="tooltiptext" id="myTooltip">Copy to clipboard</span><input type="text" id="copyURL" value="<?php the_permalink(); ?>"><button onclick="copyToClipboard()" onmouseout="outFunc()" class="social-icon copy-to-clipboard"	><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38"><g><path d="M20.12,24.5l-2.94,2.94a4.5,4.5,0,0,1-6.37-6.37l2.94-2.94a1.49,1.49,0,0,0,0-2.12,1.51,1.51,0,0,0-2.12,0L8.69,19A7.5,7.5,0,0,0,19.3,29.56l2.94-2.94a1.51,1.51,0,0,0,0-2.12A1.49,1.49,0,0,0,20.12,24.5Z"/><path d="M29.31,8.94a7.52,7.52,0,0,0-10.61,0l-2.94,2.94a1.51,1.51,0,0,0,0,2.12,1.49,1.49,0,0,0,2.12,0l2.94-2.94a4.53,4.53,0,0,1,6.37,0,4.52,4.52,0,0,1,0,6.37l-2.94,2.94a1.5,1.5,0,0,0,1.06,2.56,1.51,1.51,0,0,0,1.06-.44l2.94-2.94A7.52,7.52,0,0,0,29.31,8.94Z"/><path d="M12.93,25.32a1.51,1.51,0,0,0,2.13,0l10-10a1.51,1.51,0,1,0-2.13-2.13l-10,10A1.52,1.52,0,0,0,12.93,25.32Z"/></g></svg></button></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script>
				function copyToClipboard() {
					var copyText = document.getElementById("copyURL");
					copyText.select();
					copyText.setSelectionRange(0, 99999);
					navigator.clipboard.writeText(copyText.value);
					
					var tooltip = document.getElementById("myTooltip");
					tooltip.innerHTML = "Copied!";
					}

					function outFunc() {
					var tooltip = document.getElementById("myTooltip");
					tooltip.innerHTML = "Copy to clipboard";
				}
			</script>
				
			<!--RELATED POSTS-->
			<div class="row pad-xs-20 pad-top-bottom border-top">
				<div class="wrapper">
					
					<!-- SECTION HEADER -->
					<div class="row">
						<!--TITLE-->
						<div class="col-xs-12">
							<div class="row bottom-xs top-md">
								<div class="col-xs pad-xs-10">
									<h4 class="fs-18"><b>Related Projects</b></h4>
									<div class="sp-10"></div>
								</div>
								<div class="col-xs pad-xs-10 last-md">
									<div class="row end-xs">
										<!-- <a class="arrow-link" href="<?php the_sub_field('link_to_all_items'); ?>"><span>Link out</span></a> -->
										<div class="sp-10"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- CONTENT -->
					<div class="row post-slider">
						<?php $post_type = 'project'; include(locate_template('template-parts/content-posts.php')); ?>
					</div>

				</div>
			</div>

		<?php endif; ?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>