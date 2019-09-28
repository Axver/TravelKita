<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kamar_hotel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kamar_hotel_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kamar_hotel/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kamar_hotel/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kamar_hotel/index.html';
            $config['first_url'] = base_url() . 'kamar_hotel/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kamar_hotel_model->total_rows($q);
        $kamar_hotel = $this->Kamar_hotel_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kamar_hotel_data' => $kamar_hotel,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/kamar_hotel/kamar_hotel_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kamar_hotel_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_hotel' => $row->id_hotel,
		'id_kamar' => $row->id_kamar,
		'id_kelas' => $row->id_kelas,
		'harga' => $row->harga,
	    );
            $this->load->view('admin/kamar_hotel/kamar_hotel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kamar_hotel'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kamar_hotel/create_action'),
	    'id_hotel' => set_value('id_hotel'),
	    'id_kamar' => set_value('id_kamar'),
	    'id_kelas' => set_value('id_kelas'),
	    'harga' => set_value('harga'),
	);
        $this->load->view('admin/kamar_hotel/kamar_hotel_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Kamar_hotel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kamar_hotel'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kamar_hotel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kamar_hotel/update_action'),
		'id_hotel' => set_value('id_hotel', $row->id_hotel),
		'id_kamar' => set_value('id_kamar', $row->id_kamar),
		'id_kelas' => set_value('id_kelas', $row->id_kelas),
		'harga' => set_value('harga', $row->harga),
	    );
            $this->load->view('admin/kamar_hotel/kamar_hotel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kamar_hotel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_hotel', TRUE));
        } else {
            $data = array(
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Kamar_hotel_model->update($this->input->post('id_hotel', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kamar_hotel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kamar_hotel_model->get_by_id($id);

        if ($row) {
            $this->Kamar_hotel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kamar_hotel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kamar_hotel'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('id_hotel', 'id_hotel', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kamar_hotel.php */
/* Location: ./application/controllers/Kamar_hotel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:18 */
/* http://harviacode.com */
