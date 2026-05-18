<?php

return [
    'class'   => 'yii\db\Connection',
    'dsn'     => 'mysql:host=' . ($_ENV['DB_HOST'] ?? 'localhost') . ';dbname=' . ($_ENV['DB_NAME'] ?? ''),
    'username' => $_ENV['DB_USER'] ?? '',
    'password' => $_ENV['DB_PASS'] ?? '',
    'charset' => 'utf8mb4',

    // Schema cache (habilitar en producción)
    //'enableSchemaCache'  => true,
    //'schemaCacheDuration' => 3600,
    //'schemaCache'        => 'cache',
];
