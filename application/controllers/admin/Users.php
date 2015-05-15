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
        
        $idiom = (empty($this->session->idiom)) ?  $this->session->idiom : $this->config->item('language');
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->database();
        $this->load->helper('my_injector');
        $this->lang->load('auth', $idiom);
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
    
    function create_user() {
        $this->load->helper('string');
        $tables = $this->config->item('tables', 'ion_auth');
        $response = new stdClass();
        
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        
        if ($this->form_validation->run() == true) {
            $username = strtolower($this->input->post('first_name'));
            $email = strtolower($this->input->post('email'));
            $group = array();
            $password = random_string('md5');
            $additional_data = "";
        }
        
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
            //check to see if we are creating the user
            //redirect them back to the admin page
            $response->message = $this->ion_auth->messages();
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response));
        }else {
            //display the create user form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['company'] = array(
                'name' => 'company',
                'id' => 'company',
                'type' => 'text',
                'value' => $this->form_validation->set_value('company'),
            );
            $this->data['phone'] = array(
                'name' => 'phone',
                'id' => 'phone',
                'type' => 'text',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );
            $response->message = "error";
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response));
        }
    }
    
    function getUsersDatatable() {
        $this->output->enable_profiler(FALSE);

        //If is an ajax requiest
        if ($this->input->is_ajax_request()) {
            $users = $this->ion_auth->users()->result();
            $formatedUsers = new stdClass();
            $formatedUsers->data = array();
            $userLog = $this->ion_auth->user()->row();
            foreach ($users as $user) {
                if ($user->username !== $userLog->username) {
                $formatedUsers->data[] = $user;
                }
            }
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($formatedUsers->data));
        } else {
            redirect("admin/users", "refresh");
        }
    }
    
    function deleteUser($id){
        if ($this->__isAjax()){
            $result = new stdClass();
            $admin = $this->ion_auth->user()->row();
            if ($this->ion_auth->delete_user($id)){
                $result->response = true;
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($result));
            }else{
                $result->response = false;
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($result));
            }
        }else{
            redirect("admin/users", "refresh");
        }
    }
    
    function deactivate($id) {
        $response = new stdClass();
        $this->output->enable_profiler(FALSE);
        if ($this->__isAjax()) {
            $id = (int) $id;

            if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
                if ($this->ion_auth->deactivate($id)){
                $response->error = true;
                $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode($response));
                }else{
                $response->error = false;
                $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode($response));
                }
            }
        }
    }
    
    function activate($id) {
        $response = new stdClass();
        $this->output->enable_profiler(FALSE);
        if ($this->__isAjax()) {
            $id = (int) $id;

            if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
                if ($this->ion_auth->activate($id)){
                $response->error = true;
                $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode($response));
                }else{
                $response->error = false;
                $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode($response));
                }
            }
        }
    }
    
    
   
    
    private function __isAjax() {
        return $this->input->is_ajax_request();
    }

}
