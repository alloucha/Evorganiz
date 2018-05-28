
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meal_model extends CI_Model{


    protected $table ='Meal';

    public function __construct() {
       parent::__construct();
    } 

    
    public function getAll() {
        
       $result = $this->db->select()
                       ->from($this->table)
                       ->get()
                       ->result();

       return $result;
    }


    public function getAllMealByType($typeMeal){

        $result = $this->db->select()
                       ->from($this->table)
                       ->where('typeMeal', $typeMeal)
                       ->get()
                       ->result();

       return $result;

    }

    public function insert($data){
        
        $this->db->set('nameMeal', $data['nameMeal'])
                 ->set('typeMeal', $data['typeMeal'])
                 ->set('descriptionMeal', $data['descriptionMeal'])
                 ->insert($this->table);
    }

}

?>
