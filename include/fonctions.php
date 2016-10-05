<?php

namespace App;
use \PDO;

class fonctions
{
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;
    public $pdo;
    public function __construct($db_host="localhost", $db_name="forum", $db_user="root", $db_pass="")
    {
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }

    public function getPDO()
    {
        if($this->pdo==null)
        {
            try {
                $pdo = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name, $this->db_user, $this->db_pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo;
            }
            catch (PDOException $e) {
                die("Error ! : " . $e->getMessage());
            }


        }
        return $this->pdo;
    }
    public function inscription()
    {
        
        $req = $this->getPDO()->prepare("INSERT INTO utilisateur (username, password) VALUES (:nom, :mdp)");
        $req->execute(array(
            "nom" => "Jean",
            "mdp" => md5("123")
        ));
    }
}
