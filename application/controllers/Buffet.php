<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buffet extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('Buffet/Buffet_model');
      $this->load->model('Meal/Meal_model');
      $this->load->model('User/User_model');
    }

    public function index() {

    }

    public function addMealInBuffet() {  

        if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

                if (!empty(htmlspecialchars($_POST['newMeal']))){

                        $data = array(
                            'idMeal'=> htmlspecialchars($_POST['newMeal']),
                            'idEvent'=> $_GET['idEvent'],
                            'pricePerPerson'=> 0
                        );

                         $this->Buffet_model->insert($data);
                }
            
                redirect(base_url('/EventDashboard?idEvent=' . $data['idEvent']));

            } else {
                redirect(base_url('/Register'));
            }
        } else {
            redirect(base_url('/Login'));
        }
    }


    public function deleteMealInBuffet() {

        if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

                $data = array(
                    'idMeal'=> htmlspecialchars($_POST['idMealToDelete']),
                    'idEvent'=> $_GET['idEvent']
                );

                if (isset($data['idMeal'])){

                    $this->Buffet_model->delete($data);
                }                 

                redirect(base_url('/EventDashboard?idEvent=' . $data['idEvent']));
            } else {
                redirect(base_url('/Register'));
            }
        } else {
            redirect(base_url('/Login'));
        }
    }
}