<?php
namespace backoffice\src\controller;
use backoffice\src\core\Core;

use League\Plates\Engine;

class MontagemView
{
  private $core;
  public static function view(string $view, array $data = [])
  {
    $viewsPath = dirname(__FILE__, 2) . "/views";

    if (!file_exists($viewsPath . DIRECTORY_SEPARATOR . $view . ".php")) {
      throw new \Exception("A view {$view} não existe");
    }

    $templates = new Engine($viewsPath);
    echo $templates->render($view, $data);
  }
}