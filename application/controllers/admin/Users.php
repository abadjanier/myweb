<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Users
 *
 * @author abadjanier
 */
class Users extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->output->enable_profiler(TRUE);
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('admin/auth/login', 'refresh');
        }
    }

    function index() {

        
        $users = $this->ion_auth->users()->result();
			$formatedUsers = new stdClass();
			$formatedUsers->data = array();

			foreach ($users as $user) {
				$formatedUsers->data[] = $user;
			}
        $data = array(
                    'users' => $formatedUsers
                );
        
        $vista = $this->load->view('admin/table_users_view',$data,true);
        $user = $this->ion_auth->user()->row();
         $data = array(
                    'page_content' => $vista,
                    'user_name' => $user->username
                );
        $this->load->view("admin/index_admin_view",$data);
    }

}
