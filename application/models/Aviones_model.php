<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aviones_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function create_avion($data = false, $user_id = false){
            if (!$data == false && !$user_id == false) {
                $aviones_posts = array(
                    'matricula' => $data->avion_1['matricula'],
                    'users_id' => $user_id
                );
            
            $this->db->insert('aviones', $aviones_posts);
            $id_avion = $this->db->insert_id();
            $data->avion_1['aviones_idavion'] = $id_avion;
            $data->avion_2['aviones_idavion'] = $id_avion;
            $data->avion_3['aviones_idavion'] = $id_avion;
            
            $this->db->insert('aviones_lang', $data->avion_1);
            $this->db->insert('aviones_lang', $data->avion_2);
            $this->db->insert('aviones_lang', $data->avion_3);
            
                if ($this->db->affected_rows() > 0) {
                    return true;
                } else {
                    return false;
                }
        } else {
            return false;
        }
    }
    public function selectAllTypes() {
        $this->db->select('idavion, aviones_lang.matricula, visibilidad');
        
        $this->db->from('aviones');
        $this->db->join('aviones_lang', 'aviones.idavion = aviones_lang.aviones_idavion');
        $this->db->group_by("idavion"); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function desactivate($id) {
        $this->db->set('visibilidad', 0);
        $this->db->where('idavion', $id);
        $this->db->update('aviones');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function activate($id) {
        $this->db->set('visibilidad', 1);
        $this->db->where('idavion', $id);
        $this->db->update('aviones');
         if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function upload_image(){
        $uploaddir = 'source/aviones/';
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
        
        
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                
                $this->create_miniatura($_FILES['userfile']['name']);
                return true;
                
            } else {
                return false;
            }
            
            
    }
    public function create_miniatura($name){
        /*header('Content-type: image/jpeg');
        $imagen = new Imagick(base_url().'assets/custom/img/aviones/'.$name);
        $imagen->thumbnailImage(720, 0);
        if ($imagen->writeImage(base_url().'assets/custom/img/aviones/thumbs/'.$name)) {
            return true;
        } else {
            return false;
        }*/
        /*$datos = getimagesize('assets/custom/img/aviones/'.$name);
        var_dump($datos);die;*/
        $config['image_library'] = 'gd2';
        $config['source_image']	= 'source/aviones/'.$name;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['rotation_angle'] = 270;
        $config['width']	= 700;
        $config['height']	= 500;
        
        
        
        $this->load->library('image_lib', $config); 
        
        $this->image_lib->resize();
        
    }
    public function deleteAvion($id) {
      $this->db->delete('aviones', array('idavion' => $id));
		if ($this->db->affected_rows() == 0)
		{
		    return FALSE;
		} else {
                    
                    return TRUE;
                }

    }
    public function modifyAvion($id) {
        
        $param = array('aviones_idavion' => $id);
        $query = $this->db->where($param);
        $query = $this->db->get('aviones_lang');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    
    }
    public function modificar_avion($aviones, $user_id) {
        if (!$aviones == false && !$user_id == false) {
            $this->db->update('aviones_lang', $aviones->avion_1, array('idavion_lang' => $aviones->avion_1['idavion_lang']));
            $this->db->update('aviones_lang', $aviones->avion_2, array('idavion_lang' => $aviones->avion_2['idavion_lang']));
            $this->db->update('aviones_lang', $aviones->avion_3, array('idavion_lang' => $aviones->avion_3['idavion_lang']));
            
            
                if ($this->db->affected_rows() > 0) {
                    return true;
                } else {
                    return false;
                }
        } else {
            return false;
        }
        }
        
    public function getAvionesLang($id = false){
        
        $idiom = ($this->session->idiom) ?  $this->session->idiom : $this->config->item('language');
        if ($id != false){
            $this->db->select('aviones_lang.*');
            $this->db->from('aviones_lang');
            $this->db->join('aviones', 'aviones.idavion = aviones_lang.aviones_idavion');
            $param = array('aviones_lang.aviones_idavion' => $id);
            $this->db->where($param);
            $param = array('aviones_lang.lang' => $idiom);
            $this->db->where($param);
            $param = array('aviones.visibilidad' => '1');
            $this->db->where($param);
            $query = $this->db->get();
            
        }else{
            $this->db->select('aviones_lang.nombre, aviones_lang.imagen,aviones_lang.aviones_idavion');
            $this->db->from('aviones_lang');
            $this->db->join('aviones', 'aviones.idavion = aviones_lang.aviones_idavion ');
            $param = array('aviones_lang.lang' => $idiom);
            $this->db->where($param);
             $query = $this->db->get();
           
        }
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    
     public function getAvionByName($name) {
         $idiom = ($this->session->idiom) ?  $this->session->idiom : $this->config->item('language');
        $this->db->like('nombre', $name);
        $param = array('lang' => $idiom);
        $this->db->where($param);
        $query = $this->db->get('aviones_lang');
        if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
    }
    
    
}
// Produce: SELECT titulo, contenido, fecha FROM mitabla
    
