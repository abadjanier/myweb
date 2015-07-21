<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Contacta extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $idiom = (empty($this->session->idiom)) ?  $this->session->idiom : $this->config->item('language');
         $this->lang->load('menu', $idiom);
    }
    
    public function index(){
        $idiom = (($this->session->idiom)) ?  $this->session->idiom : $this->config->item('language');
        $data = array(
            'contacta' => true,
            'idiom' => $idiom
        );
         $this->load->view('templates/head');
        $this->load->view('templates/header',$data);
        $this->load->view('contacta');
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
    }
}
