<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Views extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('aviones');
        $this->load->view('templates/footer');
        $this->load->view('templates/back_function');
        $this->load->view('templates/scripts');

    }
}
