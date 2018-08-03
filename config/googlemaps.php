<?php
return [
    /* =====================================================================
    |                                                                       |
    |                  Global Settings For Google Map                       |
    |                                                                       |
    ===================================================================== */



    /* =====================================================================
    General
    ===================================================================== */
    'key' => env('GOOGLE_MAPS_API_KEY', 'AIzaSyCICVFZg9PawAeVO5oH_BRdE7IEu93eG8E'), //Get API key: https://code.google.com/apis/console
    //'key' => 'AIzaSyCy-7JgB3ZIAh583S1x2fJYWQvEfy7Ktf0', //Get API key: https://code.google.com/apis/console
    'adsense_publisher_id' => env('GOOGLE_ADSENSE_PUBLISHER_ID', ''), //Google AdSense publisher ID

    'geocode' => [
        'cache' => false, //Geocode caching into database
        'table_name' => 'gmaps_geocache', //Geocode caching database table name
    ],

    'css_class' => '', //Your custom css class

    'http_proxy' => env('HTTP_PROXY', null), // Proxy host and port
];