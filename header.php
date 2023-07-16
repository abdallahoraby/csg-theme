<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CityStoneGroup
 */

    global $csg;

?>
<!doctype html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>  >
<?php wp_body_open(); ?>


<!--New Header-->

<div id="SITE_CONTAINER">
    <div id="main_MF">
        <div id="SCROLL_TO_TOP" class="GFY_- ignore-focus" tabindex="-1" role="region" aria-label="top of page"> </div>

        <div id="BACKGROUND_GROUP">
            <div>
                <div id="pageBackground_mainPage" data-media-height-override-type=""
                     data-media-position-override="false" class="_2AO2a">
                    <div id="bgLayers_pageBackground_mainPage" class="X-jRX">
                        <div data-testid="colorUnderlay" class="mlsxv _22Lsw"></div>
                        <div id="bgMedia_pageBackground_mainPage" class="_1J6n9">
                            <wix-image id="img_pageBackground_mainPage" class="rca7A _22Lsw _1-b-O ysaOK bgImage">
                                <img
                                        src="<?php echo $csg['body_bg_image']['url']; ?>"
                                        alt="" style="width:100%;height:100%;object-fit:cover;object-position:50% 50%"/>
                            </wix-image>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div id="site-root">


            <!-- Top Header-->

            <div class="top-header">

                <div class="left-section">
                    <?php if(!empty($csg['home_social_facebook']) ): ?>
                        <a href="<?php echo $csg['home_social_facebook'];?>"><i class="fab fa-facebook"></i></a>
                    <?php endif; ?>

                    <?php if(!empty($csg['home_social_twitter'])): ?>
                        <a href="<?php echo $csg['home_social_twitter'];?>"><i class="fab fa-twitter"></i></a>
                    <?php endif; ?>

                    <?php if(!empty($csg['home_social_youtube'])): ?>
                        <a href="<?php echo $csg['home_social_youtube'];?>"><i class="fab fa-youtube"></i></a>
                    <?php endif; ?>

                    <?php if(!empty($csg['home_social_instagram'])): ?>
                        <a href="<?php echo $csg['home_social_instagram'];?>"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>


                </div>


                <div class="right-section">
                    <a href="" class="active-lang"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/en.png" alt=""> En</a>
                    <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ar.png" alt=""> Ar</a>
                    <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/fr.png" alt=""> Fr</a>
                </div>

            </div>
            <!-- End of Top Header-->

            <div id="masterPage" class="mesh-layout">

                <header tabindex="-1" id="SITE_HEADER_WRAPPER">
                    <div id="SITE_HEADER" class="UZpZM">
                        <div class="_2_Pya"></div>
                        <div class="_2qN73">
                            <div class="_1M8CM"></div>
                            <div class="_1jI8r">
                                <div data-mesh-id="SITE_HEADERinlineContent" data-testid="inline-content" class="">
                                    <div data-mesh-id="SITE_HEADERinlineContent-gridContainer"
                                         data-testid="mesh-container-content">
                                        <div id="WPht0-171a" class="Ued3M _2ws69" title="">


                                            <a data-testid="linkElement"
                                                                                              href="<?php echo home_url(); ?>"
                                                                                              target="_self"
                                                                                              class="_2edl5">
                                                <img
                                                            src="<?php echo $csg['site_logo']['url']; ?>"
                                                            alt="Logo CSG.png"
                                                            style="width:138px;height:147px;object-fit:contain;object-position:unset"/>

                                            </a>

                                        </div>
                                        <div id="WRchTxta-kym" class="_2bafp" data-testid="richTextElement"><p
                                                    class="font_3"
                                                    style="font-size:29px; line-height:1em; text-align:center"><span
                                                        style="font-size:29px"><span
                                                            style="font-family:oswald-medium,oswald,sans-serif"><span
                                                                style="letter-spacing:0.1em"><a href="<?php echo home_url(); ?>" target="_self"> <?php echo $csg['logo_big_title'];?> </a></span></span></span>
                                            </p></div>
                                        <div id="FvGrdLn0-py" class="_10k60"></div>
                                        <div id="WRchTxtb-1cdt" class="_2bafp" data-testid="richTextElement"><p
                                                    class="font_7" style="text-align: center; font-size: 14px;"><span
                                                        style="font-weight:bold;"><span style="font-size:14px;"><a
                                                                href="<?php echo home_url(); ?>"
                                                                target="_self"> <?php echo $csg['logo_sub_title'];?> </a>
                                                    <h6 class="text-center"> <?php echo $csg['logo_sub_title_small']; ?> </h6>
                                                    </span></span></p></div>
                                        <div id="comp-kmy12wna"></div>



                                        <nav class="navbar navbar-light bg-light navbar-expand-lg" id="myNavbar">

                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon"></span>
                                            </button>

                                            <div class="collapse navbar-collapse" id="mainNav">
                                                <ul class="navbar-nav nav-fill">

                                                    <?php

                                                    $menu_name = 'primary';
                                                    $locations = get_nav_menu_locations();
                                                    //Get the id of 'primary_menu'
                                                    $menu_id = $locations[ $menu_name ] ;
                                                    //Returns a navigation menu object.
                                                    $menuObject = wp_get_nav_menu_object($menu_id);
                                                    // Retrieves all menu items of a navigation menu.
                                                    $current_menu = $menuObject->slug;
                                                    $array_menu = wp_get_nav_menu_items($current_menu);

                                                    $menu = array();
                                                    foreach ($array_menu as $m) {
                                                        if (empty($m->menu_item_parent)) {
                                                            $menu[$m->ID] = array();
                                                            $menu[$m->ID]['ID']      =   $m->ID;
                                                            $menu[$m->ID]['title']       =   $m->title;
                                                            $menu[$m->ID]['url']         =   $m->url;
                                                            $menu[$m->ID]['children']    =   array();
                                                        }
                                                    }
                                                    $submenu = array();
                                                    foreach ($array_menu as $m):
                                                        if ($m->menu_item_parent) :
                                                            $submenu[$m->ID] = array();
                                                            $submenu[$m->ID]['ID']       =   $m->ID;
                                                            $submenu[$m->ID]['title']    =   $m->title;
                                                            $submenu[$m->ID]['url']  =   $m->url;
                                                            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];

                                                        endif;

                                                    endforeach;

                                                    ?>

                                                    <?php foreach ($menu as $menu_item):


                                                        $menu_item_id = $menu_item['ID'];
                                                        $menu_item_title = $menu_item['title'];
                                                        $menu_item_url = $menu_item['url'];
                                                        $menu_item_children = $menu_item['children'];

                                                        if( count($menu_item_children) > 0 ):
                                                            $liIsDropdown = 'dropdown menu-large';
                                                            $aIsDropdownClass = 'nav-link dropdown-toggle';
                                                            $aIsDropdown = 'role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
                                                        else:
                                                            $liIsDropdown = '';
                                                            $aIsDropdown = '';
                                                            $aIsDropdownClass = '';
                                                        endif;

                                                        ?>

                                                        <li class="nav-item px-2 <?php echo $liIsDropdown; ?>">
                                                            <a href="<?php echo $menu_item_url; ?>" id="dropdown_<?php echo $menu_item_id; ?>" class="nav-link <?php echo $aIsDropdownClass; ?>" <?php echo $aIsDropdown;?> > <?php echo $menu_item['title'];?> <span class="sr-only">(current)</span></a>
                                                            <?php
                                                                if( count($menu_item_children) > 0 ): ?>

                                                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdown_<?php echo $menu_item_id; ?>">

                                                                        <div class="d-md-flex align-items-start justify-content-center">

                                                                            <?php
                                                                                $items_per_column = ( !empty ( $csg['items_per_column'] ) ) ? $csg['items_per_column'] : 5;
                                                                                $megamenu_columns = array_chunk($menu_item_children, $items_per_column);
                                                                                foreach ( $megamenu_columns as $megamenu_column ):

                                                                            ?>

                                                                                    <div>

                                                                                        <?php foreach ( $megamenu_column as $child_item ): ?>

                                                                                            <a class="dropdown-item" href="<?php echo $child_item['url']; ?>"> <?php echo $child_item['title']; ?> </a>

                                                                                        <?php endforeach; ?>

                                                                                    </div>

                                                                            <?php endforeach; ?>

                                                                        </div>
                                                                    </div>

                                                            <?php endif;
                                                            ?>
                                                        </li>

                                                    <?php endforeach; ?>


                                                </ul>
                                            </div>
                                        </nav>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>


