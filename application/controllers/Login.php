<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User/User_model');		
	}

	public function index() {
		$this->login();
	}


	public function login(){

		return $this->load->view("User/loginPage");

	}


	public function checkUser(){

		$data = array(
            'mail'=> htmlspecialchars($_POST['mailUser']),
            'password'=> htmlspecialchars($_POST['passwordUser'])
        );

		$User = $this->User_model->getUserByMailPassword($data);

		if (empty($User)){
			redirect(site_url('/Login'));
		
		} else {

			foreach ($User as $id) {
				$user = $id->idUser;
			}

			set_cookie('nameCookie', $user['idUser'], time() + 60, null, null, false,true);

			redirect(site_url('/Events'));
		}
		
	}


	public function displayProfil(){

	}


}

?>