<?php

class dataGolongan extends CI_Controller{
    
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
        $data['title'] = "Data Golongan";
        $data['golongan'] = $this->penggajianModel->get_data('golongan')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataGolongan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        $data['title'] = "Tambah Data Golongan";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataGolongan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE ) {
            $this->tambahData();
        } else {
            $nama_golongan      = $this->input->post('nama_golongan');
            $gaji_pokok         = $this->input->post('gaji_pokok');
            $tj_keluarga        = $this->input->post('tj_keluarga');
            $tj_pangan          = $this->input->post('tj_pangan');
            $tj_bpjs            = $this->input->post('tj_bpjs');
            
            $data = array(
                
                'nama_golongan'     => $nama_golongan,
                'gaji_pokok'        => $gaji_pokok,
                'tj_keluarga'       => $tj_keluarga,
                'tj_pangan'         => $tj_pangan,
                'tj_bpjs'           => $tj_bpjs
            );

            $this->penggajianModel->insert_data($data,'golongan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/dataGolongan');
        }
    }

    public function updateData($id)
    {
        $where = array('id_golongan' => $id);
        $data['golongan'] = $this->db->query("SELECT * FROM golongan WHERE id_golongan='$id'")->result();
        $data['title'] = "Update Data Golongan";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataGolongan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE ) {
            $this->updateData();
        } else {
            $id                 = $this->input->post('id_golongan');
            $nama_golongan      = $this->input->post('nama_golongan');
            $gaji_pokok         = $this->input->post('gaji_pokok');
            $tj_keluarga        = $this->input->post('tj_keluarga');
            $tj_pangan          = $this->input->post('tj_pangan');
            $tj_bpjs            = $this->input->post('tj_bpjs');
            
            $data = array(
                
                'nama_golongan'     => $nama_golongan,
                'gaji_pokok'        => $gaji_pokok,
                'tj_keluarga'       => $tj_keluarga,
                'tj_pangan'         => $tj_pangan,
                'tj_bpjs'           => $tj_bpjs
            );

            $where = array(
                'id_golongan' => $id
            );

            $this->penggajianModel->update_data('golongan',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Diubah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/dataGolongan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_golongan','nama golongan','required');
        $this->form_validation->set_rules('gaji_pokok','gaji pokok','required');
        $this->form_validation->set_rules('tj_keluarga','tunjangan keluarga','required');
        $this->form_validation->set_rules('tj_pangan','tunjangan pangan','required');
        $this->form_validation->set_rules('tj_bpjs','tunjangan bpjs','required');
    }

    public function deleteData($id)
    {
        $where = array('id_golongan' => $id);
        $this->penggajianModel->delete_data($where, 'golongan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/dataGolongan');
    }

}

?>