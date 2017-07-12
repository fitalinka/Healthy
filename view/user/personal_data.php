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
  <div class = "wrap col-md-10 col-xs-12">
    <div class="personal ">
  <form method="post" action ="#">
    <div class="pol">
      <i class="fa fa-user-o" aria-hidden="true"></i>
      <p class = "person">Ваш пол:</p>
      <input type = "radio" name= "myradio" value="1" <?php if ($rez['sex'] == 1) echo "checked";?>/> <i class="fa fa-female" aria-hidden="true"></i>&emsp;
      <input type = "radio" name= "myradio" value="2" <?php if ($rez['sex'] == 2) echo "checked";?>/> <i class="fa fa-male" aria-hidden="true"></i>
    </div>
    <table class="person_table">
      <tr>
        <td>
          <p class = "person"> Ваше имя :</p>
          <input type= "text" name="name" required value="<?php echo $rez['name_user']; ?>"  disabled/>
        </td>
        <td>
          <p class = "person"> Ваш вес:</p>
          <input type = "text" name = "weight" placeholder="Ваш вес" value="<?php echo $rez['weight']; ?>"/>
        </td>
      </tr>
      <tr>
        <td>
          <p class = "person"> Ваша фамилия:</p>
          <input type="text" name = "sourname" required value="<?php echo $rez['sourname']; ?>" disabled />
        </td>
        <td>
          <p class = "person"> Замеры вашей талии:</p>
          <input type = "text" name = "waist" placeholder="Замеры вашей талии в сантиметрах" value="<?php echo $rez['waist']; ?>"/>
        </td>
      </tr>
      <tr>
        <td>
          <p class = "person"> Ваш возраст:</p>
          <input type = "text" name = "age" placeholder="Ваш возраст" value="<?php echo $rez['age']; ?>" />
        </td>
        <td>
          <p class = "person"> Замеры вашей шеи:</p>
          <input type = "text" name = "neck" placeholder="Замеры вашей шеи в сантиметрах" value="<?php echo  $rez['neck']; ?>"/>
        </td>
      </tr>
      <tr>
        <td>
          <p class = "person"> Ваш рост:</p>
          <input type = "text" name = "height" placeholder="Ваш рост" value="<?php echo $rez['height']; ?>"/>
        </td>
        <td>
          <p class = "person"> Замеры ваших бедер:</p>
          <input type = "text" name = "thighs" placeholder="Замеры ваших бедер в сантиметрах" value="<?php echo $rez['thighs']; ?>"/>
        </td>
      </tr>
      <tr>
        <td colspan="2" class="text-center"><input type = "submit" name = "submit" value = "Сохранить"/></td>
      </tr>
    </table>
  </form>
</div>
<div class="text-center">
  <div class="info btn btn-success" >
    <h3>Суточная норма чистой воды: </br><?php echo $rez['water']; ?> литр</h3>
      <h3>Ваш ИМТ(индекс массы тела): <?php echo $rez['IMT'].'%';echo '</br>';
      if($rez['IMT'] >=19 and $rez['IMT'] <=24){
        echo"Ваш вес в пределах нормы!";
      }
      else if($rez['IMT'] >=10 and $rez['IMT'] <=18){
       echo"У вас недостаток веса!";
     }
     else if($rez['IMT'] >=26 and $rez['IMT'] <=29){
      echo"У вас избыток веса!";

    }
    else if($rez['IMT'] >= 30){
      echo "Вы страдаете ожирением!";
    }
      ?> </h3>
      <h3>Суточная норма калорий : <?php echo $rez['Norm_cal']; ?> ккал</h3>
      <h3>Процент жира: <?php echo $rez['jyr'];echo'</br>';
if($rez['sex']==1){
    if($rez['jyr']>=10 and $rez['jyr']<=12){echo"Вы имеете несущественный процент жира";}
   else if($rez['jyr']>=14 and $rez['jyr']<=20){echo"Вы занимаетесь спортом";}
   else if($rez['jyr']>=21 and $rez['jyr']<=24){echo"У вас средний процент жира";}
   else if($rez['jyr']>=25 and $rez['jyr']<=31){echo"У вас приемлемый процент жира в организме";}
   else if($rez['jyr']>=32){echo"У вас очень высокий процент жира!Критический!";}
}
else{
   if($rez['jyr']>= 2 and $rez['jyr']<= 4){echo"Вы имеете несущественный процент жира";}
  else if($rez['jyr']>=6 and $rez['jyr']<=13){echo"Вы наверное занимаетесь спортом";}
  else if($rez['jyr']>=14 and $rez['jyr']<=17){echo"У вас средний процент жира";}
  else if($rez['jyr']>=18 and $rez['jyr']<=25){echo"У вас приемлемый процент жира в организме";}
  else if($rez['jyr']>=26){echo"У вас очень высокий процент жира!Критический!";}
}
      ?> %</h3>
      <h3>Суточная норма белка : <?php echo $rez['proteins']; ?> грамм</h3>
      <h3>Суточная норма жиров : <?php echo $rez['grease']; ?> грамм</h3>
      <h3>Суточная норма углеводов : <?php echo $rez['ygl']; ?> грамм</h3>
  </div>
</div>

  </div>
</div>
</div>
  <footer>
  </footer>

</body>
</html>
