<?php
namespace DatabaseManagers_space\Details;
/**
 *
 */
class User extends \DatabaseManagers_space\Entity
{
  protected static $userid;
  protected static $userCode;
  protected static $fullName;
  protected static $mail;
  protected static $profilePhoto;
  protected static $gender;
  protected static $password;
  public static function USER_ID(){return self::$userid;}
  private static function profUrl()
  {
    $x=explode(' ',self::$fullName);
    return implode("_",$x);
  }
  private static function stringCut($n)
 {
 $a=strlen(self::$fullName);
 $string=array();
 if ($a>$n) {
   $b=$n-3;
 for ($i=0; $i < $b; $i++) {
   $string[]=self::$fullName[$i];
 }
 $string[]="...";
 }else {
   $string[]=self::$fullName;
 }
 return join($string);
 }
  public static function CODE(){return self::$userCode;}
  public static function USERNAME($x=null){
    if (is_int($x)) {
      return self::stringCut($x);
    }elseif (is_string($x)) {
      return self::profUrl();
    }else{

      return self::$fullName;
    }
  }
  public static function SET_NAME(string $x){
    if ($x!="null") {
      self::$fullName=$x;
    }
  }
  public static function MAIL(){return self::$mail;}
  public static function PROFILE(){return self::$profilePhoto;}
  public static function GENDER(){return self::$gender;}
  public static function PASSWORD(){return self::$password;}

  public static function SET_MAIL(string $x){
    if ($x!="null") {
      self::$mail=$x;
    }
  }
  public static function SET_AVATAR(string $x){
    if ($x!="null") {
      self::$profilePhoto=$x;
    }
  }

  public static function SET_GENDER(string $x){
    if ($x!="null") {
    self::$gender=$x;
   }
  }
  public static function SET_CODE(string $x){
    if ($x!="null") {
    self::$userCode=$x;
  }
  }

  public static function SET_PASSWORD12(string $x){
    if ($x!="null") {
    self::$password=$x;
  }
  }

  function __construct(array $x=array(), $manager)
  {
    parent::__construct();
    self::$app=$this;
    self::$managers=$manager;
    self::SYNC($x);

  }
  public static function SYNC(array $x)
  {
    foreach ($x as $key=>$value) {
      $method = 'SET_'.strtoupper($key);
      if (is_callable(array(self::$app, $method))){
        self::$method($value);
      }
    }

  }

 public static function USER($d="")
 {
   $data=array();
   $data[$d."_name"]=self::$fullName;
   $data[$d."_code"]=self::$userCode;
   $data[$d."_userId"]=self::$userid;
   $data[$d."_id"]=self::$id;
   $data[$d."_mail"]=self::$mail;
   $data[$d."_profile"]=self::$profilePhoto;
   $data[$d."_gender"]=self::$gender;
   return $data;
 }
}

 ?>
