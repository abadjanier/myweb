<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aviones extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->output->enable_profiler(false);
        $idiom = (empty($this->session->idiom)) ? $this->session->idiom : $this->config->item('language');
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->database();
        $this->load->helper('my_injector', 'dialog');
        $this->lang->load('auth', $idiom);
        $this->lang->load('avion_lang', $idiom);
        $this->load->model("aviones_model");
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('admin/aviones', 'refresh');
        }
    }

    function index() {
        $user = $this->ion_auth->user()->row();
        $vista = $this->load->view("admin/table_aviones_view", "", TRUE);
        $data = array(
            'user_name' => $user->username,
            'page_content' => $vista,
            'title' => 'Aviones'
        );
        $this->load->view('admin/index_admin_view', $data);
    }

    function getAviones() {
        $this->output->enable_profiler(FALSE);

        if ($this->input->is_ajax_request()) {
            $aviones = $this->aviones_model->selectAllTypes();
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($aviones));
        } else {
            redirect("admin/aviones", "refresh");
        }
    }

    function desactivate($id) {
        $this->output->enable_profiler(FALSE);
        if ($this->__isAjax()) {
            $response = new stdClass();
            if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
                if ($this->aviones_model->desactivate($id)) {
                    $response->error = "ha ido bien";
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($response));
                } else {
                    $response->error = false;
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($response));
                }
            }
        } else {
            redirect("admin/aviones", "refresh");
        }
    }

    function activate($id) {
        $this->output->enable_profiler(FALSE);
        if ($this->__isAjax()) {
            $response = new stdClass();
            if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
                if ($this->aviones_model->activate($id)) {
                    $response->error = "ha ido bien";
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($response));
                } else {
                    $response->error = false;
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($response));
                }
            }
        } else {
            redirect("admin/aviones", "refresh");
        }
    }

    function deleteAvion($id) {
        $this->output->enable_profiler(FALSE);
        if ($this->__isAjax()) {

            $result = new stdClass();
            if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
                if ($this->aviones_model->deleteAvion($id)) {
                    $result->response = true;
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($result));
                } else {
                    $result->response = false;
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($result));
                }
            }
        } else {
            redirect("admin/aviones", "refresh");
        }
    }

    function create_avion() {

        $this->output->enable_profiler(false);

        $response = new stdClass();

        $this->form_validation->set_rules('matricula', $this->lang->line('avion_matricula_label'), 'required');
        $this->form_validation->set_rules('nombre', $this->lang->line('avion_name_label'), 'required|max_length[45]');
        $this->form_validation->set_rules('estado', $this->lang->line('avion_estado_label'), 'max_length[45]');
        $this->form_validation->set_rules('motor', $this->lang->line('avion_motor_label'), 'max_length[45]');
        $this->form_validation->set_rules('cc', $this->lang->line('avion_cc_label'), 'max_length[45]');
        $this->form_validation->set_rules('envergadura', $this->lang->line('avion_envergadura_label'), 'max_length[45]');
        $this->form_validation->set_rules('longitud', $this->lang->line('avion_longitud_label'), 'max_length[45]');
        $this->form_validation->set_rules('peso', $this->lang->line('avion_peso_label'), 'max_length[45]');
        $this->form_validation->set_rules('velmax', $this->lang->line('avion_velmax_label'), 'max_length[45]');
        $this->form_validation->set_rules('techo', $this->lang->line('avion_techo_label'), 'max_length[45]');
        $this->form_validation->set_rules('primervuelo', $this->lang->line('avion_primervuelo_label'), 'max_length[45]');
        $this->form_validation->set_rules('mtow', $this->lang->line('avion_mtow_label'), 'max_length[45]');
        $this->form_validation->set_rules('armamento', $this->lang->line('avion_armamento_label'), 'max_length[45]');
        $this->form_validation->set_rules('hcat', $this->lang->line('avion_hcat_label'), 'required');
        $this->form_validation->set_rules('hcas', $this->lang->line('avion_hcas_label'), 'required');
        $this->form_validation->set_rules('hen', $this->lang->line('avion_hen_label'), 'required');
        $this->form_validation->set_rules('userfile');





        if (!$this->form_validation->run() == true) {
            $vista = $this->load->view('admin/table_aviones_view', "", true);
            $user = $this->ion_auth->user()->row();
            $data = array(
                'page_content' => $vista,
                'user_name' => $user->username,
                'title' => 'Aviones'
            );
            $this->load->view("admin/index_admin_view", $data);
        } else {
            if ($this->aviones_model->upload_image()) {
                $aviones = new stdClass();
                $user = $this->ion_auth->user()->row();
                $aviones->avion_1 = array(
                    'matricula' => $this->input->post('matricula'),
                    'nombre' => $this->input->post('nombre'),
                    'estado' => $this->input->post('estado'),
                    'motor' => $this->input->post('motor'),
                    'cilindrada' => $this->input->post('cc'),
                    'envergadura' => $this->input->post('envergadura'),
                    'longitud' => $this->input->post('longitud'),
                    'velocidad_max' => $this->input->post('velmax'),
                    'techo' => $this->input->post('techo'),
                    'primervuelo' => $this->input->post('primervuelo'),
                    'mtow' => $this->input->post('mtow'),
                    'armamento' => $this->input->post('armamento'),
                    'peso' => $this->input->post('peso'),
                    'historia' => $this->input->post('hcat'),
                    'lang' => 'catalan',
                    'imagen' => $_FILES['userfile']['name']
                );
                $aviones->avion_2 = array(
                    'matricula' => $this->input->post('matricula'),
                    'nombre' => $this->input->post('nombre'),
                    'estado' => $this->input->post('estado'),
                    'motor' => $this->input->post('motor'),
                    'cilindrada' => $this->input->post('cc'),
                    'envergadura' => $this->input->post('envergadura'),
                    'longitud' => $this->input->post('longitud'),
                    'velocidad_max' => $this->input->post('velmax'),
                    'techo' => $this->input->post('techo'),
                    'primervuelo' => $this->input->post('primervuelo'),
                    'mtow' => $this->input->post('mtow'),
                    'armamento' => $this->input->post('armamento'),
                    'peso' => $this->input->post('peso'),
                    'historia' => $this->input->post('hcas'),
                    'lang' => 'spanish',
                    'imagen' => $_FILES['userfile']['name']
                );
                $aviones->avion_3 = array(
                    'matricula' => $this->input->post('matricula'),
                    'nombre' => $this->input->post('nombre'),
                    'estado' => $this->input->post('estado'),
                    'motor' => $this->input->post('motor'),
                    'cilindrada' => $this->input->post('cc'),
                    'envergadura' => $this->input->post('envergadura'),
                    'longitud' => $this->input->post('longitud'),
                    'velocidad_max' => $this->input->post('velmax'),
                    'techo' => $this->input->post('techo'),
                    'primervuelo' => $this->input->post('primervuelo'),
                    'mtow' => $this->input->post('mtow'),
                    'armamento' => $this->input->post('armamento'),
                    'peso' => $this->input->post('peso'),
                    'historia' => $this->input->post('hen'),
                    'lang' => 'english',
                    'imagen' => $_FILES['userfile']['name']
                );

                if ($this->aviones_model->create_avion($aviones, $user->id)) {
                    $this->session->set_flashdata('message', true);
                    redirect('admin/aviones', 'refresh');
                }
            } else {
                $vista = $this->load->view('admin/table_aviones_view', "", true);
                $user = $this->ion_auth->user()->row();
                $data = array(
                    'page_content' => $vista,
                    'user_name' => $user->username,
                    'title' => 'Aviones'
                );
                $this->load->view("admin/index_admin_view", $data);
            }
        }
    }

    function modifyAvion($id) {
        $aviones = new stdClass();
        $aviones = $this->aviones_model->modifyAvion($id);
        $data = array(
            'aviones' => $aviones
        );
        $vista = $this->load->view('admin/modify_avion_view', $data, true);
        $user = $this->ion_auth->user()->row();
        $data2 = array(
            'page_content' => $vista,
            'user_name' => $user->username,
            'title' => 'Modificar Avion'
        );
        $this->load->view("admin/index_admin_view", $data2);
    }

    function modificar_avion() {
        $response = new stdClass();

        $this->form_validation->set_rules('matricula', $this->lang->line('avion_matricula_label'), 'required');
        $this->form_validation->set_rules('nombre', $this->lang->line('avion_name_label'), 'required|max_length[45]');
        $this->form_validation->set_rules('estado', $this->lang->line('avion_estado_label'), 'max_length[45]');
        $this->form_validation->set_rules('motor', $this->lang->line('avion_motor_label'), 'max_length[45]');
        $this->form_validation->set_rules('cc', $this->lang->line('avion_cc_label'), 'max_length[45]');
        $this->form_validation->set_rules('envergadura', $this->lang->line('avion_envergadura_label'), 'max_length[45]');
        $this->form_validation->set_rules('longitud', $this->lang->line('avion_longitud_label'), 'max_length[45]');
        $this->form_validation->set_rules('peso', $this->lang->line('avion_peso_label'), 'max_length[45]');
        $this->form_validation->set_rules('velmax', $this->lang->line('avion_velmax_label'), 'max_length[45]');
        $this->form_validation->set_rules('techo', $this->lang->line('avion_techo_label'), 'max_length[45]');
        $this->form_validation->set_rules('primervuelo', $this->lang->line('avion_primervuelo_label'), 'max_length[45]');
        $this->form_validation->set_rules('mtow', $this->lang->line('avion_mtow_label'), 'max_length[45]');
        $this->form_validation->set_rules('armamento', $this->lang->line('avion_armamento_label'), 'max_length[45]');
        $this->form_validation->set_rules('hcat', $this->lang->line('avion_hcat_label'), 'required');
        $this->form_validation->set_rules('hcas', $this->lang->line('avion_hcas_label'), 'required');
        $this->form_validation->set_rules('hen', $this->lang->line('avion_hen_label'), 'required');
        //$this->form_validation->set_rules('userfile');


        if (!$this->form_validation->run() == true) {
            $this->modifyAvion($this->input->post('idavion'));
        } else {
            $aviones = new stdClass();
            $user = $this->ion_auth->user()->row();
            $aviones->avion_1 = array(
                'idavion_lang' => $this->input->post('idavion_lang_cat'),
                'matricula' => $this->input->post('matricula'),
                'nombre' => $this->input->post('nombre'),
                'estado' => $this->input->post('estado'),
                'motor' => $this->input->post('motor'),
                'cilindrada' => $this->input->post('cc'),
                'envergadura' => $this->input->post('envergadura'),
                'longitud' => $this->input->post('longitud'),
                'velocidad_max' => $this->input->post('velmax'),
                'techo' => $this->input->post('techo'),
                'primervuelo' => $this->input->post('primervuelo'),
                'armamento' => $this->input->post('armamento'),
                'peso' => $this->input->post('peso'),
                'historia' => $this->input->post('hcat'),
                'lang' => 'catalan',
            );
            $aviones->avion_2 = array(
                'idavion_lang' => $this->input->post('idavion_lang_cas'),
                'matricula' => $this->input->post('matricula'),
                'nombre' => $this->input->post('nombre'),
                'estado' => $this->input->post('estado'),
                'motor' => $this->input->post('motor'),
                'cilindrada' => $this->input->post('cc'),
                'envergadura' => $this->input->post('envergadura'),
                'longitud' => $this->input->post('longitud'),
                'velocidad_max' => $this->input->post('velmax'),
                'techo' => $this->input->post('techo'),
                'primervuelo' => $this->input->post('primervuelo'),
                'armamento' => $this->input->post('armamento'),
                'peso' => $this->input->post('peso'),
                'historia' => $this->input->post('hcas'),
                'lang' => 'spanish',
            );
            $aviones->avion_3 = array(
                'idavion_lang' => $this->input->post('idavion_lang_en'),
                'matricula' => $this->input->post('matricula'),
                'nombre' => $this->input->post('nombre'),
                'estado' => $this->input->post('estado'),
                'motor' => $this->input->post('motor'),
                'cilindrada' => $this->input->post('cc'),
                'envergadura' => $this->input->post('envergadura'),
                'longitud' => $this->input->post('longitud'),
                'velocidad_max' => $this->input->post('velmax'),
                'techo' => $this->input->post('techo'),
                'primervuelo' => $this->input->post('primervuelo'),
                'armamento' => $this->input->post('armamento'),
                'peso' => $this->input->post('peso'),
                'historia' => $this->input->post('hen'),
                'lang' => 'english',
            );

            if ($_FILES['userfile']['name'] != "") {
                $aviones->avion_1['imagen'] = $_FILES['userfile']['name'];
                $aviones->avion_2['imagen'] = $_FILES['userfile']['name'];
                $aviones->avion_3['imagen'] = $_FILES['userfile']['name'];

                if ($this->aviones_model->upload_image()) {
                    if ($this->aviones_model->modificar_avion($aviones, $user->id)) {
                        $this->session->set_flashdata('message', true);
                        redirect('admin/aviones', 'refresh');
                    }
                }
            }


            if ($this->aviones_model->modificar_avion($aviones, $user->id)) {
                $this->session->set_flashdata('message', true);
                redirect('admin/aviones', 'refresh');
            }
        }
    }

    private function __isAjax() {
        return $this->input->is_ajax_request();
    }

}

?>