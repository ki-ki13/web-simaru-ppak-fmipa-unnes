<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Menu Penugasan</title>
</head>
<body>
<h1>Tugas Kelompok</h1>
   <ul>
<?php
	foreach($tugas as $row){
		if($row['jenis'] == 'kelompok'){
		?>
			<li class="">
			<a href="<?=base_url()?>index.php/Load?namaTugas=<?=$row['nama_folder']?>&idMaba=2&jenisTugas=<?=$row['jenis']?>"><?=$row['nama_folder']?></a>
			</li>
		<?php
		}
	}
?>

   </ul>

<h1>Tugas Individu</h1>
   <ul>
<?php
	foreach($tugas as $row){
		if($row['jenis'] == 'individu'){
		?>
			<li>
			<a href="<?=base_url()?>index.php/Load?namaTugas=<?=$row['nama_folder']?>&idMaba=2&jenisTugas=<?=$row['jenis']?>"><?=$row['nama_folder']?></a>
			</li>
		<?php
		}
	}
?>

   </ul>



<div id="penugasan">
	<div id="selamat-datang">
		<div>
			<img src="<?=base_url()?>/assets/POTO/selamat-datang-kotak.png">
		</div>
		<div>
			<h1>Selamat Datang</h1>
	   	<h1>Nama</h1>
		</div>
	   	
   </div>

   <div id="kelompok">
   		<h1>Kelompok : </h1>
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
			   		<a href="<?=base_url()?>index.php/Load?namaTugas=<?=$row['nama_folder']?>&idMaba=2&jenisTugas=<?=$row['jenis']?>"><i class="fa fa-arrow-right" aria-hidden="true" style="font-size: 30px;"></i></a>
			   </div>
	   		</div>
		<?php
			}
		?>
   </div> 
</div>
   
   
</body>
</html>