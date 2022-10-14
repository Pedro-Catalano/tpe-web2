<?php
require_once "./libs/smarty/Smarty.class.php";
class MoviesView{

    public function __construct(){}
    
    public function displayPage($movies, $directors, $genres){
        
        $smarty = new Smarty();
        
        if(isset($_SESSION['USER_ID'])){
            $smarty->assign('user',$_SESSION['USER_ID']);
        }
        
        $smarty->assign('movies', $movies);
        $smarty->assign('directors', $directors);
        $smarty->assign('genres', $genres);

        $smarty->display('./templates/movies.tpl');
    }
}
?>