<?php
session_start();
if(!(isset($_SESSION['user']))){
    header ("location: ../login/form-login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../master2.css">
    <script src="validasi.js"></script>
</head>
<body>
<h1 style="margin-left:670px">Tambah Data Guru</h1>


<div id="menu">

    <h1 style="color:white; text-align:center">S C H O O L A R</h1>
    <p style=" 
    margin-left:0px;
    border: 0;
    text-align:center;
    color:white;
    font-size:20px"> Welcome <?php echo $_SESSION['user'];?></p>

    <ul>
        <p><a href="read.php">Data Guru</a></p>
        <p><a href="../mapel/read.php">Data Matapelajaran</a></p>
        <p><a href="../login/logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Logout ?')">Logout</a></p>
    </ul>

</div>
    <form action="create.php" method="post">
    
    <table>
    
    <tr>
    <td><input type="text" name="nama_guru" placeholder="Nama Guru" id="input"></td>
    </tr>

     <tr>
    <td><input type="text" name="jumlah_jam" placeholder="Jumlah Jam" id="input2"></td>
    </tr>

    <tr>
    <td><textarea name="alamat" placeholder="Alamat" id="input3" cols="30" rows="10"></textarea></td>
    </tr>

    <tr>
    <td><input type="text" name="telp" placeholder="No Telepon" id="input4"></td>
    </tr>

    <tr>
    <td><input type="text" name="email" placeholder="E-mail" id="input5"></td>
    </tr>

    <tr>
    <td><input type="submit" name="btnSimpan" value="Simpan" id="sim" onclick="return Validasi()"></td>
    </tr>


    </table>


    </form>
</body>
</html>