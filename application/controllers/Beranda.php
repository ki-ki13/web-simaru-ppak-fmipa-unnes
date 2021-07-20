<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index()
	{
		$this->load->view('head');
        $this->load->view('navbar');
        $this->load->view('beranda');
        $this->load->view('footer');
        $this->load->view('js');
        $this->load->view('js2');
	}
}