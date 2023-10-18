<?php

class dataPegawai extends CI_controller{
    public function index()
    {
        $data = $this->db->query("SELECT * FROM data_pegawai")->result();
        var_dump($data);
    }
}

?>