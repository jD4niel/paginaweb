<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tyros
 */

$tyros_options = tyros_get_options();

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="profile" href="http://gmpg.org/xfn/11"> -->
    <!-- <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/node_modules/bootstrap/dist/css/bootstrap.min.css"> -->


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/tema.css">
</head>

<?php $bg_image_src = get_template_directory_uri() . '/inc/images/bg/' . esc_attr( $tyros_options['tyros_theme_background_pattern'] ) . '.png'; ?>

<body <?php body_class(); ?> style="background-image: url(<?php echo esc_url( $bg_image_src ); ?>);">
<!-- <h1><?php bloginfo('template_url'); ?></h1> -->
    <div id="page" class="site">

	<header id="masthead" class="site-header">

            <div id="header-box-wrap">

                <div class="container boxed-wrap">

                    <div class="row">

                        <div class="col-sm-12 boxed-wrap">

                            <?php if ( $tyros_options['tyros_headerbar_bool'] == 'yes' ) : ?>

                                <?php do_action( 'tyros_toolbar' ); ?>

                            <?php endif; ?>

                            <div id="site-branding-sticky-wrap" >

                                <div id="site-branding">

                                    <div class="branding">

                                        <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>

                                            <?php the_custom_logo(); ?>

                                        <?php else : ?>

                                            <?php if ( get_bloginfo( 'name' ) ) : ?>

                                                <h2 class="site-title">
                                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                        <?php bloginfo( 'name' );?>
                                                    </a>
                                                </h2>

                                            <?php endif; ?>

                                            <?php if ( get_bloginfo( 'description' ) ) : ?>

                                                <h5 class="site-description">
                                                    <?php echo get_bloginfo( 'description' ); ?>
                                                </h5>

                                            <?php endif; ?>

                                        <?php endif; ?>

                                    </div>

                                    <div class="navigation">

                                        <nav id="site-navigation" class="main-navigation" role="navigation">

                                            <?php wp_nav_menu( array(
                                                'theme_location' => 'primary',
                                                'menu_id'        => 'primary-menu',
                                            ) ); ?>

                                        </nav><!-- #site-navigation -->

                                    </div>

                                    <div id="slicknav-menu-toggle">

                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/images/menu-bars-sqr.png' ); ?>">

                                    </div>

                                </div>

                            </div>

                            <!-- xs -->
                            <!-- xs -->

                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item active imgContainer">
                                  <img class="first-slide" src="<?php bloginfo('template_url'); ?>/gente.jpg" alt="First slide">
                                  <div class="container">
                                    <div class="carousel-caption text-left">
                                      <!-- <h1>Example headline.</h1> -->
                                      <p align="center">Todo en material eléctrico, proyectos y servicios.</p>
                                      <p align="center"><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                                    </div>
                                  </div>
                                </div>
                                <div class="carousel-item imgContainer">
                                  <img class="second-slide" src="<?php bloginfo('template_url'); ?>/focoverde2.jpg" alt="Second slide">
                                  <div class="container">
                                    <div class="carousel-caption">
                                      <h1>Another example headline.</h1>
                                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                      <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                                    </div>
                                  </div>
                                </div>
                                <div class="carousel-item imgContainer">
                                  <img class="third-slide" src="<?php bloginfo('template_url'); ?>/ledbulb.jpg" alt="Third slide">
                                  <div class="container">
                                    <div class="carousel-caption text-left">
                                      <h1>One more for good measure.</h1>
                                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                      <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                      </a>
                              <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                      </a>
                            </div>

                            <!-- xs -->

                        </div>

                    </div>

                </div>

            </div>

	</header><!-- #masthead -->


	<div id="content" class="site-content">
