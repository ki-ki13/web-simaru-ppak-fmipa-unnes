<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
    }

	public function index()
	{
        $data['masuk'] = $this->session->userdata('loggedin');
        $data['title']="PKKMB FMIPA UNNES";
		$this->load->view('head',$data);
        $this->load->view('navbar',$data);
        $this->load->view('beranda');
        $this->load->view('footer');
        $this->load->view('js');
        $this->load->view('js2');
	}
}