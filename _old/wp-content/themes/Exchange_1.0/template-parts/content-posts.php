<?php
    
    if(get_sub_field('post_type')) :
        $post_type			= get_sub_field('post_type');
    endif;
    
    $show_blurb			= get_sub_field('show_blurb');

    if($post_type == 'collaborator') {
        $orderby = 'title';
    } else {
        $orderby = 'menu_order';
    }

    if($posts_to_display == 'category') {

        $categories = get_sub_field('category');

        $args = array(  
            'post_type'         => $post_type,
            'posts_per_page'    => $num_posts,
            'post_status'       => 'publish',
            'orderby'           => $orderby,
            'order'             => 'ASC',
            'category__in'      => $categories
        );

    } elseif($posts_to_display == 'tag') {
        
        $tags = get_sub_field('tags');

        $args = array(  
            'post_type'         => $post_type,
            'posts_per_page'    => $num_posts,
            'post_status'       => 'publish',
            'orderby'           => $orderby,
            'order'             => 'ASC',
            'tag__in'           => $tags
        );

    } elseif($posts_to_display == 'select') {

        if(have_rows('select_posts')):

           while (have_rows('select_posts')) : the_row();
       
                $subpost = get_sub_field('post');
                $array[] = $subpost->ID;
       
           endwhile;
       
        endif;
    
        $args = array( 
            'post_type'         => $post_type,
            'posts_per_page'    => '-1',
            'post__in'          => $array,
            'orderby'           => 'post__in',
            'post_status'       => 'publish',
            'orderby'           => $orderby,
            'order'             => 'ASC'
        );

    } elseif($posts_to_display == 'linked_content') {

        $array                  = get_field('collaborators');
        $post_type              = 'any';
        
        $args = array( 
            'post_type'         => array('staff','project','trustee','collaborator'),
            'posts_per_page'    => '-1',
            'post__in'          => $array,
            'orderby'           => 'post__in',
            'post_status'       => 'publish',
            'orderby'           => $orderby,
            'order'             => 'ASC'
        );

    } else {

        $args = array(  
            'post_type'         => $post_type,
            'posts_per_page'    => $num_posts,
            'post_status'       => 'publish',
            'orderby'           => $orderby,
            'order'             => 'ASC'
        );
        
    }

    $custom = new WP_Query( $args );

?>



<?php if($custom->have_posts()) { while ($custom->have_posts()) { $custom->the_post(); ?>

    <?php include(locate_template('template-parts/content-thumbnail.php')); ?>

<?php }} ?>
<?php wp_reset_postdata(); wp_reset_query();?>
                    
                    
                    
                    

