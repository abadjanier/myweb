<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Main extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->load->view('templates/head');
        $this->load->view('home');
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
    }
}
