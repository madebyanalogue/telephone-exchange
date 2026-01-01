<!--TITLE-->
<div class="col-xs-12">
    <div class="row bottom-xs top-md">
        <?php if($custom_logo): ?>
            <div class="col-xs col-md-12 pad-xs-10">
                <div class="pad-xs-10 pad-top-bottom"><img src="<?php echo $custom_logo; ?>" style="max-width:240px;" /></div>
            </div>
        <?php endif; ?>
        <?php if($title && !$custom_logo) : ?>
            <div class="col-xs pad-xs-10">
                <h4 class="fs-18 <?php if(get_sub_field('large_title')): ?>fs-24-sm<?php endif; ?>"><b><?php echo $title; ?></b></h4>
                <div class="sp-10"></div>
            </div>
        <?php endif; ?>
        <?php if(get_sub_field('link_to_all_items')) : ?>
            <div class="col-xs pad-xs-10 last-md">
                <div class="row end-xs">
                    <a class="arrow-link" href="<?php the_sub_field('link_to_all_items'); ?>"><span><?php the_sub_field('link_title'); ?></span></a>
                    <div class="sp-10"></div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(get_sub_field('description')) : ?>
            <div class="col-xs-12 col-md-7 col-lg-6 pad-xs-10">
                <?php the_sub_field('description'); ?>
                <div class="sp-20"></div>
            </div>
        <?php endif; ?>
    </div>
</div>