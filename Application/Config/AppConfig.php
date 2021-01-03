<?php
namespace Config;

/**
 *
 */
final class AppConfig extends \Library\Config\AppConfig
{

  function __construct()
  {
    self::SET_APP(array(

       'host'=>'localhost',
       'host_user'=>"root",
       'host_user_pass'=>"",


       /**
        * here i set database as Kyetebiingi
        * username as hakeem
        * password as bi@+pa1
        */


      'db_name'=>$_ENV['APP_NAME'],
       $_ENV['APP_NAME'].'_user'=>"root",
       $_ENV['APP_NAME'].'_user_pass'=>''
    ));
  }

 public static function RUN()
 {
   self::CREATE_DB();
   self::CREATE_TABLE(array(
     'Path'=>"
       id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       path VARCHAR(255) NOT NULL,
       module VARCHAR(35) NOT NULL,
       action VARCHAR(55),
       var VARCHAR(55),
       value VARCHAR(55)
     "
   ));
   self::INSERT_TABLE(array(
     'Path'=>[

       /**
       * with this syntax i will create a tutor
       */
       // 'path'=>"\"http://example.com/en/Who-we-are\",",
       // 'module'=>"\"IndexHakeem\",",
       // 'action'=>"\"who\",",
       // 'var'=>"\"none\",",
       // 'value'=>"\"none\""
       ]
   ));
 }

}



 ?>
