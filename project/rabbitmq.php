<?php

use Core\Helper\Queue;

include __DIR__ . '/core/bootstrap.php';

// Queue::listen(function($msg) {
//     echo " [x] Received: ", $msg->body, "\n";
// });

use PhpAmqpLib\Connection\AMQPStreamConnection;

// Create connection to RabbitMQ
$connection = new AMQPStreamConnection('singelo_rabbitmq', 5672, 'admin', 'admin');
$channel = $connection->channel();

// Declare the queue
$channel->queue_declare('singelo', false, true, false, false);

// Define a callback for consuming messages
$callback = function($msg) {
    echo ' [x] Received ', $msg->body, "\n";
};

// Consume messages from the queue
$channel->basic_consume('singelo', '', false, true, false, false, $callback);

// Keep listening for messages
while ($channel->is_consuming()) {
    $channel->wait();
}

// Close the channel and connection when done
$channel->close();
$connection->close();


echo "\nQueue listening finished\n";