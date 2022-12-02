<?php

namespace App\Controller\Login;

use App\Controller\Controller;

class Login extends Controller
{

    public function index()
    {
        $this->appendCss('login/style');




        if (isset($_SESSION['tentativas_de_login'])) {

            if ($_SESSION['tentativas_de_login'] == 2) {
                echo ("Caso voce errar mais uma vez<br>sera bloqueado por 3 minutos<br>");
            }
            if ($_SESSION['tentativas_de_login'] == 3) {

                sleep(180);
            }
        }

        if (!empty($_POST)) {

            $userLogin = $this->business->getLoginUser()['0']['user_login'];

            $passwordLogin = $this->business->getLoginUser()['0']['password_login'];

            if (($_POST['username'] == $userLogin)
                &&
                ($_POST['password'] == $passwordLogin)
            ) {
                echo "Login efetuado com sucesso";
                
                $_SESSION['login'] = true;
                $_SESSION['username'] = $userLogin;
                header("Location: listagem-tarefas");
            } else {
                if (isset($_SESSION['tentativas_de_login'])) {

                    $_SESSION['tentativas_de_login'] += 1;
                } else {

                    $_SESSION['tentativas_de_login'] = 1;
                }
                $_SESSION['username'];
                echo "Voce errou o login!";
            }
        }



 






        $this->nameTemplate = 'login/index';
        $this->render();
    }
}
