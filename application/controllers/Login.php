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

		$UserInfo = $this->User_model->getUserByMailPassword($data);

		if (empty($UserInfo)){
			redirect(site_url('/Login'));
		
		} else {

			foreach ($UserInfo as $id) {
				$idUser = $id->idUser;
			}

			$crypted = $this->encryption->encrypt($idUser);

			set_cookie('nameCookie', $crypted, '60');

			redirect(site_url('/Events'));
		}
		
	}


	public function logout(){

	
		delete_cookie('nameCookie');

		var_dump(get_cookie('nameCookie'));

		redirect(site_url('/Login'));
		
	}


	public function displayProfil(){

	}


}

?>