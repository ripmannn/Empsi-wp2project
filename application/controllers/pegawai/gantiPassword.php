<?php

class GantiPassword extends CI_Controller
{


    public function index()
    {
        $data['title'] = "Ganti Password";
        $this->load->view('templates_pegawai/header', $data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/formGantiPassword', $data);
        $this->load->view('templates_pegawai/footer');
    }

    public function gantiPasswordAksi()
    {
        $passBaru = $this->input->post('passBaru');
        $ulangPass = $this->input->post('ulangPass');

        $this->form_validation->set_rules('passBaru', 'password baru', 'required|matches[ulangPass]');
        $this->form_validation->set_rules('ulangPass', 'ulangi password', 'required');

        if ($this->form_validation->run() !== FALSE) {
            $data = array('password' => md5($passBaru));
            $id = array('id_pegawai' => $this->session->userdata('id_pegawai'));
            $this->penggajianModel->update_data('data_pegawai', $data, $id);
            $this->session->set_flashdata('pesan', '<div class="text-center alert alert-warning alert-message" role="alert">
            <strong class="text-danger" >Password Berhasil Diganti !</strong> </div>');
            redirect('pegawai/dashboard');
        } else {
            $data['title'] = "Ganti Password";
            $this->load->view('templates_pegawai/header', $data);
            $this->load->view('templates_pegawai/sidebar');
            $this->load->view('pegawai/formGantiPassword', $data);
            $this->load->view('templates_pegawai/footer');
        }

    }
}

