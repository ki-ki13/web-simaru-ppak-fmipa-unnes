<?php
	defined('BASEPATH') OR exit("No direct script access allowed");

	class Penugasan extends CI_Controller {
		public function index(){
			$this->load->view("penugasan");
		}
		public function list_penugasan(){
			$tugas = $this->FolderIdModel->getTable('folder');
			$data['masuk'] = $this->session->userdata('loggedin');
        	$data['title']="List Penugasan";
			$this->load->view('head',$data);
	        $this->load->view('navbar2', array($data, 'tugas'=>$tugas));
	        $this->load->view('list-penugasan');
	        $this->load->view('footer');
	        $this->load->view('js');
		}
	}

?>