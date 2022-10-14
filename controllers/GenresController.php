<?php
require_once "./models/GenresModel.php";
require_once "./helpers/AuthHelper.php";
require_once "./models/MoviesModel.php";
class GenresController{
    private $genresmodel;
    private $helper;
    private $moviesmodel;
    public function __construct(){
        $this->genresmodel = new GenresModel();
        $this->moviesmodel = new MoviesModel;
        $this->helper = new AuthHelper();
    }

    public function checkGenre(){
        $genre_id = $this->genresmodel->checkGenre($_POST['genre']);
        if ($genre_id == null){
            $genre_id = $this->genresmodel->addGenre($_POST['genre']);
        }
        return $genre_id;
    }

    public function getGenres(){
        $genres = $this->genresmodel->getGenres();
        return $genres;
    }
    //-----------------------------------ADMIN-----------------------------------
    public function addGenre(){
        $this->helper->checkloggedIn();
        $this->genresmodel->addGenre($_POST['genre']);
        header("Location: ".BASE_URL);
    }

    public function updateGenre($genre_id){
        $this->helper->checkloggedIn();
        $genre = $_POST['genre'];
        $this->genresmodel->updateGenre($genre_id, $genre);
        header("Location: ".BASE_URL);
        
    }

    public function deleteGenre($genre_id){
        $this->helper->checkloggedIn();
        $this->moviesmodel->deleteMoviesbyGenre($genre_id);
        $this->genresmodel->deleteGenre($genre_id);
        header("Location: ".BASE_URL);
    }
}
?>