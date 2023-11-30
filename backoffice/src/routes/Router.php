<?php 
function load(string $controller, string $action)
{
    try {
        // se controller existe
        $controllerNamespace = "backoffice\\src\\controller\\{$controller}";

        if (!class_exists($controllerNamespace)) {
            throw new Exception("O controller {$controller} não existe");
        }

        $controllerInstance = new $controllerNamespace();

        if (!method_exists($controllerInstance, $action)) {
            throw new Exception(
                "O método {$action} não existe no controller {$controller}"
            );
        }

        $controllerInstance->$action((object) $_REQUEST);

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

$router = [
  "GET" => [
    "/" => fn () => load("Restrito", "index"),
    "/cadastrar" => fn () => load("Restrito", "cadastrar"),
    "/dashboard" => fn () => load("Dashboard", "index"),

    "/usuarios" => fn () => load("Usuarios", "index"),
    "/usuarios/cadastrar" => fn () => load("Usuarios", "cadastrar"),
    "/usuarios/ver" => fn () => load("Usuarios", "ver"),
    

    "/carros" => fn () => load("Carros", "index"),
    "/carros/cadastrar" => fn () => load("Carros", "cadastrar"),
    "/carros/ver" => fn () => load("Carros", "ver"),
    

    "/alugar" => fn () => load("Alugar", "index"),
    "/alugar/ver" => fn () => load("Alugar", "ver"),
  ],
  "POST" => [
    "/restrito/login" => fn () => load("Restrito", "login"),
    "/restrito/salvar" => fn () => load("Restrito", "salvar"),

    "/usuarios/salvar" => fn () => load("Usuarios", "salvar"),
    "/usuarios/alterar" => fn () => load("Usuarios", "alterar"),
    "/usuarios/remover" => fn () => load("Usuarios", "remover"),
    
    "/carros/salvar" => fn () => load("Carros", "salvar"),
    "/carros/alterar" => fn () => load("Carros", "alterar"),
    "/carros/remover" => fn () => load("Carros", "remover"),

    "/alugar/alterar" => fn () => load("Alugar", "alugar"),

    

  ],
  "DELETE" => [
    "/dashboard/destroy" => fn () => load("Dashboard", "destroy"),
  ],

];