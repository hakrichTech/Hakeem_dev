<?php
namespace TraitAddOn\AddOn;

/**
 *
 */
use \HTML\Html as HT;
use \DatabaseManagers_space\Details as DataAnalyse;

trait backcontroller
{

  public static function EXECUTE_AUTHO()
  {
    self::$page::ADD_VAR('auth','true');
  }


}




 ?>
