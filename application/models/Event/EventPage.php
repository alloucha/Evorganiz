
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class EventPage extends CI_Model{


      protected $tableEvent ='Event';
      protected $tableBuffet ='Buffet';
      protected $tableMeal ='Meal';
      protected $tableGuest ='Guest';

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

      public function getMealByIdEvent($idEvent){

        $result = $this->db->select()
                         ->from('Buffet b')
                         ->join('Meal m', 'b.idMeal = m.idMeal')
                         ->where('idEvent', $idEvent)
                         ->get()
                         ->result();

        return $result;
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


  }

?>
