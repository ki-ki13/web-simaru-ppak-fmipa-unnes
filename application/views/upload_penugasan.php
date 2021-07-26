<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Penugasan</title>
</head>
<body>
<h1>Tugas Kelompok</h1>
   <ul>
<?php
	foreach($tugas as $row){
		if($row['jenis'] == 'kelompok'){
		?>
			<li>
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
</body>
</html>