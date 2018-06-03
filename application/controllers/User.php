<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('User/User_model');
	}

	public function index() {
		
	}

	public function editUser() {

		if (!empty(get_cookie('idUserCookie'))){

			$idUser = get_cookie('idUserCookie');
			$idUser = $this->encryption->decrypt($idUser);
			$userInfo = $this->User_model->getUserByIdUser($idUser);

			if (!empty($userInfo)){

				$data = array(
					'firstnameUser'=> ucfirst(htmlspecialchars($_POST['firstnameToEdit'])),
					'lastnameUser'=> strtoupper(htmlspecialchars($_POST['lastnameToEdit'])),
					'username'=> $userInfo->username,
					'password'=> $userInfo->password,
					'sexUser'=> htmlspecialchars($_POST['sexToEdit']),
					'idUser' => $idUser
				);

				$this->User_model->update($data);
				redirect(base_url('/Events'));
			} else {

				redirect(base_url('/Register'));
			}
		} else {
			redirect(base_url('/Login'));
		}			
	}
}
?>