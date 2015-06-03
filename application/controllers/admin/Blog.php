<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Blog
 *
 * @author abadjanier
 */
class Blog extends CI_Controller{
    
     public function __construct() {
        parent::__construct();
         $idiom = (empty($this->session->idiom)) ?  $this->session->idiom : $this->config->item('language');
         $this->load->library(array('ion_auth', 'form_validation'));
         $this->load->database();
         $this->load->helper('my_injector');
         $this->lang->load('auth', $idiom);
         $this->load->model('blog_model');
         if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('admin/auth/login', 'refresh');
        }

    }
    
    
    
    public function entradas(){
        $vista = $this->load->view('admin/blog/entradas_blog_view',"",true);
        $user = $this->ion_auth->user()->row();
         $data = array(
                    'page_content' => $vista,
                    'user_name' => $user->username,
                    'title' => 'Entradas',
                    'blog' => true,
                    'entradas' => true
                );
        $this->load->view("admin/index_admin_view",$data);
    }
    
    
    public function categorias(){
        $vista = $this->load->view('admin/blog/categorias_blog_view',"",true);
        $user = $this->ion_auth->user()->row();
         $data = array(
                    'page_content' => $vista,
                    'user_name' => $user->username,
                    'title' => 'Categorias',
                    'blog' => true,
                    'categorias' => true
                );
        $this->load->view("admin/index_admin_view",$data);
    }
    
    
    public function addPost(){
        
        $this->form_validation->set_rules('titulo_cat',"", 'required|is_unique[eventos.nombre]');
        $this->form_validation->set_rules('categoria',"", 'required');
        $this->form_validation->set_rules('contenido_cat',$this->lang->line('create_user_validation_fname_label'), 'required|min_length[5]');
        $this->form_validation->set_rules('titulo_es',"", 'required|min_length[5]|is_unique[eventos.nombre]');
        $this->form_validation->set_rules('contenido_es',$this->lang->line('create_user_validation_fname_label'), 'required|min_length[5]');
        $this->form_validation->set_rules('titulo_en',"", 'required|min_length[5]|is_unique[eventos.nombre]');
        $this->form_validation->set_rules('contenido_en',$this->lang->line('create_user_validation_fname_label'), 'required|min_length[5]');
        
        if (!$this->form_validation->run() == true) {
           $vista = $this->load->view('admin/blog/add_post_view', "", true);
            $user = $this->ion_auth->user()->row();
            $data = array(
                'page_content' => $vista,
                'user_name' => $user->username,
                'title' => 'Add Post',
                'blog' => true,
                'entradas' => true
            );
            $this->load->view("admin/index_admin_view", $data);
        }else{
            $user = $this->ion_auth->user()->row();
            $posts = new stdClass();
            $posts->post_1 = array(
                'titulo' => $this->input->post('titulo_cat'),
                'contenido' => $this->input->post('contenido_cat'),
                'lang' => 'catalan',
                'validado' => true
            );
            $posts->post_2 = array(
                'titulo' => $this->input->post('titulo_es'),
                'contenido' => $this->input->post('contenido_es'),
                'lang' => 'spanish',
                'validado' => true
            );
            $posts->post_3 = array(
                'titulo' => $this->input->post('titulo_en'),
                'contenido' => $this->input->post('contenido_en'),
                'lang' => 'english',
                'validado' => true
            );
            
            
            $this->blog_model->insertPost($posts, $user->id, $this->input->post('categoria'));
            $this->session->set_flashdata('message', true);
            redirect("admin/blog/addPost","refresh");
            
        }
        
        
    }
    
    
    public function addCategory(){
        $this->output->enable_profiler(FALSE);
        $this->form_validation->set_rules('category_cast',"", 'required|min_length[4]|is_unique[categorias.nombre_spanish]');
        $this->form_validation->set_rules('category_cat',"", 'required|min_length[5]|is_unique[categorias.nombre_catalan]');
        $this->form_validation->set_rules('category_en',$this->lang->line('create_user_validation_fname_label'), 'required|min_length[4]|is_unique[categorias.nombre_english]');
        $response = new stdClass();
        if (!$this->form_validation->run() == true){
            $this->form_validation->set_error_delimiters();
            $response->message = validation_errors();
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($response));
        }else{
            $response = new stdClass();
            $data = array(
                'nombre_catalan' => $this->input->post('category_cat'),
                'nombre_spanish' => $this->input->post('category_cast'),
                'nombre_english' => $this->input->post('category_en')
            );
            
            if ($this->blog_model->insertCategory($data)){
                $response->message = 'true';
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($response));
            }else{
                $response->message = 'error';
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($response));
            }
        }
        
    }
    
    
    public function getCategories(){
        $this->output->enable_profiler(false);
        $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($this->blog_model->getCategorias()));
    }
    
    public function getPosts($titulo = false){
        if ($this->__isAjax()) {
            if ($titulo != false) {

                $this->output->enable_profiler(false);
                $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode($this->blog_model->getPostsByTittle($titulo)));
            } else {
                $this->output->enable_profiler(false);
                $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode($this->blog_model->getPosts()));
            }
        } else {
            redirect("admin/blog/entradas", "refresh");
        }
    }
    
    public function updatePost($id = false){
        
        $this->output->enable_profiler(FALSE);
        $this->form_validation->set_rules('titulo_cat',"", 'required|is_unique[eventos.nombre]');
        $this->form_validation->set_rules('categoria',"", 'required');
        $this->form_validation->set_rules('contenido_cat',$this->lang->line('create_user_validation_fname_label'), 'required|min_length[5]');
        $this->form_validation->set_rules('titulo_es',"", 'required|min_length[5]|is_unique[eventos.nombre]');
        $this->form_validation->set_rules('contenido_es',$this->lang->line('create_user_validation_fname_label'), 'required|min_length[5]');
        $this->form_validation->set_rules('titulo_en',"", 'required|min_length[5]|is_unique[eventos.nombre]');
        $this->form_validation->set_rules('contenido_en',$this->lang->line('create_user_validation_fname_label'), 'required|min_length[5]');
        
        if (!$this->form_validation->run() == true && $id == true){
            if ($id != false) {
                
                $posts =  $this->blog_model->getPostById($id);

//                $this->output->enable_profiler(false);
//                $this->output
//                        ->set_content_type('application/json')
//                        ->set_output(json_encode($this->blog_model->getPostById($id)));
                
            $data = array('posts' => $posts);    
            $vista = $this->load->view('admin/blog/modify_post_view', $data, true);
            $user = $this->ion_auth->user()->row();
            $data = array(
                'page_content' => $vista,
                'user_name' => $user->username,
                'title' => 'Add Post',
                'blog' => true,
                'entradas' => true,
                'modify' => true
            );
            $this->load->view("admin/index_admin_view", $data);
                
                
                
                
            }else{
                redirect("admin/blog/entradas","refresh");
            } 
            
        }else {
                
            $user = $this->ion_auth->user()->row();
            $posts = new stdClass();
            $posts->post_1 = array(
                'titulo' => $this->input->post('titulo_cat'),
                'contenido' => $this->input->post('contenido_cat'),
                'id' => $this->input->post('id_cat')
                
            );
            $posts->post_2 = array(
                'titulo' => $this->input->post('titulo_es'),
                'contenido' => $this->input->post('contenido_es'),
                'id' => $this->input->post('id_cast')
            );
            $posts->post_3 = array(
                'titulo' => $this->input->post('titulo_en'),
                'contenido' => $this->input->post('contenido_en'),
                'id' => $this->input->post('id_en')
            );
            $posts->post_id = array(
                'id1' => $this->input->post('id_cat'),
                'id2' => $this->input->post('id_cast'),
                'id3' => $this->input->post('id_en'),
                'posts_id' => $this->input->post('posts_id')
            );
            
            
            $this->blog_model->updatePost($posts);
            redirect("admin/blog/entradas","refresh");
            }
        
            
        
    }
    
    public function deletePost($id){
        $this->output->enable_profiler(false);
        if ($this->__isAjax()){
            $result = new stdClass();
            if ($this->blog_model->deletePost($id)){
                $result->response = true;
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($result));
            }else{
                $result->response = false;
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($result));
            }
        }else{
            redirect("admin/blog/entradas", "refresh");
        }
    }
    
     private function __isAjax() {
        return $this->input->is_ajax_request();
    }
    
}
