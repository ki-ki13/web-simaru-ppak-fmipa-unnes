<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
    }

	public function index()
	{
        $data['masuk'] = $this->session->userdata('loggedin');
        $data['title']="Informasi";
		$this->load->view('head',$data);
        $this->load->view('navbar2',$data);
        $this->load->view('informasi');
        $this->load->view('footer');
        $this->load->view('js');
	}
    public function bukpan()
	{
        $data['masuk'] = $this->session->userdata('loggedin');
        $data['title']="Buku Panduan";
		$this->load->view('head',$data);
        $this->load->view('navbar2',$data);
        $this->load->view('bukpan');
        $this->load->view('footer');
        $this->load->view('js');
	}
    public function tatib()
	{
        $data['masuk'] = $this->session->userdata('loggedin');
        $data['title']="Tata Tertib";
		$this->load->view('head',$data);
        $this->load->view('navbar2',$data);
        $this->load->view('tatatertib');
        $this->load->view('footer');
        $this->load->view('js');
	}
    public function agenda()
	{
        $data['masuk'] = $this->session->userdata('loggedin');
        $data['title']="Agenda PPKMB";
		$this->load->view('head',$data);
        $this->load->view('navbar2',$data);
        $this->load->view('agenda');
        $this->load->view('footer');
        $this->load->view('js');
	}
    public function jingle()
	{
        $data['masuk'] = $this->session->userdata('loggedin');
        $data['title']="Agenda PPKMB";
		$this->load->view('head',$data);
        $this->load->view('navbar2',$data);
        $this->load->view('jingle');
        $this->load->view('footer');
        $this->load->view('js');
	}
}