<?php
class Conexao {
    public function conecta() {
        $dns = "mysql:dbname=etimUsuario;host=localhost";
        $userName = "root";
        $userPass = "";

        try {
            $this->pdo = new PDO($dns, $userName, $userPass);
            echo "TRUE";
            return true;
        } catch (Throwable $th) {
            echo "FALSE";
            return false;
        }
    }
}