<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bandara_tujuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bandara_tujuan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bandara_tujuan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bandara_tujuan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bandara_tujuan/index.html';
            $config['first_url'] = base_url() . 'bandara_tujuan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bandara_tujuan_model->total_rows($q);
        $bandara_tujuan = $this->Bandara_tujuan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bandara_tujuan_data' => $bandara_tujuan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/bandara_tujuan/bandara_tujuan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Bandara_tujuan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_bandara_tujuan' => $row->id_bandara_tujuan,
		'nama_bandara' => $row->nama_bandara,
		'id_negara' => $row->id_negara,
	    );
            $this->load->view('admin/bandara_tujuan/bandara_tujuan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bandara_tujuan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bandara_tujuan/create_action'),
	    'id_bandara_tujuan' => set_value('id_bandara_tujuan'),
	    'nama_bandara' => set_value('nama_bandara'),
	    'id_negara' => set_value('id_negara'),
	);
        $this->load->view('admin/bandara_tujuan/bandara_tujuan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_bandara' => $this->input->post('nama_bandara',TRUE),
		'id_negara' => $this->input->post('id_negara',TRUE),
	    );

            $this->Bandara_tujuan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bandara_tujuan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bandara_tujuan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bandara_tujuan/update_action'),
		'id_bandara_tujuan' => set_value('id_bandara_tujuan', $row->id_bandara_tujuan),
		'nama_bandara' => set_value('nama_bandara', $row->nama_bandara),
		'id_negara' => set_value('id_negara', $row->id_negara),
	    );
            $this->load->view('admin/bandara_tujuan/bandara_tujuan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bandara_tujuan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_bandara_tujuan', TRUE));
        } else {
            $data = array(
		'nama_bandara' => $this->input->post('nama_bandara',TRUE),
		'id_negara' => $this->input->post('id_negara',TRUE),
	    );

            $this->Bandara_tujuan_model->update($this->input->post('id_bandara_tujuan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bandara_tujuan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bandara_tujuan_model->get_by_id($id);

        if ($row) {
            $this->Bandara_tujuan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bandara_tujuan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bandara_tujuan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_bandara', 'nama bandara', 'trim|required');
	$this->form_validation->set_rules('id_negara', 'id negara', 'trim|required');

	$this->form_validation->set_rules('id_bandara_tujuan', 'id_bandara_tujuan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Bandara_tujuan.php */
/* Location: ./application/controllers/Bandara_tujuan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:16 */
/* http://harviacode.com */
