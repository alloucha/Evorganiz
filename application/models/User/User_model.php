
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{


    protected $table ='User';
    
    public function __construct() {
       parent::__construct();
    } 


    public function insert($data){
        
        $this->db ->set('firstnameUser', $data['firstnameUser'])
                  ->set('lastnameUser', $data['lastnameUser'])
                  ->set('username', $data['username'])
                  ->set('password', $data['password'])
                  ->set('sexUser', $data['sexUser'])     
                 ->insert($this->table);
    }


    public function getUserByUsernamePassword($data){

        $result = $this->db->select()
                  ->from($this->table)
                  ->where('username', $data['username'])
                  ->where('password', $data['password'])
                  ->get()
                  ->result();

        return $result;
    }


    public function getUserByIdUser($id){

        $result = $this->db->select()
                          ->from($this->table)
                          ->where('idUser', $id)
                          ->get()
                          ->result();

        return $result;
    }

}

?>