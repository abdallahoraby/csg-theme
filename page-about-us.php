<?php get_header(); ?>

<div class="container marble-bg about-us">

    <h3>About Us</h3>

    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>" alt="">
        </div>

        <div class="col-md-6">
            <p>
                <?php the_content(); ?>
            </p>
        </div>
        
        
    </div>

</div>

<?php get_footer(); ?>
