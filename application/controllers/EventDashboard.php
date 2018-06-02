<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventDashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Event/EventPage');
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

				$data['buffet'] = $this->EventPage->getMealByIdEvent($idEvent);
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
            	$data['guests'] = $this->EventPage->getGuestByIdEvent($idEvent);
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
