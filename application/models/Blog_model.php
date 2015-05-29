<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Blog_model
 *
 * @author abadjanier
 */
class Blog_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function getCategorias($id = false) {
        if ($id == false) {
            $query = $this->db->get('categorias');
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
        } else {

            $query = $this->db->get_where('categorias', array('id' => $id));
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
        }
    }
    
    public function insertPost(){
        
    }

}
