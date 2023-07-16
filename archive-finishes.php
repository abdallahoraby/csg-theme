<?php get_header(); ?>

<div class="container marble-bg">
    <div class="row marbles-archive">
        <?php

        // get all marbles posts
        $finishes = get_posts(
            array(
                'posts_per_page' => -1,
                'post_type' => 'finishes',
                'status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
            )
        );

        if( !empty($finishes) ):

            foreach ($finishes as $finish):
                $finish_id = $finish->ID;
                ?>

                <a class="marble-item" href="<?php echo esc_url(get_the_permalink($finish_id));?>"> <?php echo $finish->post_title; ?> </a>

            <?php
            endforeach;
        endif;
        ?>

    </div>

</div>

<?php get_footer(); ?>
