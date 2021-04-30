<?php

declare (strict_types=1);
/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SimpleCalendar\plugin_deps\Monolog\Handler;

use SimpleCalendar\plugin_deps\Monolog\Formatter\LineFormatter;
use SimpleCalendar\plugin_deps\Monolog\Formatter\FormatterInterface;
use SimpleCalendar\plugin_deps\Monolog\Logger;
/**
 * Sends the message to a Redis Pub/Sub channel using PUBLISH
 *
 * usage example:
 *
 *   $log = new Logger('application');
 *   $redis = new RedisPubSubHandler(new Predis\Client("tcp://localhost:6379"), "logs", Logger::WARNING);
 *   $log->pushHandler($redis);
 *
 * @author Gaëtan Faugère <gaetan@fauge.re>
 */
class RedisPubSubHandler extends \SimpleCalendar\plugin_deps\Monolog\Handler\AbstractProcessingHandler
{
    private $redisClient;
    private $channelKey;
    /**
     * @param \Predis\Client|\Redis $redis  The redis instance
     * @param string                $key    The channel key to publish records to
     * @param string|int            $level  The minimum logging level at which this handler will be triggered
     * @param bool                  $bubble Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($redis, string $key, $level = Logger::DEBUG, bool $bubble = \true)
    {
        if (!($redis instanceof \SimpleCalendar\plugin_deps\Predis\Client || $redis instanceof \Redis)) {
            throw new \InvalidArgumentException('Predis\\Client or Redis instance required');
        }
        $this->redisClient = $redis;
        $this->channelKey = $key;
        parent::__construct($level, $bubble);
    }
    /**
     * {@inheritDoc}
     */
    protected function write(array $record) : void
    {
        $this->redisClient->publish($this->channelKey, $record["formatted"]);
    }
    /**
     * {@inheritDoc}
     */
    protected function getDefaultFormatter() : FormatterInterface
    {
        return new LineFormatter();
    }
}
