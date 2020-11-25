<?php

 use \Library\Application as app;
 use \Library\BackController as component;
 use \Library\HTTP\HTTPRequest as Request;
 use \Library\Postdata\Verification\Postdatas as postdTa;
class LoginController extends component
{
  protected static $Index;

  function __construct(app $app, $module, $action){
    parent::__construct($app, $module, $action);
    self::$Index=$this;
  }



  public static function EXECUTE__404(Request $request)
  {
    self::$app::HTTP_RESPONSE()::REDIRECT_401();
  }




public static function EXECUTE_SIGNIN(Request $request)
{
  $device=strtoupper(self::$app::$device::TYPE());
  if (!is_callable(array(self::$Index, $device))) {
    throw new \RuntimeException('unknown device"'.$device.'"n\'est pas définie sur ce module');
  }else {
    self::$device();
  }
  self::HEADER();

  self::SET_VIEW('Login');

  if (!self::$app::USER()::HAS_FLASH() && !self::$app::USER()::IS_AUTH()) {

      if ($request::METHOD()=="POST") {
      $data=new postdTa\Postdatas($request::POST_());
      if((self::$user_Manager::LOGIN($data)) instanceof postdTa\Postdatas ){
        self::$app::USER()::SET_FALSH($data::USER_ID());
        self::$app::USER()::SET_AUTH();
        $url=$request::GET_DATA('redirect');
        if ($url) {
          self::$app::HTTP_RESPONSE()::REDIRECT($url);
        }else {
          self::$app::HTTP_RESPONSE()::REDIRECT(self::$app::$url);

        }
        self::$page::ADD_VAR('error1',"0");

      }else {
        self::$page::ADD_VAR('error1',"1");
      }

    }else {
      self::$page::ADD_VAR('error1',"2");

    }

  self::$page::ADD_VAR('page','login');
  self::$page::ADD_VAR('title','Login');
  }else {
    self::$app::HTTP_RESPONSE()::REDIRECT(self::$app::$url);
  }

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
