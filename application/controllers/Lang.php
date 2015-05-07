<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lang extends CI_Controller {

	function index(){
//		redirect('/', 'refresh');
            echo $this->config->item('language');
            $this->config->set_item('language', 'english');
            echo '<pre>';
            print_r($this->config);
            echo '</pre>';
                $this->session->set_userdata(array("idiom" => "catalan"));
                echo $this->session->idiom;
                $idiom = (empty($this->session->idiom)) ?  $this->session->idiom : $this->config->item('language'); 
        
        $this->lang->load('ion_auth', $idiom);
            echo lang('account_creation_duplicate_email');;
	}

	function es(){
		$this->session->set_userdata(array("idiom" => "spanish"));
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	function cat(){
		$this->session->set_userdata(array("idiom" => "catalan"));		
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
}