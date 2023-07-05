<?php

include "koneksi.php";
$sql = mysqli_query($koneksi,"select * from buku where kode_buku ='$_GET[kode]'");
$data=mysqli_fetch_array($sql);

?>

<h3> Ubah Data Buku </h3>

<form action ="" method="post">
<table>
    <tr>
        <td width="130">Kode Buku</td>
        <td><input type="text" name="kode_buku" value="<?php echo $data['kode_buku']; ?>"></td>
    </tr>
    <tr>
        <td>Nama Buku</td>
        <td><input type="text" name="nama_buku" value="<?php echo $data['nama_buku']; ?>"></td>
    </tr>
    <tr>
        <td>Jenis Buku</td>
        <td><input type="text" name="jenis_buku" value="<?php echo $data['jenis_buku']; ?>"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Simpan" name="proses"></td>
    </tr>
</table>
</form>

<?php
include "koneksi.php";

if(isset($_POST['proses'])){
    mysqli_query($koneksi, "update buku set
    nama_buku ='$_POST[nama_buku]',
    jenis_buku ='$_POST[jenis_buku]'
    where kode_buku = '$_GET[kode]'");

    echo "Data Buku Telah Diubah";
    echo "<meta http-equiv=refresh content=1;URL='tampil_perpustakaan.php'>";
}
?>