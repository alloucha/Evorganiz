<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meal extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('Meal/Meal_model');
	  $this->load->model('User/User_model');
	}


	public function index() {
		$this->ListMeals();
	}


	public function ListMeals() {

		if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

                $data['userInfo'] = $userInfo;
				$data['page'] = $this->tabMeal();

				$data['title']= 'REPAS';
				$this->load->view("Theme/theme", $data);
			} else {
                redirect(base_url('/Register'));
            }

        } else {
            redirect(base_url('/Login'));
        }   
	}


	public function tabMeal() {

		if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

            	if (isset($_GET['typeMeal'])){

				$data['ListMeals'] = $this->Meal_model->getAllMealByType($_GET['typeMeal'], $idUser);
				$data['typeMeal'] = $_GET['typeMeal'];

				} else {

					$data['ListMeals']= $this->Meal_model->getAllMeals($idUser);
					$data['typeMeal'] = 'All';
				}
				return $this->load->view("Meal/Meal_view", $data, true);

			} else {
                redirect(base_url('/Register'));
            }

        } else {
            redirect(base_url('/Login'));
        }   
	}


	public function addMeal(){
       
       if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

            	var_dump($_POST);

            	$data = array(
                    'nameMeal'=> htmlspecialchars($_POST['nameMeal']),
                    'typeMeal'=> htmlspecialchars($_POST['typeMeal']),
                    'descriptionMeal'=> htmlspecialchars($_POST['descriptionMeal']),
                    'idUser'=> $idUser
                );
                
                $this->Meal_model->insert($data);
                redirect(base_url('/Meal?typeMeal=' . $data['typeMeal']));

	        } else {
                redirect(base_url('/Register'));
            }
        } else {
            redirect(base_url('/Login'));
        }   
        
    }  


    public function insert(){

    	if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

                $data= array(
		            "nameMeal"=> htmlspecialchars($_POST['nameMeal']),
		            "typeMeal"=> htmlspecialchars($_POST['typeMeal']),
		            "descriptionMeal"=> htmlspecialchars($_POST['descriptionMeal']),
		            "idUser"=> $idUser
		        );

        		$this->Meal_model->insert($data);
        	} else {
                redirect(base_url('/Register'));
            }

        } else {
            redirect(base_url('/Login'));
        }  
    }


     public function deleteMeal() {

        if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

                $idMeal = $_POST['idMealToDelete'];

                if (isset($idMeal)){

                    $this->Meal_model->delete($idMeal);
                } 

                redirect(base_url('/Meal'));
            } else {
                redirect(base_url('/Register'));
            }
        } else {
            redirect(base_url('/Login'));
        }
    }


    public function editMeal() {

        if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

                $data = array(
                    'idMeal'=> htmlspecialchars($_GET['idMealToEdit']),
                    'nameMeal'=> htmlspecialchars($_POST['nameMealToEdit']),
                    'descriptionMeal'=> htmlspecialchars($_POST['descriptionMealToEdit'])
                );

                $this->Meal_model->update($data);
                redirect(base_url('/Meal'));
            } else {
                redirect(base_url('/Register'));
            }
        } else {
            redirect(base_url('/Login'));
        }
    }
}
?>