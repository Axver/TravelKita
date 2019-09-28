<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class List_penerbangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('List_penerbangan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'list_penerbangan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'list_penerbangan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'list_penerbangan/index.html';
            $config['first_url'] = base_url() . 'list_penerbangan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->List_penerbangan_model->total_rows($q);
        $list_penerbangan = $this->List_penerbangan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'list_penerbangan_data' => $list_penerbangan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/list_penerbangan/list_penerbangan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->List_penerbangan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_list_penerbangan' => $row->id_list_penerbangan,
		'kode_pesawat' => $row->kode_pesawat,
		'id_bandara_asal' => $row->id_bandara_asal,
		'id_bandara_tujuan' => $row->id_bandara_tujuan,
		'waktu_take_off' => $row->waktu_take_off,
		'waktu_landing' => $row->waktu_landing,
		'harga' => $row->harga,
	    );
            $this->load->view('admin/list_penerbangan/list_penerbangan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('list_penerbangan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('list_penerbangan/create_action'),
	    'id_list_penerbangan' => set_value('id_list_penerbangan'),
	    'kode_pesawat' => set_value('kode_pesawat'),
	    'id_bandara_asal' => set_value('id_bandara_asal'),
	    'id_bandara_tujuan' => set_value('id_bandara_tujuan'),
	    'waktu_take_off' => set_value('waktu_take_off'),
	    'waktu_landing' => set_value('waktu_landing'),
	    'harga' => set_value('harga'),
	);
        $this->load->view('admin/list_penerbangan/list_penerbangan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_pesawat' => $this->input->post('kode_pesawat',TRUE),
		'id_bandara_asal' => $this->input->post('id_bandara_asal',TRUE),
		'id_bandara_tujuan' => $this->input->post('id_bandara_tujuan',TRUE),
		'waktu_take_off' => $this->input->post('waktu_take_off',TRUE),
		'waktu_landing' => $this->input->post('waktu_landing',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->List_penerbangan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('list_penerbangan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->List_penerbangan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('list_penerbangan/update_action'),
		'id_list_penerbangan' => set_value('id_list_penerbangan', $row->id_list_penerbangan),
		'kode_pesawat' => set_value('kode_pesawat', $row->kode_pesawat),
		'id_bandara_asal' => set_value('id_bandara_asal', $row->id_bandara_asal),
		'id_bandara_tujuan' => set_value('id_bandara_tujuan', $row->id_bandara_tujuan),
		'waktu_take_off' => set_value('waktu_take_off', $row->waktu_take_off),
		'waktu_landing' => set_value('waktu_landing', $row->waktu_landing),
		'harga' => set_value('harga', $row->harga),
	    );
            $this->load->view('admin/list_penerbangan/list_penerbangan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('list_penerbangan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_list_penerbangan', TRUE));
        } else {
            $data = array(
		'kode_pesawat' => $this->input->post('kode_pesawat',TRUE),
		'id_bandara_asal' => $this->input->post('id_bandara_asal',TRUE),
		'id_bandara_tujuan' => $this->input->post('id_bandara_tujuan',TRUE),
		'waktu_take_off' => $this->input->post('waktu_take_off',TRUE),
		'waktu_landing' => $this->input->post('waktu_landing',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->List_penerbangan_model->update($this->input->post('id_list_penerbangan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('list_penerbangan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->List_penerbangan_model->get_by_id($id);

        if ($row) {
            $this->List_penerbangan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('list_penerbangan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('list_penerbangan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_pesawat', 'kode pesawat', 'trim|required');
	$this->form_validation->set_rules('id_bandara_asal', 'id bandara asal', 'trim|required');
	$this->form_validation->set_rules('id_bandara_tujuan', 'id bandara tujuan', 'trim|required');
	$this->form_validation->set_rules('waktu_take_off', 'waktu take off', 'trim|required');
	$this->form_validation->set_rules('waktu_landing', 'waktu landing', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('id_list_penerbangan', 'id_list_penerbangan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file List_penerbangan.php */
/* Location: ./application/controllers/List_penerbangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:18 */
/* http://harviacode.com */
