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
            $idiom = ($this->session->idiom) ?  $this->session->idiom : $this->config->item('language');
            $this->db->select('nombre_'.$idiom.' as nombre,id');
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
    
    public function updatePost($posts = false){
        if ($posts != false) {
            $this->db->where('id', $posts->post_id['id1']);
            $this->db->update('posts_lang', $posts->post_1);
            $this->db->where('id', $posts->post_id['id2']);
            $this->db->update('posts_lang', $posts->post_2);
            $this->db->where('id', $posts->post_id['id3']);
            $this->db->update('posts_lang', $posts->post_3);
            $this->db->where('id', $posts->post_id['posts_id']);
            $data = array('titulo_post' => $posts->post_1['titulo'] );
            $this->db->update('posts', $data);

            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function insertPost($data = false, $user_id = false, $categoria = false){
        
        if (!$data == false && !$user_id == false && !$categoria == false){
            $data_posts = array(
                'titulo_post' => $data->post_1['titulo'],
                'users_id' => $user_id
            );
           $this->db->insert('posts', $data_posts);
           $id_post = $this->db->insert_id();
           $data->post_1['posts_id'] = $id_post;
           $data->post_2['posts_id'] = $id_post;
           $data->post_3['posts_id'] = $id_post;
    
           $this->db->insert('posts_lang', $data->post_1);
           $id_post1 = $this->db->insert_id();
           $this->db->insert('posts_lang', $data->post_2);
           $id_post2 = $this->db->insert_id();
           $this->db->insert('posts_lang', $data->post_3);
           $id_post3 = $this->db->insert_id();
           $data_multiple = array(
               array(
                   'posts_lang_id' => $id_post1,
                   'categorias_id' => $categoria
               ),
               array(
                   'posts_lang_id' => $id_post2,
                   'categorias_id' => $categoria
               ),
               array(
                   'posts_lang_id' => $id_post3,
                   'categorias_id' => $categoria
               )
           );
           
           $this->db->insert_batch('posts_lang_has_categorias',$data_multiple);
           
            if ($this->db->affected_rows() > 0){
                return true;
            }else{
               return false; 
            }
        }else{
            return false;
        }
        
    }
    
    
    public function insertCategory($data = false){
        if (!$data == false){
            $this->db->insert('categorias', $data);
            if ($this->db->affected_rows() > 0){
                return true;
            }else{
               return false; 
            }
        }else{
            return false;
        }
        
    }
    
    public function getPosts($id = false){
        if ($id == false){
            $query = $this->db->get('posts');
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
        }else{
            $query = $this->db->get_where('posts', array('id' => $id));
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
        }
    }
    
    public function deletePost($id) {
        if ($id !== false){
            $this->db->delete('posts', array('id' => $id));
            if ($this->db->affected_rows() > 0){
                return true;
            }else{
               return false; 
            }
        }else{
            return false;
        }
    }
    
    public function getPostById($id){
        $this->db->select('posts_lang.*,posts_lang_has_categorias.categorias_id');
        $this->db->from('posts_lang');
        $this->db->join('posts_lang_has_categorias', 'posts_lang.id = posts_lang_has_categorias.posts_lang_id');
        $this->db->join('categorias', 'posts_lang_has_categorias.categorias_id = categorias.id');
        $this->db->where('posts_lang.posts_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
//        echo '<pre>';
//        echo var_dump($query->result());
//        echo $this->db->last_query();
//        echo '</pre>';
//        die('kk');
    }
    
    public function getPostsByTittle($title) {
        $this->db->like('titulo_post', $title);
        $query = $this->db->get('posts');
        if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
    }

}
