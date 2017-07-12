<div class="navbar">
    <ul class="nav menu">
      <li class="active"><a href="/">Главная</a></li>
      <li><a  href="#">Рецепты</a></li>
      <li><a href="#">Счетчик калорий</a></li>

      <?php if(!isset($_SESSION['user'])){?>
      <li><a href="/user/registr">Регистрация</a></li>
      <li><a href="/user/autorise">Вход</a></li>
      <?php }
      else{ ?>
          <li><a href="#">Мой кабинет</a></li>
      <?php  }?>
    </ul>
</div>
