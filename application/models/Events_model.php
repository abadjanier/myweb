<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insertEvent($nombre = false, $desc = false, $color = false) {
        if ($nombre !== false && $desc !== false){
            $data = array(
                'nombre' => $nombre,
                'descripcion' => $desc,
                'color' => $color
            );

            $this->db->insert('tipos_even', $data);
            return true;
        }else{
            return false;
        }
    }
    
    public function selectAllTypes() {
        $query = $this->db->get('tipos_even');
        echo '<pre>'.var_dump($query->row())."</pre><br>";
        echo $query->num_rows();
        if ($query->num_rows() > 0){
//            return $query->row();
        }else{
//            return false;
        }
    }
}
