<?php

class UbahPassword extends CI_Controller{
    
    public function index()
    {
        $data['title'] = "Ganti Password";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('formUbahPassword',$data);
        $this->load->view('templates_admin/footer');
    }

    public function ubahPasswordAksi()
    {
        $passBaru       = $this->input->post('passBaru');
        $konfirmasiPass       = $this->input->post('konfirmasiPass');

        $this->form_validation->set_rules('passBaru','password baru','required|matches[konfirmasiPass]');
        $this->form_validation->set_rules('konfirmasiPass','konfirmasi password','required');

        if($this->form_validation->run() != FALSE) {
            $data = array('password' => $passBaru);
            $id = array('nip' => $this->session->userdata('nip'));
            $this->penggajianModel->update_data('data_pegawai',$data,$id);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Password Berhasil Diganti!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Welcome');
        }else{
            $data['title'] = "Ubah Password";
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('formUbahPassword',$data);
            $this->load->view('templates_admin/footer');
        }
    }
}

?>