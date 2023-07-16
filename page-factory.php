<?php get_header(); ?>

    <div class="container marble-bg factory_page">

        <div class="row">

            <?php
                $post_id = get_the_ID();
                $factory_images_meta =  get_post_meta($post_id, 'factory_gallery', true);


                $factory_images = explode(",", $factory_images_meta);
                unset($factory_images[0]);



                if( !empty($factory_images) ):

                    foreach ($factory_images as $factory_image):

            ?>

                        <div class="col-md-4" data-aos="fade-down">
                            <a href="<?php echo esc_url( wp_get_attachment_url( $factory_image ) );?>" data-toggle="lightbox" data-title="" data-footer="">
                                <img class="img-fluid" src="<?php echo esc_url( wp_get_attachment_url( $factory_image ) );?>" alt="">
                            </a>
                        </div>

                    <?php
                    endforeach;

                endif;
            ?>


        </div>

        <div class="row">
            <?php
            $factory_videos =  get_post_meta( $post_id, 'factory_video_urls', true );


            if( !empty($factory_videos) ):

                foreach ($factory_videos as $factory_video):

                    ?>



                    <div class="col-md-4" data-aos="fade-down">
                        <a href="<?php echo $factory_video['video_url'];?>" data-toggle="lightbox" data-title="" data-footer="">
                            <i class="fas fa-play-circle"></i>
                            <video>
                                <source src="<?php echo $factory_video['video_url'];?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </a>
                    </div>

                <?php
                endforeach;

            endif;
            ?>
        </div>

    </div>


<?php get_footer(); ?>
