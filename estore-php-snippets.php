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
