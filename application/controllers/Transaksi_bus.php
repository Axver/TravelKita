<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_bus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_bus_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi_bus/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi_bus/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi_bus/index.html';
            $config['first_url'] = base_url() . 'transaksi_bus/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Transaksi_bus_model->total_rows($q);
        $transaksi_bus = $this->Transaksi_bus_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaksi_bus_data' => $transaksi_bus,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/transaksi_bus/transaksi_bus_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Transaksi_bus_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_transaksi' => $row->id_transaksi,
		'username' => $row->username,
		'status_transaksi' => $row->status_transaksi,
		'status_pembayaran' => $row->status_pembayaran,
		'status_bus' => $row->status_bus,
		'id_rute_bus' => $row->id_rute_bus,
	    );
            $this->load->view('admin/transaksi_bus/transaksi_bus_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_bus'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi_bus/create_action'),
	    'id_transaksi' => set_value('id_transaksi'),
	    'username' => set_value('username'),
	    'status_transaksi' => set_value('status_transaksi'),
	    'status_pembayaran' => set_value('status_pembayaran'),
	    'status_bus' => set_value('status_bus'),
	    'id_rute_bus' => set_value('id_rute_bus'),
	);
        $this->load->view('admin/transaksi_bus/transaksi_bus_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'status_transaksi' => $this->input->post('status_transaksi',TRUE),
		'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
		'status_bus' => $this->input->post('status_bus',TRUE),
		'id_rute_bus' => $this->input->post('id_rute_bus',TRUE),
	    );

            $this->Transaksi_bus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi_bus'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaksi_bus_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi_bus/update_action'),
		'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
		'username' => set_value('username', $row->username),
		'status_transaksi' => set_value('status_transaksi', $row->status_transaksi),
		'status_pembayaran' => set_value('status_pembayaran', $row->status_pembayaran),
		'status_bus' => set_value('status_bus', $row->status_bus),
		'id_rute_bus' => set_value('id_rute_bus', $row->id_rute_bus),
	    );
            $this->load->view('admin/transaksi_bus/transaksi_bus_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_bus'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'status_transaksi' => $this->input->post('status_transaksi',TRUE),
		'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
		'status_bus' => $this->input->post('status_bus',TRUE),
		'id_rute_bus' => $this->input->post('id_rute_bus',TRUE),
	    );

            $this->Transaksi_bus_model->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi_bus'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_bus_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_bus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi_bus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_bus'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('status_transaksi', 'status transaksi', 'trim|required');
	$this->form_validation->set_rules('status_pembayaran', 'status pembayaran', 'trim|required');
	$this->form_validation->set_rules('status_bus', 'status bus', 'trim|required');
	$this->form_validation->set_rules('id_rute_bus', 'id rute bus', 'trim|required');

	$this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Transaksi_bus.php */
/* Location: ./application/controllers/Transaksi_bus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:18 */
/* http://harviacode.com */
