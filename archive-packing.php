<?php get_header(); ?>

<div class="container marble-bg">
    <div class="row marbles-archive">
        <?php

        // get all marbles posts
        $packings = get_posts(
            array(
                'posts_per_page' => -1,
                'post_type' => 'packing',
                'status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
            )
        );

        if( !empty($packings) ):

            foreach ($packings as $packing):
                $packing_id = $packing->ID;
                ?>

                <a class="marble-item" href="<?php echo esc_url(get_the_permalink($packing_id));?>"> <?php echo $packing->post_title; ?> </a>

            <?php
            endforeach;
        endif;
        ?>

    </div>

</div>

<?php get_footer(); ?>
