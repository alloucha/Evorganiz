<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('Contact/Contact_model');
    }

    public function index() {
        $this->ListContact();
    }

    public function ListContact() {

        $data['page'] = $this->tabContact();

        $data['title']= 'CONTACT';
        $this->load->view("Theme/theme", $data);
    }


    public function tabContact() {

        $data['ListContact']= $this->Contact_model->getAll();

        return $this->load->view("Contact/Contact_view", $data, true);
    }


    public function addContact() {  

        $data = array(
            'lastnameContact'=> htmlspecialchars($_POST['lastnameContact']),
            'firstnameContact'=> htmlspecialchars($_POST['firstnameContact']),
            'telephoneContact'=> htmlspecialchars($_POST['telephoneContact'])
        );

        $this->Contact_model->insert($data);

        $this->index();
    }
}