<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct(){
        parent::__construct();  
        $this->load->model('User/User_model');   
    }

    public function index() {
        $this->register();
    }

    public function register(){

        return $this->load->view("User/registerPage");

    }

    public function addUser(){
        
        $data = array(
            'firstnameUser'=> htmlspecialchars($_POST['firstnameUser']),
            'lastnameUser'=> htmlspecialchars($_POST['lastnameUser']),
            'mailUser'=> htmlspecialchars($_POST['mailUser']),
            'passwordUser'=> htmlspecialchars($_POST['passwordUser'])
        );

        $this->User_model->insert($data);

        redirect(site_url('/Login'));
    }


}

?>
