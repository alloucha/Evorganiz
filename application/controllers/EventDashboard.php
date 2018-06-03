<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventDashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Event/ListEvents');
		$this->load->model('Guest/Guest_model');
		$this->load->model('Contact/Contact_model');
		$this->load->model('Meal/Meal_model');
		$this->load->model('User/User_model');
	}

	public function index() {
		$this->Dashboard();
	}

	public function Dashboard(){
		
		if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

            	$data['userInfo'] = $userInfo;
				$data['page'] = $this->createDashboard();
				$data['title']= 'EVENEMENT';
				$this->load->view("Theme/theme", $data);
			} else {
                redirect(site_url('/Register'));
            }

        } else {
            redirect(site_url('/Login'));
        }   
	}


	public function createDashboard(){

		if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

				$idEvent = $_GET['idEvent'];

				if (isset($idEvent)){

					$data['buffet'] = $this->getBuffet($idEvent);
					$data['guests'] = $this->getGuests($idEvent);

				} 

				$data['todolist'] = $this->toDoList();		
				return $this->load->view("Event/EventDashboard/EventPage", $data, true);

				} else {
                redirect(site_url('/Register'));
            }

        } else {
            redirect(site_url('/Login'));
        }   
	}


	public function getBuffet($idEvent){

		if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

				$data['buffet'] = $this->Meal_model->getMealByIdEvent($idEvent);
				return $this->load->view("Event/EventDashboard/Buffet", $data, true);
			}

        } else {
            redirect(site_url('/Login'));
        }   
	}


	public function getGuests($idEvent){

		if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){
            	$data['idEvent'] = $idEvent;
            	$data['guests'] = $this->Guest_model->getGuestByIdEvent($idEvent);

            	$guests = $this->Guest_model->getGuestByIdEvent($idEvent);
            	//$data['listContact'] = $this->Contact_model->getAllContacts($idUser);
            	foreach ($guests as $guest){ 
    				$array[] = $guest->idContact;
    			}
            	
            	$data['listContact'] = $this->Contact_model->getAllContactsNotInvited($array, $idUser);

				return $this->load->view("Event/EventDashboard/Guest", $data, true);
			}

        } else {
            redirect(site_url('/Login'));
        }   
	}


	public function toDoList(){

		$data['f']= 3;
		return $this->load->view("Event/EventDashboard/ToDoList", $data, true);
	}
	
}
