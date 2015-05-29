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
         $this->output->enable_profiler(TRUE);
         if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('admin/auth/login', 'refresh');
        }

    }
    
    public function addPost(){
        
        $this->form_validation->set_rules('titulo_cat',"", 'required|is_unique[eventos.nombre]');
        $this->form_validation->set_rules('categoria_cat',"", 'required');
        $this->form_validation->set_rules('contenido_cat',$this->lang->line('create_user_validation_fname_label'), 'required|min_length[5]');
        $this->form_validation->set_rules('titulo_es',"", 'required|min_length[5]|is_unique[eventos.nombre]');
        $this->form_validation->set_rules('categoria_es',"", 'required');
        $this->form_validation->set_rules('contenido_es',$this->lang->line('create_user_validation_fname_label'), 'required|min_length[5]');
        $this->form_validation->set_rules('titulo_en',"", 'required|min_length[5]|is_unique[eventos.nombre]');
        $this->form_validation->set_rules('categoria_en',"", 'required');
        $this->form_validation->set_rules('contenido_en',$this->lang->line('create_user_validation_fname_label'), 'required|min_length[5]');
        
        if (!$this->form_validation->run() == true) {
           $vista = $this->load->view('admin/blog/add_post_view', "", true);
            $user = $this->ion_auth->user()->row();
            $data = array(
                'page_content' => $vista,
                'user_name' => $user->username,
                'title' => 'Add Post',
                'events' => true
            );
            $this->load->view("admin/index_admin_view", $data);
        }else{
            $user = $this->ion_auth->user()->row();
            $posts = new stdClass();
            $posts->post_1 = array(
                'titulo' => $this->input->post('titulo_cat'),
                'contenido' => $this->input->post('categoria_cat'),
                'titulo' => $this->input->post('contenido_cat'),
                'lang' => 'catalan',
                'validado' => true,
                'user_id'=> $user->id
            );
            $posts->post_2 = array(
                'titulo' => $this->input->post('titulo_es'),
                'contenido' => $this->input->post('categoria_es'),
                'titulo' => $this->input->post('contenido_es'),
                'lang' => 'spanish',
                'validado' => true,
                'user_id'=> $user->id
            );
            $posts->post_3 = array(
                'titulo' => $this->input->post('titulo_en'),
                'contenido' => $this->input->post('categoria_en'),
                'titulo' => $this->input->post('contenido_en'),
                'lang' => 'english',
                'validado' => true,
                'user_id'=> $user->id
            );
            
            
            $this->blog_model->getCategorias(4);
        }
        
        
    }
    
}
