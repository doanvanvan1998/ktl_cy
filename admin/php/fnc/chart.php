<?php

require('../../vendor/autoload.php');
function connect(){
    $app_id = '1481519';
    $app_key = 'a9deada75fce320953d2';
    $app_secret = '77bcb56af1c98b5e574b';
    $app_cluster = 'ap1';
    set_time_limit(500);

    $pusher = new Pusher\Pusher($app_key, $app_secret, $app_id, ['cluster' => $app_cluster]);
    try {
        while (true) {
            $pusher->trigger('cy_php-development', 'chart', [100, 100, 100]);
            sleep(1000);
        }
    }catch (Exception $e){
        connect();
    }
}
connect();

