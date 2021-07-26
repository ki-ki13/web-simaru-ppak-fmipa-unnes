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
         require $_SERVER['DOCUMENT_ROOT'] . "/web-simaru-ppak-fmipa-unnes/vendor/autoload.php";

  $google_client = new Google_Client();

  $google_client->setClientId('159925294652-bq4j3u0v7j5jakffcjmfhq1koo08k13b.apps.googleusercontent.com'); //Define your ClientID

  $google_client->setClientSecret('HmonzQ3urCdftb2TJkqBCJU_'); //Define your Client Secret Key

  $google_client->setRedirectUri('http://localhost/web-simaru-ppak-fmipa-unnes/index.php/beranda'); //Define your Redirect Uri

  $google_client->addScope('email');

  $google_client->addScope('profile');

  if(isset($_GET["code"]))
  {
   $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

   if(!isset($token["error"]))
   {
    $google_client->setAccessToken($token['access_token']);

    $this->session->set_userdata('access_token', $token['access_token']);

    $google_service = new Google_Service_Oauth2($google_client);

    $data = $google_service->userinfo->get();

    $current_datetime = date('Y-m-d H:i:s');

    if($this->Google_login_model->Is_already_register($data['id']))
    {
     //update data
     $user_data = array(
      'first_name' => $data['given_name'],
      'last_name'  => $data['family_name'],
      'email_address' => $data['email'],
      'profile_picture'=> $data['picture'],
      'updated_at' => $current_datetime
     );

     $this->Google_login_model->Update_user_data($user_data, $data['id']);
    }
    else
    {
     //insert data
     $user_data = array(
      'login_oauth_uid' => $data['id'],
      'first_name'  => $data['given_name'],
      'last_name'   => $data['family_name'],
      'email_address'  => $data['email'],
      'profile_picture' => $data['picture'],
      'created_at'  => $current_datetime
     );

     $this->Google_login_model->Insert_user_data($user_data);
    }
    $this->session->set_userdata('user_data', $user_data);
   }
  }
  else if(!isset($_GET['code']) AND isset($_SESSION['user_data'])){
    $data = NULL;
    $this->loggedIn($data);
  }
  $login_button = '';
  if(!$this->session->userdata('access_token'))
  {
   $login_button = '<a href="'.$google_client->createAuthUrl().'" class="masuk"><span>Masuk</span></a>';
   $data['login_button'] = $login_button;
   // $this->load->view('beranda', $data);
   $this->loggedIn($data);
  }
  else
  {
   // $this->load->view('beranda', $data);
    $this->loggedIn($data);
  }





  //       $data['masuk'] = $this->session->userdata('loggedin');
  //       $login_button = '<a href="'.$google_client->createAuthUrl().'" class="masuk"><span>Masuk</span></a>';
  //       $data['login_button'] = $login_button;
  //       $data['title']="PKKMB FMIPA UNNES";
		// $this->load->view('head',$data);
  //       $this->load->view('navbar',$data);
  //       $this->load->view('beranda');
  //       $this->load->view('footer');
  //       $this->load->view('js');
  //       $this->load->view('js2');
	}

    public function loggedIn($data)
  {
    $title['title'] = "PKKMB FMIPA";
  $this->load->view('head',$title);
      $this->load->view('navbar',$data);
      $this->load->view('beranda');
      $this->load->view('footer');
      $this->load->view('js');
      $this->load->view('js2');
  }
}