# PgSQL driver for Hyperf Database Component

## 安装

> hyperf/database 组件版本必须大于等于 v2.2

```
composer require hyperf/database-pgsql-incubator
```

## 配置

修改 `autoload/database.php` 配置

```php
<?php

return [
        'pgsql' => [
        'driver' => 'pgsql',
        'host' => '127.0.0.1',
        'database' => 'hyperf',
        'port' => 5435,
        'username' => 'postgres',
        'password' => "",
        'charset' => env('DB_CHARSET', 'utf8'),
        'collation' => env('DB_COLLATION', 'utf8_unicode_ci'),
        'prefix' => '',
        'schema' => 'public',
        'pool' => [
            'min_connections' => 1,
            'max_connections' => 10,
            'connect_timeout' => 10.0,
            'wait_timeout' => 3.0,
            'heartbeat' => -1,
            'max_idle_time' => (float) env('DB_MAX_IDLE_TIME', 60),
        ],
        'commands' => [
            'gen:model' => [
                'path' => 'app/Model',
                'force_casts' => false,
                'inheritance' => 'Model',
                'refresh_fillable' => true
            ],
        ],
    ],
    'pgsql-swoole' => [
        'driver' => 'pgsql-swoole',
        'host' => '127.0.0.1',
        'database' => 'hyperf',
        'port' => 5435,
        'username' => 'postgres',
        'password' => "",
        'charset' => env('DB_CHARSET', 'utf8'),
        'collation' => env('DB_COLLATION', 'utf8_unicode_ci'),
        'prefix' => '',
        'schema' => 'public',
        'pool' => [
            'min_connections' => 1,
            'max_connections' => 10,
            'connect_timeout' => 10.0,
            'wait_timeout' => 3.0,
            'heartbeat' => -1,
            'max_idle_time' => (float) env('DB_MAX_IDLE_TIME', 60),
        ],
        'commands' => [
            'gen:model' => [
                'path' => 'app/Model',
                'force_casts' => false,
                'inheritance' => 'Model',
                'refresh_fillable' => true
            ],
        ],
    ],
];

```

## 使用

目前增删改查orm，支持了pdo_pgsql和swoole/ext-postgresql双支持，由driver区分。迁移功能目前仅支持pdo，请注意配置和你的驱动是否安装