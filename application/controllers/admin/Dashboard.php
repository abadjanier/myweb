<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
            parent::__construct();
            $this->load->library(array('ion_auth','form_validation'));
            $this->output->enable_profiler(TRUE);
            
            if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('admin/auth/login', 'refresh');
		}
	}

	//redirect if needed, otherwise display the user list
	function index()
	{	$user = $this->ion_auth->user()->row();
		
                $data = array(
                    'user_name' => $user->username
                );
		$this->load->view('admin/index_admin_view',$data);
	}
}
