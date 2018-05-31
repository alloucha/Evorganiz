<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('Event/ListEvents');
	  $this->load->model('User/User_model');
	}

	public function index() {
		$this->ListEvents();
	}

	public function ListEvents() {

		$data['page'] = $this->tableEvents();
		$data['title']= 'EVENEMENT';
		$this->load->view("Theme/theme", $data);
	}

	public function tableEvents() {

		if (!empty(get_cookie('idUserCookie'))){

			$idUser = get_cookie('idUserCookie');
			$idUser = $this->encryption->decrypt($idUser);
			$userInfo = $this->User_model->getUserByIdUser($idUser);

			if (!empty($userInfo)){

				$data['ListEvents'] = $this->ListEvents->getAllEvents($idUser);
				$data['ListOccasions'] = $this->ListEvents->getAllOccasions();
				$data['ListGuests'] = $this->ListEvents->getAllGuests($idUser);

				return $this->load->view("Event/ListEvents", $data, true);
			
			} else {
				redirect(site_url('/Register'));
			}

		} else {
			redirect(site_url('/Login'));
		}	
	}


	public function addEvent() {
		
		if (!empty(get_cookie('idUserCookie'))){

			$idUser = get_cookie('idUserCookie');
			$idUser = $this->encryption->decrypt($idUser);
			$userInfo = $this->User_model->getUserByIdUser($idUser);

			if (!empty($userInfo)){

				$data = array(
					'themeEvent'=> htmlspecialchars($_POST['themeEvent']),
					'dateEvent'=> htmlspecialchars($_POST['dateEvent']),
					'idOccasionEvent'=> htmlspecialchars($_POST['idOccasion']),
					'budgetMaxEvent'=> htmlspecialchars($_POST['budgetMaxEvent']),
					'venueEvent'=> htmlspecialchars($_POST['venueEvent']),
					'personConcerned'=> htmlspecialchars($_POST['personConcerned']),
					'idUser'=> $idUser
				);

				$this->ListEvents->insert($data);
				redirect(site_url('/Events'));
			} else {

				redirect(site_url('/Register'));
			}

		} else {
			redirect(site_url('/Login'));
		}
	}


	public function deleteEvent() {

		if (!empty(get_cookie('idUserCookie'))){

			$idUser = get_cookie('idUserCookie');
			$idUser = $this->encryption->decrypt($idUser);
			$userInfo = $this->User_model->getUserByIdUser($idUser);

			if (!empty($userInfo)){

				$idEvent = $_POST['idEventToDelete'];

				if (isset($idEvent)){
					$this->ListEvents->delete($idEvent);
				} 

				redirect(site_url('/Events'));
			} else {
				redirect(site_url('/Register'));
			}
		} else {
			redirect(site_url('/Login'));
		}
	}


	public function editEvent() {

		if (!empty(get_cookie('idUserCookie'))){

			$idUser = get_cookie('idUserCookie');
			$idUser = $this->encryption->decrypt($idUser);
			$userInfo = $this->User_model->getUserByIdUser($idUser);

			if (!empty($userInfo)){

				$data = array(
					'idEvent'=> htmlspecialchars($_GET['idEventToEdit']),
					'themeEvent'=> htmlspecialchars($_POST['themeEventToEdit']), 
					'dateEvent'=> htmlspecialchars($_POST['dateEventToEdit']),
					'idOccasion'=>  htmlspecialchars($_POST['idOccasionToEdit']),
					'budgetMaxEvent'=> htmlspecialchars($_POST['budgetMaxEventToEdit']),
					'personConcerned'=> htmlspecialchars($_POST['personConcernedToEdit'])
				);

				$this->ListEvents->update($data);
				redirect(site_url('/Events'));
			} else {

				redirect(site_url('/Register'));
			}
		} else {
			redirect(site_url('/Login'));
		}			
	}
}
?>