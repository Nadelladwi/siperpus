<?php
include "../koneksi.php";

$sql = "SELECT * FROM anggota ORDER BY nama";
$res = mysqli_query($kon, $sql);
$pinjam = array();
while ($data = mysqli_fetch_assoc($res)) {
    $pinjam[] = $data;
}
include '../aset/header.php';
?>                      
<div class="container">
    <div class="row mt-4">
        <div class="col-md">
        </div>
    </div>
</div>

        <div class="card">
  <div class="card-header">
  <h2 class="card-title"> <i class="fas fa-edit"></i> Data Anggota</h2>
  </div>
  <div class="card-body">
  <table class="table table-striped">
  <thead>
   <tr>
   <th scope="col">No</th>
   <th scope="col">Nama Anggota</th>
   <th scope="col">Kelas</th>
   <th scope="col">Nomor telepon</th>
   <th scope="col">Aksi</th>
   </tr>
</thead>
<tbody>
<?php
    $no = 1;
    foreach ($pinjam as $p ) { ?>

    <tr>
        <th scope="row"><?= $no ?></th>
        <td><?= $p['nama'] ?></th>
        <td><?= $p['kelas'] ?></th>
        <td><?= $p['telp'] ?></th>

        <td>    
        <a href="#" class="badge badge-success">Detail</a>
        <a href="#" class="badge badge-warning">Edit</a>
        <a href="#" class="badge badge-danger">Hapus</a>
                         
        </td>
    </tr>
                                        
<?php 
    $no++;
}
?>

</table>


  </div>
</div>

<?php
include '../aset/footer.php';
?>