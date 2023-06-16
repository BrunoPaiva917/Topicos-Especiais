<?php
/* Classe users */

namespace App\Model;
require_once './Model/DataBase.php';

class users
{

    private ?string $uuid;
    private ?string $username;
    private ?string $pass;

    // Constructeur'
    function __construct()
    {
        $this->uuid = null;
        $this->username = null;
        $this->pass = null;
    }
    function getUuid(): string
    {
        return $this->uuid;
    }
    function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }
    public function getPass(): string
    {
        return $this->pass;
    }
    public function setPass($pass): void
    {
        $this->pass = $pass;
    }
    public function getUsername(): string
    {
        return $this->username;
    }
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
    public function login(): bool
    {
        $db = new DataBase();
        $sql = "SELECT * FROM users WHERE name = '".$this->username."' AND pass = sha2('".$this->pass."', 256);";
        $result = $db->query($sql);
        if (sizeof($result) == 1) {
            $this->uuid = $result[0]['uuid'];
            $_SESSION['userlogged'] = $this;
            return true;
        }
        return false;
    }
}
