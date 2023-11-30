<?php
namespace backoffice\src\controller;

use backoffice\src\core\Core;

class Restrito{    
    private $core;
    private $view;

    public function __construct()
    {
        $this->core = new core;
    }
    public function index()
    {
        MontagemView::view("/restrito/login");
    }
    public function cadastrar(){
        MontagemView::view("/restrito/register");
    }
    public function login()
    {
        if (isset($_POST['email']) && isset($_POST['senha'])) {
            
            $verificar['email'] = $_POST['email'];
            $verificar['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);

            if (!empty($verificar)) {
                
                $colunas = 'id, email, cpf, uf, tel,senha, idade, endereco, nome, tipo_usuario';
                $usuario = $this->core->getData('usuarios', $colunas, ['email' => $verificar['email']]);

                if (empty($usuario)) {
                    $this->core->return('error', 'Erro', 'Email ou senha incorretos!!', '');
                }else{
                    if (password_verify($_POST['senha'], $usuario[0]['senha'])) {

                        session_start();
                        $_SESSION['id'] = $usuario[0]['id'];
                        $_SESSION['email'] = $usuario[0]['email'];
                        $_SESSION['nome'] = $usuario[0]['nome'];
                        $_SESSION['uf'] = $usuario[0]['uf'];
                        $_SESSION['tel'] = $usuario[0]['tel'];
                        $_SESSION['idade'] = $usuario[0]['idade'];
                        $_SESSION['tipo_usuario'] = $usuario[0]['tipo_usuario'];
                        $_SESSION['endereco'] = $usuario[0]['endereco'];
                        $_SESSION['cpf'] = $usuario[0]['cpf'];
    
                        $this->core->return('success', 'Sucesso', 'Login realizado com sucesso!!', '');
                    } else {
                        $this->core->return('error', 'Erro', 'Email ou senha incorretos!!', '');
                    }
                }
               
            }
        }
    }
    public function salvar()
    {
        if (isset($_POST['nome']) 
            && isset($_POST['idade']) 
            && isset($_POST['endereco']) 
            && isset($_POST['email']) 
            && isset($_POST['senha']) 
            && isset($_POST['cpf'])
            && isset($_POST['telefone'])
            && isset($_POST['uf'])
            ) {

            $cadastrar['nome'] = $_POST['nome'];
            $cadastrar['idade'] = intval($_POST['idade']);
            $cadastrar['endereco'] = $_POST['endereco'];
            $cadastrar['email'] = $_POST['email'];
            $cadastrar['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $cadastrar['tipo_usuario'] = $_POST['tipo_usuario'];
            $cadastrar['cpf'] = $_POST['cpf'];
            $cadastrar['tel'] = $_POST['telefone'];
            $cadastrar['uf'] = $_POST['uf'];

            if ($cadastrar['idade'] < 18) {
                $this->core->return('error', 'Erro', 'Menor de idade. Não é permitido o cadastro', '');
            } else {
                $resposta = $this->core->addData('usuario', $cadastrar);
                if ($resposta != 1) {
                    $this->core->return('error', 'Erro', 'Não foi possível realizar o cadastro!!', '');
                }
                $this->core->return('success', 'Sucesso', 'Cadastrado realizado com sucesso!!', '');

            }
        }
        $this->core->return('error', 'Error', 'Preencha os dados corretamente', '');
    }
}