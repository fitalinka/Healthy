<?php
class ProductController{
  public function actionProduct($page = 1){
    $rezult = Product::setProductPage($page);
    $total = Product::setTotalProduct();

    $pagination = new Pagination($total, $page, 30, 'page-');

    require_once(ROOT.'/view/site/product.php');
    return true;
  }

}
?>
