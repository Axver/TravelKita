<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perusahaan_bus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Perusahaan_bus_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'perusahaan_bus/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'perusahaan_bus/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'perusahaan_bus/index.html';
            $config['first_url'] = base_url() . 'perusahaan_bus/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Perusahaan_bus_model->total_rows($q);
        $perusahaan_bus = $this->Perusahaan_bus_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'perusahaan_bus_data' => $perusahaan_bus,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/perusahaan_bus/perusahaan_bus_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Perusahaan_bus_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_perusahaan' => $row->id_perusahaan,
		'username' => $row->username,
		'nama_perusahaan' => $row->nama_perusahaan,
		'alamat_perusahaan' => $row->alamat_perusahaan,
		'id_kecamatan' => $row->id_kecamatan,
		'nomor_telepon' => $row->nomor_telepon,
	    );
            $this->load->view('admin/perusahaan_bus/perusahaan_bus_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perusahaan_bus'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('perusahaan_bus/create_action'),
	    'id_perusahaan' => set_value('id_perusahaan'),
	    'username' => set_value('username'),
	    'nama_perusahaan' => set_value('nama_perusahaan'),
	    'alamat_perusahaan' => set_value('alamat_perusahaan'),
	    'id_kecamatan' => set_value('id_kecamatan'),
	    'nomor_telepon' => set_value('nomor_telepon'),
	);
        $this->load->view('admin/perusahaan_bus/perusahaan_bus_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
		'alamat_perusahaan' => $this->input->post('alamat_perusahaan',TRUE),
		'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
		'nomor_telepon' => $this->input->post('nomor_telepon',TRUE),
	    );

            $this->Perusahaan_bus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('perusahaan_bus'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Perusahaan_bus_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('perusahaan_bus/update_action'),
		'id_perusahaan' => set_value('id_perusahaan', $row->id_perusahaan),
		'username' => set_value('username', $row->username),
		'nama_perusahaan' => set_value('nama_perusahaan', $row->nama_perusahaan),
		'alamat_perusahaan' => set_value('alamat_perusahaan', $row->alamat_perusahaan),
		'id_kecamatan' => set_value('id_kecamatan', $row->id_kecamatan),
		'nomor_telepon' => set_value('nomor_telepon', $row->nomor_telepon),
	    );
            $this->load->view('admin/perusahaan_bus/perusahaan_bus_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perusahaan_bus'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_perusahaan', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
		'alamat_perusahaan' => $this->input->post('alamat_perusahaan',TRUE),
		'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
		'nomor_telepon' => $this->input->post('nomor_telepon',TRUE),
	    );

            $this->Perusahaan_bus_model->update($this->input->post('id_perusahaan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('perusahaan_bus'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Perusahaan_bus_model->get_by_id($id);

        if ($row) {
            $this->Perusahaan_bus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('perusahaan_bus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perusahaan_bus'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('nama_perusahaan', 'nama perusahaan', 'trim|required');
	$this->form_validation->set_rules('alamat_perusahaan', 'alamat perusahaan', 'trim|required');
	$this->form_validation->set_rules('id_kecamatan', 'id kecamatan', 'trim|required');
	$this->form_validation->set_rules('nomor_telepon', 'nomor telepon', 'trim|required');

	$this->form_validation->set_rules('id_perusahaan', 'id_perusahaan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Perusahaan_bus.php */
/* Location: ./application/controllers/Perusahaan_bus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:18 */
/* http://harviacode.com */
