<?php

spl_autoload_register(function($className) {
  $controllerName = lcfirst($className);

  include "classes/$controllerName.php";
});

$routing = new Routing();

?>
