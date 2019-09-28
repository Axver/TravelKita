<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/index.html';
            $config['first_url'] = base_url() . 'user/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        $user = $this->User_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/user/user_list', $data);
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'username' => $row->username,
		'password' => $row->password,
		'nama' => $row->nama,
		'jenis_kelamin' => $row->jenis_kelamin,
		'NIK' => $row->NIK,
		'email' => $row->email,
		'no_telepon' => $row->no_telepon,
		'alamat' => $row->alamat,
		'foto' => $row->foto,
		'pekerjaan' => $row->pekerjaan,
		'id_kecamatan' => $row->id_kecamatan,
	    );
            $this->load->view('admin/user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'nama' => set_value('nama'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'NIK' => set_value('NIK'),
	    'email' => set_value('email'),
	    'no_telepon' => set_value('no_telepon'),
	    'alamat' => set_value('alamat'),
	    'foto' => set_value('foto'),
	    'pekerjaan' => set_value('pekerjaan'),
	    'id_kecamatan' => set_value('id_kecamatan'),
	);
        $this->load->view('admin/user/user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'password' => $this->input->post('password',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'NIK' => $this->input->post('NIK',TRUE),
		'email' => $this->input->post('email',TRUE),
		'no_telepon' => $this->input->post('no_telepon',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'nama' => set_value('nama', $row->nama),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'NIK' => set_value('NIK', $row->NIK),
		'email' => set_value('email', $row->email),
		'no_telepon' => set_value('no_telepon', $row->no_telepon),
		'alamat' => set_value('alamat', $row->alamat),
		'foto' => set_value('foto', $row->foto),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
		'id_kecamatan' => set_value('id_kecamatan', $row->id_kecamatan),
	    );
            $this->load->view('admin/user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('username', TRUE));
        } else {
            $data = array(
		'password' => $this->input->post('password',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'NIK' => $this->input->post('NIK',TRUE),
		'email' => $this->input->post('email',TRUE),
		'no_telepon' => $this->input->post('no_telepon',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
	    );

            $this->User_model->update($this->input->post('username', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('NIK', 'nik', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('no_telepon', 'no telepon', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
	$this->form_validation->set_rules('id_kecamatan', 'id kecamatan', 'trim|required');

	$this->form_validation->set_rules('username', 'username', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 04:55:18 */
/* http://harviacode.com */
