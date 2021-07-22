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
        <?php if($masuk != 1){?>
        <div class="button" id="btn-beranda">
            <a href="<?= site_url('auth/login')?>" class="masuk">
                <span>Masuk</span>
            </a>
        </div>
        <?php }else{?>
            <div class="button" id="btn-beranda">
                <a href="" class="masuk">
                    <span><i class="fa fa-user"></i></span>
                </a>
                <ul>
                    <li><a href="<?= site_url('informasi')?>">Tugasku</a></li>
                    <li><a href="<?= site_url('auth/logout')?>">Keluar</a></li>
                </ul>
            </div>
        <?php }?>
        <div class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </div>
    </nav>
    <?php
    print_r($this->session->userdata); 
    ?>