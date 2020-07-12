
<?php 

if ($_GET['del_status'] == 'success') {
  echo '<div class="alert alert-success" role="alert">Tedarikçi Başarıyla Silindi</div>';
}
elseif (isset($_GET['del_status'])) {
  echo '<div class="alert alert-danger" role="alert">Hata! Tekrar Deneyin '.$_GET['del_status'].'</div>';
}

?>

<div class="table-responsive">

<form action="admin_processor.php" method="post">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Tedarikçi ID</th>
        <th>Tedarikçi Adı</th>
        <th>Tedarikçi Tipi</th>
        <th>Telefon Numarası</th>
        <th>Adres</th>
        <th>Kayıt Tarihi</th>
        <th>Seç</th>
      </tr>
    </thead>
    <tbody>
      <?php  

      include '../db_connect.php';

      $sql = "SELECT id, name, type, telefon, adres, reg_date FROM kullanicilar" ;
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo '<tr>
              <td>'.$row['id'].'</td>
              <td>'.$row['name'].'</td>
              <td>'.$row['type'].'</td>
              <td>'.$row['telefon'].'</td>
              <td>'.$row['adres'].'</td>
              <td>'.$row['reg_date'].'</td>
              <td>  <input type="checkbox" name="delete[]" value="'.$row['id'].'"></td>
                          </tr>';
        }
      }
      ?>
    </tbody>
  </table>
  <button type="button" class="btn btn-danger" class="btn btn-danger" data-toggle="modal" data-target="#myModal" value="Delete Selected Items">Seçilenleri Sil</button>
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
          <input type="submit" name="action_del_wrk" class="btn btn-danger" value="Silmeyi Onayla">
        </div>
      </div>
    </div>
  </div>

</div>
</form>
<?php $conn->close(); ?>

