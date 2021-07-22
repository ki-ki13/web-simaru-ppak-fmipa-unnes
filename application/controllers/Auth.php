<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
		$this->load->library('form_validation');
		$this->load->library('session');
    }

    public function login()
    {
		$data['title'] = "Masuk";

		$this->load->view('head', $data);
        $this->load->view('login');
        $this->load->view('js');
    }
    

    public function proses_login()
    {
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nim', 'Nim', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$errors = $this->form_validation->error_array();
			$this->session->set_flashdata('errors', $errors);
			$this->session->set_flashdata('input', $this->input->post());
			redirect('auth/login'); // LOGIN
		
		} else {
	
			$nama = htmlspecialchars($this->input->post('nama'));
			$nim = htmlspecialchars($this->input->post('nim'));
	
			// CEK KE DATABASE BERDASARKAN NAMA
			$cek_login = $this->auth_model->cek_login($nim); 
				
			if(($cek_login == FALSE)and($nama != $cek_login->nama)){
                $this->session->set_flashdata('msg', 'Nama atau nim yang kamu masukkan salah, coba lagi 😊');
                redirect('auth/login');
			} 
            // else if($nama != $cek_login->nama){
            //     $this->session->set_flashdata('msg', 'Nama yang kamu masukkan salah, coba lagi :)');
            //     redirect('auth/login');
			// 		
			// } else if($cek_login == FALSE){
            //     $this->session->set_flashdata('msg', 'Nim yang kamu masukkan salah, coba lagi :)');
            //     redirect('auth/login');  
            // }
            else {
                    $this->session->set_userdata('loggedin', TRUE);
                    $this->session->set_userdata('id_user', $cek_login->id_user);
					$this->session->set_userdata('nama', $cek_login->nama);
					$this->session->set_userdata('nim', $cek_login->nim);
				redirect('beranda');
			}
		}
    }

    public function logout()
    {
        $this->session->sess_destroy();
		redirect('beranda');
    }
}