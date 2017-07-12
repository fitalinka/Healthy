<?php
function __autoload($class_name){
  $array = array(
    '/models/',
    '/components/'
  );

  foreach ($array as $value) {
    $value= ROOT.$value.$class_name.'.php';
    if(is_file($value)){
      include_once $value;
    }
  }
}
 ?>
