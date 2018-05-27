<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventDashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Event/Event');
	}

	public function index() {
		$this->Dashboard();
	}

	public function Dashboard(){

		$data['page'] = $this->createDashboard();

		$data['title']= 'EVENEMENT';

		$this->load->view("Theme/theme", $data);

	}

	public function createDashboard(){

		$data['buffet'] = $this->buffet(1);
		$data['todolist'] = $this->toDoList();		


		return $this->load->view("Event/EventDashboard/EventPage", $data, true);
	}


	public function buffet($id){

		$data['buffet']= $this->Event->getBuffetByIdEvent($id);

		return $this->load->view("Event/EventDashboard/Buffet", $data, true);
	}


	public function toDoList(){

		$data['f']= 3;
		return $this->load->view("Event/EventDashboard/ToDoList", $data, true);
	}
	
}
