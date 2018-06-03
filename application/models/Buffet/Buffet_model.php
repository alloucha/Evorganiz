<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buffet_model extends CI_Model{


    protected $table ='Buffet';
    protected $table2 ='Meal';

    public function __construct() {
       parent::__construct();
    } 


    public function getBuffetByIdEvent($idEvent){

        $result = $this->db->select()
                         ->from('Buffet b')
                         ->join('Meal m', 'm.idMeal = b.idMeal')
                         ->where('idEvent', $idEvent)
                         ->get()
                         ->result();

        return $result;
    }


     public function insert($data){
        
        $this->db->set('idMeal', $data['idMeal'])
                 ->set('idEvent', $data['idEvent'])
                 ->set('pricePerPerson', $data['pricePerPerson'])
                ->insert($this->table);
    }


    public function update($data){

        $this->db->where('idMeal', $data['idMeal'])
                 ->update($this->table, $data);
    }


    public function delete($data){
        
        $this->db->where('idMeal', $data['idMeal'])
                  ->where('idEvent', $data['idEvent'])
                  ->delete($this->table);
    }


    public function getIdEventByIdMealInBuffet($idGuest){

       $result = $this->db->select('idEvent')
                       ->from($this->table)
                       ->where('idMeal', $idMeal)
                       ->get()
                       ->result();

        return $result;
    }
}
?>
