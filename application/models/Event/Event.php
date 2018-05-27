
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Event extends CI_Model{


      protected $tableEvent ='Event';
      protected $tableBuffet ='Buffet';
      protected $tableMeal ='Meal';

      public function __construct() {
         parent::__construct();
      } 

      
      public function getEvents() {
          
         $result = $this->db->select()
                         ->from($this->tableEvent)
                         ->get()
                         ->result();

         return $result;
      }


      public function getNameEventById($id) {
          
         $result = $this->db->select('nameEvent')
                         ->from($this->tableEvent)
                         ->where('idEvent', $id)
                         ->get()
                         ->result();

          return $result;
      }


      public function getBuffetByIdEvent($idEvent){

        $result = $this->db->select()
                         ->from($this->tableBuffet)
                         ->where('idEvent', $idEvent)
                         ->get()
                         ->result();

        return $result;  
      }

  }

?>
