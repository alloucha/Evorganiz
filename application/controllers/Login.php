<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User/User_model');		
	}


	public function index() {
		return $this->load->view("User/loginPage");
	}


	public function login(){

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

			$idUser = $this->encryption->encrypt($idUser);

			set_cookie('idUserCookie', $idUser, '60');

			redirect(site_url('/Events'));
		}		
	}


	public function logout(){

		delete_cookie('idUserCookie');

		redirect(site_url('/Login'));
	}

}

?>