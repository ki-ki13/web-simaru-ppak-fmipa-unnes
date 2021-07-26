<body>
    <nav id="Topnav" class="topnav">
        <div class="logo">
            <li>PKKMB FMIPA</li>
        </div>
        <div class="li-menu" id="beranda">
            <li class="li-nav"><a href="<?= site_url('beranda')?>" <?php if($this->uri->segment(1)=="beranda"){echo 'class="active"';}?>>Beranda</a></li>
            <li class="li-nav"><a href="<?= site_url('informasi')?>" <?php if($this->uri->segment(1)=="informasi"){echo 'class="active"';}?> >Informasi</a></li>
            <li class="li-nav"><a href="#">Galeri</a></li>
        </div>
         <?php
   if(!isset($login_button) AND isset($_SESSION['user_data']))
   {

    // $user_data = $this->session->userdata('user_data');
    // echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
    // echo '<img src="'.$user_data['profile_picture'].'" class="img-responsive img-circle img-thumbnail" />';
    // echo '<h3><b>Name : </b>'.$user_data["first_name"].' '.$user_data['last_name']. '</h3>';
    // echo '<h3><b>Email :</b> '.$user_data['email_address'].'</h3>';
    // echo '<h3><a href="'.base_url().'index.php/google_login/logout">Logout</h3></div>';
   }
   else
   {
    // echo '<div align="center">'.$login_button . '</div>';
   }
   ?>

        <?php if(isset($login_button) AND !isset($_SESSION['user_data'])){?>
        <div class="button" id="btn-beranda">
            <!-- <a href="<?= site_url('auth/login')?>" class="masuk">
                <span>Masuk</span>
            </a> -->
            <?php echo $login_button; ?>
        </div>
        <?php }else{
            $user_data = $this->session->userdata('user_data');

            ?>
            <div class="button" id="logged-in">
                <a href="" class="masuk">
                    <!-- <span><i class="fa fa-user"></i></span> -->
                    <img src="<?=$user_data['profile_picture']?>" class="img-circle"/> 
                </a>
                <ul>
                    <li><a href="<?= site_url('informasi')?>">Tugasku</a></li>
                    <li><a href="<?= site_url('google_login/logout')?>">Keluar</a></li>
                </ul>
            </div>
        <?php }?>
        <div class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </div>
    </nav>
    <?php
    // print_r($this->session->userdata); 
    ?>