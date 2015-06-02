<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Contacta extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $data = array(
            'contacta' => true
        );
         $this->load->view('templates/head');
        $this->load->view('templates/header',$data);
        $this->load->view('contacta');
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
    }
}
