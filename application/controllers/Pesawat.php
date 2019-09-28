<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pesawat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pesawat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pesawat/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pesawat/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pesawat/index.html';
            $config['first_url'] = base_url() . 'pesawat/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pesawat_model->total_rows($q);
        $pesawat = $this->Pesawat_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pesawat_data' => $pesawat,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/pesawat/pesawat_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pesawat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kode_pesawat' => $row->kode_pesawat,
		'id_maskapai' => $row->id_maskapai,
		'kapasitas' => $row->kapasitas,
	    );
            $this->load->view('admin/pesawat/pesawat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pesawat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pesawat/create_action'),
	    'kode_pesawat' => set_value('kode_pesawat'),
	    'id_maskapai' => set_value('id_maskapai'),
	    'kapasitas' => set_value('kapasitas'),
	);
        $this->load->view('admin/pesawat/pesawat_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_maskapai' => $this->input->post('id_maskapai',TRUE),
		'kapasitas' => $this->input->post('kapasitas',TRUE),
	    );

            $this->Pesawat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pesawat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pesawat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pesawat/update_action'),
		'kode_pesawat' => set_value('kode_pesawat', $row->kode_pesawat),
		'id_maskapai' => set_value('id_maskapai', $row->id_maskapai),
		'kapasitas' => set_value('kapasitas', $row->kapasitas),
	    );
            $this->load->view('admin/pesawat/pesawat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pesawat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode_pesawat', TRUE));
        } else {
            $data = array(
		'id_maskapai' => $this->input->post('id_maskapai',TRUE),
		'kapasitas' => $this->input->post('kapasitas',TRUE),
	    );

            $this->Pesawat_model->update($this->input->post('kode_pesawat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pesawat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pesawat_model->get_by_id($id);

        if ($row) {
            $this->Pesawat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pesawat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pesawat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_maskapai', 'id maskapai', 'trim|required');
	$this->form_validation->set_rules('kapasitas', 'kapasitas', 'trim|required');

	$this->form_validation->set_rules('kode_pesawat', 'kode_pesawat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pesawat.php */
/* Location: ./application/controllers/Pesawat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:18 */
/* http://harviacode.com */
