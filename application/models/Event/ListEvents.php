
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListEvents extends CI_Model{


    protected $table ='Event';

    public function __construct() {
       parent::__construct();
    } 

    
    public function getEvents() {
        
       $result = $this->db->select()
                       ->from($this->table)
                       ->get()
                       ->result();

       return $result;
    }


    public function getNameEventById($id) {
        
       $result = $this->db->select('nameEvent')
                       ->from($this->table)
                       ->where('idEvent', $id)
                       ->get()
                       ->result();

        return $result;
    }

     public function insert($data){
        
        $this->db->set('themeEvent', $data['themeEvent'])
                  ->set('personConcerned', $data['personConcerned'])
                  ->set('budgetMaxEvent', $data['budgetMaxEvent'])
                  ->set('occasionEvent', $data['occasionEvent'])
                  ->set('dateEvent', $data['dateEvent'])
                 
                 ->insert($this->table);
    }



    public function delete($id){
        
        $this->db->where('idEvent', $id)
                  ->delete($this->table);
    }

}

?>
