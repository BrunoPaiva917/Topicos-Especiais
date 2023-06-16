<?php

namespace App\Controller;

use App\Model\users;

require_once './Model/UserModel.php';

class CoreController
{
    private array $get;
    private array $post;

    public function __construct(array $get, ?array $post)
    {
        $this->get = $get;
        $this->post = $post;
    }

    public function run()
    {        
        if (isset($_SESSION['userlogged']))
            header('Location: /app/dashboard');
        else {
            // verificar se tem post para abrir o formulario ou validar o login
            require_once './View/LoginView.php';
            die();
        }

        if (empty($this->get))
            header('Location: /app/dashboard');

        else
            if (sizeof($this->get) == 1) {

            if ($this->get['menu'] == 'login' && isset($this->post['username']) && isset($this->post['password'])) {
                $user = new users();
                $user->setUsername($this->post['username']);
                $user->setPass($this->post['password']);
                $result = $user->login();
                if ($result) {
                    header('Location: /app/dashboard');
                }
            } else {
                echo 'Carregar a página de ' . $this->get['menu'];
            }
        } else if (sizeof($this->get) == 2) {
            echo $this->get['key'] . '  com o valor de ' . $this->get['value'];
        } else if (sizeof($this->get) == 3) {
            echo 'Executar a ação: ' . $this->get['action'] . ' no ' . $this->get['key'] . ' com o id ' . $this->get['value'];
        }
    }
}
