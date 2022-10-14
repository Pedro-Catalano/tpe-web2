<?php
require_once "./models/MoviesModel.php";
require_once "./models/GenresModel.php";
require_once "./models/DirectorsModel.php";
require_once "./views/SingleMovieView.php";
require_once "./views/MoviesView.php";
require_once "./helpers/AuthHelper.php";
require_once "./views/WarningView.php";
class MoviesController{
    
    private $moviesmodel;
    private $genresmodel;
    private $directorsmodel;
    private $singleview;
    private $moviesview;
    private $helper;
    private $warningview;
    
    function __construct(){
    
        $this->moviesmodel = new MoviesModel();
        $this->directorsmodel = new DirectorsModel();
        $this->genresmodel = new GenresModel();
        $this->singleview = new SingleMovieView();
        $this->moviesview = new MoviesView();
        $this->helper = new AuthHelper();
        $this->warningview = new WarningView();
    
    }
    
    public function getMovies(){
    
        $movies = $this->moviesmodel->getMovies();
    
        return $movies;
    
    }

    public function getSingleMovie($id){
    
        $movie = $this->moviesmodel->getSingleMovie($id);
    
        return $movie;
    
    }

    public function getMoviesbyGenre($genre_id){
    
        $movies = $this->moviesmodel->getMoviesbyGenre($genre_id);
    
        return $movies;
    
    }

    public function getMoviesbyDirector($director_id){
    
        $movies = $this->moviesmodel->getMoviesbyGenre($director_id);
    
        return $movies;
    
    }
    
    //-------------------------------ADMIN-----------------------------------
    
    public function addMovie(){
    
        $this->helper->checkloggedIn();
        $genre_id = $this->genresmodel->checkGenre($_POST['genre']);
        $director_id = $this->directorsmodel->checkDirector($_POST['director']);
        $this->moviesmodel->addMovie($_POST['title'], $director_id, $genre_id);
        header("Location: ".BASE_URL);
    
    }

    public function updateMovie($id){
    
        $this->helper->checkloggedIn();
        $genre_id = $this->genresmodel->checkGenre($_POST['genre']);
        $director_id = $this->directorsmodel->checkDirector($_POST['director']);
        $this->moviesmodel->updateMovie($id, $_POST['title'], $director_id, $genre_id);
        header("Location: ".BASE_URL);
        
    }

    public function deleteMovie($id){
    
        $this->helper->checkloggedIn();
        $this->moviesmodel->deleteMovie($id);
        header("Location: ".BASE_URL);
    
    }

    //---------------------------VIEW---------------------------------------
    
    public function displayPage($filter=null, $id=null){
    
        $directors = $this->directorsmodel->getDirectors();
        $genres = $this->genresmodel->getGenres();
        session_start();
        
        switch ($filter) {
            
            case '':
                
                $movies = $this->getMovies();
                $this->moviesview->displayPage($movies, $directors, $genres);
                break;

            case 'director':

                $movies = $this->getMoviesbyDirector($id);
                $this->moviesview->displayPage($movies, $directors, $genres);
                break;

            case 'genre':

                $movies = $this->getMoviesbyGenre($id);
                $this->moviesview->displayPage($movies, $directors, $genres);
                break;   
    
            case 'movie':
    
                $this->displaySingleMovie($id);
                break; 
    
            }  
    
    }
    
    public function displaySingleMovie($id){
    
        $movie = $this->getSingleMovie($id);
        $this->singleview->displaySingleMovie($movie);
    
    }
    
    public function warningDirector($director_id){
    
        $this->helper->checkloggedIn();
        $movies = $this->getMoviesbyDirector($director_id);
        $this->warningview->displayWarning($movies, 'director', $director_id);
    
    }

    public function warningGenre($genre_id){
    
        $this->helper->checkloggedIn();
        $movies = $this->getMoviesbyGenre($genre_id);
        $this->warningview->displayWarning($movies, 'genre', $genre_id);
    
    }
}
?>