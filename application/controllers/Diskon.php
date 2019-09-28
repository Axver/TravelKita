<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Diskon extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Diskon_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'diskon/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'diskon/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'diskon/index.html';
            $config['first_url'] = base_url() . 'diskon/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Diskon_model->total_rows($q);
        $diskon = $this->Diskon_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'diskon_data' => $diskon,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/diskon/diskon_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Diskon_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_diskon' => $row->id_diskon,
		'kode_diskon' => $row->kode_diskon,
		'tanggal_mulai' => $row->tanggal_mulai,
		'masa_berlaku' => $row->masa_berlaku,
		'logic_diskon' => $row->logic_diskon,
	    );
            $this->load->view('admin/diskon/diskon_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('diskon'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('diskon/create_action'),
	    'id_diskon' => set_value('id_diskon'),
	    'kode_diskon' => set_value('kode_diskon'),
	    'tanggal_mulai' => set_value('tanggal_mulai'),
	    'masa_berlaku' => set_value('masa_berlaku'),
	    'logic_diskon' => set_value('logic_diskon'),
	);
        $this->load->view('admin/diskon/diskon_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_diskon' => $this->input->post('kode_diskon',TRUE),
		'tanggal_mulai' => $this->input->post('tanggal_mulai',TRUE),
		'masa_berlaku' => $this->input->post('masa_berlaku',TRUE),
		'logic_diskon' => $this->input->post('logic_diskon',TRUE),
	    );

            $this->Diskon_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('diskon'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Diskon_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('diskon/update_action'),
		'id_diskon' => set_value('id_diskon', $row->id_diskon),
		'kode_diskon' => set_value('kode_diskon', $row->kode_diskon),
		'tanggal_mulai' => set_value('tanggal_mulai', $row->tanggal_mulai),
		'masa_berlaku' => set_value('masa_berlaku', $row->masa_berlaku),
		'logic_diskon' => set_value('logic_diskon', $row->logic_diskon),
	    );
            $this->load->view('admin/diskon/diskon_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('diskon'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_diskon', TRUE));
        } else {
            $data = array(
		'kode_diskon' => $this->input->post('kode_diskon',TRUE),
		'tanggal_mulai' => $this->input->post('tanggal_mulai',TRUE),
		'masa_berlaku' => $this->input->post('masa_berlaku',TRUE),
		'logic_diskon' => $this->input->post('logic_diskon',TRUE),
	    );

            $this->Diskon_model->update($this->input->post('id_diskon', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('diskon'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Diskon_model->get_by_id($id);

        if ($row) {
            $this->Diskon_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('diskon'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('diskon'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_diskon', 'kode diskon', 'trim|required');
	$this->form_validation->set_rules('tanggal_mulai', 'tanggal mulai', 'trim|required');
	$this->form_validation->set_rules('masa_berlaku', 'masa berlaku', 'trim|required');
	$this->form_validation->set_rules('logic_diskon', 'logic diskon', 'trim|required');

	$this->form_validation->set_rules('id_diskon', 'id_diskon', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Diskon.php */
/* Location: ./application/controllers/Diskon.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:16 */
/* http://harviacode.com */
