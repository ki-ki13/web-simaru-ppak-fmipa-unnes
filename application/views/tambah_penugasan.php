<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penugasan</title>
</head>
<body>
	<?php
/*
$penugasan = array(
	'kelompok'=>array(
		0=>"folder_id_tugas_1",
	),
	'individu'=>array(
		0=>"folder_id_tugas_individu_1",
	)
);
array_push($penugasan['kelompok'], "folder_id_tugas_2");
foreach($penugasan['kelompok'] as $k=>$id){
	echo $k . "=>" . $id . "<br>";	
}
foreach($penugasan['individu'] as $k=>$id){
	echo $k . "=>" . $id . "<br>";	
}
 */


	?>
  <form action="<?=base_url()?>index.php/submit/addFolder" method="GET" enctype="multipart/form-data" >
        <label for="">Nama Tugas</label>
        <input type="text" name="namaFolder" id="namaFile"><br>
	<select name="jenisTugas">
		<option value="kelompok">Kelompok</option>
		<option value="individu">Individu</option>
	</select>
        
        <input type="submit" value="submit" >
    </form></body>
</html>