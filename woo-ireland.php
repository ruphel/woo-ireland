<?php
/**
 * @package Woocommerce Ireland
 * @version 1.0
 */
/*
Plugin Name: Woocommerce Ireland
Description: This a simple plugin that adds the Irish Counties and alters the address fourms.
Author: Ruairi Phelan
Version: 1.0
Author URI: http://cyberdesigncraft.com/about/
 *
 * 
 **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {


function  wc_irish_counties_add_counties( $states ) {

    $states['IE'] = array(
                            'ANT' => 'Northern Ireland / County Antrim',
                            'ARM' => 'Northern Ireland / County Armagh',
                            'CW'  => 'County Carlow',
                            'CN'  => 'County Cavan',
                            'CE'  => 'County Clare',
                            'CK'  => 'County Cork',
                            'LDY' => 'Northen Ireland / County Londonderry',
                            'DL'  => 'County Donegal',
                            'DOW' => 'Northen Ireland / County Down',
                            'DN'  => 'County Dublin',
                            'FER' => 'Northen Ireland / County Fermanagh',
                            'GY'  => 'County Galway',
                            'KY'  => 'County Kerry',
                            'KE'  => 'County Kildare',
                            'KK'  => 'County Kilkenny',
                            'LS'  => 'County Laois',
                            'LE'  => 'County Leitrim',
                            'LK'  => 'County Limerick',
                            'LG'  => 'County Longford',
                            'LH'  => 'County Louth',
                            'MO'  => 'County Mayo',
                            'MH'  => 'County Meath',
                            'MN'  => 'County Monaghan',
                            'OY'  => 'County Offaly',
                            'RS'  => 'County Roscommon',
                            'SO'  => 'County Sligo',
                            'TP'  => 'CountyTipperary',
                            'TYR' => 'Northen Ireland / County Tyrone',
                            'WT'  => 'County Waterford',
                            'WM'  => 'County Westmeath',
                            'WX'  => 'County Wexford',
                            'WW'  => 'County Wicklow'
                            
                           );
    return $states;

}

add_filter( 'woocommerce_states', 'wc_irish_counties_add_counties' );

// Hook to Override Address line one
add_filter( 'woocommerce_checkout_fields' , 'phs_override_add_1_fields' );

// Our hooked in function - $fields is passed via the filter!
function phs_override_add_1_fields( $fields ) {
     $fields['billing']['billing_address_1']['placeholder'] = ' Property Name or Number';
     $fields['billing']['billing_address_1']['label'] = 'Address One';
     return $fields;
}

// Hook to Override and require Address line two
add_filter( 'woocommerce_checkout_fields' , 'phs_override_add_2_fields' );

// Our hooked in function - $fields is passed via the filter!
function phs_override_add_2_fields( $fields ) {
     $fields['billing']['billing_address_2']['placeholder'] = ' Street Name';
     $fields['billing']['billing_address_2']['label'] = 'Address Two';
     $fields['billing']['billing_address_2']['required'] = true;
     return $fields;
}
// Hook  to Override State/Country
add_filter( 'woocommerce_checkout_fields' , 'phs_override_county_fields' );

// Our hooked in function - $fields is passed via the filter!
function phs_override_county_fields( $fields ) {
     $fields['billing']['billing_state']['placeholder'] = ' e.g Co. Galway';
     $fields['billing']['billing_state']['label'] = 'County';
     return $fields;
}

// Hook to Override Postcode
add_filter( 'woocommerce_checkout_fields' , 'phs_override_postcode_fields' );

// Our hooked in function - $fields is passed via the filter!
function phs_override_postcode_fields( $fields ) {
     $fields['billing']['billing_postcode']['placeholder'] = ' e.g None';
     $fields['billing']['billing_postcode']['label'] = 'Postcode';
     return $fields;
}

// Hook to Override Postcode
add_filter( 'woocommerce_checkout_fields' , 'phs_override_phone_fields' );

// Our hooked in function - $fields is passed via the filter!
function phs_override_phone_fields( $fields ) {
     $fields['billing']['billing_phone']['placeholder'] = ' Incld Local Code';
     $fields['billing']['billing_phone']['label'] = 'Phone';
     return $fields;
}



// Hook to Override Address line one
add_filter( 'woocommerce_checkout_fields' , 'phs_override_add_1_shipping_fields' );

// Our hooked in function - $fields is passed via the filter!
function phs_override_add_1_shipping_fields( $fields ) {
     $fields['shipping']['shipping_address_1']['placeholder'] = ' Property Name or Number';
     $fields['shipping']['shipping_address_1']['label'] = 'Address One';
     return $fields;
}

// Hook to Override and require Address line two
add_filter( 'woocommerce_checkout_fields' , 'phs_override_add_2_shipping_fields' );

// Our hooked in function - $fields is passed via the filter!
function phs_override_add_2_shipping_fields( $fields ) {
     $fields['shipping']['shipping_address_2']['placeholder'] = ' Street Name';
     $fields['shipping']['shipping_address_2']['label'] = 'Address Two';
     $fields['shipping']['shipping_address_2']['required'] = true;
     return $fields;
}
// Hook  to Override State/Country
add_filter( 'woocommerce_checkout_fields' , 'phs_override_county_shipping_fields' );

// Our hooked in function - $fields is passed via the filter!
function phs_override_county_shipping_fields( $fields ) {
     $fields['shipping']['shipping_state']['placeholder'] = ' e.g Co. Galway';
     $fields['shipping']['shipping_state']['label'] = 'County';
     return $fields;
}

// Hook to Override Postcode
add_filter( 'woocommerce_checkout_fields' , 'phs_override_postcode_shipping_fields' );

// Our hooked in function - $fields is passed via the filter!
function phs_override_postcode_shipping_fields( $fields ) {
     $fields['shipping']['shipping_postcode']['placeholder'] = ' e.g None';
     $fields['shipping']['shipping_postcode']['label'] = 'Postcode';
     return $fields;
}

// Hook to Override Postcode
add_filter( 'woocommerce_checkout_fields' , 'phs_override_phone_shipping_fields' );

// Our hooked in function - $fields is passed via the filter!
function phs_override_phone_shipping_fields( $fields ) {
     $fields['shipping']['shipping_phone']['placeholder'] = ' Incld Local Code';
     $fields['shipping']['shipping_phone']['label'] = 'Phone';
     return $fields;
}

} // end check