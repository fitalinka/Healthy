<?php
class Db{
  public static function getConection(){
    $paramFile = ROOT.'/config/db_param.php';
    $param = include($paramFile);
    $db = new PDO("mysql:host={$param['host']};dbname={$param['dbname']}",$param['user'],$param['password'],[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    $db->exec("set names utf8");
    return $db;
  }
}
?>
