<?php get_header(); ?>
<?php $post_id = get_the_ID(); ?>

<div class="container marble-bg">

    <div class="row marbles-archive single">

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
                $marble_id = $granite->ID;
                ?>

                <a class="marble-item" href="<?php echo esc_url(get_the_permalink($marble_id));?>"> <?php echo $granite->post_title; ?> </a>

            <?php
            endforeach;
        endif;

        ?>


    </div>

    <h3 class="single-title"> <?php echo  get_post_meta($post_id, 'section_title', true) ;?> </h3>

    <div class="row single-desc">
        <div class="col-md-6">

            <h4> PRODUCT INFO: </h4>

            <div class="desc-content">

                <?php echo get_post_meta($post_id, 'product_info', true);?>

            </div>

        </div>


        <div class="col-md-6">

            <h4> Standard Specifications & Technical Data: </h4>

            <div class="desc-content">
                <?php echo get_post_meta($post_id, 'standard_specs', true);?>
            </div>

        </div>

    </div>


    <div class="row single-images">

        <?php
        $granite_images_meta =  get_post_meta($post_id, 'marble_gallery', true);

        $granite_images = explode(",", $granite_images_meta);




        if( !empty($granite_images) ):

            foreach ($granite_images as $granite_image):

                ?>

                <a href="<?php echo esc_url( wp_get_attachment_url( $granite_image ) );?>" data-toggle="lightbox" data-title="" data-footer="">
                    <img class="img-fluid" src="<?php echo esc_url( wp_get_attachment_url( $granite_image ) );?>" alt="">
                </a>

            

            <?php
            endforeach;

        endif;
        ?>


    </div>



</div>




<?php get_footer(); ?>
