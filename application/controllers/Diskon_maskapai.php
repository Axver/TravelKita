<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Diskon_maskapai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Diskon_maskapai_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'diskon_maskapai/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'diskon_maskapai/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'diskon_maskapai/index.html';
            $config['first_url'] = base_url() . 'diskon_maskapai/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Diskon_maskapai_model->total_rows($q);
        $diskon_maskapai = $this->Diskon_maskapai_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'diskon_maskapai_data' => $diskon_maskapai,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/diskon_maskapai/diskon_maskapai_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Diskon_maskapai_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_diskon' => $row->id_diskon,
		'id_maskapai' => $row->id_maskapai,
	    );
            $this->load->view('admin/diskon_maskapai/diskon_maskapai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('diskon_maskapai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('diskon_maskapai/create_action'),
	    'id_diskon' => set_value('id_diskon'),
	    'id_maskapai' => set_value('id_maskapai'),
	);
        $this->load->view('admin/diskon_maskapai/diskon_maskapai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
	    );

            $this->Diskon_maskapai_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('diskon_maskapai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Diskon_maskapai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('diskon_maskapai/update_action'),
		'id_diskon' => set_value('id_diskon', $row->id_diskon),
		'id_maskapai' => set_value('id_maskapai', $row->id_maskapai),
	    );
            $this->load->view('admin/diskon_maskapai/diskon_maskapai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('diskon_maskapai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_diskon', TRUE));
        } else {
            $data = array(
	    );

            $this->Diskon_maskapai_model->update($this->input->post('id_diskon', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('diskon_maskapai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Diskon_maskapai_model->get_by_id($id);

        if ($row) {
            $this->Diskon_maskapai_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('diskon_maskapai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('diskon_maskapai'));
        }
    }

    public function _rules() 
    {

	$this->form_validation->set_rules('id_diskon', 'id_diskon', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Diskon_maskapai.php */
/* Location: ./application/controllers/Diskon_maskapai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:17 */
/* http://harviacode.com */
