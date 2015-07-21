<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Events extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
         $idiom = (empty($this->session->idiom)) ?  $this->session->idiom : $this->config->item('language');
         $this->load->library(array('ion_auth', 'form_validation'));
         $this->load->database();
         $this->load->helper('my_injector');
         $this->lang->load('auth', $idiom);
         $this->load->model('events_model');
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
                    'user_name' => $user->username,
                    'events' => true,
                    'title' => 'Events'
                );
        $this->load->view("admin/index_admin_view",$data);
        
    }
    public function getAll() {
        $this->output->enable_profiler(false);
        $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($this->events_model->getAllEvents()));
    }
    
    public function addEvent(){
        $this->output->enable_profiler(false);

        $response = new stdClass();
        
        $this->form_validation->set_rules('event_name',"", 'required|min_length[5]|is_unique[eventos.nombre]');
        $this->form_validation->set_rules('event_type',"", 'required');
        $this->form_validation->set_rules('event_desc',$this->lang->line('create_user_validation_fname_label'), 'required|min_length[5]');
        $this->form_validation->set_rules('event_ffin',$this->lang->line('create_user_validation_fname_label'), 'min_length[8]');
        $this->form_validation->set_rules('event_fini',$this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('event_hini',$this->lang->line('create_user_validation_fname_label'), 'required|numeric|max_length[2]');
        $this->form_validation->set_rules('event_mini',$this->lang->line('create_user_validation_fname_label'), 'required|numeric|max_length[2]');
        $this->form_validation->set_rules('event_hfin',$this->lang->line('create_user_validation_fname_label'), 'numeric|max_length[2]');
        $this->form_validation->set_rules('event_mfin',$this->lang->line('create_user_validation_fname_label'), 'numeric|max_length[2]');
        
        if ($this->form_validation->run() == true) {
            $user = $this->ion_auth->user()->row();
                $nombre = $this->input->post('event_name');
                $desc = $this->input->post('event_desc');
                $fini = $this->input->post('event_fini');
                $hini = $this->input->post('event_hini');
                $mini = $this->input->post('event_mini');
                $event_type = $this->input->post('event_type');
            if ($this->input->post('event_fallday') != null) {
                if($this->events_model->insertEvent($nombre , $desc , $fini,$hini,$mini , $event_type , $user->id)){
                    $response->message = "true";
                    $response->events = $this->events_model->getAllEvents();
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($response));
                }else{
                    $response->message = "error";
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($response));
                }
                
                
                
                
            }else{
                if ($this->input->post('event_ffin') != null && $this->input->post('event_hfin') != null && $this->input->post('event_mfin')) {
                    $ffin = $this->input->post('event_ffin');
                    $hfin = $this->input->post('event_hfin');
                    $mfin = $this->input->post('event_mfin');

                    if ($this->events_model->insertEvent($nombre, $desc, $fini, $hini, $mini, $event_type, $user->id, $ffin, $hfin, $mfin)) {
                        $response->message = "true";
                        $response->events = $this->events_model->getAllEvents();
                        $this->output
                                ->set_content_type('application/json')
                                ->set_output(json_encode($response));
                    } else {
                        $response->message = "error";
                        $this->output
                                ->set_content_type('application/json')
                                ->set_output(json_encode($response));
                    }
                }
            }
        }else{
            $response->message = validation_errors();
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($response));
        }
        
    }
    
   public function updateEvent($id){
       $this->output->enable_profiler(false);

        $response = new stdClass();
        
        $this->form_validation->set_rules('event_name',"", 'required|min_length[5]');
        $this->form_validation->set_rules('event_type',"", 'required');
        $this->form_validation->set_rules('event_desc',$this->lang->line('create_user_validation_fname_label'), 'required|min_length[5]');
        $this->form_validation->set_rules('event_ffin',$this->lang->line('create_user_validation_fname_label'), 'min_length[8]');
        $this->form_validation->set_rules('event_fini',$this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('event_hini',$this->lang->line('create_user_validation_fname_label'), 'required|numeric|max_length[2]');
        $this->form_validation->set_rules('event_mini',$this->lang->line('create_user_validation_fname_label'), 'required|numeric|max_length[2]');
        $this->form_validation->set_rules('event_hfin',$this->lang->line('create_user_validation_fname_label'), 'numeric|max_length[2]');
        $this->form_validation->set_rules('event_mfin',$this->lang->line('create_user_validation_fname_label'), 'numeric|max_length[2]');
        
        if ($this->form_validation->run() == true) {
            $user = $this->ion_auth->user()->row();
                $nombre = $this->input->post('event_name');
                $desc = $this->input->post('event_desc');
                $fini = $this->input->post('event_fini');
                $hini = $this->input->post('event_hini');
                $mini = $this->input->post('event_mini');
                $event_type = $this->input->post('event_type');
                
                
            if ($this->input->post('event_fallday') != null) {
                $data = array(
                'nombre' => $nombre,
                'descripcion' => $desc,
                'f_ini' => $fini,
                'h_ini' => $hini,
                'm_ini' => $mini,
                'tipo_evento_id' => $event_type,
                'allday' => true,
                'f_fin' => $fini,
                'h_fin' => '00',
                'm_fin' => '00'
                );
                if($this->events_model->updateEvent($id, $data)){
                    $response->message = "true";
                    $response->events = $this->events_model->getAllEvents();
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($response));
                }else{
                    $response->message = "error";
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($response));
                }
                
                
                
                
            }else{
                if ($this->input->post('event_ffin') != null && $this->input->post('event_hfin') != null && $this->input->post('event_mfin')) {
                    $ffin = $this->input->post('event_ffin');
                    $hfin = $this->input->post('event_hfin');
                    $mfin = $this->input->post('event_mfin');
                    $data = array(
                        'nombre' => $nombre,
                        'descripcion' => $desc,
                        'f_ini' => $fini,
                        'h_ini' => $hini,
                        'm_ini' => $mini,
                        'tipo_evento_id' => $event_type,
                        'allday' => false,
                        'f_fin' => $ffin,
                        'h_fin' => $hfin,
                        'm_fin' => $mfin
                    );

                    if ($this->events_model->updateEvent($id, $data)) {
                        $response->message = "true";
                        $response->events = $this->events_model->getAllEvents();
                        $this->output
                                ->set_content_type('application/json')
                                ->set_output(json_encode($response));
                    } else {
                        $response->message = "error";
                        $this->output
                                ->set_content_type('application/json')
                                ->set_output(json_encode($response));
                    }
                }
            }
        }else{
            $response->message = validation_errors();
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($response));
        }
       
   } 
    
   public function deleteEvent($id){
       $this->output->enable_profiler(false);
        if ($this->__isAjax()){
            $result = new stdClass();
            if ($this->events_model->deleteEvents($id)){
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
            redirect("admin/events", "refresh");
        }
       
   }


    public function create_type_event(){
                $this->output->enable_profiler(false);

        $response = new stdClass();
            $this->form_validation->set_rules('event_name', $this->lang->line('create_user_validation_fname_label'), 'required|is_unique[tipos_even.nombre]');
            $this->form_validation->set_rules('event_desc', $this->lang->line('create_user_validation_email_label'), 'required|min_length[5]');
            $this->form_validation->set_rules('event_color', $this->lang->line('create_user_validation_email_label'), 'required|is_unique[tipos_even.color]');

            if ($this->form_validation->run() == true) {
                $name = $this->input->post('event_name');
                $desc = $this->input->post('event_desc');
                $color = $this->input->post('event_color');
                if ($this->form_validation->run() == true && $this->events_model->insertTypeEvent($name, $desc, $color)) {
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
        $this->output->enable_profiler(FALSE);

        //If is an ajax requiest
        if ($this->input->is_ajax_request()) {
            $events = $this->events_model->selectAllTypes();
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($events));
        } else {
            redirect("admin/events", "refresh");
        }
    }
    
    
       private function __isAjax() {
        return $this->input->is_ajax_request();
    }
}
