<?php
require 'backoffice/vendor/autoload.php';
require 'backoffice/src/routes/Router.php';

// define('HOSTNAME', '191.252.194.174');
// define('PORT', '3306');
// define('USERNAME', 'admin_40075682');
// define('PASSWORD', 'a40075682');
// define('DATABASE', 'admin_a40075682');

define('HOSTNAME', 'localhost');
define('PORT', '3306');
define('USERNAME', 'root');
define('PASSWORD', 'root');
define('DATABASE', 'xandinhouiui');


try {
    $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
    $request = $_SERVER["REQUEST_METHOD"];
  
    if (!isset($router[$request])) {
      throw new Exception("A rota não existe");
    }
  
    if (!array_key_exists($uri, $router[$request])) {
      throw new Exception("A rota não existe");
    }
  
    $controller = $router[$request][$uri];
    $controller();
  } catch (Exception $e) {
    $e->getMessage();
  }