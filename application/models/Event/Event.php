
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Event extends CI_Model{


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

  }

?>
