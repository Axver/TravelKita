<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Terminal_bus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Terminal_bus_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'terminal_bus/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'terminal_bus/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'terminal_bus/index.html';
            $config['first_url'] = base_url() . 'terminal_bus/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Terminal_bus_model->total_rows($q);
        $terminal_bus = $this->Terminal_bus_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'terminal_bus_data' => $terminal_bus,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/terminal_bus/terminal_bus_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Terminal_bus_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_terminal' => $row->id_terminal,
		'nama_terminal' => $row->nama_terminal,
		'latitude' => $row->latitude,
		'longitude' => $row->longitude,
	    );
            $this->load->view('admin/terminal_bus/terminal_bus_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('terminal_bus'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('terminal_bus/create_action'),
	    'id_terminal' => set_value('id_terminal'),
	    'nama_terminal' => set_value('nama_terminal'),
	    'latitude' => set_value('latitude'),
	    'longitude' => set_value('longitude'),
	);
        $this->load->view('admin/terminal_bus/terminal_bus_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_terminal' => $this->input->post('nama_terminal',TRUE),
		'latitude' => $this->input->post('latitude',TRUE),
		'longitude' => $this->input->post('longitude',TRUE),
	    );

            $this->Terminal_bus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('terminal_bus'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Terminal_bus_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('terminal_bus/update_action'),
		'id_terminal' => set_value('id_terminal', $row->id_terminal),
		'nama_terminal' => set_value('nama_terminal', $row->nama_terminal),
		'latitude' => set_value('latitude', $row->latitude),
		'longitude' => set_value('longitude', $row->longitude),
	    );
            $this->load->view('admin/terminal_bus/terminal_bus_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('terminal_bus'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_terminal', TRUE));
        } else {
            $data = array(
		'nama_terminal' => $this->input->post('nama_terminal',TRUE),
		'latitude' => $this->input->post('latitude',TRUE),
		'longitude' => $this->input->post('longitude',TRUE),
	    );

            $this->Terminal_bus_model->update($this->input->post('id_terminal', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('terminal_bus'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Terminal_bus_model->get_by_id($id);

        if ($row) {
            $this->Terminal_bus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('terminal_bus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('terminal_bus'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_terminal', 'nama terminal', 'trim|required');
	$this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
	$this->form_validation->set_rules('longitude', 'longitude', 'trim|required');

	$this->form_validation->set_rules('id_terminal', 'id_terminal', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Terminal_bus.php */
/* Location: ./application/controllers/Terminal_bus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:18 */
/* http://harviacode.com */
