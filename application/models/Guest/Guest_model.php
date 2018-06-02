<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest_model extends CI_Model{


    protected $table ='Guest';

    public function __construct() {
       parent::__construct();
    } 


     public function insert($data){
        
        $this->db->set('lastnameContact', $data['lastnameContact'])
                 ->set('firstnameContact', $data['firstnameContact'])
                 ->set('telContact', $data['telContact'])
                 ->set('streetContact', $data['streetContact'])
                 ->set('zipCodeContact', $data['zipCodeContact'])
                 ->set('townContact', $data['townContact'])
                 ->set('idUser', $data['idUser'])
                 ->insert($this->table);
    }


    public function update($data){

        $this->db->where('idContact', $data['idContact'])
                 ->update($this->table, $data);
    }


    public function delete($idGuest){
        
        $this->db->where('idContact', $idGuest)
                  ->delete($this->table);
    }


    public function getIdEventByIdGuest($idGuest){

       $result = $this->db->select('idEvent')
                       ->from($this->table)
                       ->where('idContact', $idGuest)
                       ->get()
                       ->result();

        return $result;
    }
}
?>
