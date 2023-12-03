<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">
            <strong  >Anda Belum Login !</strong> </div>');
            redirect('welcome');
        }
    }
    public function index()
    {
        $data['title'] = "Dashboard";
        $id = $this->session->userdata('id_pegawai');
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$id'")->result();
        $this->load->view('templates_pegawai/header', $data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/dashboard', $data);
        $this->load->view('templates_pegawai/footer');
    }

    public function updateData($id) 
    {
        
        $data['title'] = 'Update Data Pegawai';
        $id = $this->session->userdata('id_pegawai');
        $data['pegawai'] = $this->db->query
        ("SELECT * FROM data_pegawai WHERE id_pegawai = '$id'")->result();
        $this->load->view('templates_pegawai/header', $data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/formUpdateProfile', $data);
        $this->load->view('templates_pegawai/footer');
    }

    public function updateDataAksi()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        

        if ($this->form_validation->run() == FALSE) {
            $id = $this->session->userdata('id_pegawai');
            $this->updateData($id);
        } else {
            $id = $this->session->userdata('id_pegawai');
            $username = $this->input->post('username');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $photo = $_FILES['photo']['name'];
            if ($photo) {
                $config['upload_path'] = './assets/photo';
                $config['max_size'] = 2048; 
                $config['allowed_types'] = 'png|jpeg';
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('photo')) {
                    $photo = $this->upload->data('file_name');
                    $this->db->set('photo', $photo);
                    
                } else {
                    $upload_error_message = $this->upload->display_errors();
                    $this->session->set_flashdata('upload_error', '<div class="alert alert-danger alert-message" role="alert">
                    <strong>'. $upload_error_message .'</strong></div>');
                    redirect('pegawai/dashboard/updatedataaksi');
                }
            }

            $data = array(
                'nama_pegawai' => $nama_pegawai,
                'username' => $username,
                
            );

            $where = array(
                'id_pegawai' => $id
            );

            $this->penggajianModel->update_data('data_pegawai',$data,$where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">
            <strong>Data berhasil diupdate !</strong> </div>');
            redirect('pegawai/dashboard');
        }
    }
}
