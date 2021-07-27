<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load extends CI_Controller {

	public function index()
	{
		// $this->load->view('welcome_message');
		$jenisTugas = $_GET['jenisTugas'];
		$idMaba = $_GET['idMaba'];
		$namaTugas = $_GET['namaTugas'];
		$this->load->view('upload_tugas', array('jenisTugas'=>$jenisTugas, 'idMaba'=>$idMaba, 'namaTugas'=>$namaTugas));
	}
	private function getClient()
		{
		    $client = new Google_Client();
		    $client->setApplicationName('Google Drive API PHP Quickstart');
		    $client->setScopes(Google_Service_Drive::DRIVE_METADATA_READONLY);
		    $credentialsPath = base_url()."asset/credentials.json";
		    $client->setAuthConfig($credentialsPath);
		    $client->setAccessType('offline');
		    $client->setPrompt('select_account consent');

		    // Load previously authorized token from a file, if it exists.
		    // The file token.json stores the user's access and refresh tokens, and is
		    // created automatically when the authorization flow completes for the first
		    // time.
		    $tokenPath = base_url().'asset/token.json';
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
	public function upload()
	{

		require '../../vendor/autoload.php';
		/*
		if (php_sapi_name() != 'cli') {
		    throw new Exception('This application must be run on the command line.');
		}
		/**
		 * Returns an authorized API client.
		 * @return Google_Client the authorized client object
		 */


		// Get the API client and construct the service object.
		$client = $this->getClient();
		$service = new Google_Service_Drive($client);

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
	}
	public function tambahPenugasan(){
		$this->load->view('tambah_penugasan');
	}
	public function uploadTugas(){
		$data = $this->FolderIdModel->getTable('folder');
		$this->load->view('upload_penugasan', array('tugas'=>$data));
	}
}