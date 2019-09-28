<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Maskapai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Maskapai_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'maskapai/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'maskapai/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'maskapai/index.html';
            $config['first_url'] = base_url() . 'maskapai/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Maskapai_model->total_rows($q);
        $maskapai = $this->Maskapai_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'maskapai_data' => $maskapai,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/maskapai/maskapai_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Maskapai_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_maskapai' => $row->id_maskapai,
		'username' => $row->username,
		'nama_maskapai' => $row->nama_maskapai,
		'alamat_kantor' => $row->alamat_kantor,
	    );
            $this->load->view('admin/maskapai/maskapai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('maskapai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('maskapai/create_action'),
	    'id_maskapai' => set_value('id_maskapai'),
	    'username' => set_value('username'),
	    'nama_maskapai' => set_value('nama_maskapai'),
	    'alamat_kantor' => set_value('alamat_kantor'),
	);
        $this->load->view('admin/maskapai/maskapai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'nama_maskapai' => $this->input->post('nama_maskapai',TRUE),
		'alamat_kantor' => $this->input->post('alamat_kantor',TRUE),
	    );

            $this->Maskapai_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('maskapai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Maskapai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('maskapai/update_action'),
		'id_maskapai' => set_value('id_maskapai', $row->id_maskapai),
		'username' => set_value('username', $row->username),
		'nama_maskapai' => set_value('nama_maskapai', $row->nama_maskapai),
		'alamat_kantor' => set_value('alamat_kantor', $row->alamat_kantor),
	    );
            $this->load->view('admin/maskapai/maskapai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('maskapai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_maskapai', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'nama_maskapai' => $this->input->post('nama_maskapai',TRUE),
		'alamat_kantor' => $this->input->post('alamat_kantor',TRUE),
	    );

            $this->Maskapai_model->update($this->input->post('id_maskapai', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('maskapai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Maskapai_model->get_by_id($id);

        if ($row) {
            $this->Maskapai_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('maskapai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('maskapai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('nama_maskapai', 'nama maskapai', 'trim|required');
	$this->form_validation->set_rules('alamat_kantor', 'alamat kantor', 'trim|required');

	$this->form_validation->set_rules('id_maskapai', 'id_maskapai', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Maskapai.php */
/* Location: ./application/controllers/Maskapai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:18 */
/* http://harviacode.com */
