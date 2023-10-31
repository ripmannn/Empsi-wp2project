<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Form Login";
			$this->load->view('templates_admin/header', $data);
			$this->load->view('formLogin');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->penggajianModel->cek_login($username, $password);

			if ($cek == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            	 <strong>Username atau Password Salah!</strong>
            	 <button type="button" class="close"
                	data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            	 </button>
            	</div>');
				redirect('welcome');
			} else {
				$this->session->set_userdata('hak_akses', $cek->hak_akses);
				$this->session->set_userdata('nama_pegawai', $cek->nama_pegawai);
				$this->session->set_userdata('photo', $cek->photo);
				switch ($cek->hak_akses) {
					case 1:
						redirect('admin/dashboard');
						break;

					case 2:
						redirect('pegawai/dashboard');
						break;

					default:
						break;
				}
			}
		}	
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
