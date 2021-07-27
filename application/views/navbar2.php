<body>
    <nav id="Topnav" class="topnav">
        <div class="logo" id="logotugas">
            <li>PKKMB FMIPA</li>
        </div>
        <div class="li-menu">
            <li class="li-nav"><a href="<?= site_url('beranda')?>" <?php if($this->uri->segment(1)=="beranda"){echo 'class="active"';}?> >Beranda</a></li>
            <li class="li-nav"><a href="<?= site_url('informasi')?>" <?php if($this->uri->segment(1)=="informasi"){echo 'class="active"';}?>>Informasi</a></li>
            <li class="li-nav"><a href="#">Galeri</a></li>
        </div>
        <?php if($masuk != 1){?>
        <div class="button" id="btn-tugas">
            <a href="<?= site_url('auth/login')?>" class="masuk">
                <span>Masuk</span>
            </a>
        </div>
        <?php }else{?>
            <div class="button" id="btn-tugas">
                <a href="<?= site_url('informasi')?>" class="masuk">
                    <span><i class="fa fa-user"></i></span>
                </a>
                <ul>
                    <li><a href="<?= site_url('informasi')?>">Tugasku</a></li>
                    <li><a href="<?= site_url('auth/logout')?>">Keluar</a></li>
                </ul>
            </div>
            
        <?php }?>
        <script>
            if (screen && screen.width < 500) {
                $('.masuk').attr("href", "http://localhost/web-simaru-ppak-fmipa-unnes/auth/logout")
                console.log('detect');
            }
            </script>
        <div class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </div>
    </nav>