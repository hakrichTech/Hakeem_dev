<?php
require_once __DIR__.'/../vendor/autoload.php';


use Symfony\Component\Dotenv\Dotenv;
use \DatabaseManagers_space\DatabaseManagers;
use \Library\Setup;
use \HTML\html;
use \TraitAddOn\TraitManager;
use \Config\AppConfig;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../.env');
$html_file_load = new html($_ENV['APP_CONFIG_HTML_URL']);
$load = $html_file_load::RUN();

$addon = new TraitManager($_ENV['APP_CONFIG_TRAIT_URL']);
$load2 = $addon::RUN();

if ($load && $load2) {
  $dataManager = new DatabaseManagers($_ENV['APP_PATH_MANAGERS'],$_ENV['APP_PATH_MODELS'],$_ENV['APP_PATH_ENTITY']);
  $databaseManager = $dataManager::RUN();
  if ($dataManager !== 0) {
    if ($_ENV['APP_CONFIG_SIDE'] !== "User") {
      $_ENV['APP_CONFIG_SIDE'] = "User";
    }
    $conf = new AppConfig();
    $conf::RUN();
    $app = new Setup($_ENV['APP_CONFIG_SIDE'],$dataManager);
    $app::RUN();
  }else {
    print($databaseManager);
  }

}else {
  echo "error";
}


 ?>
