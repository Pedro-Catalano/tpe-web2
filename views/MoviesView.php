<?php
require_once "./libs/smarty/Smarty.class.php";
class MoviesView{

    public function __construct(){
    }
    public function displayPage($movies, $directors, $genres){
        $smarty = new Smarty();
        $smarty->assign('movies', $movies);
        $smarty->assign('directors', $directors);
        $smarty->assign('genres', $genres);

        $smarty->display('./templates/movies.tpl');
    }
    /*public function displayMovies($movies){
        $html = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <base href='.BASE_URL.'>
                <title>Movies</title>
            </head>
            <body>';
        // case sensitive arreglar lo demas
        foreach($movies as $movie){
            $html .= "<li>".$movie->Tittle." | ".$movie->Director." | ".$movie->Genre." | <a href='delete/".$movie->ID."'>Borrar</a>";
        }
        $html .= '<form action="add" method="post">
                <input type="text" name="title" placeholder="Titulo">
                <input type="text" name="director" placeholder="Director">
                <input type="text" name="genre" placeholder="Genero">
                <input type="submit" value="Agregar">
            </form>';
        $html .= '</body>
            </html>';
        echo $html;
        var_dump($movies);
        //INSERT?
    }    
    */
}
?>