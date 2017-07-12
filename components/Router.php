<?php
class Router{
  private $routes;

  public function __construct(){
    $routesPath= ROOT.'/config/routes.php';
    $this->routes= include($routesPath);
  }
  public function getURI(){
    if(!empty($_SERVER['REQUEST_URI'])){
      return trim($_SERVER['REQUEST_URI'],'/');
    }
  }

  public function run(){
    $uri = $this->getURI();
    foreach ($this->routes as $uriPatern =>$path) {
      if(preg_match("~$uriPatern~",$uri)){
        if($uriPatern!=''){
          $internalRoute= preg_replace("~$uriPatern~",$path,$uri);
        }
        else{
          $internalRoute=$path;
        }
        $segment = explode('/',$internalRoute);
        $controllerName=ucfirst(array_shift($segment).'Controller');
        $actionName='action'.ucfirst(array_shift($segment));
        $parametrs = $segment;

        $controllerFile=ROOT.'/controllers/'.$controllerName.'.php';
        if(file_exists($controllerFile)){
          include_once($controllerFile);
        }
        $controllerObject=new $controllerName;
        $result= call_user_func_array(array($controllerObject, $actionName),$parametrs);
        if($result!= null){
          break;
        }
      }
    }
  }
}

?>
