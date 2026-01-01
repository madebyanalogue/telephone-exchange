<?php
/**
 * @package WordPress
 * @subpackage Exchange_1.0
 * @since Exchange 1.0
 */
?>

		<footer class="footer row relative white-text fs-16 dark texture">

			<!-- <div class="row pad-xs-10 pad-top-bottom" style="border-bottom:1px solid rgba(255,255,255,0.2);">
				<div class="wrapper fullwidth">
					<div class="row middle-xs">
						<?php if(get_field('feature_message', 'options')): ?>
							<div class="col-xs col-sm-8 col-md-9 col-lg pad-xs-10 underlinelinks feature_message">
								<div class="row top-xs"><div><span class="pulse green"></span></div><div class="col-xs"><?php the_field('feature_message', 'options'); ?></div></div>
							</div>
						<?php endif; ?>
						<div class="col-xs-12 col-sm-unset col-lg-2 pad-xs-10 show-sm">
							<div class="row" id="social">
								<?php if( get_field('instagram', 	'options')): 	?><div class="col"><a href="<?php the_field('instagram', 	'options'); ?>"     class="social-icon" target="_blank"  	><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38"><path d="M19,5c-3.8,0-4.28,0-5.77.08a10.5,10.5,0,0,0-3.4.65,7.21,7.21,0,0,0-4.1,4.1,10.5,10.5,0,0,0-.65,3.4C5,14.72,5,15.2,5,19s0,4.28.08,5.77a10.5,10.5,0,0,0,.65,3.4,7.21,7.21,0,0,0,4.1,4.1,10.5,10.5,0,0,0,3.4.65c1.49.07,2,.08,5.77.08s4.28,0,5.77-.08a10.21,10.21,0,0,0,3.4-.66,7.11,7.11,0,0,0,4.09-4.09,10.21,10.21,0,0,0,.66-3.4C33,23.28,33,22.8,33,19s0-4.28-.08-5.77a10.21,10.21,0,0,0-.66-3.4,6.75,6.75,0,0,0-1.61-2.48,6.91,6.91,0,0,0-2.48-1.62,10.5,10.5,0,0,0-3.4-.65C23.28,5,22.8,5,19,5Zm0,2.52c3.74,0,4.18,0,5.66.08a7.75,7.75,0,0,1,2.6.49,4.56,4.56,0,0,1,2.65,2.65,7.75,7.75,0,0,1,.49,2.6c.06,1.48.08,1.92.08,5.66s0,4.18-.09,5.66a8,8,0,0,1-.49,2.6,4.45,4.45,0,0,1-1,1.61,4.3,4.3,0,0,1-1.61,1,7.71,7.71,0,0,1-2.61.49c-1.48.06-1.92.08-5.67.08s-4.18,0-5.66-.09a8,8,0,0,1-2.61-.49,4.29,4.29,0,0,1-1.61-1A4.2,4.2,0,0,1,8,27.24a8,8,0,0,1-.49-2.61c0-1.47-.07-1.92-.07-5.65s0-4.18.07-5.67A8,8,0,0,1,8,10.71,4.17,4.17,0,0,1,9.08,9.09a4.15,4.15,0,0,1,1.61-1,7.56,7.56,0,0,1,2.59-.49c1.49-.06,1.92-.07,5.67-.07Zm0,4.29A7.19,7.19,0,1,0,26.19,19,7.19,7.19,0,0,0,19,11.81Zm0,11.86A4.67,4.67,0,1,1,23.67,19,4.67,4.67,0,0,1,19,23.67Zm9.15-12.14a1.68,1.68,0,1,1-1.68-1.68A1.68,1.68,0,0,1,28.15,11.53Z"/></svg></a></div><?php endif; ?>
								<?php if( get_field('twitter', 		'options')): 	?><div class="col"><a href="<?php the_field('twitter', 		'options'); ?>"     class="social-icon" target="_blank"   	><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38"><path d="M33.31,9.88a11.76,11.76,0,0,1-3.3.9A5.79,5.79,0,0,0,32.53,7.6,11.53,11.53,0,0,1,28.88,9a5.75,5.75,0,0,0-9.79,5.23,16.24,16.24,0,0,1-11.83-6A5.75,5.75,0,0,0,9,15.9a5.62,5.62,0,0,1-2.6-.72A5.75,5.75,0,0,0,11,20.89a5.8,5.8,0,0,1-2.6.1,5.77,5.77,0,0,0,5.37,4,11.55,11.55,0,0,1-8.5,2.38A16.34,16.34,0,0,0,30.44,12.85,11.74,11.74,0,0,0,33.31,9.88Z"/></svg></a></div><?php endif; ?>
								<?php if( get_field('facebook', 	'options')): 	?><div class="col"><a href="<?php the_field('facebook', 	'options'); ?>"     class="social-icon" target="_blank"  	><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38"><path d="M33,18.77A14,14,0,1,0,16.81,32.6V22.81H13.26v-4h3.55V15.68c0-3.51,2.09-5.44,5.29-5.44a21.74,21.74,0,0,1,3.13.27V14H23.47a2,2,0,0,0-2.28,2.19v2.63h3.88l-.62,4H21.19V32.6A14,14,0,0,0,33,18.77Z" /></svg></a></div><?php endif; ?>
								<?php if( get_field('linkedin', 	'options')): 	?><div class="col"><a href="<?php the_field('linkedin', 	'options'); ?>"     class="social-icon" target="_blank"    	><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28"><path d="M27.61,28V18.05c0-4.89-1.05-8.65-6.77-8.65a5.91,5.91,0,0,0-5.33,2.93h-.08V9.85H10V28h5.64V19c0-2.37.44-4.66,3.38-4.66S22,17.07,22,19.17V28ZM6.48,9.85H.84V28H6.48ZM3.66.83A3.27,3.27,0,1,0,6.93,4.1,3.26,3.26,0,0,0,3.66.83Z"/></svg></a></div><?php endif; ?>
								<?php if( get_field('youtube', 		'options')): 	?><div class="col"><a href="<?php the_field('youtube', 		'options'); ?>"    	class="social-icon" target="_blank"     ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><path d="M7.13,11.21H17.87q4.32,0,4.32,4.44v3.64q0,4.18-4.78,4.19h-10c-3,0-4.55-1.6-4.55-4.79V15.9Q2.81,11.2,7.13,11.21ZM5,13.31V14c.11.23.23.35.34.35h.94v6.31c0,.39.11.62.34.69h.71a.2.2,0,0,0,.23-.23V14.37H8.64c.23-.07.35-.3.35-.69v-.25c-.12-.23-.23-.35-.35-.35H5.26C5.13,13.08,5.05,13.16,5,13.31ZM7.93,1.52a18.61,18.61,0,0,1,.71,3H9a18.14,18.14,0,0,1,.71-3h1.16l-1.39,5V9.7H8.18V6.9A52.82,52.82,0,0,0,6.77,1.52Zm.94,14V20.8a1,1,0,0,0,.94.69A6.23,6.23,0,0,0,11,20.8c0,.38.14.57.34.57h.6a.2.2,0,0,0,.23-.23V15.53c-.12-.23-.23-.34-.35-.34h-.48c-.23.11-.34.23-.34.34v4.33c0,.17-.23.32-.58.46s-.36-.08-.36-.23V15.53c0-.17-.23-.29-.69-.34H9.24C9,15.3,8.87,15.42,8.87,15.53ZM12,3.51H13a1.63,1.63,0,0,1,1.17,1.63V8.3c0,1-.55,1.5-1.63,1.63s-1.65-.71-1.65-2.11V5.48L11,4.91c-.08,0-.12,0-.12-.11C10.86,4.32,11.25,3.9,12,3.51Zm0,1.4v3.5l.35.46c.47,0,.7-.27.7-.8V5.6c0-.59-.15-.94-.46-1h-.24C12.15,4.67,12,4.8,12,4.91Zm1.17,8.4V21c.13.23.24.34.34.34H14l.46-.34a2.2,2.2,0,0,0,1,.46c.55,0,.87-.43.94-1.29V16.82c0-1.09-.35-1.63-1-1.63h-.35l-.59.46h-.11V13.43c-.12-.23-.23-.35-.35-.35h-.59C13.3,13.08,13.22,13.16,13.2,13.31Zm1.4,2.93h.59l.11.58V20.2c0,.17-.07.25-.23.25h-.36c-.23-.12-.34-.25-.34-.36V16.47C14.37,16.34,14.44,16.27,14.6,16.24Zm1.64-12.5V8.41a.2.2,0,0,0,.23.23h.35c.11,0,.27-.19.47-.57V7.93l-.11-.22c.08,0,.11,0,.11-.12v-3L17.18,4c.08,0,.11-.07.11-.23h1.06V9.47c0,.15-.09.23-.25.23h-.81c0-.31-.07-.46-.22-.46a3.58,3.58,0,0,1-.6.46h-.94c-.23-.13-.34-.25-.34-.35V3.74Zm1.05,13.67.12.69-.12.82c0,1.71.47,2.57,1.4,2.57h.6c.75,0,1.21-.58,1.39-1.75v-.22c-.13-.25-.25-.37-.36-.37h-.69c-.11.87-.27,1.3-.48,1.3l-.57-.13v-.23a9,9,0,0,0-.12-1.28.89.89,0,0,0,.12-.35h1.74q.36-.2.36-.36V16.82c-.15-1.16-.66-1.75-1.53-1.75Q17.29,15.07,17.29,17.41Zm1.52-1.17h.34c.24.07.37.3.37.69v.36l-.12.23a.79.79,0,0,1-.36-.11,1,1,0,0,0-.35.11.1.1,0,0,0-.11-.11C18.58,16.63,18.65,16.24,18.81,16.24Z"/></svg></a></div><?php endif; ?>
								<?php if( get_field('vimeo', 		'options')): 	?><div class="col"><a href="<?php the_field('vimeo', 		'options'); ?>"    	class="social-icon" target="_blank"     ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38"><path d="M30.19,16.56c-2.7,5.76-9.2,13.6-13.31,13.6S12.24,21.52,10,15.76C8.94,12.93,8.23,13.58,6.19,15L5,13.41c3-2.62,6-5.66,7.78-5.83q3.11-.3,3.81,4.23c.63,4,1.5,10.12,3,10.12,1.19,0,4.13-4.88,4.28-6.63.27-2.56-1.88-2.63-3.74-1.84C23.06,3.8,35.33,5.58,30.19,16.56Z"/></svg></a></div><?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div> -->

			<!-- <div class="row pad-xs-10 pad-top-bottom hide-sm" style="border-bottom:1px solid rgba(255,255,255,0.2);">
				<div class="wrapper fullwidth">
					<div class="row middle-xs between-xs">
						<div class="col-xs-12 col-sm-unset pad-xs-10">
							<div class="row" id="social">
								<?php if( get_field('instagram', 	'options')): 	?><div class="col"><a href="<?php the_field('instagram', 	'options'); ?>"     class="social-icon" target="_blank"  	><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38"><path d="M19,5c-3.8,0-4.28,0-5.77.08a10.5,10.5,0,0,0-3.4.65,7.21,7.21,0,0,0-4.1,4.1,10.5,10.5,0,0,0-.65,3.4C5,14.72,5,15.2,5,19s0,4.28.08,5.77a10.5,10.5,0,0,0,.65,3.4,7.21,7.21,0,0,0,4.1,4.1,10.5,10.5,0,0,0,3.4.65c1.49.07,2,.08,5.77.08s4.28,0,5.77-.08a10.21,10.21,0,0,0,3.4-.66,7.11,7.11,0,0,0,4.09-4.09,10.21,10.21,0,0,0,.66-3.4C33,23.28,33,22.8,33,19s0-4.28-.08-5.77a10.21,10.21,0,0,0-.66-3.4,6.75,6.75,0,0,0-1.61-2.48,6.91,6.91,0,0,0-2.48-1.62,10.5,10.5,0,0,0-3.4-.65C23.28,5,22.8,5,19,5Zm0,2.52c3.74,0,4.18,0,5.66.08a7.75,7.75,0,0,1,2.6.49,4.56,4.56,0,0,1,2.65,2.65,7.75,7.75,0,0,1,.49,2.6c.06,1.48.08,1.92.08,5.66s0,4.18-.09,5.66a8,8,0,0,1-.49,2.6,4.45,4.45,0,0,1-1,1.61,4.3,4.3,0,0,1-1.61,1,7.71,7.71,0,0,1-2.61.49c-1.48.06-1.92.08-5.67.08s-4.18,0-5.66-.09a8,8,0,0,1-2.61-.49,4.29,4.29,0,0,1-1.61-1A4.2,4.2,0,0,1,8,27.24a8,8,0,0,1-.49-2.61c0-1.47-.07-1.92-.07-5.65s0-4.18.07-5.67A8,8,0,0,1,8,10.71,4.17,4.17,0,0,1,9.08,9.09a4.15,4.15,0,0,1,1.61-1,7.56,7.56,0,0,1,2.59-.49c1.49-.06,1.92-.07,5.67-.07Zm0,4.29A7.19,7.19,0,1,0,26.19,19,7.19,7.19,0,0,0,19,11.81Zm0,11.86A4.67,4.67,0,1,1,23.67,19,4.67,4.67,0,0,1,19,23.67Zm9.15-12.14a1.68,1.68,0,1,1-1.68-1.68A1.68,1.68,0,0,1,28.15,11.53Z"/></svg></a></div><?php endif; ?>
								<?php if( get_field('twitter', 		'options')): 	?><div class="col"><a href="<?php the_field('twitter', 		'options'); ?>"     class="social-icon" target="_blank"   	><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38"><path d="M33.31,9.88a11.76,11.76,0,0,1-3.3.9A5.79,5.79,0,0,0,32.53,7.6,11.53,11.53,0,0,1,28.88,9a5.75,5.75,0,0,0-9.79,5.23,16.24,16.24,0,0,1-11.83-6A5.75,5.75,0,0,0,9,15.9a5.62,5.62,0,0,1-2.6-.72A5.75,5.75,0,0,0,11,20.89a5.8,5.8,0,0,1-2.6.1,5.77,5.77,0,0,0,5.37,4,11.55,11.55,0,0,1-8.5,2.38A16.34,16.34,0,0,0,30.44,12.85,11.74,11.74,0,0,0,33.31,9.88Z"/></svg></a></div><?php endif; ?>
								<?php if( get_field('facebook', 	'options')): 	?><div class="col"><a href="<?php the_field('facebook', 	'options'); ?>"     class="social-icon" target="_blank"  	><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38"><path d="M33,18.77A14,14,0,1,0,16.81,32.6V22.81H13.26v-4h3.55V15.68c0-3.51,2.09-5.44,5.29-5.44a21.74,21.74,0,0,1,3.13.27V14H23.47a2,2,0,0,0-2.28,2.19v2.63h3.88l-.62,4H21.19V32.6A14,14,0,0,0,33,18.77Z" /></svg></a></div><?php endif; ?>
								<?php if( get_field('linkedin', 	'options')): 	?><div class="col"><a href="<?php the_field('linkedin', 	'options'); ?>"     class="social-icon" target="_blank"    	><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28"><path d="M27.61,28V18.05c0-4.89-1.05-8.65-6.77-8.65a5.91,5.91,0,0,0-5.33,2.93h-.08V9.85H10V28h5.64V19c0-2.37.44-4.66,3.38-4.66S22,17.07,22,19.17V28ZM6.48,9.85H.84V28H6.48ZM3.66.83A3.27,3.27,0,1,0,6.93,4.1,3.26,3.26,0,0,0,3.66.83Z"/></svg></a></div><?php endif; ?>
								<?php if( get_field('youtube', 		'options')): 	?><div class="col"><a href="<?php the_field('youtube', 		'options'); ?>"    	class="social-icon" target="_blank"     ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><path d="M7.13,11.21H17.87q4.32,0,4.32,4.44v3.64q0,4.18-4.78,4.19h-10c-3,0-4.55-1.6-4.55-4.79V15.9Q2.81,11.2,7.13,11.21ZM5,13.31V14c.11.23.23.35.34.35h.94v6.31c0,.39.11.62.34.69h.71a.2.2,0,0,0,.23-.23V14.37H8.64c.23-.07.35-.3.35-.69v-.25c-.12-.23-.23-.35-.35-.35H5.26C5.13,13.08,5.05,13.16,5,13.31ZM7.93,1.52a18.61,18.61,0,0,1,.71,3H9a18.14,18.14,0,0,1,.71-3h1.16l-1.39,5V9.7H8.18V6.9A52.82,52.82,0,0,0,6.77,1.52Zm.94,14V20.8a1,1,0,0,0,.94.69A6.23,6.23,0,0,0,11,20.8c0,.38.14.57.34.57h.6a.2.2,0,0,0,.23-.23V15.53c-.12-.23-.23-.34-.35-.34h-.48c-.23.11-.34.23-.34.34v4.33c0,.17-.23.32-.58.46s-.36-.08-.36-.23V15.53c0-.17-.23-.29-.69-.34H9.24C9,15.3,8.87,15.42,8.87,15.53ZM12,3.51H13a1.63,1.63,0,0,1,1.17,1.63V8.3c0,1-.55,1.5-1.63,1.63s-1.65-.71-1.65-2.11V5.48L11,4.91c-.08,0-.12,0-.12-.11C10.86,4.32,11.25,3.9,12,3.51Zm0,1.4v3.5l.35.46c.47,0,.7-.27.7-.8V5.6c0-.59-.15-.94-.46-1h-.24C12.15,4.67,12,4.8,12,4.91Zm1.17,8.4V21c.13.23.24.34.34.34H14l.46-.34a2.2,2.2,0,0,0,1,.46c.55,0,.87-.43.94-1.29V16.82c0-1.09-.35-1.63-1-1.63h-.35l-.59.46h-.11V13.43c-.12-.23-.23-.35-.35-.35h-.59C13.3,13.08,13.22,13.16,13.2,13.31Zm1.4,2.93h.59l.11.58V20.2c0,.17-.07.25-.23.25h-.36c-.23-.12-.34-.25-.34-.36V16.47C14.37,16.34,14.44,16.27,14.6,16.24Zm1.64-12.5V8.41a.2.2,0,0,0,.23.23h.35c.11,0,.27-.19.47-.57V7.93l-.11-.22c.08,0,.11,0,.11-.12v-3L17.18,4c.08,0,.11-.07.11-.23h1.06V9.47c0,.15-.09.23-.25.23h-.81c0-.31-.07-.46-.22-.46a3.58,3.58,0,0,1-.6.46h-.94c-.23-.13-.34-.25-.34-.35V3.74Zm1.05,13.67.12.69-.12.82c0,1.71.47,2.57,1.4,2.57h.6c.75,0,1.21-.58,1.39-1.75v-.22c-.13-.25-.25-.37-.36-.37h-.69c-.11.87-.27,1.3-.48,1.3l-.57-.13v-.23a9,9,0,0,0-.12-1.28.89.89,0,0,0,.12-.35h1.74q.36-.2.36-.36V16.82c-.15-1.16-.66-1.75-1.53-1.75Q17.29,15.07,17.29,17.41Zm1.52-1.17h.34c.24.07.37.3.37.69v.36l-.12.23a.79.79,0,0,1-.36-.11,1,1,0,0,0-.35.11.1.1,0,0,0-.11-.11C18.58,16.63,18.65,16.24,18.81,16.24Z"/></svg></a></div><?php endif; ?>
								<?php if( get_field('vimeo', 		'options')): 	?><div class="col"><a href="<?php the_field('vimeo', 		'options'); ?>"    	class="social-icon" target="_blank"     ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38"><path d="M30.19,16.56c-2.7,5.76-9.2,13.6-13.31,13.6S12.24,21.52,10,15.76C8.94,12.93,8.23,13.58,6.19,15L5,13.41c3-2.62,6-5.66,7.78-5.83q3.11-.3,3.81,4.23c.63,4,1.5,10.12,3,10.12,1.19,0,4.13-4.88,4.28-6.63.27-2.56-1.88-2.63-3.74-1.84C23.06,3.8,35.33,5.58,30.19,16.56Z"/></svg></a></div><?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div> -->

			<div class="row pad-xs-30 pad-top-bottom">
				<div class="wrapper fullwidth white-text">
					
					<div class="row">
						<div class="col-xs-12 col-md-4 first-md pad-xs-10">
							<div class="">
								<div class="sp-20"></div>
								<h4 class="fs-18" >Partners & Sponsors</h4>
							</div>
						</div>
						<div class="col-xs pad-xs-10">

							<div class="row middle-xs">
								<?php if( have_rows('sponsor_logos', 'options') ): while ( have_rows('sponsor_logos', 'options') ) : the_row(); ?>
									<div class="pad-xs-15 pad-md-25 pad-right">
										<?php if(get_sub_field('link')): ?><a href="<?php the_sub_field('link'); ?>" target="_blank" ><?php endif; ?>
											<?php if(get_sub_field('svg_image')): ?>
												<img src="<?php the_sub_field('svg_image'); ?>" style="width:100%;max-width:<?php the_sub_field('max_width'); ?>px;" />
											<?php endif; ?>
										<?php if(get_sub_field('link')): ?></a><?php endif; ?>
										<div class="sp-20"></div>
									</div>
								<?php endwhile; endif; ?>
							</div>

						</div>

						<!-- SUBSCRIBE -->
						<!-- <div class="col-xs-12 col-sm-6 col-md-3 pad-xs-10">
							<p><?php the_field('signup_text', 'option'); ?></p>
							<div class="sp-15"></div>
							<div>
								<form action="https://invisibledust.us15.list-manage.com/subscribe/post-json?u=cb6cc1cb3a9841ce3a08db664&amp;id=25b82ea042" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
									<div id="mc_embed_signup_scroll">
										<div class="mc-field-group relative row">
											<input type="email" value="" name="EMAIL" class="required email" placeholder="<?php the_field('email_placeholder', 'option'); ?>" id="mce-EMAIL">
										<div class="clear"><input type="submit" value="Sign up" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
										</div>
										<div id="mce-responses" class="clear">
											<div class="response" id="mce-error-response" style="display:none"></div>
											<div class="response" id="mce-success-response" style="display:none"></div>
										</div>
										<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_cb6cc1cb3a9841ce3a08db664_4908725777" tabindex="-1" value=""></div>
									</div>
								</form>
								<div id="subscribe-result-form"></div>
							</div>
							<div class="sp-20"></div>
						</div> -->

						<!-- MENU -->
						<!-- <div class="col-xs-12 col-sm-4 col-sm-offset-2 col-md-offset-1 col-md-2 pad-xs-10">
							<div class="row">
								<?php if(get_field('address', 'option')) : ?>
									<div class="col-xs-12 col-sm pad-xs-10">
										<?php the_field('address', 'option'); ?>
									</div>
								<?php endif; ?>
								<div class="col-xs-12 col-sm">
									<nav>
										<?php wp_nav_menu( array('theme_location' => 'secondary'));?>
									</nav>
								</div>
								<div class="sp-20"></div>
							</div>
						</div> -->

						

					</div>
					<div class="row bottom-xs border-top">
						<!-- LEGAL -->
						<?php if(get_field('legal', 'option') || get_field('copyright', 'option')) : ?>
							<div class="col-xs-12 fs-14">
								<div class="sp-30"></div>
								<div class="row">
									<div class="col-xs-12">
										<div class="row fullheight bottom-xs text-left">
											<div class="col-xs-12 pad-xs-10 pad-left-right fs-12">
												<p>
													<?php if(get_field('legal', 'option')) : ?><?php the_field('legal', 'option'); ?><?php endif; ?>
													<?php if(get_field('copyright', 'option')) : ?>&copy;<?php echo date('Y'); ?> <?php the_field('copyright', 'option'); ?><?php endif; ?>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</footer>

		<!--END SCENE ELEMENT-->
		</div>

	<!--END MAIN-->
	</div>

	<!--DRAW-->
	<div class="fulloverlay"></div>
	<div class="draw cream interview">
		<div class="viewer">
			<a class="close closethedraw hide-md">×</a>
			<div class="visual">
				
				<div class="image"></div>
			</div>
			<div class="info pad-xs-30 pad-sm-40 rte interview-content"></div>
		</div>
		<a class="overlayfade"></a>
	</div>

	<!--COOKIE BANNER-->
	<div id="cookie-banner" class="cookie-notice green">
      <div class="row pad-xs-20 pad-md-10 middle-md">
		<div class="col-xs pad-xs-10">
			<div class="row">
				<div class="col-xs-12 col-md-unset pad-md-25 pad-left-right">
					<p class="nomarginbottom"><b><?php the_field('cookies_title', 'option'); ?></b></p>
				</div>
				<div class="col-xs">
					<p class="nomarginbottom"><?php the_field('cookies_content', 'option'); ?></p>
				</div>
			</div>
		</div>
		<div class="pad-xs-10 pad-top-bottom last-sm">
        	<button class="close cookie-notice__accept close-notice"><svg width="18" height="17" xmlns="http://www.w3.org/2000/svg"><g stroke="#000" stroke-width="1" fill="none" fill-rule="evenodd"><path d="M2 1l15 15M2 16L17 1"/></g></svg></button>
		</div>
		<div class="pad-xs-10 col-xs-12 col-sm-unset">
			<div class="row pad-md-30 pad-left">
				<a class="button button--hyperion close-notice col-xs-12 col-sm-unset"><span><span><?php the_field('cookies_button_text', 'option'); ?></span></span></a>
			</div>
		</div>
      </div>
	</div>

	<?php wp_footer(); ?>

</body>
<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/_/js/jquery.smoothState.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/_/js/js.cookie.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/_/js/modernizr-2.8.3.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/_/js/fastclick.js"></script>
<!--<script src="https://player.vimeo.com/api/player.js"></script>-->
<script src="<?php echo get_template_directory_uri(); ?>/_/js/main.js"></script>

<script>
(function() {
	var d = document.documentElement;
	var idCookie = Cookies.get('ID_cookie');
	var idSubscriptionCookie = Cookies.get('ID_subscription_cookie');
	
	if (typeof idCookie === 'undefined') {
		d.classList.add('show-cookie-banner');
	}
}());
</script>

<?php the_field('widgets', 'options'); ?>

</html>
