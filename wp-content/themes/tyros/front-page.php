<?php
/**
 * The template for displaying the home pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tyros
 */

get_header();

$tyros_options      = tyros_get_options();
$alternate_blog     = isset( $tyros_options['blog_layout_style'] ) ? $tyros_options['blog_layout_style'] : 'carousel';
$strap_check        = function_exists( 'tyros_strap_pl' ) && tyros_strap_pl() ? true : false;

?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <div class="container">

            <div class="row">

                <div class="col-sm-12 boxed-wrap">

                    <?php if ( $tyros_options['tyros_slider_bool'] == 'yes' ) { do_action( 'tyros_slider' ); } ?>

                    <?php if ( $tyros_options['tyros_post_slider_cta_bool'] == 'yes' ) { do_action( 'tyros_callout_banner' ); } ?>

                    <?php if ( $tyros_options['tyros_cta_bool'] == 'yes' ) { do_action( 'tyros_cta_trio' ); } ?>

                    <?php do_action( 'tyros_free_widget_areas' ); ?>

                    <?php do_action( 'tyros_pro_widget_areas' ); ?>

                </div>

                <div class="col-sm-12">

                    <?php if ( isset( $tyros_options['tyros_frontpage_content_bool'] ) && $tyros_options['tyros_frontpage_content_bool'] == 'yes' ) : ?>

                        <?php if ( have_posts() ) : ?>

                            <?php if ( get_option( 'show_on_front' ) == 'posts' ) : ?>

                                <?php if ( $strap_check && ( $alternate_blog == 'masonry' || $alternate_blog == 'masonry2' ) ) : ?>

                                    <div id="tyros-alt-blog-wrap" class="<?php echo $alternate_blog == 'masonry2' && $strap_check ? 'masonry2' : ''; ?>">

                                        <div id="masonry-blog-wrapper">

                                            <div class="grid-sizer"></div>
                                            <div class="gutter-sizer"></div>

                                <?php elseif ( $alternate_blog == 'alternate' && $strap_check ) : ?>

                                    <div id="tyros-main-blog-wrap" class="row">

                                <?php else : ?>

                                    <div id="tyros-carousel-blog-wrap" class="owl-carousel owl-theme">

                                <?php endif; ?>

                            <?php endif; ?>

                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php

                                if ( 'posts' == get_option( 'show_on_front' ) ) {

                                    if ( $alternate_blog == 'masonry' && $strap_check ) {
                                        get_template_part('template-parts/content', 'posts-masonry' );
                                    } elseif ( $alternate_blog == 'masonry2' && $strap_check ) {
                                        get_template_part('template-parts/content', 'posts-masonry2' );
                                    } elseif ( $alternate_blog == 'alternate' && $strap_check ) {
                                        get_template_part('template-parts/content', 'posts-alt' );
                                    } else {
                                        get_template_part('template-parts/content', 'posts' );
                                    }

                                } else {

                                    get_template_part('template-parts/content', 'home');

                                }

                                ?>

                            <?php endwhile; // end of the loop.   ?>

                            <?php if ( get_option( 'show_on_front' ) == 'posts' ) : ?>

                                <?php if ( $strap_check && ( $alternate_blog == 'masonry' || $alternate_blog == 'masonry2' ) ) : ?>

                                        </div>

                                    </div>

                                <?php else : ?>

                                    </div>

                                    <div class="clear"></div>

                                <?php endif; ?>

                                <?php if ( $alternate_blog != 'carousel' && $strap_check ) : ?>

                                    <div class="pagination-links">
                                        <?php echo the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
                                    </div>

                                <?php endif; ?>

                            <?php endif; ?>

                        <?php else : ?>

                            <?php get_template_part('template-parts/content', 'none' ); ?>

                        <?php endif; ?>

                    <?php endif; ?>

                </div>


            </div>
            <div class="col-sm-12 fondo-blanco" align="center">
              <div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
            </div>
            <div class="col-sm-12 fondo-blanco" align="center">
              <div class="">
                <div class="row mb-2">
                     <div class="col-md-6">
                       <div class="card flex-md-row mb-4 box-shadow h-md-250">
                         <div class="card-body d-flex flex-column align-items-start">
                           <strong class="d-inline-block mb-2 text-primary">Dispositivos a base de:</strong>
                           <h3 class="mb-0">
                             <li>Vapor de sodio</li>
                             <li>Aditivo metalico</li>
                             <li>Flourescente</li>
                           </h3>
                           <ol class="list-group">
                             <li class="list-group-item">Alto consumo de energía eléctrica, <strong> desde 800W hasta 1000W</strong></li>
                             <li class="list-group-item">Alto costo económico</li>
                             <li class="list-group-item">Impacto ambiental</li>
                           </ol>
                         </div>
                         <img class="card-img-right  d-none d-lg-block" src="<?php bloginfo('template_url'); ?>/gente.jpg" alt="Card image cap">
                       </div>
                     </div>
                     <div class="col-md-6">
                       <div class="card flex-md-row mb-4 box-shadow h-md-250">
                         <div class="card-body d-flex flex-column align-items-start">
                           <strong class="d-inline-block mb-2 text-success">Design</strong>
                           <h3 class="mb-0">
                             <a class="text-dark" href="#">Post title</a>
                           </h3>
                           <div class="mb-1 text-muted">Nov 11</div>
                           <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                           <a href="#">Continue reading</a>
                         </div>
                         <img class="card-img-right d-none d-lg-block" src="<?php bloginfo('template_url'); ?>/gente.jpg" alt="Card image cap">
                       </div>
                     </div>
                   </div>
                 </div>
            </div>
            <div class="col-sm-12 fondo-blanco" align="center">
              <h1>Ubicación</h1>
              <h3 class="col-sm-12 camera-caption"><strong>NOVA ELECTRIC</strong> cuenta con dos unidades de negocio ubicadas en Pachuca y Tecámac, logrando abarcar los principales mercados tanto del estado de Hidalgo como del Estado de México.</h3>
              <div class="col-sm-6 fondo-blue wow flipInX"  data-wow-duration="2s" data-wow-delay="0.1s">
                <h3>Ubicación en Pachuca</h3>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d556.9288122078588!2d-98.727335909158!3d20.110858359834577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1a75e4584ed71%3A0x8a728b9190566c48!2sNova+Electric!5e0!3m2!1ses!2smx!4v1530492027864" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
              <div class="col-sm-6 fondo-blue wow flipInX"  data-wow-duration="2s" data-wow-delay="0.2s">
                <h3>Ubicación en Tecámac</h3>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3755.927584175504!2d-98.97481568566015!3d19.715706986724154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ed28b1112a85%3A0x8dbb9afc9151fe76!2sNova+El%C3%A9ctric!5e0!3m2!1ses!2smx!4v1530507709682" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
          </div>
            </div>

        </div>

    </main>

</div>

<?php get_footer();
