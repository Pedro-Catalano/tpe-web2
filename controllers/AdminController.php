<?php
require_once "MoviesController.php";
require_once "./views/WarningView.php";
require_once "./helpers/AuthHelper.php";
class AdminController extends MoviesController{
    private $warningview;
    private $helper;
    function __construct (){
        parent::__construct();
        $this->warningview = new WarningView();
        $this->helper = new AuthHelper();
        $this->helper->checkloggedIn();
    }

    //---------------------------MOVIES----------------------------------

    public function addMovie(){
        $genre_id = $this->checkGenre();
        $director_id = $this->checkDirector();
        $this->moviesmodel->addMovie($_POST['title'], $director_id, $genre_id);
        header("Location: ".BASE_URL);
    }

    public function updateMovie($id){
        $genre_id = $this->checkGenre();
        $director_id = $this->checkDirector();
        $this->moviesmodel->updateMovie($id, $_POST['title'], $director_id, $genre_id);
        header("Location: ".BASE_URL);
        
    }

    public function deleteMovie($id){
        $this->moviesmodel->deleteMovie($id);
        header("Location: ".BASE_URL);
    }
    //--------------------------------GENRES---------------------------------

    public function addGenre(){

        $this->genremodel->addGenre($_POST['genre']);
        header("Location: ".BASE_URL);
    }
    //modular filtro?
    public function warningGenre($genre_id){
        $movies = $this->getMoviesbyGenre($genre_id);
        $this->warningview->displayWarning($movies, 'genre', $genre_id);
    }

    public function updateGenre($genre_id){
        //$genre_id = $this->checkGenre();
        $genre = $_POST['genre'];
        
        $this->genremodel->updateGenre($genre_id, $genre);
        header("Location: ".BASE_URL);
        
    }

    public function deleteGenre($genre_id){
        $this->moviesmodel->deleteMoviesbyGenre($genre_id);
        $this->genremodel->deleteGenre($genre_id);
        header("Location: ".BASE_URL);
    }
    //------------------------------DIRECTORS-----------------------------------

    public function addDirector(){
        $this->directormodel->addDirector($_POST['director']);
        header("Location: ".BASE_URL);
    }

    public function warningDirector($director_id){
        $movies = $this->getMoviesbyDirector($director_id);
        $this->warningview->displayWarning($movies, 'director', $director_id);
    }

    public function updateDirector($director_id){
        //$genre_id = $this->checkGenre();
        
        $this->directormodel->updateDirector($director_id, $_POST['director']);
        header("Location: ".BASE_URL);
        
    }

    public function deleteDirector($director_id){
        $this->moviesmodel->deleteMoviesbyDirector($director_id);
        $this->directormodel->deleteDirector($director_id);
        header("Location: ".BASE_URL);
    }
}
?>