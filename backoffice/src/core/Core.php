<?php

namespace backoffice\src\core;

use \PDO;
use \PDOException;
use const \HOSTNAME;
use const \PORT;
use const \USERNAME;
use const \PASSWORD;
use const \DATABASE;

class Core
{


    private $database;
    private $host;
    private $username;
    private $password;
    private $dsn;
    private $pdo;
    public function __construct()
    {

        $this->database = DATABASE;
        $this->host = HOSTNAME;
        $this->username = USERNAME;
        $this->password = PASSWORD;

        try {
            $this->dsn = "mysql:host=$this->host;dbname=$this->database";
            $this->pdo = new \PDO($this->dsn, $this->username, $this->password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }

        
    }

    public function pre($dados)
    {
        echo '<pre>';
        print_r($dados);
        echo '</pre>';
        die();
    }

    public function return ($status, $title = '', $message = '', $data = [])
    {
        $response = json_encode(['status' => $status, 'title' => $title, 'message' => $message, 'data' => $data]);
        echo $response;
        exit;
    }
    public function redirect($link, $status = "", $title = "", $message = "")
    {
        if ($status != "") {

            $_SESSION['toast']['status'] = $status;
            $_SESSION['toast']['title'] = $title;
            $_SESSION['toast']['message'] = $message;
        }
        header('location:' . $link);

        exit;
    }
    function salvarImagemCliente($arquivo)
    {
        if ($arquivo['error'] != UPLOAD_ERR_OK) {
            return false;
        }

        if (!file_exists('public/img/img_clientes')) {
            mkdir('public/img/img_clientes', 0777, true);
        }

        $nomeArquivo = md5(time()) . '.' . $arquivo['type'];
        move_uploaded_file($arquivo['tmp_name'], 'public/img/img_clientes/' . $nomeArquivo);

        return $nomeArquivo;
    }


    public function getData($table, $columns = '', $where = [], $order = '', $join = '')
{
    if ($order == '') {
        $order = 'DESC';
    }

    try {
        if ($columns == '') {
            $query = "SELECT * FROM $table";
        } elseif ($where == '') {
            $query = "SELECT $columns FROM $table ORDER BY id $order";
        } else {
            $whereClause = '';
            if (!empty($where)) {
                $whereClause = 'WHERE ';
                $i = 0;
                foreach ($where as $key => $value) {
                    if ($i > 0) {
                        $whereClause .= " AND $key = :key$i";
                    } else {
                        $whereClause .= "$key = :key$i";
                    }
                    $i++;
                }
            }

            $joinClause = ($join != '') ? "$join " : '';
            $query = "SELECT $columns FROM $table $joinClause $whereClause ORDER BY ID $order";
        }

        $stmt = $this->pdo->prepare($query);

        if (!empty($where)) {
            $i = 0;
            foreach ($where as $key => $value) {
                $stmt->bindValue(":key$i", $value);
                $i++;
            }
        }

        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    } catch (PDOException $error) {
        echo "Erro: " . $error->getMessage();
        return false;
    }
}


    public function addData($table, $data = [])
    {

        try {

            $columns = [];
            $values = [];

            foreach ($data as $key => $value) {
                $columns[] = "`$key`";
                $values[] = "'$value'";
            }

            $query = "INSERT INTO $table (" . implode(", ", $columns) . ") VALUES (" . implode(", ", $values) . ")";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public function alterData($table, array $data, array $where)
    {
        try {
            $setClause = "";
            $params = [];
            $index = 1;
    
            foreach ($data as $column => $value) {
                $setClause .= "$column = :param$index";
                $params[":param$index"] = $value;
                $index++;
    
                if ($index <= count($data)) {
                    $setClause .= ", ";
                }
            }
    
            $whereClause = "";
            $whereParams = [];
            $index = 1;
            $whereParam = "whereParam";
    
            foreach ($where as $column => $value) {
                $whereClause .= "$column = :$whereParam$index";
                $whereParams[":$whereParam$index"] = $value;
                $index++;
    
                if ($index <= count($where)) {
                    $whereClause .= " AND ";
                }
            }
    
            $query = "UPDATE $table SET $setClause WHERE $whereClause";
            $statement = $this->pdo->prepare($query);
            $statement->execute($params + $whereParams);
    
            return true;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }
    


    public function removeData($table, $data)
    {
        try {
            $query = "DELETE FROM $table WHERE id = $data;";

            $this->pdo->exec($query);
            return true;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }
}