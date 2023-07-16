<?php get_header(); ?>

    <div class="container marble-bg">
        <div class="row marbles-archive">
        <?php

            // get all marbles posts
            $marbles = get_posts(
                array(
                    'posts_per_page' => -1,
                    'post_type' => 'marbles',
                    'status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                )
            );

            if( !empty($marbles) ):

                foreach ($marbles as $marble):
                    $marble_id = $marble->ID;
                    ?>

                    <a class="marble-item" href="<?php echo esc_url(get_the_permalink($marble_id));?>"> <?php echo $marble->post_title; ?> </a>

            <?php
                    endforeach;
                endif;
            ?>

        </div>

    </div>

<?php get_footer(); ?>
