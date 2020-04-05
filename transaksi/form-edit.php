<?php
include '../koneksi.php'; 
include '../aset/header.php';
include 'fungsi-transaksi.php'; 
$id_pinjam = $_GET['id_pinjam'];
$pinjam = ambilPeminjaman($kon, $id_pinjam);
?>


<div class="container">    
<div class="row mt-4">        
<div class="col-md-8">            
<div class="card">                
<div class="card-header">                    
<h3>Edit Peminjaman</h3>                
</div>                
<div class="card-body">                
<form method="post" action="proses-edit.php">                                    
</form>                     
</div>            
</div>        
</div>    
</div> 
</div> 

<?php
include '../aset/footer.php';
?>