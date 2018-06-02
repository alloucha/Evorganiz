<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('Guest/Guest_model');
      $this->load->model('User/User_model');
    }

    public function index() {

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
                redirect(site_url('/Contact'));
            } else {
                redirect(site_url('/Register'));
            }
        } else {
            redirect(site_url('/Login'));
        }
    }


    public function deleteGuest() {

        if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

                $idGuest = $_POST['idGuestToDelete'];

                if (isset($idGuest)){

                    $idEvent = $this->Guest_model->getIdEventByIdGuest($idGuest);                

                    foreach ($idEvent as $event) {
                        $id = $event->idEvent;
                    }

                    $this->Guest_model->delete($idGuest);
                }                 

                redirect(site_url('/EventDashboard?idEvent=' . $id));
            } else {
                redirect(site_url('/Register'));
            }
        } else {
            redirect(site_url('/Login'));
        }
    }

}