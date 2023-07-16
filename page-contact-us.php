<?php get_header(); ?>

<div class="container marble-bg about-us contact">

    <h3>Contact</h3>

    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>" alt="">
        </div>

        <div class="col-md-6">
            <p>
               <?php echo get_post_meta( get_the_ID(), 'contact_description', true ); ?>
            </p>

            <span class="contact-form">
                <?php
                    if( !empty(get_post_meta( get_the_ID(), 'contact_shortcode', true )) ){
                        echo do_shortcode( get_post_meta( get_the_ID(), 'contact_shortcode', true ) );
                    } ?>
            </span>

        </div>


    </div>

</div>

<?php get_footer(); ?>
