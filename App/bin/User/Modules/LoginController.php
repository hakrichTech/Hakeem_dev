<?php

 use \Library\Application as app;
 use \Library\BackController as component;
 use \Library\HTTP\HTTPRequest as Request;
 use \TraitAddOn\AddOn\backcontroller as control;
 use \Facebook\Facebook as FB;
 use \Library\Postdata\Verification\Postdatas as postdTa;
class LoginController extends component
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

  if (self::$app::USER()::CHECK('id')) {
      self::$app::HTTP_RESPONSE()::REDIRECT(self::$app::$url);
  }else {

    if ($request::METHOD()=="POST") {
    $data=new postdTa\Postdatas($request::POST_());
    if ($request::GET_EXISTS('code')) {

      if (self::$managers_list['User']::UNIQ_CHECK(self::$app::USER()::GET('id'))) {
        self::$app::HTTP_RESPONSE()::REDIRECT(self::$app::$url);

      }else {
        if (self::$managers_list['User']::FB($data,self::$app::USER())) {
         // $url=$request::GET_DATA('redirect2');
         self::$app::USER()::SET('auth',true);
          // if ($url) {
          //   self::$app::HTTP_RESPONSE()::REDIRECT($url);
          // }else {
            self::$app::HTTP_RESPONSE()::REDIRECT(self::$app::$url);

          // }
        }
      }

    }else {
      $DATA=self::$managers_list['User']::LOGIN($data);
      if($DATA instanceof postdTa\Postdatas ){

        $user::SET('user_image',$DATA::PROFILE());
         $user::SET('id',$DATA::USER_ID());
         $user::SET('user_name',$DATA::USERNAME());
         $user::SET('user_email',$DATA::MAIL());
      // $url=$request::GET_DATA('redirect2');
      // if ($url) {
      //   self::$app::HTTP_RESPONSE()::REDIRECT($url);
      // }else {
        header('location:/');

      // }
      self::$page::ADD_VAR('error1',"0");

    }else {
      self::$app::HTTP_RESPONSE()::REDIRECT(self::$app::$url."login");


    }
    }


    }else {

      self::$page::ADD_VAR('error1',"2");
      self::EXECUTE_FACEBOOK($request);




    }

  }

}







private static function LOGIN_FB($facebook_helper,$facebook,$user)
{
  if ($user::CHECK('access_token')) {
     $access_token = $user::GET('access_token');
  }else {
    $access_token = $facebook_helper->getAccessToken();
    $user::SET('access_token',$access_token);
    $facebook->setDefaultAccessToken($user::GET('access_token'));
  }
  $facebook_response = $facebook->get("/me?fields=name,email", $access_token);
  $facebook_user_info = $facebook_response->getGraphUser();

  if (!empty($facebook_user_info['id'])) {
    if (self::$managers_list['User']::UNIQ_CHECK($facebook_user_info['id'])) {
      $user::SET('user_image','http://graph.facebook.com/'.$facebook_user_info['id'].'/picture');
       $user::SET('id',$facebook_user_info['id']);
       $user::SET('user_name',$facebook_user_info['name']);
       $user::SET('user_email',$facebook_user_info['email']);
      $url=$request::GET_DATA('redirect');
       if ($url) {
         self::$app::HTTP_RESPONSE()::REDIRECT($url);
       }else {
         self::$app::HTTP_RESPONSE()::REDIRECT(self::$app::$url);
       }
    }else {
        $user::SET('id',$facebook_user_info['id']);
        $user::SET('user_image','http://graph.facebook.com/'.$facebook_user_info['id'].'/picture');
        self::$page::ADD_VAR('user_image','http://graph.facebook.com/'.$facebook_user_info['id'].'/picture');
      if (!empty($facebook_user_info['name'])) {
      $user::SET('user_name',$facebook_user_info['name']);
      self::$page::ADD_VAR('user_name',$facebook_user_info['name']);
      }
      if (!empty($facebook_user_info['email'])) {
      $user::SET('user_email',$facebook_user_info['email']);
      self::$page::ADD_VAR('user_email',$facebook_user_info['email']);
      }else {
        self::$page::ADD_VAR('mailInput',`
        <input type="email" id="emailAddress_L" name="email" required autocomplete="off"  value="" placeholder="Email"><br><br>
        `);

      }
    }
  }

}


public static function EXECUTE_FACEBOOK( Request $request)
{
  $user = self::$app::USER();
  $facebook = new FB([
    'app_id' =>$_ENV['APP_FB_APP_ID'],
    'app_secret' => $_ENV['APP_FB_APP_SECRET'],
    'graph_api_version' => $_ENV['APP_FB_GRAPH_API_VERSION']
  ]);

  $facebook_output = "";
  $facebook_helper = $facebook->getRedirectLoginHelper();
  if ($request::GET_EXISTS('code')) {

    self::LOGIN_FB($facebook_helper,$facebook,$user);
    self::$page::ADD_VAR('page','facebook');
    self::$page::ADD_VAR('title','Login');


  }else {
    $permission = ['email'];
    $facebook_login_url = $facebook_helper->getLoginUrl($_ENV['APP_FB_REDIRECT_URI'],$permission);
    self::$page::ADD_VAR('facebook_login_url',$facebook_login_url);
    self::$page::ADD_VAR('page','login');
    self::$page::ADD_VAR('title','Login');


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
