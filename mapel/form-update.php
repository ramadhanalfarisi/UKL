<?php
session_start();
if(!(isset($_SESSION['user']))){
    header ("location: ../login/form-login.php");
}

include '../connect.php';

$kode_mapel = $_GET['kode_mapel'];

$query = "SELECT kode_mapel,mapel,alokasi_waktu,semester,nama_guru,guru.kode_guru 
          FROM matapelajaran LEFT JOIN guru
          USING (kode_guru) 
          WHERE kode_mapel = '$kode_mapel'";

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
    
#input, #input2, #input3, #input4, #input5{
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
<h1 style="margin-left:600px">Update Data Matapelajaran</h1>


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
    <form action="update.php" method="post" style="height:430px">
    
    <table>
    
        <tr>
        <td><div id="label"><label for="">Kode Mapel</label></div></td>
        <td><input type="text" name="kode_mapel"  value="<?php echo $data['kode_mapel'];?>" id="input"></td>
        </tr>

        <tr>
        <td><div id="label"><label for="">Matapelajaran</label></div></td>
        <td><input type="text" name="mapel" value="<?php echo $data['mapel'];?>" id="input2"></td>
        </tr>

        <tr>
        <td><div id="label"><label for="">Alokasi Waktu</label></div></td>
        <td><input type="text" name="alokasi_waktu" value="<?php echo $data['alokasi_waktu'];?>" id="input3"></td>
        </tr>

        <tr>
        <td><div id="label"><label for="">Semester</label></div></td>
        <td><input type="text" name="semester" value="<?php echo $data['semester'];?>" id="input4"></td>
        </tr>

        <tr>
            <td><div id="label"><label for="">Guru Pengajar</label></div></td>
        <td><select name="kode_guru" id="input5" style="width:465px">
            <option value="NULL">Tidak Ada Pengajar</option>
        <?php
        $query2 = "SELECT kode_guru,nama_guru FROM guru";
        $result2 = mysqli_query($connect,$query2);
        while($data2 = mysqli_fetch_assoc($result2)){
            ?>
            <option value="<?php echo $data2['kode_guru'];?>">
            <?php echo $data2['nama_guru'];?>
            <?php if($data['kode_guru']==$data2['kode_guru']){echo "--Selected";}?>
            </option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input type="hidden" name="kode_mapel2" value="<?php echo $data['kode_mapel'];?>" id="sim"></td>
        </tr>

        <tr>
        <td><input type="submit" name="btnSimpan" value="Simpan" id="sim" onclick="return Validasi()"></td>
        </tr>

    </table>
    
    </form>

</body>
</html>