<?php

namespace App\Repository\Login;

use App\Repository\Repository;

class Login
{

    use Repository;

    // public function getTasksPrioridy(){
    //     $db = $this->connection;
    //     return $db->get('tasks_prioridade');
    // }
    //criar outra pasta e outra classe pra essa

    public function getLogin()
    {
        $db = $this->connection;
        return $db->get('login');
    }
}
