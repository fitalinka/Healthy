<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Калькулятор калорий</title>
  <link href="/template/style/bootstrap.css" rel="stylesheet">
  <?php require_once(ROOT.'/view/layouts/link.php');?>
</head>
<body>
  <header>
    <h1 class=" text-center">Калькулятор калорий Healthy</h1>
    <?php require_once(ROOT.'/view/layouts/menu.php'); ?>
  </header>
<div class = "container-fluid">

  <div class = "row">
  <aside class = "col-md-1  col-xs-12">
  <?php require_once(ROOT.'/view/layouts/menua.php'); ?>
  </aside>
  <div class = "wrap col-md-10 col-xs-12 text-center">
    <?php if($rezult ==true):?>
      <p>Вы успешно зарегестрированы на сайте!</p>
    <?php else:?>
      <?php if(isset($errors) and is_array($errors)){
        echo "<ul>";
        foreach ($errors as $value) {
          echo"<li>$value</li>";
        }
        echo "</ul>";
      }?>
      <form  action ="#" method = "post" class = " forms"></br>
    <input type = "text" name = "username" required placeholder="Введите ваше имя" value = "<?php echo $name;?>"/></br>
    <input type = "text" name = "sourname" required placeholder="Введите вашу фамилию" value = "<?php echo $sourname;?>"/></br>
    <input type = "text" name = "mail" required placeholder="Введите ваш e-mail" value = "<?php echo $mail;?>"/></br>
    <input type = "password" name = "passw" required placeholder="Введите ваш пароль"/></br>
    <input type = "password" name = "rpassw" required placeholder="Повторите ваш пароль"/></br>
    <input type = "submit" name = "submit" value = "Зарегестрироваться"/>
  </form>

    <?php endif;?>

  </div>
</div>
</div>
  <footer>
  </footer>

</body>
</html>
