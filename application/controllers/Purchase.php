<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	}

	public function index() {

		$data['page'] = $this->load->view("Purchase/Purchase_view");
	}
}