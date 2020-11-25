<?php
namespace DatabaseManagers_space\Managers;

/**
 *
 */
abstract class UserManagers extends \DatabaseManagers_space\Manager\Manager
{

  abstract public static function UNIQ_(string $uniq);
  abstract public static function UNIQ_CHECK(string $uniq);
  abstract public static function USER_UPDATE(\Library\Details\UserDetails $newInfo);
  abstract public static function COUNT();
  abstract public static function DELETE(string $x);
  abstract public static function GET_LIST($start=-1, $end=-1);
  abstract public static function LOGIN(\Library\Postdata\Verification\Postdatas\Postdatas $data);
  abstract public static function ADD_USER(\Library\Postdata\Verification\Postdatas\Postdatas $newInfo);


}


 ?>
