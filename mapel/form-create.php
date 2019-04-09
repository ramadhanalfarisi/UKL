<?php
session_start();
if(!(isset($_SESSION['user']))){
    header ("location: ../login/form-login.php");
}

include '../connect.php';

$query = "SELECT kode_guru,nama_guru FROM guru";
$result = mysqli_query($connect,$query);

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
<h1 style="margin-left:600px">Tambah Data Matapelajaran</h1>


<div id="menu">

    <h1 style="color:white; text-align:center">S C H O O L A R</h1>
    <p style=" 
    margin-left:0px;
    border: 0;
    text-align:center;
    color:white;
    font-size:20px"> Welcome <?php echo $_SESSION['user'];?></p>

    <ul>
        <p><a href="../guru/read.php">Data Guru</a></p>
        <p><a href="read.php">Data Matapelajaran</a></p>
        <p><a href="../login/logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Logout ?')">Logout</a></p>
    </ul>

</div>
<form action="create.php" method="post" style="height:440px">
    
    <table>
    
    <tr>
    <td><input type="text" name="kode_mapel" placeholder="Kode Mapel" id="input"></td>
    </tr>

     <tr>
    <td><input type="text" name="mapel" placeholder="Matapelajaran" id="input2"></td>
    </tr>

    <tr>
    <td><input type="text" name="alokasi_waktu" style="height:50px" placeholder="Alokasi Waktu" id="input3"></td>
    </tr>

    <tr>
    <td><input type="text" name="semester" placeholder="Semester" id="input4"></td>
    </tr>

    <tr>
    <td><select name="kode_guru" id="input5" style="width:665px">
    <option value="-">Pilih Guru Pengajar</option>
    <option value="NULL">Tidak Ada Pengajar</option>
    <?php
    while($data = mysqli_fetch_assoc($result)){?>
        <option value=<?php echo $data['kode_guru'];?>>
        <?php echo $data['nama_guru'];?>
        </option>
    <?php
    }
    ?>
    </select></td>
    </tr>

    <tr>
    <td><input type="submit" name="btnSimpan" value="Simpan" id="sim" style="margin-top:50px" onclick="return Validasi()"></td>
    </tr>


    </table>


    </form>
</body>
</html>