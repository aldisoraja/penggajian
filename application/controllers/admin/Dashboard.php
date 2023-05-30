<?php

class Dashboard extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses') !='1') {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Anda Belum Login!!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
				redirect('welcome');
            }
    }
    
    public function index()
    {
        $data['title'] = "Dashboard";
        $id=$this->session->userdata('nip');
        $pegawai = $this->db->query("SELECT * FROM data_pegawai");
        $jabatan = $this->db->query("SELECT * FROM data_jabatan");
        $golongan = $this->db->query("SELECT * FROM golongan");
        $pot_gaji = $this->db->query("SELECT * FROM potongan_gaji");
        $data['pegawai']=$pegawai->num_rows();
        $data['jabatan']=$jabatan->num_rows();
        $data['golongan']=$golongan->num_rows();
        $data['pot_gaji']=$pot_gaji->num_rows();
        $data['biodata']= $this->db->query("SELECT * FROM data_pegawai WHERE nip='$id'")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard',$data,);
        $this->load->view('templates_admin/footer');
    }

}

?>