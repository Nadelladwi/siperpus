<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// session_start();
// echo $_SESSION['id_petugas'];
include '../koneksi.php';
include 'fungsi-transaksi.php';
if(isset($_POST['btnPinjam'])) {     
$id_anggota = $_POST['id_anggota'];
$id_buku = $_POST['id_buku'];
// $id_detail = $_POST['tgl_kembali'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_jatuh_tempo = date('Y-m-d', strtotime($tgl_pinjam . '+ 7 days'));
// $id_petugas = $_SESSION['id_petugas'];
$id_petugas = 1;
$sql = "INSERT INTO peminjaman (id_anggota, id_buku, tgl_pinjam, tgl_jatuh_tempo, id_petugas)
VALUES ($id_anggota, $id_buku, '$tgl_pinjam', '$tgl_jatuh_tempo', $id_petugas)";
$stok = ambilStok($kon, $id_buku); //ambil data stok buku   
echo cekPinjam($kon, $id_anggota);
echo $stok;
if(cekPinjam($kon, $id_anggota) && $stok > 0){        
    $res = mysqli_query($kon, $sql);         
    $count = mysqli_affected_rows($kon);                
    $stok_update = $stok - 1;        
    if($count == 1){            
        updateStok($kon, $id_buku, $stok_update);            
        header("Location: index.php");        
    }    
} else {
    $res = mysqli_query($kon, $sql); 
    $count = mysqli_affected_rows($kon);                
    $stok_update = $stok - 1;        
    if($count == 1){            
        updateStok($kon, $id_buku, $stok_update);            
        header("Location: index.php");        
    }       
    header("Location: index.php");      
}
}
?>