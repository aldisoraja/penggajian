<?php

class DataGaji extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses') !='2') {
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
        $data['title'] = "Data Gaji";
        $nip=$this->session->userdata('nip');
        $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();
        $this->db->select('*');
        $this->db->from('data_kehadiran');
        $this->db->join('data_pegawai', 'data_kehadiran.nip_peg=data_pegawai.nip');
        $this->db->join('data_jabatan', 'data_jabatan.nama_jabatan=data_pegawai.jabatan');
        $this->db->join('golongan', 'golongan.nama_golongan=data_pegawai.golongan');
        $this->db->where('data_kehadiran.nip_peg', $nip);
        $this->db->group_by('bulan');
        $data['gaji'] = $this->db->get()->result();
        
        $this->load->view('templates_pegawai/header',$data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/dataGaji',$data);
        $this->load->view('templates_pegawai/footer');
    }

    public function cetakSlip($id)
    {
        $data['title'] = "Cetak Slip Gaji";
        $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();
        $this->db->select('*');
        $this->db->from('data_pegawai');
        $this->db->join('data_kehadiran', 'data_kehadiran.nip_peg=data_pegawai.nip');
        $this->db->join('data_jabatan', 'data_jabatan.nama_jabatan=data_pegawai.jabatan');
        $this->db->join('golongan', 'golongan.nama_golongan=data_pegawai.golongan');
        $this->db->where('data_kehadiran.id_kehadiran', $id);
        $this->db->group_by('bulan');
        $data['print_slip'] = $this->db->get()->result();
        $data['keuangan'] = $this->db->get_where('data_pegawai', ['jabatan'=>'Kepala Sub Bagian Keuangan'])->row_array();
        $this->load->view('templates_pegawai/header',$data);
        $this->load->view('pegawai/cetakSlipGaji',$data);
    }
}

?>