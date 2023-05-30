<?php

class DataJabatan extends CI_Controller{
    
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
        $data['title'] = "Data Jabatan";
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataJabatan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        $data['title'] = "Tambah Data Jabatan";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataJabatan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE ) {
            $this->tambahData();
        } else {
            $nama_jabatan       = $this->input->post('nama_jabatan');
            $kategori           = $this->input->post('kategori');
            $tj_jabatan         = $this->input->post('tj_jabatan');
            
            $data = array(
                
                'nama_jabatan'  => $nama_jabatan,
                'kategori'      => $kategori,
                'tj_jabatan'    => $tj_jabatan
            );

            $this->penggajianModel->insert_data($data,'data_jabatan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/dataJabatan');
        }
    }

    public function updateData($id)
    {
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan='$id'")->result();
        $data['title'] = "Update Data Jabatan";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataJabatan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE ) {
            $this->updateData();
        } else {
            $id                 = $this->input->post('id_jabatan');
            $nama_jabatan       = $this->input->post('nama_jabatan');
            $kategori           = $this->input->post('kategori');
            $tj_jabatan         = $this->input->post('tj_jabatan');
            
            $data = array(
                
                'nama_jabatan'  => $nama_jabatan,
                'kategori'      => $kategori,
                'tj_jabatan'    => $tj_jabatan
            );

            $where = array(
                'id_jabatan' => $id
            );

            $this->penggajianModel->update_data('data_jabatan',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Diubah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/dataJabatan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_jabatan','nama jabatan','required');
        $this->form_validation->set_rules('kategori','kategori','required');
        $this->form_validation->set_rules('tj_jabatan','tunjangan jabatan','required');
    }

    public function deleteData($id)
    {
        $where = array('id_jabatan' => $id);
        $this->penggajianModel->delete_data($where, 'data_jabatan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/dataJabatan');
    }

}

?>