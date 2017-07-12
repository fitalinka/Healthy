<?php
class User{
public static function registr($name, $sourname, $mail, $passw){
$rezult_query = false;
$db = DB::getConection();//подключение к бд из класса ДБ(папка компонентов)
$sql = 'INSERT INTO user(name_user, sourname, mail, password) VALUES(:name,:sourname,:mail,:passw)';
$passw = md5($passw);
$rezult = $db->prepare($sql);//отправляет запрос в обработчик
$rezult->bindParam(':name',$name,PDO::PARAM_STR);//передаем параметры в запрос ..в метод
$rezult->bindParam(':sourname',$sourname,PDO::PARAM_STR);
$rezult->bindParam(':mail',$mail,PDO::PARAM_STR);
$rezult->bindParam(':passw',$passw,PDO::PARAM_STR);
$rezult->execute();//послали на выполнение запрос.
//PDO- зарезервировнный класс для работы с данными
$last_id = $db->lastInsertId();
$sql = "INSERT INTO personal_data(id_user) VALUES($last_id)";
return $db->query($sql);
}
public static function validName($name){

  if(strlen($name)>=3){
    return true;
  }
  return false;
}
public static function validSourn($sourname){
  if(strlen($sourname)>=3){
    return true;
  }
  return false;
}
public static function validMail($mail){

  if(filter_var($mail,FILTER_VALIDATE_EMAIL)){
    return true;
  }
  return false;
}
public static function repeatUser($mail){
  $db = DB::getConection();//подключение к бд из класса ДБ(папка компонентов)
  $sql = "SELECT COUNT(*) FROM user WHERE mail = :mail";
  $rezult = $db->prepare($sql);
  $rezult->bindParam(':mail',$mail,PDO::PARAM_STR);
  $rezult->execute();
if($rezult->fetchColumn()){
  return true;
}
return false;
}
public static function singin($mail,$passw){
  $db = DB::getConection();
  $sql = "SELECT * FROM user WHERE mail= :mail ";
  $rezult = $db->prepare($sql);
  $rezult->bindParam(':mail',$mail,PDO::PARAM_STR);
  $rezult->execute();
  $user =$rezult->fetch();//Выбрать строку из результата запроса
  if(md5($passw)==$user['password']){
    $_SESSION['user'] = $user['id_user'];
    return true;
  }
return false;
}
public static function getUserbyid($id){
  $db = DB::getConection();
  $sql = "SELECT * FROM user WHERE id_user= :id ";
  $rezult = $db->prepare($sql);
  $rezult->bindParam(':id',$id,PDO::PARAM_INT);
  $rezult->execute();
  return $rezult->fetch();
}
public static function getPersonalData($id){
  $db = DB::getConection();
  $sql = "SELECT u.name_user,u.sourname, d.age, d.weight, d.waist, d.neck, d.thighs , d.water, d.height, d.IMT, d.Norm_cal, d.jyr, d.proteins, d.sex, d.grease, d.ygl FROM user u JOIN personal_data d ON u.id_user = d.id_user WHERE u.id_user= $id ";
  $rezult = $db->query($sql);
  return $rezult->fetch();
}
public static function updatePersonalData($age,$weight,$waist,$neck, $thighs,$id, $height,$sex){
    $db = DB::getConection();
    $sql = 'UPDATE personal_data SET age = :age, weight = :weight, waist = :waist, neck = :neck, thighs = :thighs, height = :height, sex=:sex WHERE id_user = :id';
    $rezult = $db->prepare($sql);
    $rezult->bindParam(':age',$age,PDO::PARAM_INT);
    $rezult->bindParam(':weight',$weight);
    $rezult->bindParam(':waist',$waist);
    $rezult->bindParam(':neck',$neck);
    $rezult->bindParam(':thighs',$thighs);
    $rezult->bindParam(':id',$id,PDO::PARAM_INT);
    $rezult->bindParam(':height',$height);
    $rezult->bindParam(':sex',$sex,PDO::PARAM_INT);

    return $rezult->execute();
}
public static function getData($id,$weight,$waist,$neck,$thighs){
$db = DB::getConection();
if (self::isDataUser($id)) {
  $sql='UPDATE graphic SET weight = :weight, waist = :waist, neck = :neck, thigns = :thighs WHERE id_user = :id';
} else {
  $sql='INSERT INTO graphic(id_user, weight, waist, neck, thigns,data_g)VALUES(:id,:weight,:waist,:neck,:thighs, now())';
}

$rezult = $db->prepare($sql);//отправляет запрос в обработчик
$rezult->bindParam(':id',$id,PDO::PARAM_INT);//передаем параметры в запрос ..в метод
$rezult->bindParam(':weight',$weight);
$rezult->bindParam(':waist',$waist);
$rezult->bindParam(':neck',$neck);
$rezult->bindParam(':thighs',$thighs);
$rezult->execute();
}

public static function isDataUser($id_user) {
  $db = DB::getConection();
  $sql='SELECT COUNT(id_graphic) FROM graphic WHERE id_user = :id_user AND DATE(data_g) = DATE(now())';
  $rezult = $db->prepare($sql);//отправляет запрос в обработчик
  $rezult->bindParam(':id_user',$id_user,PDO::PARAM_INT);//передаем параметры в запрос ..в метод
  $rezult->execute();

  if($rezult->fetchColumn()){
    return true;
  }

  return false;
}
}
?>
