<?php
require_once "./models/DirectorsModel.php";
require_once "./helpers/AuthHelper.php";
require_once "./models/MoviesModel.php";

class DirectorsController{

    private $directorsmodel;
    private $helper;
    private $moviesmodel;

    public function __construct(){

        $this->directorsmodel = new DirectorsModel();
        $this->helper = new AuthHelper();
        $this->moviesmodel = new MoviesModel();

    }
    
    public function checkDirector(){

        $director_id = $this->directorsmodel->checkDirector($_POST['director']);

        if ($director_id == null){

            $director_id = $this->directorsmodel->addDirector($_POST['director']);   

        }

        return $director_id;

    }

    public function getDirectors(){

        $directors = $this->directorsmodel->getDirectors();

        return $directors;

    }

    //--------------------------------ADMIN-------------------------------------

    public function addDirector(){

        $this->helper->checkloggedIn();
        $this->directorsmodel->addDirector($_POST['director']);

        header("Location: ".BASE_URL);

    }

    public function updateDirector($director_id){

        $this->helper->checkloggedIn();
        $this->directorsmodel->updateDirector($director_id, $_POST['director']);

        header("Location: ".BASE_URL);
        
    }

    public function deleteDirector($director_id){

        $this->helper->checkloggedIn();
        $this->moviesmodel->deleteMoviesbyDirector($director_id);
        $this->directorsmodel->deleteDirector($director_id);

        header("Location: ".BASE_URL);

    }

}
?>