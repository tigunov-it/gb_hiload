<?php
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


require dirname(__DIR__) . '/vendor/autoload.php';

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('burger', false, false, false, false);

$msg = new AMQPMessage('Give me the Burger!');
$channel->basic_publish($msg, '', 'burger');

echo " [x] Burger ordered!'\n";

$channel->close();
$connection->close();
