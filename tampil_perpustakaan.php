<h3> Tambah Buku </h3>

<form action ="" method="post">
<table>
    <tr>
        <td width="130">Kode Buku</td>
        <td><input type="text" name="kode_buku"></td>
    </tr>
    <tr>
        <td>Nama Buku</td>
        <td><input type="text" name="nama_buku"></td>
    </tr>
    <tr>
        <td>Jenis Buku</td>
        <td><input type="text" name="jenis_buku"></td>
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
    mysqli_query($koneksi, "insert into buku set
    kode_buku = '$_POST[kode_buku]',
    nama_buku ='$_POST[nama_buku]',
    jenis_buku ='$_POST[jenis_buku]'");

    echo "Data Buku Baru Telah Tersimpan";
}
?>

<h3>Data Buku</h3>
<form>
<table border="1">
<tr>
    <th>Kode Buku</th>
    <th>Nama Buku</th>
    <th>Jenis Buku</th>
    <th colspan="2">Aksi</th>
    <th>#</th>
</tr>

<?php

    include "koneksi.php";
    $ambildata = mysqli_query($koneksi, "select * from buku");
    while ($tampil = mysqli_fetch_array($ambildata)){
        echo "
        <tr>
            <td>$tampil[kode_buku]</td>
            <td>$tampil[nama_buku]</td>
            <td>$tampil[jenis_buku]</td>
            <td><a href='?kode=$tampil[kode_buku]' onClick=\"return confirm('Yakin Akan Menghapus Data');\"> Hapus </a></td>
            <td><a href='buku_ubah.php?kode=$tampil[kode_buku]'> Ubah </a></td>
            <td><input type='checkbox' name='id[]' value='$tampil[kode_buku]'></td>
        </tr>";

    }

?>
</table>

<input type="submit" name="delete" value="Hapus Data">
</form>

<?php

if(isset($_GET['delete'])){

    $id = $_GET['id'];
    $jum = count($id);

    for ($i=0; $i<$jum; $i++){
        mysqli_query($koneksi,"delete from buku where kode_buku='$id[$i]'")
        or die (mysqli_error($koneksi));
    }
    echo "<script>alert('Data Berhasil Dihapus');
    document.location='tampil_perpustakaan.php'</script>";
}

?>

<?php
if(isset($_GET['kode'])){

mysqli_query($koneksi,"delete from buku where kode_buku='$_GET[kode]'");

echo "Data Telah Terhapus";
echo "<meta http-equiv=refresh content=2;URL='tampil_perpustakaan.php'>";

}
?>