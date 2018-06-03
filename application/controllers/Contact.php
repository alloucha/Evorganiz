<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('Contact/Contact_model');
      $this->load->model('User/User_model');
    }

    public function index() {
        $this->ListContacts();
    }

    public function ListContacts() {

        if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

                $data['userInfo'] = $userInfo;
                $data['page'] = $this->tableContacts();
                $data['title']= 'CONTACT';
                $this->load->view("Theme/theme", $data);

            } else {
                redirect(base_url('/Register'));
            }

        } else {
            redirect(base_url('/Login'));
        }   

    }


    public function tableContacts() {

        if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

                $data['ListContact']= $this->Contact_model->getAllContacts($idUser);
                return $this->load->view("Contact/Contact_view", $data, true);

            } else {
                redirect(base_url('/Register'));
            }
        } else {
            redirect(base_url('/Login'));
        }
    }


    public function addContact() {  

        if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

                $data = array(
                    'lastnameContact'=> htmlspecialchars($_POST['lastnameContact']),
                    'firstnameContact'=> htmlspecialchars($_POST['firstnameContact']),
                    'telContact'=> htmlspecialchars($_POST['telephoneContact']),
                    'streetContact'=> htmlspecialchars($_POST['streetContact']),
                    'zipCodeContact'=> htmlspecialchars($_POST['zipCodeContact']),
                    'townContact'=> htmlspecialchars($_POST['townContact']),
                    'idUser'=> $idUser
                );

                $this->Contact_model->insert($data);
                redirect(base_url('/Contact'));
            } else {
                redirect(base_url('/Register'));
            }
        } else {
            redirect(base_url('/Login'));
        }
    }


    public function deleteContact() {

        if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

                $idContact = $_POST['idContactToDelete'];

                if (isset($idContact)){

                    $this->Contact_model->delete($idContact);
                } 

                redirect(base_url('/Contact'));
            } else {
                redirect(base_url('/Register'));
            }
        } else {
            redirect(base_url('/Login'));
        }
    }


    public function editContact() {

        if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

                $data = array(
                    'idContact'=> htmlspecialchars($_GET['idContactToEdit']),
                    'lastnameContact'=> htmlspecialchars($_POST['lastnameContactToEdit']),
                    'firstnameContact'=> htmlspecialchars($_POST['firstnameContactToEdit']),
                    'telContact'=> htmlspecialchars($_POST['telephoneContactToEdit']),
                    'streetContact'=> htmlspecialchars($_POST['streetContactToEdit']),
                    'zipCodeContact'=> htmlspecialchars($_POST['zipCodeContactToEdit']),
                    'townContact'=> htmlspecialchars($_POST['townContactToEdit']),
                );

                $this->Contact_model->update($data);
                redirect(base_url('/Contact'));
            } else {
                redirect(base_url('/Register'));
            }
        } else {
            redirect(base_url('/Login'));
        }
    }
}