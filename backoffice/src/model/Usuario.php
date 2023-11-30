<?php
namespace backoffice\src\model;
use backoffice\src\core\Core;

class Usuario {

    private string $nome, $foto_perfil, $email, $cpf, $uf, $tel, $senha, $tipo_usuario, $endereco;
    private int $id, $idade;
    private $core;

    public function __construct() {
        $this->core = new core;
    }

   public function getNome(): string
    {
        return $this->nome;
    }

    public function getFotoPerfil(): string
    {
        return $this->foto_perfil;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getUf(): string
    {
        return $this->uf;
    }

    public function getTel(): string
    {
        return $this->tel;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getIdade(): int
    {
        return $this->idade;
    }

    public function getTipoUsuario(): string
    {
        return $this->tipo_usuario;
    }

    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setFotoPerfil(string $fotoPerfil): void
    {
        $this->foto_perfil = $fotoPerfil;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function setUf(string $uf): void
    {
        $this->uf = $uf;
    }

    public function setTel(string $tel): void
    {
        $this->tel = $tel;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    public function setIdade(int $idade): void
    {
        $this->idade = $idade;
    }

    public function setTipoUsuario(string $tipoUsuario): void
    {
        $this->tipo_usuario = $tipoUsuario;
    }

    public function setEndereco(string $endereco): void
    {
        $this->endereco = $endereco;
    }


    public function toString() {
        $string = "Nome: " . $this->getNome() . "\n";
        $string .= "Email: " . $this->getEmail() . "\n";
        $string .= "CPF: " . $this->getCpf() . "\n";
        $string .= "UF: " . $this->getUf() . "\n";
        $string .= "Telefone: " . $this->getTel() . "\n";
        $string .= "Senha: " . $this->getSenha() . "\n";
        $string .= "Idade: " . $this->getIdade() . "\n";
        $string .= "Tipo de Usuário: " . $this->getTipoUsuario() . "\n";
        $string .= "Endereço: " . $this->getEndereco() . "\n";
        
        return $string;

    }

    public function addUser($dados){

        $data = [
            'nome' => $this->getNome(),
            'foto_perfil' => $this->getFotoPerfil(),
            'email' => $this->getEmail(),
            'cpf' => $this->getCpf(),
            'uf' => $this->getUf(),
            'tel' => $this->getTel(),
            'senha' => password_hash($this->getSenha(), PASSWORD_DEFAULT),
            'idade' => $this->getIdade(),
            'tipo_usuario' => $this->getTipoUsuario(),
            'endereco' => $this->getEndereco(),
        ];
            
        $dados = $this->core->addData('usuario', $data);
        if($dados != 1){
            $this->core->return('error', 'Erro', 'Não foi possivel cadastrar o usuario!!');
        }else{
            $this->core->return('success', 'Sucesso', 'Usuario cadastrado com sucesso!!');
        }

    }

    public function removeData($id){
        $remove = $this->core->removeData('usuario', ['id' => $id]);
        if($remove != 1){
            $this->core->return('error', 'Erro', 'Não foi possivel excluir o usuario!!');
        }else{
            $this->core->return('success', 'Sucesso', 'Usuario excluido com sucesso!!');
        }

    }
}