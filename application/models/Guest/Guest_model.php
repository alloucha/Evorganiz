<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest_model extends CI_Model{


    protected $table ='Guest';
    protected $table2 ='Contact';

    public function __construct() {
       parent::__construct();
    } 


    public function getGuestByIdEvent($idEvent){

        $result = $this->db->select()
                         ->from('Guest g')
                         ->join('Contact c', 'g.idContact = c.idContact')
                         ->where('idEvent', $idEvent)
                         ->get()
                         ->result();

        return $result;
    }


     public function insert($data){
        
        $this->db->set('idContact', $data['idContact'])
                 ->set('idEvent', $data['idEvent'])
                 ->set('acceptInvitation', $data['acceptInvitation'])
                ->insert($this->table);
    }


    public function update($data){

        $this->db->where('idContact', $data['idContact'])
                 ->update($this->table, $data);
    }


    public function delete($data){
        
        $this->db->where('idContact', $data['idGuest'])
                  ->where('idEvent', $data['idEvent'])
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
