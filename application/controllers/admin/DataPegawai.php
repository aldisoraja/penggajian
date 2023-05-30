<?php

class dataPegawai extends CI_Controller{
    
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
        $data['title'] = "Data Pegawai";
        $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataPegawai',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        $data['title'] = "Tambah Data Pegawai";
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $data['golongan'] = $this->penggajianModel->get_data('golongan')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahPegawai',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE ) {
            $this->tambahData();
        } else {
            $nik                = $this->input->post('nik');
            $nama_pegawai       = $this->input->post('nama_pegawai');
            $jenis_kelamin      = $this->input->post('jenis_kelamin');
            $golongan           = $this->input->post('golongan');
            $jabatan            = $this->input->post('jabatan');
            $kat_jab            = $this->input->post('kat_jab');
            $status             = $this->input->post('status');
            $hak_akses          = $this->input->post('hak_akses');
            $username           = $this->input->post('username');
            $password           = $this->input->post('password');
            $foto               = $_FILES['foto']['name'];
            if($foto=''){}else{
                $config ['upload_path']     = './assets/avatar';
                $config ['allowed_types']   = 'jpg|jpeg|png|tiff';
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('foto')){
                    echo "Foto Gagal Diupload!";
                }else{
                    $foto=$this->upload->data('file_name');
                }
            }
            
            $data = array(
                
                'nik'               => $nik,
                'nama_pegawai'      => $nama_pegawai,
                'jenis_kelamin'     => $jenis_kelamin,
                'golongan'          => $golongan,
                'jabatan'           => $jabatan,
                'kat_jab'           => $kat_jab,
                'status'            => $status,
                'hak_akses'         => $hak_akses,
                'username'          => $username,
                'password'          => $password,
                'foto'              => $foto
            );

            $this->penggajianModel->insert_data($data,'data_pegawai');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/dataPegawai');
        }
    }

    public function updateData($id)
    {
        $where = array('nip' => $id);
        $data['title'] = "Update Data Pegawai";
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $data['golongan'] = $this->penggajianModel->get_data('golongan')->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE nip='$id'")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formUpdatePegawai',$data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE ) {
            $this->updateData();
        } else {
            $id                 = $this->input->post('nip');
            $nik                = $this->input->post('nik');
            $nama_pegawai       = $this->input->post('nama_pegawai');
            $jenis_kelamin      = $this->input->post('jenis_kelamin');
            $golongan           = $this->input->post('golongan');
            $jabatan            = $this->input->post('jabatan');
            $kat_jab            = $this->input->post('kat_jab');
            $status             = $this->input->post('status');
            $hak_akses          = $this->input->post('hak_akses');
            $username           = $this->input->post('username');
            $password           = $this->input->post('password');
            $foto               = $_FILES['foto']['name'];
            if($foto){
                $config ['upload_path']     = './assets/avatar';
                $config ['allowed_types']   = 'jpg|jpeg|png|tiff';
                $this->load->library('upload',$config);
                if($this->upload->do_upload('foto')){
                    $foto=$this->upload->data('file_name');
                    $this->db->set('foto',$foto);
                }else{
                    echo $this->upload->display_errors();
                }
            }
            
            $data = array(
                
                'nik'               => $nik,
                'nama_pegawai'      => $nama_pegawai,
                'jenis_kelamin'     => $jenis_kelamin,
                'golongan'          => $golongan,
                'jabatan'           => $jabatan,
                'kat_jab'           => $kat_jab,
                'status'            => $status,
                'hak_akses'         => $hak_akses,
                'username'          => $username,
                'password'          => $password
            );

            $where = array(
                'nip' => $id
            );

            $this->penggajianModel->update_data('data_pegawai',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Diubah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/dataPegawai');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nik','NIK','required');
        $this->form_validation->set_rules('nama_pegawai','Nama Pegawai','required');
        $this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required');
        $this->form_validation->set_rules('golongan','golongan','required');
        $this->form_validation->set_rules('jabatan','jabatan','required');
        $this->form_validation->set_rules('kat_jab','kategori jabatan','required');
        $this->form_validation->set_rules('status','status','required');
    }

    public function deleteData($id)
    {
        $where = array('nip' => $id);
        $this->penggajianModel->delete_data($where, 'data_pegawai');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/dataPegawai');
    }

}

?>