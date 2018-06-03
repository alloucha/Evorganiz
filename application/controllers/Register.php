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
            'firstnameUser'=> ucfirst(htmlspecialchars($_POST['firstnameUser'])),
            'lastnameUser'=> strtoupper(htmlspecialchars($_POST['lastnameUser'])),
            'username'=> htmlspecialchars($_POST['username']),
            'password'=> htmlspecialchars($_POST['password']),
            'sexUser'=> htmlspecialchars($_POST['sexUser'])
        );

        if (isset($data['username']) && isset($data['password'])){

            $this->form_validation->set_rules('username', 'Identifiant', 'required|is_unique[User.username]',
            array(
            'required'      => 'You have not provided %s.',
            'is_unique'     => 'This %s already exists.'
                    )
            );

            $this->form_validation->set_rules('password', 'Mot de passe', 'required|min_length[6]');
            
            if ($this->form_validation->run('username') == FALSE)
            {
                $data['usernameAlreadyUsed'] = $data['username'];
                $this->load->view('User/loginPage', $data);
                
            } elseif ($this->form_validation->run() == FALSE) {

                redirect(base_url('Register'));

            } else {
                define("PREFIX", "bjgbsemiogyibl-zohys-ùà");
                define("SUFFIX", "7Y65RHJGN865NEG9hgr");
                $data['password'] = md5( sha1(PREFIX) . $data['password'] . sha1(SUFFIX) );
                
                $this->User_model->insert($data);

                redirect(base_url('Login'));
            }
        }
    }
}

?>
