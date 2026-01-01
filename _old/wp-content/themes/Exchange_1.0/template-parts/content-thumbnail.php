<?php 	
        $size                       = 'thumbnail';
        $sizemedium                 = 'medium';
        $post                       = get_post($post);
        $content                    = apply_filters( 'the_content', get_the_content() );
        $featured_img_url 	        = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size)[0];
        $featured_img_url_full 	    = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $sizemedium)[0];
?>

<div class="pad-xs-10 col-xs-12 col-sm col-md-12">

    <div class="item-content">
        
        <div    class="thumbnail <?php if (get_field('natural')): else : echo 'absolute-thumbnail'; endif; ?> <?php if(get_field('external_link')) : else : ?>ajax <?php endif; ?>relative" 
                <?php if(get_field('content_as_title')): else : ?>data-title="<?php the_title(); ?>"<?php endif ?>
                data-description="<?php echo esc_attr( get_post_field('post_content', $post) ); ?>"
                <?php if (get_field('vimeo')):      ?>data-vimeo="<?php the_field('vimeo'); ?>"<?php else : ?>
                    data-image="<?php echo $featured_img_url_full; ?>"
                <?php endif ?>
                <?php if (get_field('subtitle')):   ?>data-category="<?php  the_field('subtitle'); ?>"<?php endif ?>
                <?php if (get_field('instagram')):  ?>data-instagram="<?php the_field('instagram'); ?>"<?php endif ?>
                <?php if (get_field('twitter')):    ?>data-twitter="<?php   the_field('twitter'); ?>"<?php endif ?>
                <?php if (get_field('website')):    ?>data-website="<?php   the_field('website');  ?>"<?php endif ?>
                <?php if (get_field('interviewee_name')):    ?>data-interviewee="<?php   the_field('interviewee_name'); ?>"<?php endif ?>
                <?php if (get_field('interviewer_name')):    ?>data-interviewer="<?php   the_field('interviewer_name');  ?>"<?php endif ?>
                >

            <?php if (get_field('natural')): ?>
                <img src="<?php echo $featured_img_url; ?>" />
            <?php else : ?>
                <div class="absolute grow fullheight fullwidth pointer-events bg" style="background-image:url('<?php echo $featured_img_url; ?>');"></div> 
            <?php  endif; ?>
            <?php if(get_field('external_link')) :?>
                <a href="<?php the_permalink(); ?>" class="absolute fullheight fullwidth"></a>
            <?php endif; ?>
            <?php if(get_field('offsite_link')) :?>
                <a href="<?php the_field('offsite_link'); ?>" target="_blank" class="absolute fullheight fullwidth"></a>
            <?php endif; ?>
        </div>
        <?php if(get_field('content_as_title')):?>
            <div class="fs-14"><?php echo get_post_field('post_content', $post); ?></div>
        <?php else : ?>
            <h4 class="fs-16"><b><?php the_title(); ?></b></h4>
            <p class="fs-14"><?php the_field('subtitle'); ?></p>
        <?php endif; ?>

    </div>
</div>

<?php wp_reset_postdata(); ?>

