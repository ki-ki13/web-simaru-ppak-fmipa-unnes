<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <?php $user_data = $this->session->userdata('user_data');?>
    <h2>PHP Google Drive Api </h2>
    <a href="<?=base_url()?>index.php/Submit?list=1">List Files and Folder</a>

    <h2>File Upload</h2>
    <form action="<?=base_url()?>index.php/Submit" method="post" enctype="multipart/form-data" >
        <label for="">Choose File</label>
        <input type="file" name="file" ><br>
        <label for="">Nama File :</label>
        <input type="text" name="namaFile" id="namaFile" value="<?=$user_data['first_name']?>"><br>
        <label for="">Jenis Tugas :</label>
	<input type="text" name="jenisTugas" placeholder="jenis file" value="<?=$jenisTugas?>"><br>
        <label for="">Kelompok :</label>
	<input type="text" name="kelompok" placeholder="id" value="<?=$idMaba?>"><br>
        <label for="">Nama Tugas :</label>
	<input type="text" name="namaTugas" placeholder="namaTugas" value="<?=$namaTugas?>"><br>
        
        <input type="submit" name="submit" value="submit" >
    </form>
    
    
</body>
</html>