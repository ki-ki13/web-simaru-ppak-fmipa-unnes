<?php
  defined('BASEPATH') OR exit("No direct script access allowedi");

	class FolderIdModel extends CI_Model {
		public function addFolder($namaFolder, $id){
			$sql = "INSERT INTO folder VALUES(NULL, '$namaFolder', '$id')";	
			$this->db->query($sql);
			
		}
		public function getIdFolder($namaFolder, $jenis){
			$sql = "SELECT * FROM folder WHERE jenis = '$jenis' AND nama_folder = '$namaFolder'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function getParent($namaFolder){
			$sql = "SELECT * FROM parentFolder WHERE nama_folder = '$namaFolder'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function getTable($table){
			$sql = "SELECT * FROM $table";
			$data = $this->db->query($sql);
			return $data->result_array();
		}
	}


?>