<?php
namespace DatabaseManagers_space\Models;

/**
 *
 */
 use \Library\Application as app;
class UserManager_PDO extends \DatabaseManagers_space\Managers\UserManagers
{
  protected static $pdo;
  function __construct(\PDO $app)
  {
    self::$pdo=$app;
  }
  public static function UNIQ_(string $uniq)
  {
    $z=self::$pdo->query('SELECT * FROM Users WHERE userId = "'.$uniq.'" OR code="'.$uniq.'" OR email="'.$uniq.'"');
    return $z->fetch();

  }

  public static function UNIQ_VERIF(string $uniq)
  {
    $z=self::$pdo->query('SELECT * FROM userVerification WHERE userId = "'.$uniq.'" OR code="'.$uniq.'" OR email="'.$uniq.'"');
    return $z->fetch();

  }

  public static function UNIQ_IP(\Library\Postdata\Verification\Postdatas\Postdatas $uniq)
  {
    $z=self::$pdo->query('SELECT * FROM usersIps WHERE userId = "'.$uniq::USER_ID().'" OR ip="'.$uniq::IP().'" OR code="'.$uniq::CODE().'"');
    return $z->fetch();

  }

  public static function UNIQ_CHECK(string $uniq)
  {
    $z=self::$pdo->query('SELECT COUNT(*) FROM Users WHERE userId = "'.$uniq.'" OR code="'.$uniq.'" OR email="'.$uniq.'"');
    if ($z->fetchColumn()) {
      return 1;
    }else {
      return 0;
    }

  }

  public static function IP_CHECK(string $uniq)
  {
    $z=self::$pdo->query('SELECT COUNT(*) FROM usersIps WHERE ip = "'.$uniq.'"');
    if ($z->fetchColumn()) {
      return 1;
    }else {
      return 0;
    }

  }
  public static function LOGIN(\Library\Postdata\Verification\Postdatas\Postdatas $data)
  {
    $rq=self::UNIQ_($data::MAIL());
   if ($rq) {
     if ($rq['password12']==sha1($data::PASSWORD())) {
       $data::SET_ID($rq['userId']);
       return $data;
     }else {
       return false;
     }
   }
  }
  public static function ADD_USER_IP(\Library\Postdata\Verification\Postdatas\Postdatas $newInfo){
    if (self::IP_CHECK($newInfo::IP())) {
      self::USER_UPDATE_IP($newInfo);
    }else {
      $requete=self::$pdo->prepare('INSERT INTO usersIps SET userId=:iduser, code = :code, ip = :ip');
      $requete->bindValue(':iduser', $newInfo::USER_ID());
      $requete->bindValue(':ip', $newInfo::IP());
      $requete->bindValue(':code', $newInfo::CODE());
      $requete->execute();
    }


  }



  public static function ADD_USER(\Library\Postdata\Verification\Postdatas\Postdatas $newInfo)
  {
    $requete=self::$pdo->prepare('INSERT INTO Users SET userId=:iduser, name = :naira, avatar=:avat, email=:mail, gender=:ge, password12 = :gossa, code = :mois');
    $requete->bindValue(':naira', $newInfo::USERNAME());
    $requete->bindValue(':gossa', $newInfo::PASSWORD());
    $requete->bindValue(':mail', $newInfo::MAIL());
    $requete->bindValue(':mois', $newInfo::CODE());
    $requete->bindValue(':avat', $newInfo::PROFILE());
    $requete->bindValue(':iduser', $newInfo::USER_ID());
    $requete->bindValue(':ge', $newInfo::GENDER());
    $requete->execute();
  }

  public static function ADD_USER_PENDING(\Library\Postdata\Verification\Postdatas\Postdatas $newInfo)
  {
    $requete=self::$pdo->prepare('INSERT INTO userVerification SET userId=:iduser, email=:mail, code = :mois');
    $requete->bindValue(':mail', $newInfo::MAIL());
    $requete->bindValue(':mois', $newInfo::CODE());
    $requete->bindValue(':iduser', $newInfo::USER_ID());
    $requete->execute();
  }

  public static function USER_UPDATE_PANDING(\Library\Postdata\Verification\Postdatas\Postdatas $newInfo){
    $requete=self::$pdo->prepare('UPDATE userVerification SET code = :mois WHERE email=:mail OR userId = :id');
    $requete->bindValue(':mail', $newInfo::MAIL());
    $requete->bindValue(':mois', $newInfo::CODE());
    $requete->bindValue(':id', $newInfo::USER_ID());
    $requete->execute();

  }

  public static function USER_UPDATE_IP(\Library\Postdata\Verification\Postdatas\Postdatas $newInfo){
    $requete=self::$pdo->prepare('UPDATE usersIps SET ip = :ip, code = :code WHERE userId=:iduser OR ip = :ip');
    $requete->bindValue(':ip', $newInfo::IP());
    $requete->bindValue(':iduser', $newInfo::USER_ID());
    $requete->bindValue(':code', $newInfo::CODE());
    $requete->execute();

  }



  public static function USER_UPDATE_CODE(\Library\Postdata\Verification\Postdatas\Postdatas $newInfo){
    $requete=self::$pdo->prepare('UPDATE Users SET code = :code WHERE userId =:iduser');
    $requete->bindValue(':iduser', $newInfo::USER_ID());
    $requete->bindValue(':code', $newInfo::CODE());
    $requete->execute();




  }



  public static function USER_UPDATE(\Library\Details\UserDetails $newInfo)

  {
    $requete=self::$pdo->prepare('UPDATE Users SET name = :naira, avatar=:avat, email=:mail, gender=:ge, password12 = :gossa WHERE userId =:iduser');
    $requete->bindValue(':naira', $newInfo::USERNAME());
    $requete->bindValue(':gossa', $newInfo::PASSWORD());
    $requete->bindValue(':mail', $newInfo::MAIL());
    $requete->bindValue(':avat', $newInfo::PROFILE());
    $requete->bindValue(':iduser', $newInfo::USER_ID());
    $requete->bindValue(':ge', $newInfo::GENDER());

    $Data=array();
    $Data['data'][]="Upload file successfuly";
    return $Data;
  }


public static function CHECK_CODE($x)
{
  $z=self::$pdo->query('SELECT COUNT(*) FROM userVerification WHERE code="'.$x.'" OR email="'.$x.'" ');

  if ($z->fetchColumn()) {
    return 1;
  }else {
    return 0;
  }

}

  public static function COUNT()
  {
    return self::$pdo->query('SELECT COUNT(*) FROM Users')->fetchColumn();
  }
 public static function DELETE(string $x)
 {
     self::$pdo->query('DELETE FROM Users WHERE iduser ="'.$x.'"');
 }

 public static function DELETE_VERIF(string $x)
 {
     self::$pdo->query('DELETE FROM userVerification WHERE code ="'.$x.'" OR userId="'.$x.'" OR email="'.$x.'"');
 }


 public static function GET_LIST($start=-1, $end=-1)
 {
   $sql='SELECT * FROM Users';
   if ($start != -1 || $end != -1)
     {
       $sql.=' LIMIT '.(int) $end.' OFFSET '.(int) $start;
     }
      $requete=self::$pdo->query($sql);
      // $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,'Usr');
      // $list=$requete->fetchAll();
      // $requete->closeCursor();
      return $requete;
 }
}

 ?>
