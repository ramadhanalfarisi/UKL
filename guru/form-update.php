<?php
session_start();
if(!(isset($_SESSION['user']))){
    header ("location: ../login/form-login.php");
}

include '../connect.php';

$kode_guru = $_GET['kode_guru'];

$query = "SELECT * FROM guru WHERE kode_guru = $kode_guru";

$result = mysqli_query($connect,$query);
$data = mysqli_fetch_assoc($result);

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
    <style>
    
    #input, #input2, #input4, #input5{
        margin-left:60px;
        border-radius: 10px;
        padding:7px;
        background-color:whitesmoke;
        border:0;
        font-size: 20px;
        color : gray;
        width:450px;
        height: 50px;
    }
    #input3{
        margin-left:60px;
        border-radius: 10px;
        padding:7px;
        background-color:whitesmoke;
        border:0;
        font-size: 20px;
        color : gray;
        width:450px;
        height: 100px;
    }
    #label{
        border-radius:10px;
        background-color:rgba(0,0,0,0.5);
        color:ghostwhite;
        text-align:center;
        height:30px;
        font-size:20px;
        width:150px;
        padding-top:5px;
    }
    label{
        padding-top:10px;
    }
    
        </style>
</head>
<body>

<h1 style="margin-left:650px">Update Data Guru</h1>


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
    
    <form action="update.php" method="post">
    
    <table>
    
        <tr>
        <td><div id="label"><label for="">Nama Guru</label></div></td>
        <td><input type="text" name="nama_guru" value="<?php echo $data['nama_guru'];?>" id="input"></td>
        </tr>

        <tr>
        <td><div id="label"><label for="">Jumlah Jam</label></div></td>
        <td><input type="text" name="jumlah_jam" value="<?php echo $data['jumlah_jam'];?>" id="input2"></td>
        </tr>

        <tr>
        <td><div id="label"><label for="">Alamat</label></div></td>
        <td><textarea name="alamat" id="input3" value="" cols="30" rows="10"><?php echo $data['alamat'];?></textarea></td>
        </tr>

        <tr>
        <td><div id="label"><label for="">No Telepon</label></div></td>
        <td><input type="text" name="telp" value="<?php echo $data['telp'];?>" id="input4"></td>
        </tr>

        <tr>
        <td><div id="label"><label for="">Email</label></div></td>
        <td><input type="text" name="email" value="<?php echo $data['email'];?>" id="input5"></td>
        </tr>
        <tr><td><input type="hidden" name="kode_guru" value="<?php echo $data['kode_guru'];?>"></td></tr>

        <tr>
        <td><input type="submit" name="btnSimpan" value="Simpan" id="sim" onclick="return Validasi()"></td>
        </tr>

    </table>
    
    </form>

</body>
</html>