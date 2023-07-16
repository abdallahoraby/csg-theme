<?php get_header(); ?>

<div class="container marble-bg">
    <div class="row marbles-archive">
        <?php

        // get all marbles posts
        $artworks = get_posts(
            array(
                'posts_per_page' => -1,
                'post_type' => 'artwork',
                'status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
            )
        );

        if( !empty($artworks) ):

            foreach ($artworks as $artwork):
                $artwork_id = $artwork->ID;
                ?>

                <a class="marble-item" href="<?php echo esc_url(get_the_permalink($artwork_id));?>"> <?php echo $artwork->post_title; ?> </a>

            <?php
            endforeach;
        endif;
        ?>

    </div>

</div>

<?php get_footer(); ?>
