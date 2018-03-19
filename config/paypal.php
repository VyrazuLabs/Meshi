<?php
return array(
    /** set your paypal credential **/
    'client_id' => 'AZ3QbkV1kpFc0ITUN5uwojSj-nYQAXdsjNxpoEA03ctlO9QOfdUxw8Qr2e0wowRTNAuwvfNtW1xgs_cG',
    'secret' => 'EMnqSFUTAsFUgGpro8dfSEEq6s1BjDmSwqk3ORxanfGQVvDGainvP5l8dId38XeOB74s5xtDBG1qTeqQ',
    /**
    * SDK configuration 
    */
    'settings' => array(
    /**
    * Available option 'sandbox' or 'live'
    */
    'mode' => 'sandbox',
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