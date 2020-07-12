
<?php 

if ($_GET['del_status'] == 'success') {
  echo '<div class="alert alert-success" role="alert">Stok Başarıyla Silindi</div>';
}
elseif (isset($_GET['del_status'])) {
  echo '<div class="alert alert-danger" role="alert">Stok Silinirken Hata! '.$_GET['del_status'].'</div>';
}

?>

<div class="table-responsive">

<form action="admin_processor.php" method="post">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sıra</th>
        <th>Ürün ID</th>
        <th>Ürün İsmi</th>
        <th>Ürün Kategorisi</th>    
        <th>Satış Fiyatı</th>
        <th>Tarih</th>
        <th>Miktar</th>
        <th>Seç</th>
      </tr>
    </thead>
    <tbody>
      <?php  

      include '../db_connect.php';

      $sql = "SELECT pid, name, urun_kat, tarih, cfiyat, miktar, reg_date FROM urunler" ;
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while($row = $result->fetch_assoc()) {
          $i++;
          echo '<tr>
              <td>'.$i.'</td>
              <td>'.$row['pid'].'</td>
              <td>'.$row['name'].'</td>
              <td>'.$row['urun_kat'].'</td>
              <td>'.$row['cfiyat'].'</td>
              <td>'.$row['tarih'].'</td>
              <td>'.$row['miktar'].'</td>
              <td>'.'  <input type="checkbox" name="delete[]" value="'.$row[pid].'">'.'</td>
            </tr>';
        }
      }
      ?>
    </tbody>
  </table>
  <button type="button" class="btn btn-danger" class="btn btn-danger" data-toggle="modal" data-target="#myModal" value="Delete Selected Items">Seçilen Stokları Sil</button>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Silmeyi Onayla</h4>
        </div>
        <div class="modal-body">
			Silme işlemini onaylayın. Seçilen ürünler listeden silinecek ve bu işlem geri alınamaz.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
          <input type="submit" name="action_del" class="btn btn-danger" value="Seçilen Stokları Sil">
        </div>
      </div>
    </div>
  </div>

</div>
</form>
<?php $conn->close(); ?>

