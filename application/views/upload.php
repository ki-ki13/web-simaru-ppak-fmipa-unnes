<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/dropzone-5.7.0/dist/dropzone.css')?>">
    <script src="<?= base_url('assets/dropzone-5.7.0/dist/dropzone.js')?>"></script>
    <title>Upload</title>
</head>
<body>
    <h1>Silahkan Upload Tugas Kelompok</h1>
    <div class="form-upload">
        <h3>Isi nama kelompok dengan nomor kelompokmu!😀</h3>
        <form action="<?= site_url('upload/uploadFile')?>" method="post" enctype="multipart/form-data">
                <label>Kelompok </label>
                <input type="text" name="kelompok" placeholder ="nama kelompok"></br>
                <input name="file" type="file"/></br>
                <input type="submit"name ="submit" value="upload">
        </form>
    </div>
</body>
</html>
