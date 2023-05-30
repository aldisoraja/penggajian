<?php

class DataPenggajian extends CI_Controller{
    
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
        $data['title'] = "Data Gaji Pegawai";

        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan      = $_GET['bulan'];
            $tahun      = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        }else{
            $bulan      = date('m');
            $tahun      = date('Y');
            $bulantahun = $bulan.$tahun;
        }

        $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();
        $this->db->select('*');
        $this->db->from('data_pegawai');
        $this->db->join('data_kehadiran', 'data_kehadiran.nip_peg=data_pegawai.nip');
        $this->db->join('data_jabatan', 'data_jabatan.nama_jabatan=data_pegawai.jabatan');
        $this->db->join('golongan', 'golongan.nama_golongan=data_pegawai.golongan');
        $this->db->where('data_kehadiran.bulan', $bulantahun);
        $this->db->group_by('nip');
        $this->db->order_by('nama_pegawai');
        $data['gaji'] = $this->db->get()->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataGaji',$data);
        $this->load->view('templates_admin/footer');
    }

    public function cetakGaji()
    {
        $data['title'] = "Cetak Data Gaji Pegawai";

        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan      = $_GET['bulan'];
            $tahun      = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        }else{
            $bulan      = date('m');
            $tahun      = date('Y');
            $bulantahun = $bulan.$tahun;
        }
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();
        $this->db->select('*');
        $this->db->from('data_pegawai');
        $this->db->join('data_kehadiran', 'data_kehadiran.nip_peg=data_pegawai.nip');
        $this->db->join('data_jabatan', 'data_jabatan.nama_jabatan=data_pegawai.jabatan');
        $this->db->join('golongan', 'golongan.nama_golongan=data_pegawai.golongan');
        $this->db->where('data_kehadiran.bulan', $bulantahun);
        $this->db->group_by('nip');
        $this->db->order_by('nama_pegawai');
        $data['cetakGaji'] = $this->db->get()->result();
        $data['keuangan'] = $this->db->get_where('data_pegawai', ['jabatan'=>'Kepala Sub Bagian Keuangan'])->row_array();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('admin/cetakDataGaji',$data);
    }
}

?>