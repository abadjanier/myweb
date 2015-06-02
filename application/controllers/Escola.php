<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Escola extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $idiom = (empty($this->session->idiom)) ?  $this->session->idiom : $this->config->item('language');
         $this->lang->load('menu', $idiom);
        $this->load->model('blog_model');
    }
    
    public function index($pagina = false){
        $data = array(
            'contacta' => true,
        );
         $this->load->view('templates/head');
        $this->load->view('templates/header',$data);
        
        $inicio = 0;
        $limite = 4;
        if ($pagina) {
            $inicio = ($pagina - 1) * $limite;
        }
        
        $this->load->library('pagination');
         $config['base_url'] = base_url().'escola/';
        $config['total_rows'] = count($this->blog_model->getPostsByCategory('ESCUELA'));
        $config['per_page'] = $limite;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = "</ul>";
        $config['first_link'] = 'Primero';
        $config['last_link'] = 'Último';
        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a><strong>';
        $config['cur_tag_close'] = '</strong></a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = 'Siguiente';
        $config['prev_link'] = 'Anterior';
        $this->pagination->initialize($config);
        
        $data = array(
            'posts' => $this->blog_model->getPostsLimit('ESCUELA',$inicio,$limite),
            'categoria' => $this->lang->line('menu_escuelas')
        );
        
        
        $this->load->view('blog/blog',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
    }
    
    public function article($id = false){
        if ($id != false){
            $data = array(
            'pacobert' => true,
        );
         $this->load->view('templates/head');
        $this->load->view('templates/header',$data);
        
        $data = array(
            'post' => $this->blog_model->getPostByIdPost($id)
        );
        
        $this->load->view('blog/article',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
        }else{
            redirect("escola","refresh");
        }
        
        
        
        
    }
    
    public function getPosts(){
        echo var_dump($this->blog_model->getPostsLimit('FPAC OBERT',0,1));
    }
}
