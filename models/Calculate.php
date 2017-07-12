
<?php
class Calculate{
  public static function wat($weight,$id){
    $db = DB::getConection();
    $water=1;
    $water = $weight*30/1000;
    $sql = 'UPDATE personal_data SET water = :water WHERE id_user = :id';
    $rezult = $db->prepare($sql);
    $rezult->bindParam(':water',$water);
    $rezult->bindParam(':id',$id,PDO::PARAM_INT);
    return $rezult->execute();
  }
  public static function imt($weight,$height,$id){
    $db = DB::getConection();
    $imt=1;
    $imt = ($weight/pow($height,2))* 10000;
    $sql = 'UPDATE personal_data SET IMT = :imt WHERE id_user = :id';
    $rezult = $db->prepare($sql);
    $rezult->bindParam(':imt',$imt);
    $rezult->bindParam(':id',$id,PDO::PARAM_INT);
    return $rezult->execute();

  }
public static function kall($weight,$height,$age,$id,$sex){
  $db = DB::getConection();
  if($sex == 1){
    $norm_kal = 1;
    $norm_kal = (9.99 * $weight)+(6.25*$height)-(4.92* $age) - 161;
  }
  else{
    $norm_kal = 1;
    $norm_kal = (9.99 * $weight)+(6.25*$height)-(4.92* $age) +5;
  }
  $sql = 'UPDATE personal_data SET Norm_cal = :norm_cal WHERE id_user = :id';
  $rezult = $db->prepare($sql);
  $rezult->bindParam(':norm_cal',$norm_kal);
  $rezult->bindParam(':id',$id,PDO::PARAM_INT);
  return $rezult->execute();

}
public static function jir($sex, $waist, $neck,$thighs,$height,$id){
  $db = DB::getConection();
  if($sex==1){
    //$jyr = ((495/(1.29579-0.35004*(log($waist+$thighs - $neck))+((0.22100*(log($height)))))- 450));
    $jyr = 495/(1.29579-0.35004*(log($waist+$thighs - $neck))+0.22100*(log($height)))-450;
  }
  else{
    $jyr=(495/(1.0324-0.19077*(log($waist - $neck))+0.15456*(log($height))))-450;
  }
  $sql = 'UPDATE personal_data SET jyr = :jyr WHERE id_user = :id';
  $rezult = $db->prepare($sql);
  $rezult->bindParam(':jyr',$jyr);
  $rezult->bindParam(':id',$id,PDO::PARAM_INT);
  return $rezult->execute();
}
public static function belok($id){
  $db = DB::getConection();
  $temp= User::getPersonalData($id);

  $protein = 1;
  $protein = ($temp['Norm_cal']/6)/4;
  $sql = 'UPDATE personal_data SET proteins = :proteins WHERE id_user = :id';
  $rezult = $db->prepare($sql);
  $rezult->bindParam(':proteins',$protein);
  $rezult->bindParam(':id',$id,PDO::PARAM_INT);
  return $rezult->execute();
}
public static function jiri($id){
  $db = DB::getConection();
  $temp= User::getPersonalData($id);

  $jiri = 1;
  $jiri = ($temp['Norm_cal']/6)/9;
  $sql = 'UPDATE personal_data SET grease = :jiri WHERE id_user = :id';
  $rezult = $db->prepare($sql);
  $rezult->bindParam(':jiri',$jiri);
  $rezult->bindParam(':id',$id,PDO::PARAM_INT);
  return $rezult->execute();
}
public static function yglev($id){
  $db = DB::getConection();
  $temp= User::getPersonalData($id);
$ygl1 =($temp['Norm_cal']/6);

  $ygl = ($temp['Norm_cal']-($ygl1*2))/4;
  $sql = 'UPDATE personal_data SET ygl = :ygl WHERE id_user = :id';
  $rezult = $db->prepare($sql);
  $rezult->bindParam(':ygl',$ygl);
  $rezult->bindParam(':id',$id,PDO::PARAM_INT);
  return $rezult->execute();
}
}
 ?>
