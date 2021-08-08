<div class="super-wrapper" id="Superwrap">
<?php if ($this->session->flashdata('lgn')): ?>
        <small>
            <script>
                Swal.fire({
                    title: "Maaf",
                    text: "<?php echo $this->session->flashdata('lgn'); ?>",
                    timer: 3000,
                    showConfirmButton: false,
                    type: 'success'
                    });
            </script>
        </small>
    <?php $this->session->unset_userdata('lgn');endif; ?> 
    <div class="content">
        <a href="<?= site_url('informasi/tatib')?>" class="flex" id ="flex1">
            <div class="flex-content">
                <i class="fal fa-file-alt"></i>
                <span>Tata Tertib</span>
            </div>
        </a>
        <a href="<?= site_url('informasi/bukpan')?>" class="flex" id ="flex2">
            <div class="flex-content">
                <i class="fal fa-book-open"></i>
                <span>Buku Panduan</span>
            </div>
        </a>
        <a href="<?= site_url('penugasan?noKelompok=2')?>" class="flex" id ="flex3">
            <div class="flex-content">
                <i class="fal fa-pencil-ruler"></i>
                <span>Penugasan</span>
            </div>
        </a>
        <a href="" class="flex" id ="flex4">
            <div class="flex-content">
                <i class="fal fa-clipboard"></i>
                <span>Absensi</span>
            </div>
        </a>
        <a href="<?=site_url('informasi/jingle')?>" class="flex" id ="flex5">
            <div class="flex-content">
                <i class="fal fa-music"></i>
                <span>Lagu</span>
            </div>
        </a>
        <a href="<?= site_url('informasi/agenda')?>" class="flex" id ="flex6">
            <div class="flex-content">
                <i class="fal fa-calendar-minus"></i>
                <span>Agenda</span>
            </div>
        </a>
    </div>
