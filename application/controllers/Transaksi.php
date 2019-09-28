<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi/index.html';
            $config['first_url'] = base_url() . 'transaksi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Transaksi_model->total_rows($q);
        $transaksi = $this->Transaksi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaksi_data' => $transaksi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/transaksi/transaksi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_transaksi' => $row->id_transaksi,
		'id_list_penerbangan' => $row->id_list_penerbangan,
		'tgl_transaksi' => $row->tgl_transaksi,
		'status_transaksi' => $row->status_transaksi,
		'username' => $row->username,
		'status_pembayaran' => $row->status_pembayaran,
		'tagihan' => $row->tagihan,
	    );
            $this->load->view('admin/transaksi/transaksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/create_action'),
	    'id_transaksi' => set_value('id_transaksi'),
	    'id_list_penerbangan' => set_value('id_list_penerbangan'),
	    'tgl_transaksi' => set_value('tgl_transaksi'),
	    'status_transaksi' => set_value('status_transaksi'),
	    'username' => set_value('username'),
	    'status_pembayaran' => set_value('status_pembayaran'),
	    'tagihan' => set_value('tagihan'),
	);
        $this->load->view('admin/transaksi/transaksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_list_penerbangan' => $this->input->post('id_list_penerbangan',TRUE),
		'tgl_transaksi' => $this->input->post('tgl_transaksi',TRUE),
		'status_transaksi' => $this->input->post('status_transaksi',TRUE),
		'username' => $this->input->post('username',TRUE),
		'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
		'tagihan' => $this->input->post('tagihan',TRUE),
	    );

            $this->Transaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/update_action'),
		'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
		'id_list_penerbangan' => set_value('id_list_penerbangan', $row->id_list_penerbangan),
		'tgl_transaksi' => set_value('tgl_transaksi', $row->tgl_transaksi),
		'status_transaksi' => set_value('status_transaksi', $row->status_transaksi),
		'username' => set_value('username', $row->username),
		'status_pembayaran' => set_value('status_pembayaran', $row->status_pembayaran),
		'tagihan' => set_value('tagihan', $row->tagihan),
	    );
            $this->load->view('admin/transaksi/transaksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
		'id_list_penerbangan' => $this->input->post('id_list_penerbangan',TRUE),
		'tgl_transaksi' => $this->input->post('tgl_transaksi',TRUE),
		'status_transaksi' => $this->input->post('status_transaksi',TRUE),
		'username' => $this->input->post('username',TRUE),
		'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
		'tagihan' => $this->input->post('tagihan',TRUE),
	    );

            $this->Transaksi_model->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_list_penerbangan', 'id list penerbangan', 'trim|required');
	$this->form_validation->set_rules('tgl_transaksi', 'tgl transaksi', 'trim|required');
	$this->form_validation->set_rules('status_transaksi', 'status transaksi', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('status_pembayaran', 'status pembayaran', 'trim|required');
	$this->form_validation->set_rules('tagihan', 'tagihan', 'trim|required');

	$this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:18 */
/* http://harviacode.com */
