<?php

class SlipGaji extends CI_Controller{
    
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
        $data['title'] = " Filter Slip Gaji Pegawai";
        $nip=$this->session->userdata('nip');
        $data['slip_gaji']= $this->db->query("SELECT * FROM data_pegawai WHERE nip='$nip'")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filterSlipGaji',$data);
        $this->load->view('templates_admin/footer');
    }

    public function cetakSlipGaji()
    {
        $data['title'] = "Cetak Slip Gaji Pegawai";
        $nama=$this->input->post('nama_pegawai');
        $bulan=$this->input->post('bulan');
        $tahun=$this->input->post('tahun');
        $bulantahun=$bulan.$tahun;


        $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();
        $this->db->select('*');
        $this->db->from('data_kehadiran');
        $this->db->join('data_pegawai', 'data_pegawai.nip=data_kehadiran.nip_peg');
        $this->db->join('data_jabatan', 'data_jabatan.nama_jabatan=data_pegawai.jabatan');
        $this->db->join('golongan', 'golongan.nama_golongan=data_pegawai.golongan');
        $this->db->where(['data_kehadiran.bulan'=> $bulantahun, 'data_kehadiran.nama_peg'=> $nama]);
        $this->db->group_by('bulan','tahun');
        $data['printslip'] = $this->db->get()->result();
        $data['keuangan'] = $this->db->get_where('data_pegawai', ['jabatan'=>'Kepala Sub Bagian Keuangan'])->row_array();

        // $data['print_slip'] = $this->db->query("SELECT data_pegawai.nik,data_pegawai.nama_pegawai,
        // data_jabatan.nama_jabatan,data_jabatan.gaji_pokok,data_jabatan.tj_transport,data_jabatan.uang_makan,
        // data_kehadiran.alpha FROM data_pegawai
        // INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik
        // INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan WHERE
        // data_kehadiran.bulan='$bulantahun' AND data_kehadiran.nama_pegawai='$nama'")->result();

        $this->load->view('templates_admin/header',$data);
        $this->load->view('admin/cetakSlipGaji',$data);
    }
}

?>