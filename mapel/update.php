<?php
session_start();
if(!(isset($_SESSION['user']))){
    header ("location: ../login/form-login.php");
}
include '../connect.php';

$kode_mapel = $_POST['kode_mapel'];
$mapel = $_POST['mapel'];
$alokasi_waktu = $_POST['alokasi_waktu'];
$semester = $_POST['semester'];
$kode_guru = $_POST['kode_guru'];
$kode_mapel2 = $_POST['kode_mapel2'];

$query = "UPDATE matapelajaran SET kode_mapel = '$kode_mapel',mapel = '$mapel', 
          alokasi_waktu = $alokasi_waktu, semester = $semester, kode_guru = $kode_guru
          WHERE kode_mapel = '$kode_mapel2'";
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
    <div id="hore"><p>Berhasil Update Data</p></div>
    <?php
}
else{?>
    <div id="zonk"><p>Gagal Update Data</p></div>
    <?php
}
?>
<a href='read.php'>Lihat Data</a>

</body>
</html>