<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('Guest/Guest_model');
      $this->load->model('Contact/Contact_model');
      $this->load->model('User/User_model');
    }

    public function index() {

    }

    public function addGuest() {  

        if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

                if (!empty(htmlspecialchars($_POST['newGuest']))){

                        $data = array(
                            'idContact'=> htmlspecialchars($_POST['newGuest']),
                            'idEvent'=> $_GET['idEvent'],
                            'acceptInvitation'=> 'Non'
                        );

                         $this->Guest_model->insert($data);
                }
    
                var_dump($data['idEvent']);
                var_dump(base_url('/EventDashboard?idEvent=' . $data['idEvent']));
                //redirect(base_url('/EventDashboard?idEvent=' . $data['idEvent']));

            } else {
                redirect(base_url('/Register'));
            }
        } else {
            redirect(base_url('/Login'));
        }
    }


    public function deleteGuest() {

        if (!empty(get_cookie('idUserCookie'))){

            $idUser = get_cookie('idUserCookie');
            $idUser = $this->encryption->decrypt($idUser);
            $userInfo = $this->User_model->getUserByIdUser($idUser);

            if (!empty($userInfo)){

                $data = array(
                    'idGuest'=> htmlspecialchars($_POST['idGuestToDelete']),
                    'idEvent'=> $_GET['idEvent']
                );

                if (isset($data['idGuest'])){

                    $this->Guest_model->delete($data);
                }                 

                redirect(base_url('/EventDashboard?idEvent=' . $data['idEvent']));
            } else {
                redirect(base_url('/Register'));
            }
        } else {
            redirect(base_url('/Login'));
        }
    }

}