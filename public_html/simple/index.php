<?php
include __DIR__ . '/../custom.php';

// define the base directory of the current application
define('APP_ENV', APP_ENV_DEVELOPMENT);
define('APP_DIR', BASE_DIR . '/apps/simple');

$app = new Slim\Slim(array('mode' => APP_ENV));

// load configuration files
$app->configureMode(APP_ENV, function () use ($app) {
    $config = include APP_DIR . '/config/' . APP_ENV . '.php';
    $app->config($config);
});

// initialize the routers
$routers = glob(APP_DIR . '/routers/*.router.php');
foreach ($routers as $route) {
    include $route;
}
unset($route, $routers);

$app->run();
