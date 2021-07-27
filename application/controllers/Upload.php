<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require './vendor/autoload.php';
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;
use Kunnu\Dropbox\DropboxFile;
use Kunnu\Dropbox\Exceptions\DropboxClientException;

class Upload extends CI_Controller {
    var $id_key;
    var $app_secret;
    var $token;

    public function __construct()
    {
        parent::__construct();
        $this->id_key= 'b0wr0e2cdjgfa5u' ;
        $this->app_secret = '91yxo9ftp7rs1qi';
        $this->token = '70RpwItT-AwAAAAAAAAAAU6ix0vK9DpyHhgzzNzKYoHIYpcH0aBO5TWPn697iyXU';
    }

	public function index()
	{
		$this->load->view('upload');
	}

    public function tugasKelompok(){
        $this->load->view('upload');
        //echo $id_key;
    }

    public function uploadFile(){
        //Configure Dropbox Application
        $app = new DropboxApp($this->id_key, $this->app_secret, $this->token);

        //Configure Dropbox service
        $dropbox = new Dropbox($app);
        if ($this->input->post('submit')){
            $kelompok = $this->input->post('kelompok');
            // echo $kelompok;
            // Check if file was uploaded
            if ($_FILES["file"]['name']!= '') {
                // File to Upload
                $file = $_FILES['file'];

                // File Path
                $fileName = $file['name'];
                $filePath = $file['tmp_name'];

                try {
                    // Create Dropbox File from Path
                    $dropboxFile = new DropboxFile($filePath);

                    // Upload the file to Dropbox
                    $uploadedFile = $dropbox->upload($dropboxFile, "/UploadTugas/" . $kelompok . "/tugas kelompok/" . $fileName, ['autorename' => false]);

                    // File Uploaded
                    echo $uploadedFile->getPathDisplay();
                    echo "sukses";
                } catch (DropboxClientException $e) {
                    echo $e->getMessage();
                    }
                }
            }
        
         }
         public function tugasIndividu(){
            $this->load->view('upload2');
        } 
        public function uploadFile2(){
            //Configure Dropbox Application
            $app = new DropboxApp($this->id_key, $this->app_secret, $this->token);
    
            //Configure Dropbox service
            $dropbox = new Dropbox($app);
            if ($this->input->post('submit')){
                $kelompok = $this->input->post('kelompok');
                // echo $kelompok;
                // Check if file was uploaded
                if ($_FILES["file"]['name']!= '') {
                    // File to Upload
                    $file = $_FILES['file'];
    
                    // File Path
                    $fileName = $file['name'];
                    $filePath = $file['tmp_name'];
    
                    try {
                        // Create Dropbox File from Path
                        $dropboxFile = new DropboxFile($filePath);
    
                        // Upload the file to Dropbox
                        $uploadedFile = $dropbox->upload($dropboxFile, "/UploadTugas/" . $kelompok . "/tugas individu/tugas1/" . $fileName, ['autorename' => false]);
    
                        // File Uploaded
                        echo $uploadedFile->getPathDisplay();
                        echo "sukses";
                    } catch (DropboxClientException $e) {
                        echo $e->getMessage();
                        }
                    }
                }
            
             }
}