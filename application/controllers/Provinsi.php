<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Provinsi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Provinsi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'provinsi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'provinsi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'provinsi/index.html';
            $config['first_url'] = base_url() . 'provinsi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Provinsi_model->total_rows($q);
        $provinsi = $this->Provinsi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'provinsi_data' => $provinsi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/provinsi/provinsi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Provinsi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_provinsi' => $row->id_provinsi,
		'nama_provinsi' => $row->nama_provinsi,
	    );
            $this->load->view('admin/provinsi/provinsi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('provinsi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('provinsi/create_action'),
	    'id_provinsi' => set_value('id_provinsi'),
	    'nama_provinsi' => set_value('nama_provinsi'),
	);
        $this->load->view('admin/provinsi/provinsi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_provinsi' => $this->input->post('nama_provinsi',TRUE),
	    );

            $this->Provinsi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('provinsi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Provinsi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('provinsi/update_action'),
		'id_provinsi' => set_value('id_provinsi', $row->id_provinsi),
		'nama_provinsi' => set_value('nama_provinsi', $row->nama_provinsi),
	    );
            $this->load->view('admin/provinsi/provinsi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('provinsi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_provinsi', TRUE));
        } else {
            $data = array(
		'nama_provinsi' => $this->input->post('nama_provinsi',TRUE),
	    );

            $this->Provinsi_model->update($this->input->post('id_provinsi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('provinsi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Provinsi_model->get_by_id($id);

        if ($row) {
            $this->Provinsi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('provinsi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('provinsi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_provinsi', 'nama provinsi', 'trim|required');

	$this->form_validation->set_rules('id_provinsi', 'id_provinsi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Provinsi.php */
/* Location: ./application/controllers/Provinsi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:18 */
/* http://harviacode.com */
