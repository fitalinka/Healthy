<?php
class Graphic{
  public static function getDataW($id){
    $db = DB::getConection();
    $sql = "SELECT weight, data_g FROM graphic  WHERE id_user= :id ";
    $rezult = $db->prepare($sql);
    $rezult->bindParam(':id',$id,PDO::PARAM_INT);
    $rezult->execute();

    $array_userdata = array();
    $i = 0;
    while ($row = $rezult->fetch()) {
      $array_userdata[$i]['weight'] = $row['weight'];
      $array_userdata[$i]['data_g'] = $row['data_g'];
      $i++;
    }

    return $array_userdata;
  }
}
 ?>
