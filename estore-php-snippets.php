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