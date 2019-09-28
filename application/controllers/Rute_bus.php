<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rute_bus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rute_bus_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'rute_bus/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'rute_bus/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'rute_bus/index.html';
            $config['first_url'] = base_url() . 'rute_bus/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Rute_bus_model->total_rows($q);
        $rute_bus = $this->Rute_bus_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'rute_bus_data' => $rute_bus,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/rute_bus/rute_bus_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Rute_bus_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_rute_bus' => $row->id_rute_bus,
		'id_armada' => $row->id_armada,
		'id_terminal' => $row->id_terminal,
		'terminal_bus_id_terminal' => $row->terminal_bus_id_terminal,
		'harga' => $row->harga,
		'waktu_berangkat' => $row->waktu_berangkat,
		'waktu_sampai' => $row->waktu_sampai,
	    );
            $this->load->view('admin/rute_bus/rute_bus_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rute_bus'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rute_bus/create_action'),
	    'id_rute_bus' => set_value('id_rute_bus'),
	    'id_armada' => set_value('id_armada'),
	    'id_terminal' => set_value('id_terminal'),
	    'terminal_bus_id_terminal' => set_value('terminal_bus_id_terminal'),
	    'harga' => set_value('harga'),
	    'waktu_berangkat' => set_value('waktu_berangkat'),
	    'waktu_sampai' => set_value('waktu_sampai'),
	);
        $this->load->view('admin/rute_bus/rute_bus_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_armada' => $this->input->post('id_armada',TRUE),
		'id_terminal' => $this->input->post('id_terminal',TRUE),
		'terminal_bus_id_terminal' => $this->input->post('terminal_bus_id_terminal',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'waktu_berangkat' => $this->input->post('waktu_berangkat',TRUE),
		'waktu_sampai' => $this->input->post('waktu_sampai',TRUE),
	    );

            $this->Rute_bus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('rute_bus'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Rute_bus_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rute_bus/update_action'),
		'id_rute_bus' => set_value('id_rute_bus', $row->id_rute_bus),
		'id_armada' => set_value('id_armada', $row->id_armada),
		'id_terminal' => set_value('id_terminal', $row->id_terminal),
		'terminal_bus_id_terminal' => set_value('terminal_bus_id_terminal', $row->terminal_bus_id_terminal),
		'harga' => set_value('harga', $row->harga),
		'waktu_berangkat' => set_value('waktu_berangkat', $row->waktu_berangkat),
		'waktu_sampai' => set_value('waktu_sampai', $row->waktu_sampai),
	    );
            $this->load->view('admin/rute_bus/rute_bus_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rute_bus'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rute_bus', TRUE));
        } else {
            $data = array(
		'id_armada' => $this->input->post('id_armada',TRUE),
		'id_terminal' => $this->input->post('id_terminal',TRUE),
		'terminal_bus_id_terminal' => $this->input->post('terminal_bus_id_terminal',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'waktu_berangkat' => $this->input->post('waktu_berangkat',TRUE),
		'waktu_sampai' => $this->input->post('waktu_sampai',TRUE),
	    );

            $this->Rute_bus_model->update($this->input->post('id_rute_bus', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rute_bus'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Rute_bus_model->get_by_id($id);

        if ($row) {
            $this->Rute_bus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rute_bus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rute_bus'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_armada', 'id armada', 'trim|required');
	$this->form_validation->set_rules('id_terminal', 'id terminal', 'trim|required');
	$this->form_validation->set_rules('terminal_bus_id_terminal', 'terminal bus id terminal', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('waktu_berangkat', 'waktu berangkat', 'trim|required');
	$this->form_validation->set_rules('waktu_sampai', 'waktu sampai', 'trim|required');

	$this->form_validation->set_rules('id_rute_bus', 'id_rute_bus', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Rute_bus.php */
/* Location: ./application/controllers/Rute_bus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:18 */
/* http://harviacode.com */
