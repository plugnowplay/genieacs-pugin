<?php
// plugins/genieacs/functions.php

$GENIEACS_URL = 'http://103.181.142.162:7557';

function getDeviceInfo($serial) {
    global $GENIEACS_URL;
    $url = $GENIEACS_URL . '/devices/' . urlencode($serial);
    $response = @file_get_contents($url);

    if ($response === FALSE) {
        return ['error' => 'Gagal mengambil data perangkat.'];
    }

    return json_decode($response, true);
}

function rebootDevice($serial) {
    global $GENIEACS_URL;
    $url = $GENIEACS_URL . '/devices/' . urlencode($serial) . '/tasks';
    $data = ['name' => 'Reboot'];
    $options = [
        'http' => [
            'header'  => "Content-Type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data),
        ],
    ];
    $context = stream_context_create($options);
    return file_get_contents($url, false, $context);
}
