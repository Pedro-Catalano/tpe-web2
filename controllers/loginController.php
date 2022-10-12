<?php
require_once "./models/UserModel.php";
require_once "./helpers/AuthHelper.php";
require_once "./views/loginView.php";

class loginController{
    private $model;
    private $view;
    private $helper;
    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new loginView();
        $this->helper = new AuthHelper();
        
    }

    public function displayLogIn(){
        $this->view->displayLogIn();
    }

    public function verifyUser(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->model->getUserbyEmail($email);
        if (!empty($user) && password_verify($password, $user->password)) {
            $this->helper->login($user);
            header("Location: ".BASE_URL);
        } else {
            $this->view->displayLogIn("datos incorrectos");
        }
    }

    public function logout(){
        $this->helper->logout();
        header("Location: ".BASE_URL);
    }
}
?>