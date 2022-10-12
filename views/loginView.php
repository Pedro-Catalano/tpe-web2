<?php
require_once "./libs/smarty/Smarty.class.php";
class loginView{
    private $smarty;
    public function __construct()
    {
        $this->smarty = new Smarty();
    }
    public function displayLogIn($error = null){
        $this->smarty->assign('tittle', 'Iniciar Sesion');
        $this->smarty->assign('error', $error);
        $this->smarty->display("./templates/login.tpl");
    }
}
?>