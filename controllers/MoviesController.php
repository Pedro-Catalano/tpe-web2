<?php
require_once "./models/MoviesModel.php";
require_once "./models/GenresModel.php";
require_once "./models/DirectorsModel.php";
require_once "./views/SingleMovieView.php";
require_once "./views/MoviesView.php";
class MoviesController{
    protected $moviesmodel;
    protected $genresmodel;
    protected $directorsmodel;
    protected $singleview;
    protected $moviesview;
    function __construct(){
        $this->moviesmodel = new MoviesModel();
        $this->directormodel = new DirectorsModel();
        $this->genremodel = new GenresModel();
        $this->singleview = new SingleMovieView();
        $this->moviesview = new MoviesView();
        
    }
    //---------------------------MOVIES----------------------------------
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

    //--------------------------------GENRES---------------------------------
    public function checkGenre(){
        $genre_id = $this->genremodel->checkGenre($_POST['genre']);
        if ($genre_id == null){
            $genre_id = $this->genremodel->addGenre($_POST['genre']);
        }
        return $genre_id;
    }

    public function getGenres(){
        $genres = $this->genremodel->getGenres();
        return $genres;
        //$this->view->displayMovies($movies);
    }

    //------------------------------DIRECTORS-----------------------------------
    public function checkDirector(){
        $director_id = $this->directormodel->checkDirector($_POST['director']);
        if ($director_id == null){
            $director_id = $this->directormodel->addDirector($_POST['director']);   
        }
        return $director_id;
    }

    public function getDirectors(){
        $directors = $this->directormodel->getDirectors();
        return $directors;
        //$this->view->displayMovies($movies);
    }

    //---------------------------VIEW---------------------------------------
    public function displayPage($filter=null, $id=null){
        $directors = $this->getDirectors();
        $genres = $this->getGenres();
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
}
?>