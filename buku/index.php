<?php
include "../koneksi.php";

$sql = "SELECT * FROM buku ORDER BY judul";
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
  <h2 class="card-title"> <i class="fas fa-edit"></i> Data Buku</h2>
  </div>
  <div class="card-body">
  <table class="table table-striped">
  <thead>
   <tr>
   <th scope="col">id_buku</th>
   <th scope="col">judul</th>
   <th scope="col">Penerbit</th>
   <th scope="col">pengarangan</th>
   <th scope="col">ringasan</th>
   <th scope="col">cover</th>
   <th scope="col">stok</th>
   <th scope="col">id_katagori</th>
   <th scope="col">aksi</th>
   
   </tr>
</thead>
<tbody>
<?php
    $no = 1;
    foreach ($pinjam as $p ) { ?>
    <tr>
        <th scope="row"><?= $no ?></th>
        <td><?= $p['id_buku'] ?></th>
        <td><?= $p['judul'] ?></th>
        <td><?= $p['penerbitan'] ?></th>
        <td><?= $p['pengarangan'] ?></th>
        <td><?= $p['ringkasan'] ?></th>
        <td><?= $p['cover'] ?></th>
        <td><?= $p['stok'] ?></th>
        <td><?= $p['id_katagori'] ?></th>

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