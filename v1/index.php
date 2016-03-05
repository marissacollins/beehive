<?php

require_once '../include/DBUtilQueries.php';
require_once '../include/DBBee.php';
require '.././libs/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

// User id from db - Global Variable
$user_id = NULL;

require_once dirname(__FILE__) . '/routebee.php';
require_once dirname(__FILE__) . '/routeutilqueries.php';
require_once dirname(__FILE__) . '/utils.php';

$app->run();
?>
