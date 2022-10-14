<?php
require_once "controllers/MoviesController.php";
require_once "controllers/GenresController.php";
require_once "controllers/DirectorsController.php";
require_once "controllers/loginController.php";
require_once "helpers/AuthHelper.php";
$action = $_GET["action"];
define("BASE_URL",'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
if(!isset($action)){
    $controller = new MoviesController();
    $controller->displayPage();
} else {
    $URLparts = explode("/", $action);
    switch ($URLparts[0]) {
        case 'view':
            $id = $URLparts[2];
            $param = $URLparts[1];
            $controller = new MoviesController();
            $controller->displayPage($param, $id);
            /*if (empty($param) && !empty($id)) {
                $controller->displaySingleMovie($id);
            } else {
                $controller->displayPage($id, $param);
            }*/
            break;
        case 'add':
            $param = $URLparts[1];
            //$controller = new AdminController();
            if ($param == 'director') {
                $controller = new DirectorsController();
                $controller->addDirector();
            } elseif ($param == 'genre') {
                $controller = new GenresController();
                $controller->addGenre();
            }elseif ($param == 'movie') {
                $controller = new MoviesController();
                $controller->addMovie();
            }
            break;
        case 'edit':
            $param = $URLparts[1];
            $edit_id = $URLparts[2];
            //$controller = new AdminController();
            if ($param == 'director') {
                $controller = new DirectorsController();
                $controller->updateDirector($edit_id);
            } elseif ($param == 'genre') {
                
                $controller = new GenresController();
                $controller->updateGenre($edit_id);
              
            }elseif ($param == 'movie') {
                $controller = new MoviesController();
                $controller->updateMovie($edit_id);
            }
            break;
        case 'delete':
            $param = $URLparts[1];
            $delete_id = $URLparts[2];
            //$controller = new AdminController();
            if ($param == 'director') {
                $controller = new DirectorsController();
                $controller->deleteDirector($delete_id);
            } elseif ($param == 'genre') {
                $controller = new GenresController();
                $controller->deleteGenre($delete_id);
            }elseif ($param == 'movie') {
                $controller = new MoviesController();
                $controller->deleteMovie($delete_id);
            }
            break;
        case 'warning':
            $param = $URLparts[1];
            $warning_id = $URLparts[2];
            $controller = new MoviesController();
            if ($param == 'director') {
                $controller->warningDirector($warning_id);
            } elseif ($param == 'genre') {
                $controller->warningGenre($warning_id);
            }
            break;
        case 'login':
            $controller = new loginController();
            $controller->displayLogIn();
            break;
        case 'logout':
            $controller = new loginController();
            $controller->logout();
            break;
        case 'verify':
            $controller = new loginController();
            $controller->verifyUser();
            break;
        default:
            $controller = new MoviesController();
            $controller->displayPage();
            break;
    } 

}

?>
