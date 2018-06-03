<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meal_model extends CI_Model{


    protected $table ='Meal';

    public function __construct() {
       parent::__construct();
    } 


    public function getAllMeals($idUser) {
        
       $result = $this->db->select()
                       ->from($this->table)
                       ->where('idUser', $idUser)
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
    

    public function getAllMealNotInBuffet($buffet, $idUser) {

       $result = $this->db->select()
                       ->from($this->table)
                       ->where('idUser', $idUser)
                       ->where_not_in('idMeal', $buffet)
                       ->get()
                       ->result();

       return $result;
    }

    public function getAllMealByType($typeMeal, $idUser){

        $result = $this->db->select()
                       ->from($this->table)
                       ->where('typeMeal', $typeMeal)
                       ->where('idUser', $idUser)
                       ->get()
                       ->result();

       return $result;

    }

    public function insert($data){
        
        $this->db->set('nameMeal', $data['nameMeal'])
                 ->set('typeMeal', $data['typeMeal'])
                 ->set('descriptionMeal', $data['descriptionMeal'])
                 ->set('idUser', $data['idUser'])
                 ->insert($this->table);
    }

    public function update($data){

        $this->db->where('idMeal', $data['idMeal'])
                 ->update($this->table, $data);
    }


    public function delete($id){
        
        $this->db->where('idMeal', $id)
                  ->delete($this->table);
    }

}

?>
