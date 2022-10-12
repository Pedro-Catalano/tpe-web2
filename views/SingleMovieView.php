<?php
require_once "./libs/smarty/Smarty.class.php";
class SingleMovieView{
    public function __construct(){
    }
    public function displaySingleMovie($movie){
        $smarty = new Smarty();
        $smarty->assign('movie', $movie);
        $smarty->display('./templates/singlemovie.tpl');
    }
}
?>