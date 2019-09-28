<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_hotel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_hotel_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi_hotel/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi_hotel/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi_hotel/index.html';
            $config['first_url'] = base_url() . 'transaksi_hotel/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Transaksi_hotel_model->total_rows($q);
        $transaksi_hotel = $this->Transaksi_hotel_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaksi_hotel_data' => $transaksi_hotel,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/transaksi_hotel/transaksi_hotel_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Transaksi_hotel_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_transaksi_hotel' => $row->id_transaksi_hotel,
		'id_kamar' => $row->id_kamar,
		'id_hotel' => $row->id_hotel,
		'check_in' => $row->check_in,
		'check_out' => $row->check_out,
		'username' => $row->username,
		'status_pembayaran' => $row->status_pembayaran,
	    );
            $this->load->view('admin/transaksi_hotel/transaksi_hotel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_hotel'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi_hotel/create_action'),
	    'id_transaksi_hotel' => set_value('id_transaksi_hotel'),
	    'id_kamar' => set_value('id_kamar'),
	    'id_hotel' => set_value('id_hotel'),
	    'check_in' => set_value('check_in'),
	    'check_out' => set_value('check_out'),
	    'username' => set_value('username'),
	    'status_pembayaran' => set_value('status_pembayaran'),
	);
        $this->load->view('admin/transaksi_hotel/transaksi_hotel_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'check_in' => $this->input->post('check_in',TRUE),
		'check_out' => $this->input->post('check_out',TRUE),
		'username' => $this->input->post('username',TRUE),
		'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
	    );

            $this->Transaksi_hotel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi_hotel'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaksi_hotel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi_hotel/update_action'),
		'id_transaksi_hotel' => set_value('id_transaksi_hotel', $row->id_transaksi_hotel),
		'id_kamar' => set_value('id_kamar', $row->id_kamar),
		'id_hotel' => set_value('id_hotel', $row->id_hotel),
		'check_in' => set_value('check_in', $row->check_in),
		'check_out' => set_value('check_out', $row->check_out),
		'username' => set_value('username', $row->username),
		'status_pembayaran' => set_value('status_pembayaran', $row->status_pembayaran),
	    );
            $this->load->view('admin/transaksi_hotel/transaksi_hotel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_hotel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi_hotel', TRUE));
        } else {
            $data = array(
		'check_in' => $this->input->post('check_in',TRUE),
		'check_out' => $this->input->post('check_out',TRUE),
		'username' => $this->input->post('username',TRUE),
		'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
	    );

            $this->Transaksi_hotel_model->update($this->input->post('id_transaksi_hotel', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi_hotel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_hotel_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_hotel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi_hotel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_hotel'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('check_in', 'check in', 'trim|required');
	$this->form_validation->set_rules('check_out', 'check out', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('status_pembayaran', 'status pembayaran', 'trim|required');

	$this->form_validation->set_rules('id_transaksi_hotel', 'id_transaksi_hotel', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Transaksi_hotel.php */
/* Location: ./application/controllers/Transaksi_hotel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:18 */
/* http://harviacode.com */
