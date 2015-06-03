<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Aviones extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $idiom = (empty($this->session->idiom)) ?  $this->session->idiom : $this->config->item('language');
         $this->lang->load('menu', $idiom);
         $this->load->helper('my_injector');
         $this->load->model("aviones_model");
    }
    
    public function index(){
        $data = array(
            'contacta' => true
        );
         $this->load->view('templates/head');
        $this->load->view('templates/header',$data);
        $this->load->view('aviones/listado_aviones');
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
    }
    
    public function avion($id = false){
        if($id != false){
            
            $data = array(
            'contacta' => true
        );
         $this->load->view('templates/head');
        $this->load->view('templates/header',$data);
        $data = array(
            'avion' => $this->aviones_model->getAvionesLang($id)
        );
        $this->load->view('aviones/avion',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
            
        }else{
            redirect("aviones", "refresh");
        }
        
    }
    
    
    public function getAviones($id = false) {
        if (true) {
            $response = new stdClass();
            if ($id != false) {
                if ($response->avion = $this->aviones_model->getAvionesLang($id)) {
                    $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response->avion));
                }
            } else {
                if ($response->aviones = $this->aviones_model->getAvionesLang()) {
                    $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response->aviones));
                }
            }
        } else {
            redirect("aviones", "refresh");
        }
    }
    
    public function getAvionByName($name = false){
        if ($this->__isAjax()) {
            if ($name != false) {

                $this->output->enable_profiler(false);
                $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode($this->aviones_model->getAvionByName($name)));
            } else if(empty ($name)){
                $this->output->enable_profiler(false);
                $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode($this->aviones_model->getAvionesLang()));
            }else {
                redirect("aviones", "refresh");
            }
        } else {
            redirect("aviones", "refresh");
        }
    }

    private function __isAjax() {
        return $this->input->is_ajax_request();
    }
}
