
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{


    protected $table ='User';
    
    public function __construct() {
       parent::__construct();
    } 


    public function insert($data){
        
        $this->db ->set('firstnameUser', $data['firstnameUser'])
                  ->set('lastnameUser', $data['lastnameUser'])
                  ->set('mailUser', $data['mailUser'])
                  ->set('passwordUser', $data['passwordUser'])     
                 ->insert($this->table);
    }


    public function getUserByMailPassword($data){

        $result = $this->db->select()
                  ->from($this->table)
                  ->where('mailUser', $data['mail'])
                  ->where('passwordUser', $data['password'])
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