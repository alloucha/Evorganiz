<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('Event/ListEvents');
	}

	public function index() {
		$this->ListEvent();
	}

	public function ListEvent() {

		$data['page'] = $this->tableauEvent();

		$data['title']= 'EVENEMENT';
		$this->load->view("Theme/theme", $data);


	}

	public function tableauEvent() {

		$data['ListEvents']= $this->ListEvents->getEvents();

		return $this->load->view("Event/ListEvents", $data, true);
	}


	public function ajouterEvent() {

		$data = $this->input->post('nomEditeur');
		
		$this->load->view('ListEvents/ajouterEvent', $data);
		
		redirect(site_url('/editeur'));
	}
}
