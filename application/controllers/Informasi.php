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
        $data['login_button'] = '<a href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=online&client_id=159925294652-bq4j3u0v7j5jakffcjmfhq1koo08k13b.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%2Fweb-simaru-ppak-fmipa-unnes%2Findex.php%2Fberanda&state&scope=email%20profile&approval_prompt=auto" class="masuk"><span>Masuk</span></a>';
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
        $data['login_button'] = '<a href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=online&client_id=159925294652-bq4j3u0v7j5jakffcjmfhq1koo08k13b.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%2Fweb-simaru-ppak-fmipa-unnes%2Findex.php%2Fberanda&state&scope=email%20profile&approval_prompt=auto" class="masuk"><span>Masuk</span></a>';
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
        $data['login_button'] = '<a href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=online&client_id=159925294652-bq4j3u0v7j5jakffcjmfhq1koo08k13b.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%2Fweb-simaru-ppak-fmipa-unnes%2Findex.php%2Fberanda&state&scope=email%20profile&approval_prompt=auto" class="masuk"><span>Masuk</span></a>';
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
        $data['login_button'] = '<a href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=online&client_id=159925294652-bq4j3u0v7j5jakffcjmfhq1koo08k13b.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%2Fweb-simaru-ppak-fmipa-unnes%2Findex.php%2Fberanda&state&scope=email%20profile&approval_prompt=auto" class="masuk"><span>Masuk</span></a>';
        $data['masuk'] = $this->session->userdata('loggedin');
        $data['title']="Agenda PKKMB";
		$this->load->view('head',$data);
        $this->load->view('navbar2',$data);
        $this->load->view('agenda');
        $this->load->view('footer');
        $this->load->view('js');
	}
    public function jingle()
    {
        $data['login_button'] = '<a href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=online&client_id=159925294652-bq4j3u0v7j5jakffcjmfhq1koo08k13b.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%2Fweb-simaru-ppak-fmipa-unnes%2Findex.php%2Fberanda&state&scope=email%20profile&approval_prompt=auto" class="masuk"><span>Masuk</span></a>';
        $data['masuk'] = $this->session->userdata('loggedin');
        $data['title']="Jingle PKKMB";
        $this->load->view('head',$data);
        $this->load->view('navbar2',$data);
        $this->load->view('jingle');
        $this->load->view('footer');
        $this->load->view('js');
    }
    public function penugasan()
    {
        if(!isset($_SESSION['user_data'])){
            echo "<script>
            alert('Silahkan login terlebih dahulu :)');
            document.location.href = '".site_url('informasi')."'</script>";
            // redirect('informasi');
        }else{
            redirect('penugasan?noKelompok=2');
        }
    }
}
