<?php

class DataAbsensi extends CI_Controller{
    
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
        $data['title'] = "Rekap Absensi Pegawai";

        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan      = $_GET['bulan'];
            $tahun      = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        }else{
            $bulan      = date('m');
            $tahun      = date('Y');
            $bulantahun = $bulan.$tahun;
        }
        
        $this->db->select('*');
        $this->db->from('data_kehadiran');
        $this->db->join('data_pegawai', 'data_kehadiran.nip_peg=data_pegawai.nip');
        $this->db->join('data_jabatan', 'data_pegawai.jabatan = data_jabatan.nama_jabatan');
        $this->db->join('golongan', 'data_pegawai.golongan = golongan.nama_golongan');
        $this->db->where('data_kehadiran.bulan', $bulantahun);
        $this->db->group_by('id_kehadiran');
        $this->db->order_by('nama_pegawai');
        $data['absensi'] = $this->db->get()->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataAbsensi',$data);
        $this->load->view('templates_admin/footer');
    }

    public function inputAbsensi()
    {
        if($this->input->post('submit', TRUE) == 'submit') {
            $post = $this->input->post();

            foreach ($post['bulan'] as $key => $value) {
                if($post['bulan'][$key] !='' || $post['nip_peg'][$key] !='')
                {
                    $simpan[] = array(

                        'bulan'         => $post['bulan'][$key],
                        'nip_peg'       => $post['nip_peg'][$key],
                        'nik_peg'       => $post['nik_peg'][$key],
                        'nama_peg'      => $post['nama_peg'][$key],
                        'jenis_kel'     => $post['jenis_kel'][$key],
                        'gol_pang'      => $post['gol_pang'][$key],
                        'nama_jab'      => $post['nama_jab'][$key],
                        'kategori_jab'  => $post['kategori_jab'][$key],
                        'kedudukan'     => $post['kedudukan'][$key],
                        'hadir'         => $post['hadir'][$key],
                        'ijin'          => $post['ijin'][$key],
                        'alpha'         => $post['alpha'][$key]
                    );
                }
            }

            $this->penggajianModel->insert_batch('data_kehadiran',$simpan);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/dataAbsensi');
        }

        $data['title'] = "Form Input Rekap Absensi";
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan      = $_GET['bulan'];
            $tahun      = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        }else{
            $bulan      = date('m');
            $tahun      = date('Y');
            $bulantahun = $bulan.$tahun;
        }

        $data['input_absensi'] = $this->db->query("SELECT data_pegawai.*, data_jabatan.nama_jabatan FROM data_pegawai
        INNER JOIN data_jabatan ON data_pegawai.jabatan=data_jabatan.nama_jabatan WHERE NOT EXISTS (SELECT * FROM 
        data_kehadiran WHERE bulan='$bulantahun' AND data_pegawai.nip=data_kehadiran.nip_peg) ORDER BY data_pegawai.nama_pegawai
        ASC")->result();

        // $this->db->select('*');
        // $this->db->from('data_pegawai');
        // $this->db->join('data_jabatan', 'data_pegawai.jabatan = data_jabatan.nama_jabatan');
        // $this->db->join('golongan', 'data_pegawai.golongan = golongan.nama_golongan');
        // $this->db->where('SELECT*FROM data_kehadiran WHERE bulan=>$bulantahun AND data_pegawai.nip = data_kehadiran.nip_peg');
        // $this->db->group_by('nip');
        // $this->db->order_by('nama_pegawai');
        // $data['input_absensi'] = $this->db->get()->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formInputAbsensi',$data);
        $this->load->view('templates_admin/footer');
    }

    public function updateAbsensi($id)
    {
        if($this->input->post('submit', TRUE) == 'submit') {
            $post = $this->input->post();

            $data = [
                'hadir' => $post['hadir'],
                'ijin' => $post['ijin'],
                'alpha' => $post['alpha']
            ];
            $nip = $post['nip'];
            $bulan = $post['bulan'];

            $this->db->where(['nip_peg'=>$nip, 'bulan'=>$bulan]);
            $this->db->update('data_kehadiran', $data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/dataAbsensi');
        }

        $data['title'] = "Form Update Rekap Absensi";
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan      = $_GET['bulan'];
            $tahun      = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        }else{
            $bulan      = date('m');
            $tahun      = date('Y');
            $bulantahun = $bulan.$tahun;
        }

        // $data['input_absensi'] = $this->db->query("SELECT data_pegawai.*, data_jabatan.nama_jabatan FROM data_pegawai
        // INNER JOIN data_jabatan ON data_pegawai.jabatan=data_jabatan.nama_jabatan WHERE NOT EXISTS (SELECT * FROM 
        // data_kehadiran WHERE bulan='$bulantahun' AND data_pegawai.nip=data_kehadiran.nip_peg) ORDER BY data_pegawai.nama_pegawai
        // ASC")->result();

        $where = array('nip_peg' => $id);
        $data['update_absensi'] = $this->db->query("SELECT * FROM data_kehadiran WHERE bulan='$bulantahun' AND data_kehadiran.nip_peg='$id'")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formUpdateAbsensi',$data);
        $this->load->view('templates_admin/footer');
    }

    // public function updateAbsensi(){
    //     $data = [
    //         'nip' => $this->input->post('hadir'),
    //     ];
    //     // var_dump($data);die;
    // }

    
}

?>