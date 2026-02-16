<?php
require '../vendor/autoload.php';

use WebSocket\Client;

function sendWebSocket($data) {
    try {
        $client = new Client("ws://127.0.0.1:8080");
        $client->send(json_encode($data));
        $client->close();
    } catch(Exception $e) {
        error_log("WebSocket Error: ".$e->getMessage());
    }
}
