<?php 	
        $size               = 'thumbnail';
        $featured_img_url 	= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size)[0];
        
        $date			= get_field('eventdate');
        $now			= date("Ymd", strtotime('now'));
        $expiry		    = get_field('eventexpire');

        $datemonth      = date("m", strtotime($date));
        $expirymonth    = date("m", strtotime($expiry));

        $event_type     = get_field('event_type');
        $event_time     = get_field('event_time');

        $collaborator_data = get_field('collaborator');

        if($collaborator_data) {
            $collaborator =  '<a href="' . get_permalink( $collaborator_data->ID ) . '">' . esc_html( $collaborator_data->post_title ) . '</a>';
        }

        if(get_field('event_title')) {
            $event_title    = get_field('event_title');
        } else {
            $event_title    = get_the_title();
        }

        if($now < $expiry) {
            if(get_field('offsite_booking_link')) {
                $booking_button_formatted = '<a href="' . get_field('offsite_booking_link') . '" target="_blank" class="button button--hyperion"><span><span>' . get_field('booking_button') . '</span></span></a>';
            }
        }
        
        if(get_field('event_location_link')) {
            $event_location_formatted = '<a href="' . get_field('event_location_link') . '" target="_blank">' . get_field('event_location') . '</a>';
        } else {
            $event_location_formatted = get_field('event_location');
        }

        if($date == $expiry) {
            $event_date_formatted = date("j F, Y", strtotime($date));
        } else {
            if($datemonth == $expirymonth) {
                $event_date_formatted = date("j", strtotime($date)) . '&nbsp;-&nbsp;' . date("j", strtotime($expiry)) . '&nbsp;' . date("F", strtotime($expiry)) . date(", Y", strtotime($expiry));
            } else {
                $event_date_formatted = date("j", strtotime($date)) . '&nbsp;' . date("M", strtotime($date)) . '&nbsp;-&nbsp;' . date("j", strtotime($expiry)) . '&nbsp;' . date("M", strtotime($expiry)) . date(", Y", strtotime($expiry));
            }
        }

?>
    
<div class="col-xs-12 _accordion_container animate-item">
    <div class="row _schedule_accordion_head fs-16">
        <div class="col-xs-12">
            <div class="row top-xs middle-sm height-100 pad-xs-20 pad-top-bottom">
                
                <!--DATE-->
                <div class="col-xs col-md-2 pad-xs-10">
                    <div class="row">
                        <?php echo $event_date_formatted; ?>
                    </div>
                </div>

                <!--TITLE-->
                <div    class="col-xs-12 col-md-5 pad-xs-10 ajax hover-green"
                        data-title='<?php the_title(); ?>'
                        data-description='<?php echo esc_attr(get_the_content()); ?>'
                        data-image='<?php echo $featured_img_url; ?>'
                        data-collaborator='<?php echo $collaborator; ?>'
                        data-date='<?php echo $event_date_formatted; ?>'
                        data-type='<?php echo $event_type; ?>'
                        data-time='<?php echo $event_time; ?>'
                        data-location='<?php echo $event_location_formatted; ?>'
                        data-button='<?php if($now < $expiry) { echo esc_attr($booking_button_formatted); } else { echo '<div></div>';} ?>'
                    >
                    <div class="hide-md">
                        <img src="<?php echo $featured_img_url; ?>" />
                        <div class="sp-20"></div>
                    </div>
                    <div class="pad-md-20 pad-right">
                        <h4 class="fs-18" style="line-height: 1.3;"><b><?php echo $event_title; ?></b></h4>
                    </div>
                </div>

                <!--LOCATION-->
                <div class="col-xs-12 col-md-2 pad-xs-10">
                    <h4><?php echo $event_location_formatted; ?></h4>
                </div>

                <!--TYPE+BUTTON-->
                <div class="col-xs col-md-3 pad-xs-10">
                    <div class="row middle-md between-md" style="min-height:35.5px;">
                        <div><?php echo $event_type; ?></div>
                        <?php if($now < $expiry) {echo $booking_button_formatted; } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row _schedule_accordion_body" style="display:none;">
        <div class="row">
        </div>
    </div>
    <div class="row pad-xs-10 pad-left-right"><div class="col-xs-12 border-bottom"></div></div>
</div>