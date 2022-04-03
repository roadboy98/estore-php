<?php

/** E-Store Shop - Custom Currency Symbol */

/** Symbol changes based on currency */

add_filter( 'woocommerce_currencies', 'estore_add_my_currency' );

function estore_add_my_currency( $currencies ) {
     $currencies['ABC'] = __( 'Currency name', 'woocommerce' );
     return $currencies;
}

add_filter('woocommerce_currency_symbol', 'estore_add_my_currency_symbol', 10, 2);

function estore_add_my_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'ABC': $currency_symbol = '$'; break;
     }
     return $currency_symbol;
}

/** Changing 'Add To Cart' button text */
/** Single product page */
add_filter( 'woocommerce_product_single_add_to_cart_text', 'estore_add_to_cart_button_text_single');

function estore_add_to_cart_button_text_single () {
    return __( 'Add To Bag', 'woocommerce' );
}

/** Archive page / Shop page */
add_filter( 'woocommerce_product_add_to_cart_text', 'estore_add_to_cart_button_text_archives' );  

function estore_add_to_cart_button_text_archives() {
    return __( 'Add To Bag', 'woocommerce' );
}

/** Chaning sale / deal flash text */
add_filter('woocommerce_sale_flash', 'change_sale_text_e');

function change_sale_text_e() {
    return '<span class="onsale">DEAL!</span>';
}

/** Extra text added under product on archives page */
add_filter( 'woocommerce_get_price_html', 'estore_product_price_format', 10, 2 );

function estore_product_price_format( $price, $product ) {
    
    if ( $product->is_on_sale() ) {
       $price = sprintf( __( '<div class="was-now-save"><div class="was">WAS %1$s</div><div class="now">%2$s</div><div class="save">SAVE %3$s</div></div>', 'woocommerce' ), wc_price ( $product->get_regular_price() ), wc_price( $product->get_sale_price() ), wc_price( $product->get_regular_price() - $product->get_sale_price() )  );      
    }
     
    return $price;
 }