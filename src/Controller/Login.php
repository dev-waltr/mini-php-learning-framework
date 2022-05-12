<?php

    namespace Application\Controller;

    /**
     * @route /login
     */
    class Login extends ViewController
    {
        protected function __action()
        {
            $dbConnectionObj = new \Service\DbConnection($this->config);
            $dbConnection = $dbConnectionObj->getPdoConnection();

            $userModel = new \Model\User($dbConnection);
            $user = $userModel->getUser('admin');

            $this->smarty->assign('name', $user->name);
            $this->smarty->display('login/login.tpl');
        }
    }