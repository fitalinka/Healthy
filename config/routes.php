<?php
return  array(
  //путь(который захочу)=Б контроллер\метод обработки
  'user/registr'=> 'user/registr',
  'user/autorise'=> 'user/autorise',
  'user/personal_data'=> 'user/personal_data',
  'product/page-([0-9]+)'=> 'product/product/$1', //Пагинация
  'product'=> 'product/product',
  'graphic'=> 'user/graphic',

''=>'site/index'
 );
?>
