<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventDashboard extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('Event/Event');
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

		$data['ListEvents']= $this->Event->getEvents();

		return $this->load->view("Event/Event", $data, true);
	}


	
}