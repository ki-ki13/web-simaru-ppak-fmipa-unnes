<div class="super-wrapper">
        <div class="login" id="login">
            <div class="card-lgn">
                <div class="cont-lgn">
                    <h2>Silahkan Masuk</h2>
                   
                    <form action="<?= site_url('auth/proses_login') ?>" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text"class="lgn-input" name="nama" placeholder="isi nama kalian :)">
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="lgn-input" name="nim" placeholder="isi nim kalian juga :)">
                        </div>
                        <input type="submit" class="btn-submit" name="submit" value="Semangat!, Masuk">
                    </form>
                    <?php if ($this->session->flashdata('msg')): ?>
                        <small>
                            <script>
                                Swal.fire({
                                    title: "Maaf",
                                    text: "<?php echo $this->session->flashdata('msg'); ?>",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: 'success'
                                });
                            </script>
                        </small>
                    <?php endif; ?>
                </div>
                <div class="img-lgn">
                    hahah
                </div>
            </div>
        </div>
    </div>