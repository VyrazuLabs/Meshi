<?php
return array(
    /** set your paypal credential **/
    'client_id' => 'ATo3-V52yDqwvlXloPTLQvNCLa51iGNBp4U9PBBngscps-6LC_ZJhrbXgaJxguruMipx8Se1MOQVoGkT',
    'secret' => 'ENZV-aBGfbsDQk8wWwO3PTKCc5jwuRQEO6Y2WdOXcLH8PeJUZkmAQp3yixEOmtsge4v18YE5QxP9e0WD',
    /**
    * SDK configuration 
    */
    'settings' => array(
    /**
    * Available option 'sandbox' or 'live'
    */
    'mode' => 'live',
    /**
    * Specify the max request time in seconds
    */
    'http.ConnectionTimeOut' => 1000,
    /**
    * Whether want to log to a file
    */
    'log.LogEnabled' => true,
    /**
    * Specify the file that want to write on
    */
    'log.FileName' => storage_path() . '/logs/paypal.log',
    /**
    * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
    *
    * Logging is most verbose in the 'FINE' level and decreases as you
    * proceed towards ERROR
    */
    'log.LogLevel' => 'FINE'
    ),
);

?>