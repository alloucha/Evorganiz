<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meal extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('Meal/meal_model');
	}


	public function index() {
		$this->ListMeals();
	}


	public function ListMeals() {

		$data['page'] = $this->tabMeal();

		$data['title']= 'REPAS';
		$this->load->view("Theme/theme", $data);
	}


	public function tabMeal() {

		if (isset($_GET['typeMeal'])){

			$data['ListMeals'] = $this->meal_model->getAllMealByType($_GET['typeMeal']);
			$data['typeMeal'] = $_GET['typeMeal'];

		} else {

			$data['ListMeals']= $this->meal_model->getAll();
			$data['typeMeal'] = 'All';

		}

		return $this->load->view("Meal/Meal_view", $data, true);
	}

















	public function addMeal (){
       
        if( get_cookie('username')==''){
          
             $this->load->view('Login/login');
    	}

    	else {
            $this->load->view('Meal/addMeal');
    	}
    }  


    public function insert(){
        
        $data= array(
            "nameMeal"=> htmlspecialchars($_POST['nameMeal']),
            "typeMeal"=> htmlspecialchars($_POST['typeMeal']),
            "descriptionMeal"=> htmlspecialchars($_POST['descriptionMeal']),
        );

        $this->Meal_model->insert($data);

        if( get_cookie('nom_utilisateur')==''){
          
             $this->load->view('Login/login');
           
	    }
	    else {

	    	redirect(site_url('Meal'));

	    }
    }
}
?>