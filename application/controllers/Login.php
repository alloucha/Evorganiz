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
            'username'=> htmlspecialchars($_POST['username']),
            'password'=> htmlspecialchars($_POST['password'])
        );

		define("PREFIX", "bjgbsemiogyibl-zohys-ùà");
        define("SUFFIX", "7Y65RHJGN865NEG9hgr");
        $data['password'] = md5( sha1(PREFIX) . $data['password'] . sha1(SUFFIX) );

		$UserInfo = $this->User_model->getUserByUsernamePassword($data);

		if (empty($UserInfo)){
			
			redirect(site_url('Login'));
		
		} else {

			foreach ($UserInfo as $id) {
				$idUser = $id->idUser;
			}

			$idUser = $this->encryption->encrypt($idUser);

			set_cookie('idUserCookie', $idUser, '3660');
			redirect(site_url('Events'));
		}		
	}


	public function logout(){

		delete_cookie('idUserCookie');

		redirect(site_url('Login'));
	}

}

?>