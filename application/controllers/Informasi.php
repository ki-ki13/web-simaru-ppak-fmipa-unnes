<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

	public function index()
	{
		$this->load->view('head');
        $this->load->view('navbar2');
        $this->load->view('informasi');
        $this->load->view('footer');
        $this->load->view('js');
	}
    public function bukpan()
	{
		$this->load->view('head');
        $this->load->view('navbar2');
        $this->load->view('bukpan');
        $this->load->view('footer');
        $this->load->view('js');
	}
    public function tatib()
	{
		$this->load->view('head');
        $this->load->view('navbar2');
        $this->load->view('tatatertib');
        $this->load->view('footer');
        $this->load->view('js');
	}
}