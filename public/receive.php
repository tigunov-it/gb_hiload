<?php
use PhpAmqpLib\Connection\AMQPStreamConnection;

require dirname(__DIR__) . '/vendor/autoload.php';

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('burger', false, false, false, false);

echo " [*] Waiting for messages. To exit press CTRL+C\n";

$callback = function ($msg) {
    echo ' [x] Order Received ', $msg->body, "\n";
};

$channel->basic_consume('burger', '', false, true, false, false, $callback);

while ($channel->is_open()) {
    $channel->wait();
}

