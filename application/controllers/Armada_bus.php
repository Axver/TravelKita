<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Armada_bus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Armada_bus_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'armada_bus/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'armada_bus/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'armada_bus/index.html';
            $config['first_url'] = base_url() . 'armada_bus/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Armada_bus_model->total_rows($q);
        $armada_bus = $this->Armada_bus_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'armada_bus_data' => $armada_bus,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/armada_bus/armada_bus_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Armada_bus_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_armada' => $row->id_armada,
		'nama_armada' => $row->nama_armada,
		'id_perusahaan' => $row->id_perusahaan,
	    );
            $this->load->view('admin/armada_bus/armada_bus_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('armada_bus'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('armada_bus/create_action'),
	    'id_armada' => set_value('id_armada'),
	    'nama_armada' => set_value('nama_armada'),
	    'id_perusahaan' => set_value('id_perusahaan'),
	);
        $this->load->view('admin/armada_bus/armada_bus_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_armada' => $this->input->post('nama_armada',TRUE),
		'id_perusahaan' => $this->input->post('id_perusahaan',TRUE),
	    );

            $this->Armada_bus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('armada_bus'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Armada_bus_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('armada_bus/update_action'),
		'id_armada' => set_value('id_armada', $row->id_armada),
		'nama_armada' => set_value('nama_armada', $row->nama_armada),
		'id_perusahaan' => set_value('id_perusahaan', $row->id_perusahaan),
	    );
            $this->load->view('admin/armada_bus/armada_bus_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('armada_bus'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_armada', TRUE));
        } else {
            $data = array(
		'nama_armada' => $this->input->post('nama_armada',TRUE),
		'id_perusahaan' => $this->input->post('id_perusahaan',TRUE),
	    );

            $this->Armada_bus_model->update($this->input->post('id_armada', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('armada_bus'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Armada_bus_model->get_by_id($id);

        if ($row) {
            $this->Armada_bus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('armada_bus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('armada_bus'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_armada', 'nama armada', 'trim|required');
	$this->form_validation->set_rules('id_perusahaan', 'id perusahaan', 'trim|required');

	$this->form_validation->set_rules('id_armada', 'id_armada', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Armada_bus.php */
/* Location: ./application/controllers/Armada_bus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:16 */
/* http://harviacode.com */
