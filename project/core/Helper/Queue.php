<?php

namespace Core\Helper;

use Core\Exceptions\SingeloException;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class Queue
{
    const DEFAULT_QUEUE = 'singelo';
    private ?AMQPStreamConnection $connection = null;
    private $channel = null;

    public static function put(string $content, string $queue_name = Queue::DEFAULT_QUEUE):void
    {
        $queue = new static();
        $queue->openChannel();
        $queue->publish($content, $queue_name);
        $queue->closeChannel();
    }

    public static function listen(callable $callback, string $queue_name = Queue::DEFAULT_QUEUE)
    {
        $queue = new static();
        $queue->openChannel();

        $queue->channel->basic_consume($queue_name, '', false, false, false, false, $callback);
        // $queue->channel->consume();
        // Keep listening for messages
        // while ($queue->channel->is_consuming()) {
        //     $queue->channel->wait();
        // }

        $queue->closeChannel();
    }

    private function publish(string $content, string $queue_name = Queue::DEFAULT_QUEUE): void
    {
        

        $msg = new AMQPMessage($content);
        $this->channel->basic_publish($msg, '', $queue_name);
    }

    private function openChannel()
    {
        $env = Env::get();
        
        if(
            !key_exists('RABBITMQ_HOST', $env) 
            || !key_exists('RABBITMQ_PORT', $env) 
            || !key_exists('RABBITMQ_USER', $env) 
            || !key_exists('RABBITMQ_PASSWORD', $env) 
        ) {
            throw new SingeloException("RabbitMQ params not found in .env");
        }

        $this->connection = new AMQPStreamConnection(
            $env['RABBITMQ_HOST'], $env['RABBITMQ_PORT'],
            $env['RABBITMQ_USER'], $env['RABBITMQ_PASSWORD']
        );

        $this->channel = $this->connection->channel();
        $this->channel->queue_declare($queue_name, false, false, false, false);
    }

    private function closeChannel()
    {
        $this->channel->close();
        $this->connection->close();
    }
}