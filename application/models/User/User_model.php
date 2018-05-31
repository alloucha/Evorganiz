
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{


    protected $table ='User';
    
    public function __construct() {
       parent::__construct();
    } 


    public function insert($data){
        
        $this->db ->set('firstnameUser', $data['firstnameUser'])
                  ->set('lastnameUser', $data['lastnameUser'])
                  ->set('mailUser', $data['mailUser'])
                  ->set('passwordUser', $data['passwordUser'])     
                 ->insert($this->table);
    }

}

?>
