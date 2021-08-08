<?php
defined('BASEPATH') OR exit('No script access allowed');
// displaying error
/* 
ini_set("display_errors", "1");
error_reporting(E_ALL);
 */
//ini_set("display_errors", "1");
//error_reporting(E_ALL);

class Submit extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// require $_SERVER['DOCUMENT_ROOT']."/PPAK_FMIPA/asset/google-drive.php";
		require $_SERVER['DOCUMENT_ROOT']."/web-simaru-ppak-fmipa-unnes/vendor/autoload.php";
		$this->load->library('session');
	}
	public function client(){
		// Get the API client and construct the service object.
		$client = $this->getClient();
		$service = new Google_Service_Drive($client);
		// echo gettype($client);
		// Print the names and IDs for up to 10 files.
		$optParams = array(
		  'pageSize' => 10,
		  'fields' => 'nextPageToken, files(id, name)'
		);
		$results = $service->files->listFiles($optParams);

		if (count($results->getFiles()) == 0) {
		    print "No files found.\n";
		} else {
		    print "Files:\n";
		    foreach ($results->getFiles() as $file) {
			printf("%s (%s)\n", $file->getName(), $file->getId());
		    }
		}	
		return $client;	
	}
	private function getClient()
		{
		    $client = new Google_Client();
		    $client->setApplicationName('Google Drive API PHP Quickstart');
		    $client->setScopes(Google_Service_Drive::DRIVE);
		    $credentialsPath = $_SERVER['DOCUMENT_ROOT']. "/web-simaru-ppak-fmipa-unnes/application/libraries/credentials-drive.json";
		    $client->setAuthConfig($credentialsPath);
		    $client->setAccessType('offline');
		    $client->setPrompt('select_account consent');

		    // Load previously authorized token from a file, if it exists.
		    // The file token.json stores the user's access and refresh tokens, and is
		    // created automatically when the authorization flow completes for the first
		    // time.
		    $tokenPath = $_SERVER['DOCUMENT_ROOT']. "/web-simaru-ppak-fmipa-unnes/application/libraries/token.json";
		    if (file_exists($tokenPath)) {
			$accessToken = json_decode(file_get_contents($tokenPath), true);
			$client->setAccessToken($accessToken);
		    }

		    // If there is no previous token or it's expired.
		    if ($client->isAccessTokenExpired()) {
			// Refresh the token if possible, else fetch a new one.
			if ($client->getRefreshToken()) {
			    $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
			} else {
			    // Request authorization from the user.
			    $authUrl = $client->createAuthUrl();
			    printf("Open the following link in your browser:\n%s\n", $authUrl);
			    print 'Enter verification code: ';
			    $authCode = trim(fgets(STDIN));

			    // Exchange authorization code for an access token.
			    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
			    $client->setAccessToken($accessToken);

			    // Check to see if there was an error.
			    if (array_key_exists('error', $accessToken)) {
				throw new Exception(join(', ', $accessToken));
			    }
			}
			// Save the token to a file.
			if (!file_exists(dirname($tokenPath))) {
			    mkdir(dirname($tokenPath), 0700, true);
			}
			file_put_contents($tokenPath, json_encode($client->getAccessToken()));
		    }
		    return $client;
		}
	

	public function index(){
		error_reporting(E_ERROR | E_PARSE);
		// require base_url()."asset/google-drive.php";
		$namaTugas = $_POST['namaTugas'];
		$jenisTugas = $_POST['jenisTugas'];
		$noKelompok = $_POST['kelompok'];

		if( isset( $_POST['submit'] ) ){
		    
		    if( empty( $_FILES["file"]['tmp_name'] ) ){
			echo "Go back and Select file to upload.";
			exit;
		    } 
		    // File Upload 
		    $file_ori_name = basename($_FILES['file']['name']);
		    $file_tmp  = $_FILES["file"]["tmp_name"];
		    $file_type = strtolower(pathinfo($file_ori_name, PATHINFO_EXTENSION));
		    $fileName  = $_POST['namaFile'].".".$file_type;

		    
	        $getIdFolder = $this->FolderIdModel->getIdFolder($namaTugas, $jenisTugas);
		    $folderId = $getIdFolder[0]['folder_id'];
		    // jika jenis_tugas = individu
		    if($jenisTugas == "individu"){
			    $namaFolder = "Kelompok ".$noKelompok;
			    $folder_id = $this->create_folder( $namaFolder, $folderId );
		    }
		    else if($jenisTugas == "kelompok"){
		   		$folder_id = $folderId; 
				$fileName = "Kelompok_".$noKelompok.".".$file_type;
		    }
			if ($_FILES['file']['size'] < 5 * 1024 * 1024 ){
				$success = $this->insert_file_to_drive($file_tmp, $fileName, $folder_id);
			}else{
				$success = $this->upload_chunk( $file_tmp, $fileName, $folder_id);
			}
		    
		    if( $success ){
				$this->session->set_flashdata(
                        'pesan',
                        '<script>
                                Swal.fire(
                                "Berhasil!",
                                "File berhasil diupload",
                                "success"
                                );
                            </script>'
                    );
                echo "<script>document.location.href = '".site_url('penugasan')."'</script>";
		    } else { 
				$this->session->set_flashdata(
                        'pesan',
                        '<script>
                                Swal.fire(
                                "Oops!",
                                "File Gagal diupload",
                                "error"
                                );
                            </script>'
                    );
                echo "<script>document.location.href = '".site_url('penugasan')."'</script>";
		    }
		}


		// if( isset( $_GET['list'] ) ){
		//     echo "<h1>Retriving List all files and folders from Google Drive</h1>";
		//     //$this->get_files_and_folders("1pwh6xOOmf3nhYjiSeTlqgwpM0talr4kK");
		//     $folderId = "root";
		//     if(isset($_GET['folderId'])){
		//     	$folderId = $_GET['folderId'];
		//     }
		//     $this->get_files_and_folders($folderId);
		// }

			
	}
	private function do_upload_lokal($path, $file_name)
	{
	$newName = $_POST['namaFile'];
	$typeFile = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			$config['upload_path']          = $path;
			$config['allowed_types']        = 'gif|jpg|png|php|jpeg|pdf';
			$config['max_size']             = 2048;
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;
			$config['file_name'] 			= $newName.".".$typeFile;
			
			return $data = Array(
				'namaFile'=>$config['file_name'],
				'pathFile'=>$config['upload_path'].$config['file_name'],
			);
	}
	
	// This will create a folder and also sub folder when $parent_folder_id is given
	public function create_folder( $folder_name, $parent_folder_id=null ){

		$client = $this->client();
	    $folder_list = $this->check_folder_exists( $folder_name, $parent_folder_id );

	    // if folder does not exists
	    if( count( $folder_list ) == 0 ){
		$service = new Google_Service_Drive( $client );
		$folder = new Google_Service_Drive_DriveFile();
	    
		$folder->setName( $folder_name );
		$folder->setMimeType('application/vnd.google-apps.folder');
		if( !empty( $parent_folder_id ) ){
		    $folder->setParents( [ $parent_folder_id ] );        
		}

		$result = $service->files->create( $folder );
	    
		$folder_id = null;
		
		if( isset( $result['id'] ) && !empty( $result['id'] ) ){
		    $folder_id = $result['id'];
		}
	    
		return $folder_id;
	    }

	    return $folder_list[0]['id'];
	    
	}

	// This will check folders and sub folders by name
	public function check_folder_exists( $folder_name, $folder_id ){
	    
		$client = $this->client();
	    $service = new Google_Service_Drive($client);

	    $parameters['q'] = "mimeType='application/vnd.google-apps.folder' and name='$folder_name' and '$folder_id' in parents and trashed=false";
	    $files = $service->files->listFiles($parameters);

	    $op = [];
	    foreach( $files as $k => $file ){
		$op[] = $file;
	    }

	    return $op;
	}

	// This will display list of folders and direct child folders and files.
	public function get_files_and_folders($folder_id="root"){
	    $client = $this->client();
	    $service = new Google_Service_Drive($client);

	    $parameters['q'] = "mimeType='application/vnd.google-apps.folder' and '$folder_id' in parents and trashed=false";
	    $files = $service->files->listFiles($parameters);
	    
	    echo "<ul>";
	    foreach( $files as $k => $file ){
		echo "<li> 
		
		    {$file['name']} - {$file['id']} ---- ".$file['mimeType'];

		    try {
			// subfiles
			$sub_files = $service->files->listFiles(array('q' => "mimeType='application/vnd.google-apps.folder' and '{$file['id']}' in parents and trashed=false"));
			echo "<ul>";
			foreach( $sub_files as $kk => $sub_file ) {
			    echo "<li>&gt {$sub_file['name']} - {$sub_file['id']}  ---- ". $sub_file['mimeType'] ." </li>";
				    //sub-sub
				$sub_sub_files = $service->files->listFiles(array('q' => "mimeType='application/vnd.google-apps.folder' and '{$sub_file['id']}' in parents and trashed=false"));
				echo "<ul>";
		    		foreach( $sub_sub_files as $kkk => $subs ) {
				    echo "<li>&gt {$subs['name']} - {$subs['id']}  ---- ". $subs['mimeType'] ." </li>";
				}		
			    
			    echo "</ul>";
			}
			echo "</ul>";
		    } catch (\Throwable $th) {
			 $this->dd($th);
		    }
		
		echo "</li>";
	    }
	    echo "</ul>";
	}
	
	// This will insert file into drive and returns boolean values.
	public function insert_file_to_drive( $file_path, $file_name, $parent_file_id = null ){
		$client = $this->client();
	    $service = new Google_Service_Drive( $client );
	    $file = new Google_Service_Drive_DriveFile();

	    $file->setName( $file_name );


	    if( !empty( $parent_file_id ) ){
		$file->setParents( [ $parent_file_id ] );        
	    }

	    $result = $service->files->create(
		$file,
		array(
		    'data' => file_get_contents($file_path),
		    'mimeType' => 'application/octet-stream',
		)
	    );

	    $is_success = false;
	    
	    if( isset( $result['name'] ) && !empty( $result['name'] ) ){
		$is_success = true;
	    }

	    return $is_success;
	}

	// Function just for easier debugging
	public function dd( ...$d ){
		    echo "<pre style='background-color:#000;color:#fff;' >";
		    print_r($d);
		    exit;
		}  
	private function tambahIdPenugasan(){
		$penugasan = array(
			'kelompok'=>array(
				0=>"folder_id_tugas_1",
			),
			'individu'=>array(
				0=>"folder_id_tugas_individu_1",
			)
		);
		array_push($penugasan['kelompok'], "folder_id_tugas_2");
	}
	public function addFolder(){
		$namaFolder = $_GET['namaFolder'];
		$jenisTugas = $_GET['jenisTugas'];
		
		$parent = $this->FolderIdModel->getParent($jenisTugas);

		$folderId = $this->create_folder($namaFolder,$parent[0]['folder_id']);
		$data = array(
			'id' => 'NULL',
			'jenis' => $jenisTugas,
			'nama_folder' => $namaFolder,
			'folder_id' => $folderId
		);

		try{
			$this->db->insert('folder', $data);
			echo "<script>alert('Tugas Berhasil Ditambahkan :)');document.location.href = '".site_url('admin')."'</script>";
		}catch(\Throwable $th){
			$this->dd($th);
		}	
	}

	public function upload_chunk($file_path, $file_name,$parent_file_id=null){
		$client = $this->client();
		
		
		$service = new Google_Service_Drive( $client );
	    $file = new Google_Service_Drive_DriveFile();

	    $file->setName( $file_name );
		if( !empty( $parent_file_id ) ){
			$file->setParents( [ $parent_file_id ] );        
		}
		$chunkSizeBytes = 1 * 1024 * 1024;
		// $mimeType = $this->mimeType;
		$client->setDefer(true);
		$request = $service->files->create($file);

		// Create a media file upload to represent our upload process.
		$media = new Google_Http_MediaFileUpload(
		  $client,
		  $request,
		  'application/octet-stream',
		  null,
		  true,
		  $chunkSizeBytes
		);
		$media->setFileSize(filesize($file_path));

		// Upload the various chunks. $status will be false until the process is
		// complete.
		$status = false;
		$handle = fopen($file_path, "rb");
		
		// start uploading		
		// echo "Uploading: " . $this->fileName . "\n";  
		
		$filesize = filesize($file_path);
		
		// while not reached the end of file marker keep looping and uploading chunks
		while (!$status && !feof($handle)) {
			set_time_limit(120); 
			$chunk = fread($handle, $chunkSizeBytes);
			$status = $media->nextChunk($chunk);  
		}
		
		// The final value of $status will be the data from the API for the object
		// that has been uploaded.
		$result = false;
		if($status != false) {
		  $result = $status;
		}

		fclose($handle);

		$is_success = false;
	    
	    if( isset( $result['name'] ) && !empty( $result['name'] ) ){
		$is_success = true;
	    }

	    return $is_success;	
	}
}
?>