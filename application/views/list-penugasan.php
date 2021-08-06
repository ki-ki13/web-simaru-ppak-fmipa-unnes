<?php
	$user_data = $this->session->userdata('user_data');
	$nama = $user_data['first_name']. " ". $user_data['last_name'];
	// $noKelompok = $_GET['noKelompok'];
?>

<div id="penugasan">
	<div id="selamat-datang">
		<div>
			<img src="<?=base_url()?>/assets/POTO/selamat-datang-kotak.png">
		</div>
		<div>
			<h1>Selamat Datang</h1>
	   		<h1><?=$nama?></h1>
		</div>
	   	
   </div>

   <div id="kelompok">
	    <!-- <form action="<-?= site_url('penugasan/kelompok')?>" method="post">
			<div id="form-kelompok">
			<h1>Kelompok : </h1>
			<input class="isi-kel" name ="kelompok" type="text" placeholder="masukkan nomor kelompok kamu 😊">
			<input class="submit-kel" type="submit" value ="Post">
			</div>
		</form> -->
		<h1>Kelompok : <?=$noKelompok->kelompok?></h1>
   		<!-- <-?=var_dump($noKelompok->kelompok)?> -->
   		
   </div>

   <div id="list-tugas">
		<?php
		$no= 0;
	   		foreach($tugas as $row){
	   			$no+=1;
	   			if($no % 2 == 0){
	   				$type=1;
	   			}else{
	   				$type=2;
	   			}

	   	?>
	   		<div class="tugas tugas-<?=$type?>">
	   			<h3><?=$row['nama_folder']?></h3>
	   			<p>Tugas <?=$row['jenis']?></p>
	   			<p>Status : Belum dikumpulkan</p>
	   			<div class="icon-arrow">
			   		<!-- <a href="<-?=base_url()?>index.php/Load?namaTugas=<-?=$row['nama_folder']?>&idMaba=2&jenisTugas=<-?=$row['jenis']?>"><i class="fa fa-arrow-right" aria-hidden="true" style="font-size: 30px;"></i></a> -->
			   		<a href="<?=base_url()?>index.php/penugasan/deskripsi_penugasan?jenisTugas=<?=$row['jenis']?>&noKelompok=<?=$noKelompok->kelompok?>&namaTugas=<?=$row['nama_folder']?>"><i class="fa fa-arrow-right" aria-hidden="true" style="font-size: 30px;"></i></a>
			   </div>
	   		</div>
		<?php
			}
		?>
   </div> 
</div>