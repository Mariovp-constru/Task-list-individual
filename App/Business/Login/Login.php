<?php

namespace App\Business\Login;

use App\Business\Business;

class Login
{
    use Business;

    // public function getTasksPrioridy(){
    //     return $this->repository->getTasksPrioridy();
    // }

    public function getLoginUser()
    {
        return $this->repository->getLogin();
    }
}
