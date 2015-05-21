<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insertTypeEvent($nombre = false, $desc = false, $color = false) {
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
        if ($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
    
    public function insertEvent($name, $desc, $fini, $hini, $mini, $event_type, $user_id, $ffin = false, $hfin = false, $mfin = false){
         $response = new stdClass();
        
        if ($ffin == false && $hfin == false && $mfin == false){
            $data = array(
                'nombre' => $name,
                'descripcion' => $desc,
                'f_ini' => $fini,
                'h_ini' => $hini,
                'm_ini' => $mini,
                'tipo_evento_id' => $event_type,
                'users_id' => $user_id,
                'allday' => true,
                'f_fin' => $fini,
                'h_fin' => '00',
                'm_fin' => '00'
            );
            
            $this->db->insert('eventos',$data);
            if ($this->db->affected_rows() > 0){
                return true;
            }else{
               return false; 
            }
            
        }else{
            
            $data = array(
                'nombre' => $name,
                'descripcion' => $desc,
                'f_ini' => $fini,
                'h_ini' => $hini,
                'm_ini' => $mini,
                'tipo_evento_id' => $event_type,
                'users_id' => $user_id,
                'allday' => false,
                'f_fin' => $ffin,
                'h_fin' => $hfin,
                'm_fin' => $mfin
            );
            
            $this->db->insert('eventos',$data);
            if ($this->db->affected_rows() > 0){
                return true;
            }else{
               return false; 
            }
        }
    }
    
    
    public function getAllEvents(){
        $this->db->select('eventos.nombre,eventos.f_fin,eventos.f_ini,eventos.m_fin, eventos.h_fin,eventos.m_ini,eventos.h_ini,eventos.allday,tipos_even.color');
        $this->db->from('eventos');
        $this->db->join('tipos_even', 'tipos_even.id = eventos.tipo_evento_id');
        $query = $this->db->get();
        if ($this->db->affected_rows() > 0){
                return $query->result();
            }else{
               return false; 
            }
    }
}
