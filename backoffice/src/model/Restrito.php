<?php
include ('../core/core.php');

class Restrito {

    private string $email, $senha;
    private $core;

    public function __construct() {
        $this->core = new core;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function toString() {
        $string = "Email: " . $this->getEmail() . "\n";
        return $string;
    }

    public function addUser($dados){

        $data = [
            'email' => $this->getEmail(),
        ];
            
        $dados = $this->core->addData('usuario', $data);
        if($dados != 1){
            die('Error; não foi possível adicionar os dados!!!');
        }
        die('Sucesso; dados adicionados com sucesso!!!');
    }

    public function removeData($id){
        $remove = $this->core->removeData('usuario', ['id' => $id]);
    }
}