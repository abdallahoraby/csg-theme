<?php get_header(); ?>
<?php global $csg; ?>

<div class="home_all">

<!--    Start of Home page section-->
    <div class="container home_page">

        <div class="row section-one">

            <div class="col-md-3 col-sm-1">
                <a href="<?php echo $csg['cat_one_link']; ?>" style="background: <?php echo $csg['primary_color'] ;?>"> <?php echo $csg['cat_one_title'];?> </a>
                <div class="decoration"></div>
                <div class="img-container">
                    <img class="stones_cats img" src='<?php echo $csg['cat_one_image']['url'];?>'>
                    <div class="overlay" style="background: <?php echo $csg['primary_color'] ;?>"></div>
                </div>
            </div>

            <div class="col-md-3 col-sm-1">
                <div class="img-container">
                    <img class="stones_cats img" src='<?php echo $csg['cat_two_image']['url'];?>'>
                    <div class="overlay" style="background: <?php echo $csg['primary_color'] ;?>"></div>
                </div>
                <div class="decoration"></div>
                <a href="<?php echo $csg['cat_two_link']; ?>" style="background: <?php echo $csg['primary_color'] ;?>"> <?php echo $csg['cat_two_title'];?> </a>
            </div>

            <div class="col-md-3 col-sm-1">
                <a href="<?php echo $csg['cat_three_link']; ?>" style="background: <?php echo $csg['primary_color'] ;?>">  <?php echo $csg['cat_three_title'];?> </a>
                <div class="decoration"></div>
                <div class="img-container">
                    <img class="stones_cats img" src='<?php echo $csg['cat_three_image']['url'];?>'>
                    <div class="overlay" style="background: <?php echo $csg['primary_color'] ;?>"></div>
                </div>
            </div>

            <div class="col-md-3 col-sm-1">
                <div class="img-container">
                    <img class="stones_cats img" src='<?php echo $csg['cat_four_image']['url'];?>'>
                    <div class="overlay" style="background: <?php echo $csg['primary_color'] ;?>"></div>
                </div>
                <div class="decoration"></div>
                <a href="<?php echo $csg['cat_four_link']; ?>" style="background: <?php echo $csg['primary_color'] ;?>"> <?php echo $csg['cat_four_title'];?> </a>

            </div>



        </div>

        <div class="row section-two marble">
            <div class="col-md-6">

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
                    ); ?>

                <div class="diamond-grid marble">

                <?php if( !empty($marbles) ):

                        foreach ($marbles as $marble):

                ?>

                            <a href="<?php echo esc_url( get_the_permalink( $marble->ID ) ); ?>" class="item"><img src="<?php echo esc_url( get_the_post_thumbnail_url( $marble->ID ) )?>" alt=""></a>

                <?php
                        endforeach;

                    endif;
                ?>

                </div>


            </div>
            <div class="col-md-6">
                <h3> egyptian marble </h3>
                <ul>

                    <?php if( !empty($marbles) ):

                        foreach ($marbles as $marble):

                            ?>

                            <li><a href="<?php echo esc_url( get_the_permalink( $marble->ID ) ); ?>"> <?php echo get_the_title( $marble->ID ) ; ?> </a></li>


                        <?php
                        endforeach;

                    endif;
                    ?>


                </ul>
            </div>
        </div>

        <div class="row section-two granite">
            <div class="col-md-6">

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
                ); ?>


                <div class="diamond-grid granite">

                    <?php if( !empty($granites) ):

                        foreach ($granites as $granite):

                            ?>

                            <div class="item"><img src="<?php echo esc_url( get_the_post_thumbnail_url( $granite->ID ) )?>" alt=""></div>

                        <?php
                        endforeach;

                    endif;
                    ?>

                </div>


            </div>
            <div class="col-md-6">
                <h3> egyptian granite </h3>
                <ul>

                    <?php if( !empty($granites) ):

                        foreach ($granites as $granite):

                            ?>

                            <li><a href="<?php echo esc_url( get_the_permalink( $granite->ID ) ); ?>"> <?php echo get_the_title( $granite->ID ) ; ?> </a></li>


                        <?php
                        endforeach;

                    endif;
                    ?>



                </ul>
            </div>
        </div>

        <div class="row section-three">
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <?php
                        $facory_page = get_page_by_path( 'factory' )->ID;
                        $factory_images_meta =  get_post_meta($facory_page, 'factory_gallery', true);


                        $factory_images = explode(",", $factory_images_meta);
                        unset($factory_images[0]);



                        if( !empty($factory_images) ):

                            $index=0;
                            foreach ($factory_images as $factory_image):

                                ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $index;?>" ></li>

                            <?php
                            $index++;
                            endforeach;

                        endif;
                        ?>

                    </ol>
                    <div class="carousel-inner">

                        <?php
                        $facory_page = get_page_by_path( 'factory' )->ID;
                        $factory_images_meta =  get_post_meta($facory_page, 'factory_gallery', true);


                        $factory_images = explode(",", $factory_images_meta);
                        unset($factory_images[0]);



                        if( !empty($factory_images) ):


                            foreach ($factory_images as $factory_image):

                                ?>

                                <div class="carousel-item">
                                    <img class="d-block w-100" src="<?php echo esc_url( wp_get_attachment_url( $factory_image ) );?>" alt="First slide">
                                </div>

                                <?php
                            endforeach;

                        endif;
                        ?>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <h3>Our Factory</h3>
                <p>
                    <?php
                        $factory_page = get_page_by_path( 'factory' )->ID;
                        $factory_page_object = get_post($factory_page); // specific post
                        $the_content = apply_filters('the_content', $factory_page_object->post_content);
                        if ( !empty($the_content) ) {
                            echo $the_content;
                        }
                    ?>

                </p>
            </div>
        </div>


        <div class="row map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d262788.4249162046!2d31.039385204234343!3d30.071873831796257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458482b907b9335%3A0xa6285c980c1476aa!2sNile%20Corniche!5e0!3m2!1sen!2seg!4v1622493825675!5m2!1sen!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>


    </div>

<!--    End of Home page section-->


    <div class="container animated_result">
        <button onclick="animate_to_right();">back</button>
    </div>

</div>




<?php get_footer(); ?>
