<?php
require_once "./libs/smarty/Smarty.class.php";
class WarningView{
    private $smarty;
    public function __construct()
    {
        $this->smarty = new Smarty();
    }
    public function displayWarning($movies, $delete, $delete_id){
        $this->smarty->assign('number', count($movies));
        $this->smarty->assign('movies', $movies);
        $this->smarty->assign('delete', $delete);
        $this->smarty->assign('delete_id', $delete_id);
        $this->smarty->display("./templates/warning.tpl");
    }
}
?>