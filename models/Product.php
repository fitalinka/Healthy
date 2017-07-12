<?php
class Product{
  public static function setProduct(){
    $db = DB::getConection();
    $sql = "SELECT * FROM products";
    $rezult = $db->query($sql);

    $products = array();

    $i = 0;
    while($row = $rezult->fetch()){
      $products[$i]['name'] = $row['name_products'];
      //...
      $i++;
    }
    return $products;
  }

  public static function setProductPage($page = 1){
    $db = DB::getConection();
    $offset = ($page - 1) * 30;
    $sql = "SELECT * FROM products LIMIT 30 OFFSET $offset";
    $rezult = $db->query($sql);

    $products = array();

    $i = 0;
    while($row = $rezult->fetch()){
      $products[$i]['name'] = $row['name_products'];
        $products[$i]['bel'] = $row['bel'];
          $products[$i]['jyr'] = $row['jyr'];
            $products[$i]['ygl'] = $row['ygl'];
              $products[$i]['kal'] = $row['kal'];
      $i++;
    }
    return $products;
  }

  public static function setTotalProduct(){
    $db = DB::getConection();
    $sql = "SELECT COUNT(*) as count FROM products";
    $result = $db->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();
    return $row['count'];
  }
}
 ?>
