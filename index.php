<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/assets/scripts/session.php';

use App\Controller\CoreController;

require_once __DIR__ . '/Controller/CoreController.php';
$controller = new CoreController($_GET,  $_POST ?? null);
$controller->run();
