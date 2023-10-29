<?php

class dataPegawai extends CI_controller
{
    public function index()
    {
        $data['title'] = "Data Pegawai";
        $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        $data['title'] = "Tambah Data Pegawai";
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $nik= $this->input->post('nik');
            $nama_pegawai= $this->input->post('nama_pegawai');
            $username= $this->input->post('username');
            $password= md5($this->input->post('password'));
            $jenis_kelamin= $this->input->post('jenis_kelamin');
            $jabatan= $this->input->post('jabatan');
            $tanggal_masuk= $this->input->post('tanggal_masuk');
            $status= $this->input->post('status');
            $hak_akses= $this->input->post('hak_akses');
            
            $photo= $_FILES['photo']['name'];
            if($photo = ''){} else {
                $config['upload_path'] = './assets/photo';
                $config['allowed_types'] = 'jgp|jpeg|png';
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('photo')){
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Photo Gagal diupload !</strong> </div>' ;
                } else {
                    $photo=$this->upload->data('file_name');
                }
            }

            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'username' => $username,
                'password' => $password,
                'jenis_kelamin' => $jenis_kelamin,
                'jabatan' => $jabatan,
                'tanggal_masuk' => $tanggal_masuk,
                'status' => $status,
                'hak_akses' => $hak_akses,
                'photo' => $photo,
            );

            $this->penggajianModel->insert_data($data, 'data_pegawai');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan !</strong> </div>');
            redirect('admin/dataPegawai');
        }
    }

    public function updateData ($id)
    {
        $where = array ('id_pegawai' => $id );
        $data['title'] = 'Update Data Pegawai';
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$id'")
        ->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formUpdatePegawai', $data);
        $this->load->view('templates_admin/footer');
    } 

    public function updateDataAksi()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $id= $this->input->post('id_pegawai');
            $this->updateData($id);
        } else {
            $id= $this->input->post('id_pegawai');
            $nik= $this->input->post('nik');
            $nama_pegawai= $this->input->post('nama_pegawai');
            $username= $this->input->post('username');
            $password= md5($this->input->post('password'));
            $jenis_kelamin= $this->input->post('jenis_kelamin');
            $jabatan= $this->input->post('jabatan');
            $tanggal_masuk= $this->input->post('tanggal_masuk');
            $status= $this->input->post('status');
            $hak_akses= $this->input->post('hak_akses');
            
            $photo= $_FILES['photo']['name'];
            if ($photo) {
                $config['upload_path'] = './assets/photo';
                $config['allowed_types'] = 'jgp|jpeg|png';
                $this->load->library('upload', $config);
                if($this->upload->do_upload('photo')) {
                   $photo=$this->upload->data('file_name');
                   $this->db->set('photo', $photo);
                } else {
                    echo $this->upload->display_errors();
                }
            }
  
            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'username' => $username,
                'password' => $password,
                'jenis_kelamin' => $jenis_kelamin,
                'jabatan' => $jabatan,
                'tanggal_masuk' => $tanggal_masuk,
                'status' => $status,
                'hak_akses' => $hak_akses,
                
            );
               
           

            $where = array(
                'id_pegawai' => $id
            );

            $this->penggajianModel->update_data('data_pegawai',$data,$where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diupdate !</strong> </div>');
            redirect('admin/dataPegawai');
        }
    }  
    public function deleteData($id)
    {
            $where = array('id_pegawai' => $id);
            $this->penggajianModel->delete_data($where,'data_pegawai');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus !</strong> </div>');
            redirect('admin/dataPegawai');
    
    }
}