<?php if( have_rows('section_builder') ): while ( have_rows('section_builder') ) : the_row(); ?>

	<?php  	$title 						= get_sub_field('title'); 
			$background 				= get_sub_field('custom_background_image');
			$posts_to_display			= get_sub_field('posts_to_display');
			$num_posts					= get_sub_field('number_of_posts_to_display');
			$select_posts    			= get_sub_field('select_posts');
			$background_colour 			= get_sub_field('background_colour');
			$custom_logo				= get_sub_field('custom_logo');
			$custom_background_colour 	= get_sub_field('custom_background_colour');
			$size               		= 'large';
			$background_url 			= wp_get_attachment_image_src($background, $size)[0];
	?>
	
	<section id="<?php if($title): echo sanitize_title_with_dashes($title); endif; ?>" style="<?php if($background): echo 'background: transparent url(' . $background_url . ') no-repeat center center;background-size:cover;'; endif; ?><?php if($background_colour == 'custom') : echo 'background-color:'. $custom_background_colour . ';'; endif; ?>" class="texture <?php echo $background_colour; ?> <?php if($background_colour == 'dark') : echo 'white-text'; endif; ?> <?php if(get_sub_field('border_bottom')): echo 'border-bottom'; endif; ?> <?php if(get_sub_field('border_top')): echo 'border-top'; endif; ?> " >
		
		<?php if(get_sub_field('backdrop')): echo '<div class="backdrop ' . $background_colour . '"></div>'; endif; ?>
		
		<?php     if( get_row_layout() == 'none' ): ?>

		<?php elseif( get_row_layout() == 'parallax_image' ): ?>

			<div class="relative overflow">
				<div class="absolute fullheight fullwidth bg blue background-fixed" style="background-image:url('<?php the_sub_field('image'); ?>');background-blend-mode:<?php the_sub_field('blend_mode');?>"></div>
				<div class="row pad-xs-40 pad-sm-80 pad-md-100 pad-top-bottom">
					<div class="wrapper">
						<div class="row">
							<div class="col-xs-12 pad-xs-10">
								<div class="">
									<h2 class="fs-32 fs-48-sm fs-56-md <?php the_sub_field('text_colour'); ?>"><?php if(get_sub_field('title')): echo get_sub_field('title'); else : echo '<br/>'; endif; ?></h2>
									<div class="sp-10 show-md"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php elseif( get_row_layout() == 'text' ): ?>

			<div class="row pad-xs-30 pad-sm-50 pad-md-70 pad-top-bottom">
				<div class="wrapper">

					<!-- SECTION HEADER -->
					<div class="col-xs-12">
						<div class="row bottom-xs top-md">
							<?php if(get_sub_field('show_title')): ?>
								<div class="col-xs col-md-12 pad-xs-10">
									<h4 class="fs-18"><b><?php echo $title; ?></b></h4>
								</div>
							<?php endif; ?>
							<?php if(get_sub_field('headline_description')) : ?>
								<div class="col-xs-12 col-md<?php if(get_sub_field('headline_description') && get_sub_field('description')): else : echo '-820'; endif; ?> pad-xs-10" >
									<div class="pad-md-40 pad-right"><h4 class="fs-24 fs-36-sm <?php the_sub_field('text_font'); ?>"><?php the_sub_field('headline_description'); ?></h4></div>
									<div class="sp-10"></div>
								</div>
							<?php endif; ?>
							<?php if(get_sub_field('description')) : ?>
								<div class="col-xs-12 col-md<?php if(get_sub_field('headline_description') && get_sub_field('description')): else : echo '-820'; endif; ?> pad-xs-10">
									<?php the_sub_field('description'); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<!-- FEATURE -->
					<?php     if(get_sub_field('feature') == 'image') : ?>

						<div class="col-xs-12">
							<div class="row">
							</div>
						</div>

					<?php elseif(get_sub_field('feature') == 'vimeo') : ?>
					
					<?php elseif(get_sub_field('feature') == 'gallery') : ?>

						<?php 	$images 		= get_sub_field('gallery');
								$images_count 	= count($images); ?>
						<div class="col-xs-12 pad-xs-40 pad-sm-50 pad-md-80 pad-top">
							<div class="row gallery-slider">
								<?php foreach( $images as $image ): ?>
									<div class="col-xs-6 col-sm-4 col-md-3 relative ratio-1-1">
										<div class="fullwidth absolute fullheight fullwidth">
											<?php 	$image_url 	= $image['url'];
													$mp4		= 'mp4';
													if (strpos($image_url, $mp4) !== false) : ?>

													<div class="carousel-cell fullwidth fullwidth">
														<video autoplay muted loop playsinline preload="auto" style="width:100%;height:100%;object-fit:cover;">
															<source src="<?php echo $image_url; ?>" type="video/mp4">
														</video>
													</div>
															
													<?php else : ?>
														<div class="carousel-cell fullwidth fullwidth" style="background:url('<?php echo $image['sizes']['thumbnail']; ?>') no-repeat center center;background-size:cover;"></div>
													<?php endif ?>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="sp-15"></div>
					
					<?php else : ?>
						<div class="sp-10"></div>
					<?php endif; ?>
				</div>
			</div>

			<?php if(get_sub_field('feature') == 'project' && get_sub_field('project')) : ?>

				<?php 	$artistID 				= get_sub_field('artist');
						$artistID_content 		= get_post($artistID);
						$artist_content 		= $artistID_content->post_content;
						$vimeo					= get_sub_field('vimeo');
						$vimeoID				= substr($vimeo, strrpos($vimeo, '/') + 1);

						$featurepost			= get_sub_field('project');
						$featured_img_url 		= wp_get_attachment_image_src(get_post_thumbnail_id($featurepost), $size)[0];
						$content            	= get_post_field('post_content', $featurepost);
						$content            	= preg_replace("/<img[^>]+\>/i", "", $content);
						$content            	= apply_filters('the_content', $content);
						$content            	= str_replace(']]>', ']]>', $content);
						$content            	= wp_strip_all_tags($content);
						$content            	= htmlentities($content, null, 'utf-8');
						$content            	= str_replace("&nbsp;", " ", $content);
						$content            	= html_entity_decode($content);
						$cut 					= '300';

						$custom_description		= get_sub_field('custom_description');

						if($custom_title):
							$feature_title = get_sub_field('custom_title');
						else:
							$feature_title = get_the_title($featurepost);
						endif;

						$artist_img_url 		= wp_get_attachment_image_src(get_post_thumbnail_id($artistID), $size)[0];

						//PROFESSIONS
						$professions = wp_get_object_terms( $artistID , 'profession' );

						if (!empty($professions) && ! is_wp_error($professions) ){
							foreach($professions as $profession) {
								$professionsArray[]     .= $profession->name;
								$professionsSlugArray[] .= $profession->slug;
							}
							$professionsListComma   = implode(', ', $professionsArray);
							$professionsList        = implode(' ', $professionsSlugArray);
						}

						// COUNTRIES
						$countries = wp_get_object_terms( $artistID , 'country' );

						if (!empty($countries) && ! is_wp_error($countries) ){
							foreach($countries as $countrie) {
								$countriesArray[] .= $countrie->name;
							}
							$countriesList = implode(', ', $countriesArray);
						}
						
				?>

						<div class="row relative">
							
							<div class="grey absolute fullwidth" style="bottom:0;top:unset;height:50%;"></div>

							<div class="wrapper">

								<div class="row bottom-xs">

									<div class="col-xs-12 col-md-9 pad-xs-10">
										<div class="pad-md-20 pad-right">
											<?php if(get_sub_field('replace_with_vimeo') && get_sub_field('vimeo')): ?>
												<div class='embed-container'><iframe src='https://player.vimeo.com/video/<?php echo $vimeoID; ?>' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
											<?php else : ?>
												<div class="thumbnail relative overflow grey">
													<?php if($featured_img_url) : ?><div class="absolute grow fullheight fullwidth pointer-events bg" style="background-image:url('<?php echo $featured_img_url; ?>');"></div><?php endif; ?>
													<a href="<?php the_permalink(); ?>" class="absolute fullheight fullwidth"></a>
												</div>
											<?php endif; ?>
										</div>
									</div>
										
									<div class="col-xs-12 col-sm pad-xs-10 show-md">
										<?php if(get_sub_field('artist')) : ?>
											<div class="featured-artist">
												<div 	class="thumbnail relative overflow grey ratio-5-35 ajax"
														data-title="<?php echo get_the_title($artistID); ?>" 
														data-description="<?php echo esc_attr(apply_filters('the_content',$artist_content)); ?>" 
														data-image="<?php echo $artist_img_url; ?>" 
														data-category="<?php print_r($professionsListComma); ?><?php if(!empty($countries)): ?>, <?php print_r($countriesList); ?><?php endif; ?>"
													>
													<?php if($artist_img_url) : ?><div class="absolute grow fullheight fullwidth pointer-events bg" style="background-image:url('<?php echo $artist_img_url; ?>');"></div><?php endif; ?>
												</div>
											</div>
										<?php endif; ?>
									</div>

								</div>
							</div>
						</div>
						<div class="row pad-xs-20 pad-sm-30 pad-md-40 pad-bottom grey">
							<div class="wrapper">

								<div class="row top-xs">

									<div class="col-xs-12 col-md-9 pad-xs-10">
										<div class="sp-5"></div>
										<h4 class="fs-24 fs-28-sm amerigo lineheight"><?php echo $feature_title; ?></h4>
										<div class="row top-xs">
											<div class="col-xs-12 col-md-9 pad-xs-20 pad-top-bottom">

												<?php if($custom_description): ?>
													<?php the_sub_field('description_custom'); ?>
												<?php else: ?>
													<p><?php echo mb_strimwidth($content, 0, $cut, '...');?></p>
												<?php endif; ?>
											</div>
										</div>
									</div>
									
									<div class="col-xs-12 col-sm pad-xs-10 show-md">

										<?php if(get_sub_field('artist')) : ?>
											<div class="thumbnail relative overflow grey ratio-5-35 hide-md">
												<?php if($artist_img_url) : ?><div class="absolute grow fullheight fullwidth pointer-events bg" style="background-image:url('<?php echo $artist_img_url; ?>');"></div><?php endif; ?>
												<a href="<?php the_permalink(); ?>" class="absolute fullheight fullwidth"></a>
											</div>
											<div class="sp-5"></div>
											<h4 class="fs-24 fs-28-sm amerigo lineheight"><?php echo get_the_title($artistID); ?></h4>
											<div class="sp-10"></div>
											<?php if(!empty($professions)): ?><p><?php print_r($professionsListComma); ?>&nbsp;</p><?php endif; ?>
										<?php endif; ?>

									</div>

								</div>

							</div>
						</div>

				<?php endif; ?>
		
		<?php elseif( get_row_layout() == 'awards' ): ?>

			<div class="row pad-xs-20 pad-sm-50 pad-md-80 pad-top overflow">
				<div class="wrapper">

					<!--TITLE-->
					<div class="col-xs-12">
						<div class="row top-xs awards <?php if(get_sub_field('show_title')): ?>with-title<?php endif; ?>">

							<?php if(get_sub_field('show_title')): ?>
								<div class="col-xs-12 col-sm-6 col-md-4 pad-xs-10 rte <?php if(get_sub_field('title')): else: 'show-md'; endif; ?>">
									<h2><?php echo $title; ?></h2>
									<div class="sp-20"></div>
								</div>
							<?php endif; ?>

							<?php if(have_rows('awards_repeater')): while (have_rows('awards_repeater')) : the_row(); ?>

								<div class="<?php if(get_sub_field('double_width')) : echo 'col-xs-12 col-md-8'; else : echo 'col-xs-6 col-md-4'; endif; ?> pad-xs-10 award award-<?php echo get_row_index(); ?>">
									<h2 class="red-text fs-28 fs-36-sm"><?php the_sub_field('date'); ?></h2>
									<div class="award_dot"></div>
									<div class="row">
										<div class="col-xs-12 col-sm-10 col-md-9">
											<p class="fs-16 fs-18-md richblue-text"><?php the_sub_field('description'); ?></p>
										</div>
									</div>
									<div class="sp-30"></div>
								</div>

							<?php endwhile; endif; ?>
			
						</div>
						<div class="sp-30"></div>
					</div>
				</div>
			</div>
		
		<?php elseif( get_row_layout() == 'hero' ): ?>

			<?php 	$link 			= get_sub_field('link'); 
					$link_button	= get_sub_field('link_button'); 
					$link_url 		= $link['url']; 
					$link_title 	= $link['title']; 
					$link_target 	= $link['target'] ? $link['target'] : '_self'; 
			?>
			<div class="row pad-xs-50 pad-sm-80 pad-md-10 pad-top-bottom">
				<div class="wrapper relative">
					<div class="ratio-16-9 show-md"></div>
					<div class="row absolute-md fullheight center-xs middle-xs">
						<div class="col-xs-12 col-sm-11 col-md-9 <?php if(get_sub_field('green_text')): echo 'green-text'; endif; ?>">
							<h4 class="<?php the_sub_field('text_size'); ?> <?php the_sub_field('text_font'); ?>" ><?php the_sub_field('text'); ?></h4>
							<?php if($link && $link_button): ?>
								<div class="sp-30"></div>
								<a class="button button--hyperion btn-medium" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><span><?php echo esc_attr( $link_title ); ?></span></span></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php if($link && !$link_button): ?>
					<a class="absolute fullheight fullwidth" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"></a>
				<?php endif; ?>
			</div>

		<?php elseif( get_row_layout() == 'cta' ): ?>

			<?php 	$link 			= get_sub_field('link'); 
					$link_button	= get_sub_field('link_button'); 
					$link_url 		= $link['url']; 
					$link_title 	= $link['title']; 
					$link_target 	= $link['target'] ? $link['target'] : '_self'; 
			?>
			<div class="row pad-xs-40 pad-sm-80 pad-md-80 pad-top-bottom">
				<div class="wrapper">
					<div class="row center-xs middle-xs">
						<div class="col-xs-11 col-sm-10 col-md-8">
							<h4 class="<?php the_sub_field('text_size'); ?> <?php the_sub_field('text_font'); ?>" ><?php the_sub_field('text'); ?></h4>
							<?php if($link && $link_button): ?>
								<div class="sp-40"></div>
								<a class="button button--hyperion btn-medium" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><span><?php echo esc_attr( $link_title ); ?></span></span></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php if($link && !$link_button): ?>
					<a class="absolute fullheight fullwidth" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"></a>
				<?php endif; ?>
			</div>

		<?php elseif( get_row_layout() == 'audio' ): ?>

			<?php if( have_rows('audio')): ?>
				<div class="relative overflow">
					<div class="absolute fullheight fullwidth bg richblue background-fixed" style="background-image:url('<?php the_sub_field('image'); ?>');background-blend-mode:<?php the_sub_field('blend_mode');?>"></div>
					<div class="row pad-xs-40 pad-sm-80 pad-md-100 pad-top-bottom">
						<div class="wrapper">
							<div class="row">
								<?php 	while ( have_rows('audio')) : the_row();
										$audio_image		= get_sub_field('audio_image');
										$size 				= 'full';
										$audio_image_url  	= wp_get_attachment_image_url($audio_image,$size);
								?>
									<div class="col-xs-12 col-sm-6 col-md-4 pad-xs-10">
										<div class="row">
											<div class="col-xs-12 pad-xs-10">
												<div class="bg audio _ratio-16-9" style="_background-image:url('<?php echo $audio_image_url; ?>');">
													<?php if(get_sub_field('audio_file')): ?>
														<audio controls class="fullwidth">
															<source src="<?php the_sub_field('audio_file'); ?>" type="audio/mpeg">
														</audio>
													<?php endif; ?>
												</div>
											</div>
											<?php if(get_sub_field('audio_title')): ?>
												<div class="col-xs-12 pad-xs-10 item-content white-text">
													<h4 class="fs-16"><b><?php the_sub_field('audio_title'); ?></b></h4>
													<?php if(get_sub_field('audio_subtitle')): ?><p class="fs-14"><?php the_sub_field('audio_subtitle'); ?></p><?php endif; ?>
												</div>
											<?php endif; ?>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>

		<?php elseif( get_row_layout() == 'gallery' ): ?>

			<?php 	$images 		= get_sub_field('gallery');
					$images_count 	= count($images); ?>
				<div class="relative fullwidth ratio-16-9">
					<div class="fullwidth absolute fullheight gallery-slider fadeslider">
						<?php foreach( $images as $image ): ?>
							<?php 	$image_url 	= $image['url'];
									$mp4		= 'mp4';
									$size		= 'full';
									if (strpos($image_url, $mp4) !== false) : ?>

									<div class="carousel-cell fullwidth fullwidth">
										<video autoplay muted loop playsinline preload="auto" style="width:100%;height:100%;object-fit:cover;">
											<source src="<?php echo $image_url; ?>" type="video/mp4">
										</video>
									</div>
											
									<?php else : ?>
										<div class="carousel-cell fullwidth fullwidth" style="background:url('<?php echo esc_url($image['url']); ?>') no-repeat center center;background-size:cover;"></div>
									<?php endif ?>
					<?php endforeach; ?>
				</div>
			</div>
		
		<?php elseif( get_row_layout() == 'wide_text' ): ?>

			<?php if( get_sub_field('linked_content')): $hascontent = true; endif; ?>

			<div class="row pad-xs-30 pad-sm-40 pad-md-80 pad-top-bottom <?php if(get_sub_field('interviewee_name') || get_sub_field('interviewee_name')): echo 'interview'; endif; ?>" data-interviewee="<?php the_sub_field('interviewee_name'); ?>" data-interviewer="<?php the_sub_field('interviewer_name'); ?>" >
				<div class="wrapper">
					<div class="row start-xs text-left">

						<!--CONTENT-->
						<div class="col-xs-12 col-md-8 col-lg-7 col-md-offset-1 pad-xs-10">

							<?php if(get_sub_field('section_title')): ?>
								<div class="rte <?php if(!$hascontent): echo 'hide-md'; endif; ?>">
									<h2 class="" ><?php the_sub_field('section_title'); ?></h2>
								</div>
							<?php endif; ?>

							<div class="rte interview-content">
								<?php the_sub_field('content'); ?>
							</div>

						</div>

						<!--LINKED CONTENT-->
						<div class="col-xs-12 col-md-3 col-lg-3 first-md">
							<div class="sticky-md">
								<div class="row">
									
									<?php if( have_rows('linked_content')): ?>
										<div class="col-xs-12 pad-xs-20 pad-top pad-md-0">
											<div class="row center-xs text-left">
												<?php while ( have_rows('linked_content')) : the_row(); ?>
													<?php $post = get_sub_field('item'); ?>
													<?php include(locate_template('template-parts/content-thumbnail.php')); ?>
												<?php endwhile; ?>
											</div>
										</div>
									<?php else : ?>
										<div class="col-xs-12 pad-xs-10 rte show-md">
											<h2 class="" ><?php the_sub_field('section_title'); ?></h2>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>

					</div>

					<?php if(get_sub_field('feature') == 'vimeo' && get_sub_field('vimeo')): ?>
						<div class="sp-60"></div>
						<div class="row">
							<div class="col-xs-12 pad-xs-10 pad-left-right">
								<div class="video relative" style="padding: 56.3% 0px 0px;"><iframe style="background:#000;position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" src="https://player.vimeo.com/video/<?php the_sub_field('vimeo'); ?>"></iframe></div>
							</div>
							<?php if(get_sub_field('vimeo_title')): ?>
								<div class="col-xs-12 pad-xs-10 item-content">
									<h4 class="fs-16"><b><?php the_sub_field('vimeo_title'); ?></b></h4>
            						<?php if(get_sub_field('vimeo_subtitle')): ?><p class="fs-14"><?php the_sub_field('vimeo_subtitle'); ?></p><?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

				</div>
			</div>

			<?php $hascontent = false; ?>

		<?php elseif( get_row_layout() == 'feature' ): ?>

			<?php 	$custom_subtitle 		= get_sub_field('custom_subtitle_switch');
					$custom_title 			= get_sub_field('custom_title_switch');
					$custom_description 	= get_sub_field('custom_description_switch');
					$custom_link 			= get_sub_field('custom_link_switch');

					$featurepost			= get_sub_field('feature_item');
					$featured_img_url 		= wp_get_attachment_image_src(get_post_thumbnail_id($featurepost), $size)[0];
					$content            	= get_post_field('post_content', $featurepost);
					$content            	= preg_replace("/<img[^>]+\>/i", "", $content);
					$content            	= apply_filters('the_content', $content);
					$content            	= str_replace(']]>', ']]>', $content);
					$content            	= wp_strip_all_tags($content);
					$content            	= htmlentities($content, null, 'utf-8');
					$content            	= str_replace("&nbsp;", " ", $content);
					$content            	= html_entity_decode($content);
					$single_postype 		= get_post_type($featurepost);

					if($custom_title):
						$feature_title = get_sub_field('custom_title');
					else:
						$feature_title = get_the_title($featurepost);
					endif;

					if($custom_link):
						$feature_post_link = get_sub_field('custom_link');
					else:
						$feature_post_link = get_permalink($featurepost);
					endif;

					if (strlen($feature_title) > 50) {
						$feature_title_size = 'fs-28 fs-38-sm';
						$cut = '200';
					} else {
						$feature_title_size = 'fs-38 fs-48-md';
						$cut = '300';
					}
			?>

			<div class="row pad-xs-20 pad-sm-30 pad-md-60 pad-top-bottom">
				<div class="wrapper">

					<div class="row middle-xs">

						<div class="col-xs-12 col-md-7 pad-xs-10 show-md">
							<div class="pad-md-60 pad-left">
								<div class="thumbnail grow-on-hover relative overflow grey">
									<?php if($featured_img_url) : ?><div class="absolute grow fullheight fullwidth pointer-events bg" style="background-image:url('<?php echo $featured_img_url; ?>');"></div><?php endif; ?>
									<a href="<?php echo get_permalink($featurepost); ?>" class="absolute fullheight fullwidth"></a>
								</div>
							</div>
						</div>

						<div class="col-xs-12 col-sm pad-xs-10 first-sm spaced-items fs-16">

							<?php if($custom_subtitle): ?>
								<h5 class="fs-16" style="margin-bottom:10px;"><?php the_sub_field('custom_subtitle'); ?></h5>
							<?php else: ?>
								<h5 class="fs-16 titlecase" style="margin-bottom:10px;">Featured <?php echo $single_postype; ?></h5>
							<?php endif; ?>

							<h4 class="<?php echo $feature_title_size; ?> <?php the_sub_field('text_font'); ?> lineheight"><?php echo $feature_title; ?></h4>
							
							<div class="thumbnail grow-on-hover relative overflow grey hide-md">
								<?php if($featured_img_url) : ?><div class="absolute fullheight grow fullwidth pointer-events bg" style="background-image:url('<?php echo $featured_img_url; ?>');"></div><?php endif; ?>
								<a href="<?php echo $feature_post_link; ?>" class="absolute fullheight fullwidth"></a>
							</div>

							<?php if($single_postype == 'post' || $single_postype == 'news'): ?>
								<h5 class="fs-16"><?php echo get_the_date('d.m.Y'); ?></h5>
							<?php endif; ?>

							<?php if($single_postype == 'event'): ?>
								<h5 class="fs-16 show-md"><?php echo get_field('event_date'); ?></h5>
							<?php endif; ?>
							
							<div class="pad-md-40 pad-right">
								<?php if($custom_description): ?>
									<?php the_sub_field('custom_description'); ?>
								<?php else: ?>
									<p><?php echo mb_strimwidth($content, 0, $cut, '...');?></p>
								<?php endif; ?>
							</div>
							
							<div class="pad-xs-10 pad-top-bottom">
								<div class="row middle-xs between-xs">
									<div><a class="button button--hyperion" href="<?php echo $feature_post_link; ?>"><span><span><?php the_sub_field('button_text'); ?></span></span></a></div>
								</div>
							</div>

						</div>

					</div>

				</div>
			</div>

		
			
		<?php elseif( get_row_layout() == 'image' ): ?>

			<?php 
					$image_1 = get_sub_field('image');
					$image_2 = get_sub_field('image_2');
			?>

			<?php if(get_sub_field('full_bleed_image')):?>
				<div class="row">
					<div class="relative">
						<img class="nomarginbottom" src="<?php echo wp_get_attachment_image_src($image_1, $size)[0]; ?>" />
						<?php if($image_1 && $image_2): ?>
							<div class="absolute fullheight fullwidth grid__item-img show-md" data-displacement="<?php echo get_template_directory_uri(); ?>/_/img/displacement/7.jpg" data-intensity="0.6" data-speedIn="1" data-speedOut="1" data-easing="Circ.easeOut">
								<img src="<?php echo wp_get_attachment_image_src($image_1, $size)[0]; ?>" />
								<img src="<?php echo wp_get_attachment_image_src($image_2, $size)[0]; ?>" />
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php else: ?>

				
				<?php if($image_1):	?>
					<div class="row pad-xs-40 pad-sm-80 pad-top-bottom">
						<div class="wrapper">
							<div class="row center-xs middle-xs end-md">
								<?php if(get_sub_field('content')):?>
									<div class="col-xs-12 col-md pad-xs-10">
										<div class="row center-xs start-md">
											<div class="col-xs-12 col-md-10 center-xs start-md rte">
												<?php the_sub_field('content'); ?>
											</div>
										</div>
									</div>
								<?php endif; ?>
								<div class="col-xs-12 col-md-9 col-lg-7 pad-xs-10">
									<div class="relative drop-shadow">
										<img class="nomarginbottom" src="<?php echo wp_get_attachment_image_src($image_1, $size)[0]; ?>" />
										<!-- <?php if($image_1 && $image_2): ?>
											<div class="absolute fullheight fullwidth grid__item-img" data-displacement="<?php echo get_template_directory_uri(); ?>/_/img/displacement/7.jpg" data-intensity="0.6" data-speedIn="1" data-speedOut="1" data-easing="Circ.easeOut">
												<img src="<?php echo wp_get_attachment_image_src($image_1, $size)[0]; ?>" />
												<img src="<?php echo wp_get_attachment_image_src($image_2, $size)[0]; ?>" />
											</div>
										<?php endif; ?> -->
									</div>
								</div>
								<?php if(get_sub_field('content')): else :?>
								<div class="col-xs-12 col-lg-1"></div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>

			<?php endif; ?>

		<?php elseif( get_row_layout() == 'vimeo' ): ?>

			<?php if(get_sub_field('vimeo')):	?>
				<div class="row">
					<div class="wrapper">
						<div class="row">
							<div class="col-xs-12 pad-xs-10 item-content">
								<div class="video relative" style="padding: 56.3% 0px 0px;"><iframe style="background:#000;position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" src="https://player.vimeo.com/video/<?php the_sub_field('vimeo'); ?>"></iframe></div>
								<?php if(get_sub_field('vimeo_title')): ?>
									<div class="sp-10"></div>
									<h4 class="fs-16"><b><?php the_sub_field('vimeo_title'); ?></b></h4>
									<?php if(get_sub_field('vimeo_subtitle')): ?><p class="fs-14"><?php the_sub_field('vimeo_subtitle'); ?></p><?php endif; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		
		<?php endif; ?>
	
	</section>

<?php endwhile; endif; ?>
<?php if(get_field('show_subnavigation')) : ?>
	<div class="sub-nav show-md white richblue-text">
		<div class="row wrapper fullheight middle-xs">
			<div class="col-xs pad-xs-10 pad-left-right show-sm">
				<div class="row end-xs">
					<nav class="marker">
						<ul>
							<?php if( have_rows('section_builder')): while ( have_rows('section_builder')) : the_row(); ?>
								<?php if(get_sub_field('title')): ?>
									<li><a href="#<?php $handle = get_sub_field('title'); if($handle): echo sanitize_title_with_dashes($handle); endif; ?>"><?php the_sub_field('title'); ?></a></li>
								<?php endif; ?>
							<?php endwhile; endif; ?>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<!--FURTHER READING-->
<div class="row border-top">
	<div class="wrapper">
		<div class="row pad-xs-20 pad-top-bottom schedule_accordion_head">
			<div class="col-xs-12">
				<div class="row middle-xs">
					<div class="col-xs pad-xs-10">
						<h4><b>Further Reading</b></h4>
					</div>
					<div class="pad-xs-10">
						<div class="plus"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row pad-xs-20 pad-bottom schedule_accordion_body" style="display:none">
			<div class="col-xs-12">
				<div class="row middle-xs">
					<div class="col-xs-12 col-md-4 pad-xs-10">
					</div>
					<div class="col-xs pad-md-10 pad-xs-10 ">
						<div class="row">
							<div class="col-xs">
								<a class="rollover-red" href="https://www.versobooks.com/books/3002-new-dark-age" target="_blank">
									<h3 class="fs-18 fs-20-sm"><b>New Dark Age</b></h3>
								</a>
								<div class="sp-5"></div>
								<p class="fs-16">James Bridle</p>
								<div class="sp-10"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs">
								<a class="rollover-red" href="https://www.bbc.co.uk/news/science-environment-48257315" target="_blank">
									<h3 class="fs-18 fs-20-sm"><b>BBC - Wood Wide Web</b></h3>
								</a>
								<div class="sp-5"></div>
								<p class="fs-16">Trees' social networks are mapped</p>
								<div class="sp-10"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--ACTIVITIES-->
<div class="row border-top">
	<div class="wrapper">
		<div class="row pad-xs-20 pad-top-bottom schedule_accordion_head">
			<div class="col-xs-12">
				<div class="row middle-xs">
					<div class="col-xs pad-xs-10">
						<h4><b>Activities</b></h4>
					</div>
					<div class="pad-xs-10">
						<div class="plus"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row pad-xs-20 pad-bottom schedule_accordion_body" style="display:none">
			<div class="col-xs-12">
				<div class="row middle-xs">
					<div class="col-xs-12 col-md-4 pad-xs-10">
					</div>
					<div class="col-xs pad-md-10 pad-xs-10 ">
						<div class="row">
							<div class="col-xs">
								<a class="rollover-red" href="https://www.count-us-in.org/en-gb/" target="_blank">
									<h3 class="fs-18 fs-20-sm"><b>Count Us In</b></h3>
								</a>
								<div class="sp-5"></div>
								<p class="fs-16">Practical action on climate change</p>
								<div class="sp-10"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs">
								<a class="rollover-red" href="https://www.bbc.co.uk/news/science-environment-58171814" target="_blank">
									<h3 class="fs-18 fs-20-sm"><b>BBC Carbon Footprint Guide</b></h3>
								</a>
								<div class="sp-5"></div>
								<p class="fs-16">Four things you can do about your carbon footprint</p>
								<div class="sp-10"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs">
								<a class="rollover-red" href="https://ecologi.com/plan" target="_blank">
									<h3 class="fs-18 fs-20-sm"><b>Ecologi</b></h3>
								</a>
								<div class="sp-5"></div>
								<p class="fs-16">Tree planting</p>
								<div class="sp-10"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs">
								<a class="rollover-red" href="https://info.ecosia.org/what" target="_blank">
									<h3 class="fs-18 fs-20-sm"><b>Ecosia</b></h3>
								</a>
								<div class="sp-5"></div>
								<p class="fs-16">Plant trees just by searching the web</p>
								<div class="sp-10"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs">
								<a class="rollover-red" href="https://juliesbicycle.com" target="_blank">
									<h3 class="fs-18 fs-20-sm"><b>Julie’s Bicycle</b></h3>
								</a>
								<div class="sp-5"></div>
								<p class="fs-16">Creative Climate Action</p>
								<div class="sp-10"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs">
								<a class="rollover-red" href="https://www.bbc.co.uk/news/av/stories-60261186" target="_blank">
									<h3 class="fs-18 fs-20-sm"><b>Go Viral</b></h3>
								</a>
								<div class="sp-5"></div>
								<p class="fs-16">Learn about Fake News & Misinformation</p>
								<div class="sp-10"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--SHARE
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
</div>-->