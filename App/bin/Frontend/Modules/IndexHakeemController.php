<?php

/**
 *
 */
 use \Library\Application as app;
 use \Library\BackController as component;
 use \TraitAddOn\AddOn\backcontroller as control;

  use \Library\HTTP\HTTPRequest as Request;
class IndexHakeemController extends component
{
  protected static $Index;
  use control;
  function __construct(app $app, $module, $action){
    parent::__construct($app, $module, $action);
    self::$Index=$this;
  }



  public static function EXECUTE__404(Request $request)
  {
    self::$app::HTTP_RESPONSE()::REDIRECT_401();
  }


  public static function EXECUTE_INDEX(Request $request)

  {
  $device=strtoupper(self::$app::$device::TYPE());
  if (!is_callable(array(self::$Index, $device))) {
    throw new \RuntimeException('unknown device"'.$device.'"n\'est pas définie sur ce module');
  }else {
    self::$device();
  }
  if (!self::$app::USER()::IS_AUTH()) {
  // code...
  }else {
      self::EXECUTE_AUTHO();
  }
  self::$page::ADD_VAR('title',$_ENV['APP_NAME']);
  self::HEADER();
  }
  private static function COMPUTER()
  {
  self::$page::ADD_VAR('deviceType','computer');
  }
  private static function MOBILE()
  {
  self::$page::ADD_VAR('deviceType','mobile');
  self::$page::ADD_VAR('display','none');

  }
  private static function TEBLET()
  {
  self::$page::ADD_VAR('deviceType','tablet');
  }
  public static function EXECUTE()
  {

   self::RUN_DEVICE(self::$Index);

  }


}


 ?>
