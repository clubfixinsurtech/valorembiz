<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';


$token = '';
if (!$token && is_readable(__DIR__ . '/config.php')) {
    $config = include __DIR__ . '/config.php';
    $token = $config['token'];
}

return new \ValoremBiz\ValoremBizConnector(token: $token);
