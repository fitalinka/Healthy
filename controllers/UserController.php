<?php
class UserController{
  public function actionRegistr(){
    $name = '';
    $sourname ='';
    $mail = '';
    $passw = '';
    $rpassw = '';
    $rezult = false;
    if(isset($_POST['submit'])){
      $name = $_POST['username'];
      $sourname = $_POST['sourname'];
      $mail = $_POST['mail'];
      $passw = $_POST['passw'];
      $rpassw = $_POST['rpassw'];

      $errors= false;

      if($passw != $rpassw){
        $errors[] = "Пароли не совпадают!";
      }
      if(!User::validName($name)){
        $errors[] = "Имя не может состоять из 3 букв!" ;
      }
      if(!User::validSourn($sourname)){
        $errors[] = "Фамилия не может состоять из 3 букв!" ;
      }
      if(!User::validMail($mail)){
        $errors[] = "Не верный E-mail" ;
      }
      if(User::repeatUser($mail)){
        $errors[]=" Пользователь с таким  почтовым ящиком  уже существует";
      }
      if($errors==false){
        $rezult = User::registr($name,$sourname,$mail,$passw);
      }

    }
    require_once(ROOT.'/view/user/registr.php');
    return true;
  }
public  function actionAutorise(){

$mail = '';
$passw = '';
$rezult = false;//хранит двоичный результат запроса

if(isset($_POST['submit'])){
  $mail = $_POST['mail'];
  $passw = $_POST['passw'];
  $eror = false;
  if(!User::singin($mail,$passw)){
    $error[] = "Имя пользователя или пароль введены не верно!";
  }
  else{
    $rezult = true;
    $user = User::getUserbyid($_SESSION['user']);
  }
}
  require_once(ROOT.'/view/user/autorise.php');
  return true;
}
public  function actionPersonal_data(){
  $rez = User::getPersonalData($_SESSION['user']);

  //дописать запрос для отображения остальных данных
if(isset($_POST['submit'])){
  $age =$_POST['age'];
  $weight =$_POST['weight'];
  $waist =$_POST['waist'];
  $neck =$_POST['neck'];
  $thighs =$_POST['thighs'];
    $height =$_POST['height'];
    $sex= $_POST['myradio'];

  User::updatePersonalData($age,$weight,$waist,$neck, $thighs,$_SESSION['user'],$height,$sex);
  User::getData($_SESSION['user'],$weight,$waist,$neck,$thighs);
  Calculate:: wat($weight,$_SESSION['user']);
  Calculate:: imt($weight,$height,$_SESSION['user']);
  Calculate:: kall($weight,$height,$age,$_SESSION['user'],$sex);
  Calculate::jir($sex, $waist, $neck,$thighs,$height,$_SESSION['user']);
  Calculate::belok($_SESSION['user']);
  Calculate:: jiri($_SESSION['user']);
  Calculate:: yglev($_SESSION['user']);
$rez = User::getPersonalData($_SESSION['user']);
}

  require_once(ROOT.'/view/user/personal_data.php');
  return true;
}
public function actionGraphic(){
$rez = Graphic::getDataW($_SESSION['user']);
require_once(ROOT.'/view/user/graphic.php');
return true;
}

}
?>
