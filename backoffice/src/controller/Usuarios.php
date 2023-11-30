<?php
namespace backoffice\src\controller;

use backoffice\src\core\Core;

class Usuarios{
    private $core;
    private $view;

    public function __construct()
    {
        $this->core = new core;
        
        
        session_start();
        if (empty($_SESSION)) {
            session_destroy();
            $this->core->redirect('/');
        }
        
    }
    public function index()
    {

        $usuarios = $this->core->getData('usuario', 'id, nome, email, uf, tipo_usuario');
        MontagemView::view("/usuarios/listar", ['usuarios' => $usuarios]);
    }

    public function cadastrar(){
        
        MontagemView::view("/usuarios/cadastrar");
    }
    public function ver(){
        
        $usuario = $this->core->getData('usuario', 'id, nome, foto_perfil, email, cpf, uf, tel, idade, endereco, tipo_usuario', ['id' => $_GET['id']])[0];
        MontagemView::view("/usuarios/ver", ['usuario' => $usuario]);
    }
    public function salvar(){
        
        if($_POST['nome'] == ''){
            $this->core->return('error', 'Erro', 'Preencha o nome corretamente!!');
        }
        $adicionar['nome'] = $_POST['nome'];

        if($_POST['email'] == ''){
            $this->core->return('error', 'Erro', 'Preencha o email corretamente!!');
        }
        $adicionar['email'] = $_POST['email'];
        
        if($_POST['senha'] == ''){
            $this->core->return('error', 'Erro', 'Preencha a senha corretamente!!');
        }
        $adicionar['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        if($_POST['cpf'] == ''){
            $this->core->return('error', 'Erro', 'Preencha o cpf corretamente!!');
        }
        $adicionar['cpf'] = $_POST['cpf'];

        if($_POST['tel'] == ''){
            $this->core->return('error', 'Erro', 'Preencha o telefone/celular corretamente!!');
        }
        $adicionar['tel'] = $_POST['tel'];

        if($_POST['idade'] == ''){
            $this->core->return('error', 'Erro', 'Preencha a idade corretamente!!');
        }

        $adicionar['idade'] = $_POST['idade'];

        if($_POST['uf'] == ''){
            $this->core->return('error', 'Erro', 'Preencha o UF de residencia corretamente!!');
        }
        $adicionar['uf'] = $_POST['uf'];

        if($_POST['tipo_usuario'] == ''){
            $this->core->return('error', 'Erro', 'Preencha o tipo de usuario corretamente!!');
        }
        $adicionar['tipo_usuario'] = $_POST['tipo_usuario'];

        if($_POST['endereco'] == ''){
            $this->core->return('error', 'Erro', 'Preencha o endereco corretamente!!');
        }
        $adicionar['endereco'] = $_POST['endereco'];


        $res = $this->core->addData('usuario', $adicionar);
        if($res != 1){
            $this->core->return('error', 'Erro', 'Não foi possível cadastrar o usuario!!');
        }
        $this->core->return('success', 'Sucesso', 'Usuario cadastrado com sucesso!!!');
    }
    public function alterar(){

        $usuario = $this->core->getData('usuario', 'id, nome, foto_perfil, email, cpf, uf, tel, idade, endereco, tipo_usuario', ['id' => $_POST['id']])[0];
        
        $alterar['nome'] = $_POST['nome']                   == '' ? $usuario['nome'] : $_POST['nome'];
        $alterar['email'] = $_POST['email']                 == '' ? $usuario['email'] : $_POST['email'];
        $alterar['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT)  == '' ? $usuario['senha'] : password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $alterar['cpf'] = $_POST['cpf']                     == '' ? $usuario['cpf'] : $_POST['cpf'];
        $alterar['tel'] = $_POST['tel']                     == '' ? $usuario['tel'] : $_POST['tel'];
        $alterar['idade'] = $_POST['idade']                 == '' ? $usuario['idade'] : $_POST['idade'];
        $alterar['uf'] = $_POST['uf']                       == '' ? $usuario['uf'] : $_POST['uf'];
        $alterar['tipo_usuario'] = $_POST['tipo_usuario']   == '' ? $usuario['tipo_usuario'] : $_POST['tipo_usuario'];
        $alterar['endereco'] = $_POST['endereco']           == '' ? $usuario['endereco'] : $_POST['endereco'];

        $res = $this->core->alterData('usuario', $alterar, ['id' => $_POST['id']]);
        if($res != 1){
            $this->core->return('error', 'Erro', "Erro ao alterar os dados do usuario");
        }
        $this->core->return('success', 'Sucesso', "Dados do usuario alterados com sucesso!!");
    }
    public function remover(){
        $res = $this->core->removeData('usuario', $_POST['remover']);
        if($res != 1){
            $this->core->return('error', 'Erro', 'Erro ao excluir o usuario!!');
        }

        $this->core->return('success', 'Sucesso', 'Usuario exluido com sucesso!!');
    }
}

?>