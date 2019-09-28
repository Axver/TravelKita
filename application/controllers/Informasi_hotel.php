<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Informasi_hotel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Informasi_hotel_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'informasi_hotel/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'informasi_hotel/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'informasi_hotel/index.html';
            $config['first_url'] = base_url() . 'informasi_hotel/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Informasi_hotel_model->total_rows($q);
        $informasi_hotel = $this->Informasi_hotel_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'informasi_hotel_data' => $informasi_hotel,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/informasi_hotel/informasi_hotel_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Informasi_hotel_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_hotel' => $row->id_hotel,
		'username' => $row->username,
		'nama_hotel' => $row->nama_hotel,
		'alamat_hotel' => $row->alamat_hotel,
		'nomor_telepon' => $row->nomor_telepon,
		'informasi' => $row->informasi,
		'latitude' => $row->latitude,
		'longitude' => $row->longitude,
		'id_kecamatan' => $row->id_kecamatan,
	    );
            $this->load->view('admin/informasi_hotel/informasi_hotel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('informasi_hotel'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('informasi_hotel/create_action'),
	    'id_hotel' => set_value('id_hotel'),
	    'username' => set_value('username'),
	    'nama_hotel' => set_value('nama_hotel'),
	    'alamat_hotel' => set_value('alamat_hotel'),
	    'nomor_telepon' => set_value('nomor_telepon'),
	    'informasi' => set_value('informasi'),
	    'latitude' => set_value('latitude'),
	    'longitude' => set_value('longitude'),
	    'id_kecamatan' => set_value('id_kecamatan'),
	);
        $this->load->view('admin/informasi_hotel/informasi_hotel_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'nama_hotel' => $this->input->post('nama_hotel',TRUE),
		'alamat_hotel' => $this->input->post('alamat_hotel',TRUE),
		'nomor_telepon' => $this->input->post('nomor_telepon',TRUE),
		'informasi' => $this->input->post('informasi',TRUE),
		'latitude' => $this->input->post('latitude',TRUE),
		'longitude' => $this->input->post('longitude',TRUE),
		'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
	    );

            $this->Informasi_hotel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('informasi_hotel'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Informasi_hotel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('informasi_hotel/update_action'),
		'id_hotel' => set_value('id_hotel', $row->id_hotel),
		'username' => set_value('username', $row->username),
		'nama_hotel' => set_value('nama_hotel', $row->nama_hotel),
		'alamat_hotel' => set_value('alamat_hotel', $row->alamat_hotel),
		'nomor_telepon' => set_value('nomor_telepon', $row->nomor_telepon),
		'informasi' => set_value('informasi', $row->informasi),
		'latitude' => set_value('latitude', $row->latitude),
		'longitude' => set_value('longitude', $row->longitude),
		'id_kecamatan' => set_value('id_kecamatan', $row->id_kecamatan),
	    );
            $this->load->view('admin/informasi_hotel/informasi_hotel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('informasi_hotel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_hotel', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'nama_hotel' => $this->input->post('nama_hotel',TRUE),
		'alamat_hotel' => $this->input->post('alamat_hotel',TRUE),
		'nomor_telepon' => $this->input->post('nomor_telepon',TRUE),
		'informasi' => $this->input->post('informasi',TRUE),
		'latitude' => $this->input->post('latitude',TRUE),
		'longitude' => $this->input->post('longitude',TRUE),
		'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
	    );

            $this->Informasi_hotel_model->update($this->input->post('id_hotel', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('informasi_hotel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Informasi_hotel_model->get_by_id($id);

        if ($row) {
            $this->Informasi_hotel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('informasi_hotel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('informasi_hotel'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('nama_hotel', 'nama hotel', 'trim|required');
	$this->form_validation->set_rules('alamat_hotel', 'alamat hotel', 'trim|required');
	$this->form_validation->set_rules('nomor_telepon', 'nomor telepon', 'trim|required');
	$this->form_validation->set_rules('informasi', 'informasi', 'trim|required');
	$this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
	$this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
	$this->form_validation->set_rules('id_kecamatan', 'id kecamatan', 'trim|required');

	$this->form_validation->set_rules('id_hotel', 'id_hotel', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Informasi_hotel.php */
/* Location: ./application/controllers/Informasi_hotel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:17 */
/* http://harviacode.com */
