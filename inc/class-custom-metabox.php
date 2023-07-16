<?php

/**** stones meta page *****/

    $cpts = array(
        'marbles',
        'granite',
        'artwork',
        'finishes',
        'packing'
    );

    add_action( 'add_meta_boxes', function() {
                add_meta_box( 'custom-metabox', 'Additional Info', 'fill_metabox', 'marbles', 'normal', 'high' );

    });

    add_action( 'add_meta_boxes', function() {
        add_meta_box( 'custom-metabox', 'Additional Info', 'fill_metabox', 'granite', 'normal', 'high' );

    });

    add_action( 'add_meta_boxes', function() {
        add_meta_box( 'custom-metabox', 'Additional Info', 'fill_metabox', 'artwork', 'normal', 'high' );

    });

    add_action( 'add_meta_boxes', function() {
        add_meta_box( 'custom-metabox', 'Additional Info', 'fill_metabox', 'finishes', 'normal', 'high' );

    });

    add_action( 'add_meta_boxes', function() {
        add_meta_box( 'custom-metabox', 'Additional Info', 'fill_metabox', 'packing', 'normal', 'high' );

    });


function fill_metabox( $post ) {
    wp_nonce_field( basename(__FILE__), 'mam_nonce' );


    ?>


    <h3>Section Title: </h3>
    <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'section_title', true) ;?>" id="section_title" name="section_title">


    <h3>Product Info: </h3>
    <?php
    $product_info = get_post_meta($post->ID, 'product_info', true); ?>

    <table class="full-width">
        <tr>
            <td><?php wp_editor($product_info, 'product_info', array(
                    'wpautop'               =>      true,
                    'media_buttons' =>      true,
                    'textarea_name' =>      'product_info',
                    'textarea_rows' =>      10,
                    'teeny'                 =>      true
                )); ?>
            </td>
        </tr>
    </table>


    <h3> Standard Specifications & Technical Data: </h3>
    <?php
    $standard_specs = get_post_meta($post->ID, 'standard_specs', true); ?>

    <table class="full-width">
        <tr>
            <td><?php wp_editor($standard_specs, 'standard_specs', array(
                    'wpautop'               =>      true,
                    'media_buttons' =>      true,
                    'textarea_name' =>      'standard_specs',
                    'textarea_rows' =>      10,
                    'teeny'                 =>      true
                )); ?>
            </td>
        </tr>
    </table>


    <?php
        function misha_gallery_field( $name, $value = '' ) {

            $html = '<div><ul class="misha_gallery_mtb">';
            /* array with image IDs for hidden field */
            $hidden = array();


            if( $images = get_posts( array(
                'post_type' => 'attachment',
                'orderby' => 'post__in', /* we have to save the order */
                'order' => 'ASC',
                'post__in' => explode(',',$value), /* $value is the image IDs comma separated */
                'numberposts' => -1,
                'post_mime_type' => 'image'
            ) ) ) {

                foreach( $images as $image ) {
                    $hidden[] = $image->ID;
                    $image_src = wp_get_attachment_image_src( $image->ID, array( 80, 80 ) );
                    $html .= '<li data-id="' . $image->ID .  '"><span style="background-image:url(' . $image_src[0] . ')"></span><a href="#" class="misha_gallery_remove">×</a></li>';
                }

            }

            $html .= '</ul><div style="clear:both"></div></div>';
            $html .= '<input type="hidden" name="'.$name.'" value="' . join(',',$hidden) . '" /><a href="#" class="button misha_upload_gallery_button">Add Images</a>';

            return $html;
        }

        /*
        * Meta Box HTML
        */

            $meta_key = 'marble_gallery';
            echo '<h3> Gallery: </h3>';
            echo misha_gallery_field( $meta_key, get_post_meta($post->ID, $meta_key, true) );





    ?>


    <?php
}


add_action( 'save_post', function( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'mam_nonce' ] ) && wp_verify_nonce( $_POST[ 'mam_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }


    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['section_title'] ) ) {
        update_post_meta( $post_id, 'section_title', $_POST['section_title'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'section_title' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['product_info'] ) ) {
        update_post_meta( $post_id, 'product_info', $_POST['product_info'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'product_info' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['standard_specs'] ) ) {
        update_post_meta( $post_id, 'standard_specs', $_POST['standard_specs'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'standard_specs' );
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['marble_gallery'] ) ) {
        update_post_meta( $post_id, 'marble_gallery', $_POST['marble_gallery'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'marble_gallery' );
    }








});


/**** factory page *****/



add_action('admin_init','my_meta_init');
function my_meta_init()
{
    $post_id = !empty($_GET['post']) ? $_GET['post'] : $_POST['post_ID'] ;
    // checks for post/page ID
    $factory_page_id = get_id_by_slug('factory');
    if ($post_id == $factory_page_id)
    {
        add_meta_box('factory_meta', 'Factory Info', 'factory_meta',   'page', 'normal', 'high');
    }

    function factory_meta( $post ) {
        wp_nonce_field( basename(__FILE__), 'mam_nonce' );

        function misha_gallery_field( $name, $value = '' ) {

            $html = '<div><ul class="misha_gallery_mtb">';
            /* array with image IDs for hidden field */
            $hidden = array();


            if( $images = get_posts( array(
                'post_type' => 'attachment',
                'orderby' => 'post__in', /* we have to save the order */
                'order' => 'ASC',
                'post__in' => explode(',',$value), /* $value is the image IDs comma separated */
                'numberposts' => -1,
                'post_mime_type' => 'image'
            ) ) ) {

                foreach( $images as $image ) {
                    $hidden[] = $image->ID;
                    $image_src = wp_get_attachment_image_src( $image->ID, array( 80, 80 ) );
                    $html .= '<li data-id="' . $image->ID .  '"><span style="background-image:url(' . $image_src[0] . ')"></span><a href="#" class="misha_gallery_remove">×</a></li>';
                }

            }

            $html .= '</ul><div style="clear:both"></div></div>';
            $html .= '<input type="hidden" name="'.$name.'" value="' . join(',',$hidden) . '" /><a href="#" class="button misha_upload_gallery_button">Add Images</a>';

            return $html;
        }

        /*
        * Meta Box HTML
        */

        $meta_key = 'factory_gallery';
        echo '<h3>Factory Gallery: </h3>';
        echo misha_gallery_field( $meta_key, get_post_meta($post->ID, $meta_key, true) );




        ?>

        <br>
        <hr>
        <br>

        <?php


        global $post;
        $gpminvoice_group = get_post_meta($post->ID, 'factory_video_urls', true);
        wp_nonce_field( 'gpm_repeatable_meta_box_nonce', 'gpm_repeatable_meta_box_nonce' );
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function( $ ){
                $( '#add-row' ).on('click', function() {
                    var row = $( '.empty-row.screen-reader-text' ).clone(true);
                    row.removeClass( 'empty-row screen-reader-text' );
                    row.insertBefore( '#repeatable-fieldset-one tbody>tr:last' );
                    return false;
                });

                $( '.remove-row' ).on('click', function() {
                    $(this).parents('tr').remove();
                    return false;
                });
            });
        </script>
        <table id="repeatable-fieldset-one" width="100%">
            <tbody>
            <?php
            if ( $gpminvoice_group ) :
                foreach ( $gpminvoice_group as $field ) {
                    ?>
                    <tr>
                        <td width="80%">
                            <input class="full-width" type="text"  placeholder="video_url" name="video_url[]" value="<?php if($field['video_url'] != '') echo esc_attr( $field['video_url'] ); ?>" /></td>
                        <td width="20%"><a class="button remove-row" href="#1">Remove</a></td>
                    </tr>
                    <?php
                }
            else :
                // show a blank one
                ?>
                <tr>
                    <td>
                        <input class="full-width" type="text" placeholder="video_url" title="video_url" name="video_url[]" />
                    </td>
                    <td><a class="button  cmb-remove-row-button button-disabled" href="#">Remove</a></td>
                </tr>
            <?php endif; ?>

            <!-- empty hidden one for jQuery -->
            <tr class="empty-row screen-reader-text">
                <td>
                    <input class="full-width" type="text" placeholder="video_url" name="video_url[]"/></td>
                <td><a class="button remove-row" href="#">Remove</a></td>
            </tr>
            </tbody>
        </table>
        <p><a id="add-row" class="button" href="#">Add Another Video Url</a></p>
        <?php

    }

    add_action( 'save_post', function( $post_id ) {
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'mam_nonce' ] ) && wp_verify_nonce( $_POST[ 'mam_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

        if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
            return;
        }



        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['factory_gallery'] ) ) {
            update_post_meta( $post_id, 'factory_gallery', $_POST['factory_gallery'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'factory_gallery' );
        }


        $old = get_post_meta($post_id, 'factory_video_urls', true);
        $new = array();
        $video_urls = !empty($_POST['video_url']) ? $_POST['video_url'] : array();
        $count = count( $video_urls );
        for ( $i = 0; $i < $count; $i++ ) {
            if ( $video_urls[$i] != '' ) :
                $new[$i]['video_url'] = stripslashes( strip_tags( $video_urls[$i] ) );

            endif;
        }
        if ( !empty( $new ) && $new != $old )
            update_post_meta( $post_id, 'factory_video_urls', $new );
        elseif ( empty($new) && $old )
            delete_post_meta( $post_id, 'factory_video_urls', $old );


    });





}

/**** contact us page *****/



add_action('admin_init','contact_us_meta');
function contact_us_meta()
{
    $post_id = !empty($_GET['post']) ? $_GET['post'] : $_POST['post_ID'] ;
    // checks for post/page ID
    $contact_page_id = get_id_by_slug('contact-us');
    if ($post_id == $contact_page_id)
    {
        add_meta_box('factory_meta', 'Contact Us Info', 'contact_meta',   'page', 'normal', 'high');
    }

    function contact_meta( $post ) {
        wp_nonce_field( basename(__FILE__), 'mam_nonce' );

        ?>

        <h3>Contact Description: </h3>
        <textarea cols="100" rows="10" type="text" class="full-width" value="" id="contact_description" name="contact_description">
            <?php echo get_post_meta($post->ID, 'contact_description', true) ;?>
        </textarea>

        <h3>Contact Form Shortcode: </h3>
        <input type="text" class="full-width" value="<?php echo get_post_meta($post->ID, 'contact_shortcode', true) ;?>" id="contact_shortcode" name="contact_shortcode">





    <?php  }

    add_action( 'save_post', function( $post_id ) {
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'mam_nonce' ] ) && wp_verify_nonce( $_POST[ 'mam_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

        if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
            return;
        }



        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['contact_description'] ) ) {
            update_post_meta( $post_id, 'contact_description', $_POST['contact_description'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'contact_description' );
        }

        // If the checkbox was not empty, save it as array in post meta
        if ( ! empty( $_POST['contact_shortcode'] ) ) {
            update_post_meta( $post_id, 'contact_shortcode', $_POST['contact_shortcode'] );
            // Otherwise just delete it if its blank value.
        } else {
            delete_post_meta( $post_id, 'contact_shortcode' );
        }





    });





}


/*********
 * Products meta
 ******/

add_action( 'add_meta_boxes', function() {
    add_meta_box( 'specs_product', 'Additional Info', 'specs_product', 'product', 'normal', 'high' );

});

function specs_product( $post ) {
    wp_nonce_field( basename(__FILE__), 'mam_nonce' );


    ?>

    <h3> Standard Specifications & Technical Data: </h3>
    <?php
    $standard_specs = get_post_meta($post->ID, 'standard_specs', true); ?>

    <table class="full-width">
        <tr>
            <td><?php wp_editor($standard_specs, 'standard_specs', array(
                    'wpautop'               =>      true,
                    'media_buttons' =>      true,
                    'textarea_name' =>      'standard_specs',
                    'textarea_rows' =>      10,
                    'teeny'                 =>      true
                )); ?>
            </td>
        </tr>
    </table>

    
    <?php
}


add_action( 'save_post', function( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'mam_nonce' ] ) && wp_verify_nonce( $_POST[ 'mam_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }



    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['standard_specs'] ) ) {
        update_post_meta( $post_id, 'standard_specs', $_POST['standard_specs'] );
        // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'standard_specs' );
    }









});


// get_id_by_slug('any-page-slug');

function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}