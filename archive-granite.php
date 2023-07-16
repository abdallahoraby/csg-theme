<?php get_header(); ?>

<div class="container marble-bg">
    <div class="row marbles-archive">
        <?php

        // get all marbles posts
        $granites = get_posts(
            array(
                'posts_per_page' => -1,
                'post_type' => 'granite',
                'status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
            )
        );

        if( !empty($granites) ):

            foreach ($granites as $granite):
                $granite_id = $granite->ID;
                ?>

                <a class="marble-item" href="<?php echo esc_url(get_the_permalink($granite_id));?>"> <?php echo $granite->post_title; ?> </a>

            <?php
            endforeach;
        endif;
        ?>

    </div>

</div>

<?php get_footer(); ?>
