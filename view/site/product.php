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
    <form class="form-search text-center">
  <input type="text" class="input-medium search-query">
  <input type="submit" name = "submit" value = "Найти"/>
</form>
    <div class ="product">
    <table class="table table_product table-bordered">
      <tr>
        <th>Название продукта</th>
        <th>Белок, г.</th>
        <th>Жиры, г.</th>
        <th>Угл, г.</th>
        <th>Кал, ккал.</th>
      </tr>
  <?php
  foreach ($rezult as $key) { ?>
    <tr class = "success">
    <td><?php echo $key['name'];?></td>
    <td><?php echo $key['bel'];?></td>
    <td><?php echo $key['jyr'];?></td>
    <td><?php echo $key['ygl'];?></td>
    <td><?php echo $key['kal'];?></td>
  </tr>
    <?php } ?>
</table>
  <div class="text-center"><?php echo $pagination->get();?></div>
  </div>
</div>
</div>
</div>
  <footer>
  </footer>

</body>
</html>
