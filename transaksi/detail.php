<?php include '../aset/header.php';
include '../koneksi.php';
$id_pinjam = $_GET['id_pinjam'];

$sql = "SELECT * FROM peminjaman WHERE  
id_pinjam = $id_pinjam"; 
//echo $id_pinjam;
$res = mysqli_query($kon, $sql); 
$id_detail = mysqli_fetch_assoc($res); 
?>
<div class="container">    
<div class="row mt-4">        
<div class="col-md-7">            
<h2>Detail Peminjaman</h2>            
<hr class="bg-light">                                
<table class="table table-bordered">                                
</table>        
</div>    
</div> 
</div>

<tr>      
<td><strong>pinjam</strong></td>                          
<td>
<?= $id_detail['id_pinjam'] 
?>
</td> 
</tr>

<tr>     
<td><strong>anggota</strong></td>                         
<td><?= date('d F Y', strtotime($id_detail['id_anggota'])) 
?>
</td> 
</tr> 
<tr>      
<td><strong>Tanggal Jatuh Tempo</strong></td>                          
<td><?= date('d F Y', strtotime($id_detail['tgl_jatuh_tempo']))
?>
</td> 
</tr> 
<tr>      
<td><strong>Tanggal Kembali</strong></td>                          
<td> <?php if($id_detail['tgl_kembali'] == NULL) echo '-'; 
else echo date('d F Y', strtotime($id_detail['tgl_kembali'])); 
?> </td> </tr>

<tr>       
<td><strong>Status</strong></td>       
<td><?= $id_detail['status'] 
?></td>
</tr> <?php if($id_detail['denda'] > 0) { 
?> <tr> <td class="table-danger" colspan="2"> 
<strong>Denda yang harus dibayar: </strong>Rp 
<?= $id_detail['denda'] 
?> </td>                   
 </tr> 
 <?php 
 } 
 ?> 

<tr>      
<td class="text-right" colspan="2"> 
<a href="index.php" class="btn btn-success"> <i class="fa fa-angle-double-left"></i> Kembali </a> 
<a class="btn btn-primary <?php if($detail['tgl_kembali'] != NULL) { echo "disabled"; } ?>" 
href="form-kembali.php?id_pinjam=<?= $id_detail['id_pinjam'] ?>&id_buku=<?= $id_detail['id_buku'] ?>" 
role="button"> 
Form Pengembalian 
</a> 
</td> 
</tr>
<?php include '../aset/footer.php'; 
?>
