<div class="sub-nav">
    <div class="row wrapper end-xs">
        <div class="col-xs pad-xs-10 pad-left-right show-sm">
            <div class="row fullheight middle-xs">
                <nav>
                    <ul>
                        <?php
                            global $post; // assuming there is global $post already set in your context
                            wp_list_pages( array(
                                'parent' => $post->post_parent,
                                'depth' => 1,
                                'title_li' => ''
                            ) );
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>