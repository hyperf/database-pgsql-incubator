<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Hyperf\Database\PgSQL\Listener;

use Hyperf\Database\ConnectionManager;
use Hyperf\Database\PgSQL\Connectors\PostgresConnector;
use Hyperf\Database\PgSQL\Connectors\PostgresSqlSwooleExtConnector;
use Hyperf\Database\PgSQL\PostgreSqlConnection;
use Hyperf\Database\PgSQL\PostgreSqlSwooleExtConnection;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Framework\Event\BootApplication;

class RegisterConnectionListener implements ListenerInterface
{
    /**
     * @var ConnectionManager
     */
    protected $connectionManager;

    public function __construct(ConnectionManager $connectionManager)
    {
        $this->connectionManager = $connectionManager;
    }

    public function listen(): array
    {
        return [
            BootApplication::class,
        ];
    }

    /**
     * register pgsql and pgsql-swoole need Connector and Connection
     * @param object $event
     */
    public function process(object $event)
    {
        $this->connectionManager->register('pgsql', [
            'connector' => PostgresConnector::class,
            'connection' => PostgreSqlConnection::class,
        ]);

        $this->connectionManager->register('pgsql-swoole', [
            'connector' => PostgresSqlSwooleExtConnector::class,
            'connection' => PostgreSqlSwooleExtConnection::class,
        ]);
    }
}
