<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Login";
			$this->load->view('templates_admin/header', $data);
			$this->load->view('templates_login/formLogin');
			$this->load->view('templates_login/footerFormLogin');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$username_exists = $this->penggajianModel->check_username_existence($username);

			if (!$username_exists) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">
					<strong>Username tidak terdaftar!</strong> </div>');
				redirect('welcome');

			} else {
				$cek = $this->penggajianModel->cek_login($username, $password);
				if ($cek == FALSE) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">
            	<strong>Username dan Password Salah !</strong> </div>');
					redirect('welcome');
				} else {
					$this->session->set_userdata('hak_akses', $cek->hak_akses);
					$this->session->set_userdata('nama_pegawai', $cek->nama_pegawai);
					$this->session->set_userdata('photo', $cek->photo);
					$this->session->set_userdata('id_pegawai', $cek->id_pegawai);
					$this->session->set_userdata('nik', $cek->nik);
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
		if ($this->session->userdata('hak_akses')) {
			switch ($this->session->userdata('hak_akses')) {
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

	public function logout()
	{
		// ini logout dan sesi berakhir
		$this->session->sess_destroy(); 
		redirect('landingPage');
	}
}

