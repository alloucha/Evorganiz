
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListEvents extends CI_Model{


    protected $table ='Event';
    protected $table2 ='OccasionEvent';
    protected $table3 ='Guest';
    protected $table4 ='Buffet';

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

    public function getAllOccasions(){

      $result = $this->db->select()
                         ->from('OccasionEvent')
                         ->get()
                         ->result();

        return $result;
    }


     public function insert($data){
        
        $this->db->set('themeEvent', $data['themeEvent'])
                  ->set('personConcerned', $data['personConcerned'])
                  ->set('budgetMaxEvent', $data['budgetMaxEvent'])
                  ->set('idOccasion', $data['idOccasionEvent'])
                  ->set('dateEvent', $data['dateEvent'])
                  ->set('venueEvent', $data['venueEvent'])
                 
                 ->insert($this->table);
    }


    public function update($data){

        $this->db->where('idEvent', $data['idEvent'])
                 ->update($this->table, $data);


    }

    public function delete($id){
        
        $this->db->where('idEvent', $id)
                  ->delete($this->table);
    }

}

?>
