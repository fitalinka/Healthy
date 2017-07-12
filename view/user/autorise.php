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
    <p>Добро пожаловать, <?php echo $user['name_user'];?></p>
  <?php else:?>
    <?php if(isset($error) and is_array($error)){
      echo "<ul>";
      foreach ($error as $value) {
        echo"<li>$value</li>";
      }
      echo "</ul>";
    }?>
<form method="post" action="#"><br>
  <input type="text" name="mail" required placeholder="Введите свой e-mail"/><br>
  <input type = "password" name = "passw" required placeholder="Введите пароль"/><br>
  <input type = "checkbox" name = "remember" />Запомнить меня?<br>
  <input type = "submit" name = "submit" value="Войти"/>
</form>
<?php endif;?>
  </div>
  </div>
</div>

  <footer>
  </footer>

</body>
</html>
