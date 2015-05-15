<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Events extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
         $idiom = (empty($this->session->idiom)) ?  $this->session->idiom : $this->config->item('language');
         $this->load->library(array('ion_auth', 'form_validation'));
         $this->load->database();
         $this->load->helper('my_injector');
         $this->lang->load('auth', $idiom);
         $this->load->model('events_model');
         $this->output->enable_profiler(TRUE);
         if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('admin/auth/login', 'refresh');
        }

    }
    
    public function index(){
        $vista = $this->load->view('admin/events_view',"",true);
        $user = $this->ion_auth->user()->row();
         $data = array(
                    'page_content' => $vista,
                    'user_name' => $user->username
                );
        $this->load->view("admin/index_admin_view",$data);
        
    }
    
    public function create_type_event(){
                $this->output->enable_profiler(false);

        $response = new stdClass();
            $this->form_validation->set_rules('event_name', $this->lang->line('create_user_validation_fname_label'), 'required|is_unique[tipos_even.nombre]');
            $this->form_validation->set_rules('event_desc', $this->lang->line('create_user_validation_email_label'), 'required|min_length[10]');
            $this->form_validation->set_rules('event_color', $this->lang->line('create_user_validation_email_label'), 'required');

            if ($this->form_validation->run() == true) {
                $name = $this->input->post('event_name');
                $desc = $this->input->post('event_desc');
                $color = $this->input->post('event_color');
                if ($this->form_validation->run() == true && $this->events_model->insertEvent($name, $desc, $color)) {
                    $response->message = true;
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($response));
                } else {
                    $response->message = false;
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($response));
                }
            }
    }
    
    public function get_types(){
        $this->events_model->selectAllTypes();
    }
    
    
       private function __isAjax() {
        return $this->input->is_ajax_request();
    }
}