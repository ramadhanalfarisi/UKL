<?php
session_start();
if(!(isset($_SESSION['user']))){
    header ("location: ../login/form-login.php");
}
include '../connect.php';

$nama_guru = $_POST['nama_guru'];
$jumlah_jam = $_POST['jumlah_jam'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$email = $_POST['email'];

$query = "INSERT INTO guru (nama_guru,jumlah_jam,alamat,telp,email)
          VALUES ('$nama_guru',$jumlah_jam,'$alamat','$telp','$email')";

$result = mysqli_query($connect,$query);
$num = mysqli_affected_rows($connect);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>

    body{
        background-color:#3bbbb3;

    }
    
    #hore{
        border:2px solid black;
        width:500px;
        height:90px;
        text-align:center;
        padding-top: 30px;
        margin-left:450px;
        margin-top:250px;
        padding-bottom:30px;
        font-size:30px;
    }
    #zonk{
        border:2px solid black;
        width:500px;
        height:90px;
        text-align:center;
        padding-top: 30px;
        margin-left:450px;
        margin-top:250px;
        padding-bottom:30px;
        font-size:30px;
    }
    a{
        position:absolute;
        text-decoration:none;
        color:ghostwhite;
        font-size:20px;
        padding:30px 80px 30px 80px;
        background-color:rgba(0,0,0,0.3);
        margin-left:580px;
        margin-top:50px;
        border-radius:10px;
        
    }


    </style>
</head>
<body>
<?php
if($num > 0){?>
    <div id="hore"><p>Berhasil Menambah Data</p></div>
    <?php
}
else{?>
    <div id="zonk"><p>Gagal Menambah Data</p></div>
    <?php
}
?>
<a href='read.php'>Lihat Data</a>

</body>
</html>