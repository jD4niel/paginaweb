<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$tyros_options = tyros_get_options();
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

get_header( 'shop' );

    /**
     * Hook: woocommerce_before_main_content.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * @hooked woocommerce_breadcrumb - 20
     * @hooked WC_Structured_Data::generate_website_data() - 30
     */
    do_action( 'woocommerce_before_main_content' );

    ?>

    <header class="woocommerce-products-header page-header">

        <div class="col-md-12">
        
            <div class="inner">

                <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                    
                    <h1 class="woocommerce-products-header__title">
                        <?php echo woocommerce_page_title( false ) ? woocommerce_page_title( false ) : __( 'Shop', 'tyros' ); ?>
                    </h1>
                    
                    <hr>
                
                    <?php woocommerce_breadcrumb(); ?>
                    
                <?php endif; ?>

                <?php
                /**
                 * Hook: woocommerce_archive_description.
                 *
                 * @hooked woocommerce_taxonomy_archive_description - 10
                 * @hooked woocommerce_product_archive_description - 10
                 */
                do_action( 'woocommerce_archive_description' );
                ?>
                        
            </div>
            
        </div>
        
        <div class="clear"></div>
        
    </header>

    <div id="tyros-shop-wrap">

        <?php if ( have_posts() ) {

            /**
             * Hook: woocommerce_before_shop_loop.
             *
             * @hooked wc_print_notices - 10
             * @hooked woocommerce_result_count - 20
             * @hooked woocommerce_catalog_ordering - 30
             */
            do_action( 'woocommerce_before_shop_loop' );

            woocommerce_product_loop_start();

                if ( wc_get_loop_prop( 'total' ) ) {

                    while ( have_posts() ) {

                        the_post();

                        /**
                         * Hook: woocommerce_shop_loop.
                         *
                         * @hooked WC_Structured_Data::generate_product_data() - 10
                         */
                        do_action( 'woocommerce_shop_loop' );

                        wc_get_template_part( 'content', 'product' );

                    }

                }

            woocommerce_product_loop_end();

            /**
             * Hook: woocommerce_after_shop_loop.
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action( 'woocommerce_after_shop_loop' );

        } else {
            
            /**
             * Hook: woocommerce_no_products_found.
             *
             * @hooked wc_no_products_found - 10
             */
            do_action( 'woocommerce_no_products_found' );
        } 
        
        ?>
        
    </div>
    
</div>

<?php if ( is_active_sidebar( 'sidebar-shop' ) && isset( $tyros_options['shop_sidebar_on_archive'] ) && $tyros_options['shop_sidebar_on_archive'] == 'on' ) : ?>

    <div class="col-md-4 tyros-sidebar shop-sidebar">

        <aside id="secondary" class="widget-area">
        
            <?php dynamic_sidebar( 'sidebar-shop' ); ?>

        </aside>
            
    </div>

<?php endif;

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );
