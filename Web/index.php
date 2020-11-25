<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use \DatabaseManagers_space\DatabaseManagers;
use \Library\Setup;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../.env');

$dataManager = new DatabaseManagers($_ENV['APP_PATH_MANAGERS'],$_ENV['APP_PATH_MODELS'],$_ENV['APP_PATH_ENTITY']);
$databaseManager = $dataManager::RUN();
$app = new Setup($_ENV['APP_CONFIG_SIDE'],$databaseManager);
$app::RUN();


 ?>
