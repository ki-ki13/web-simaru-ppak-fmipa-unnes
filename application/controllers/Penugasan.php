<?php
	defined('BASEPATH') OR exit("No direct script access allowed");

	class Penugasan extends CI_Controller {
		public function index(){
			$tugas = $this->FolderIdModel->getTable('folder');
        	$data['title']="List Penugasan";
			$this->load->view('head',$data);
	        $this->load->view('navbar2', array($data, 'tugas'=>$tugas));
	        $this->load->view('list-penugasan');
	        $this->load->view('footer');
	        $this->load->view('js');
		}

		public function deskripsi_penugasan(){
        	$data['title']="Deskripsi Penugasan";
			$this->load->view('head',$data);
	        $this->load->view('navbar2', $data);
	        $this->load->view('deskripsi-penugasan');
	        $this->load->view('footer');
	        $this->load->view('js');
		}
	}

?>