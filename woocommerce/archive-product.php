<?php get_header(); ?>

<div class="container marble-bg archive-product">

    <div class="row full-width">

        <div class="col-md-3 filter_column">
            <h4>Filter By</h4>
            <input type="hidden" value="<?php echo home_url(); ?>/shop" id="home_url">
                <?php echo do_shortcode('[woof]'); ?>

            <?php
                if( !empty( $_GET['pa_color'] ) || !empty( $_GET['product_cat'] ) ): ?>

                <a class="clear_filter" href="<?php echo home_url(); ?>/shop"> Clear Filter x </a>

            <?php
                endif;
            ?>


        </div>


        <div class="col-md-9">


            <div class="row products_loop">
            <?php


            $page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
            $category_slug = !empty( $_GET['product_cat'] ) ? $_GET['product_cat'] : '';
            $color_slug = !empty( $_GET['pa_color'] ) ? $_GET['pa_color'] : '';
            $per_page = 6;

            if( !empty($category_slug) ){
                $category_slugs = explode(',', $category_slug);
                foreach ( $category_slugs as $slug ){
                    $category_id = get_term_by( 'slug', $slug, 'product_cat' )->term_id;
                    $categories_ids[] = $category_id;
                }
            } else {
                $categories = get_terms( ['taxonomy' => 'product_cat', 'hide_empty' => true] );
                foreach ($categories as $category):

                    $categories_ids[] = $category->term_id;

                endforeach;
            }

            if( !empty($color_slug) ){
                $color_slugs = explode(',', $color_slug);
                foreach ( $color_slugs as $slug_color ){
                    $color_id = get_term_by( 'slug', $slug_color, 'pa_color' )->term_id;
                    $colors_ids[] = $color_id;
                }
            } else {
                $colors = get_terms( ['taxonomy' => 'pa_color', 'hide_empty' => true] );
                foreach ($colors as $color):

                    $colors_ids[] = $color->term_id;

                endforeach;
            }


            $all_products = get_posts(
                array(
                    'posts_per_page' => -1,
                    'post_type' => 'product',
                    'status' => 'publish',
                )
            );

            if( !empty( $category_slug ) || !empty( $color_slug ) ){
                $relation = 'AND';
            } else {
                $relation = 'OR';
            }

            // get all products
            $products = get_posts(
                array(
                    'posts_per_page' => $per_page,
                    'paged' => $page,
                    'post_type' => 'product',
                    'status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'tax_query' => array(
                        'relation' => $relation,
                        array(
                            'taxonomy'      => 'product_cat',
                            'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                            'terms'         => $categories_ids,
                            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                        ),
                        array(
                            'taxonomy'      => 'pa_color',
                            'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                            'terms'         => $colors_ids,
                            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                        )
                    )
                )
            );

            if( !empty($products) ):

                foreach ($products as $product):
                    $product_id = $product->ID;

                    $product   = wc_get_product( $product_id );
                    $image_id  = $product->get_image_id();
                    $image_url = wp_get_attachment_image_url( $image_id, 'full' );


                    ?>



                        <a href="<?php echo get_the_permalink( $product_id ); ?>" class="product-loop col-md-4" style="background: url('<?php echo $image_url; ?>')">
                            <?php echo do_shortcode('[woosq id="'.$product_id.'"]');?>
                            <h3> <?php echo get_the_title( $product_id ); ?> </h3>
                        </a>






            <?php
                    endforeach;
                endif;
            ?>

                </div>

                <ul class="pagination">
            <?php
                if( !empty($category_slug) || !empty($color_slug) ){
                    $products_count = count( $products );
                } else {
                    $products_count = count( $all_products );
                }

                $pages =  ceil( $products_count / $per_page );
                for ( $i=1; $i<=$pages; $i++ ):
                    if( !empty($page) && (int) $page === (int) $i  ){
                        $active = 'active_page';
                    } else if ( $i === 1 ) {
                        $first_page = 'first_page';
                    } else {
                        $active = '';
                        $first_page = '';
                    }
                    ?>
                    <li class="<?php echo $active . ' ' . $first_page; ?>"><a href="<?php echo home_url();?>/shop?page=<?php echo $i;?>"> <?php echo $i; ?> </a></li>
                <?php    endfor;

            ?>

                </ul>



        </div>



    </div>


</div>

<?php get_footer(); ?>
