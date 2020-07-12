<?php 
include '../db_connect.php';
  if (isset($_GET['upd'])) {
    $upd_prod = $GET['upd'];
    echo $upd_prod;
  }


echo '<div class="col-md-6">';



if ($_GET['pro_status'] == 'success') {
  echo '<div class="alert alert-success" role="alert">Başarıyla Güncellendi</div>';
}
elseif (isset($_GET['pro_status'])) {
  echo '<div class="alert alert-danger" role="alert">Hata! Tekrar Deneyin. '.$_GET['pro_status'].'</div>';
}

?>

<?php if (isset($_GET['upd'])): ?>

 <form action="admin_processor.php" method="post">

  <div class="form-group">
      <label for="exampleInputEmail1">Stok Seç</label>
      <select class="form-control" name="upid" required>
<?php


$sql = "SELECT pid, name FROM urunler";
      $result = $conn->query($sql);



      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

          if ($_GET['upd'] == $row['pid']) {
            echo '<option selected value="'.$row['pid'].'"">'.$row['pid'].' - '.$row['name'].'</option>';
          }
          else 
          echo '<option value="'.$row['pid'].'"">'.$row['pid'].' - '.$row['name'].'</option>';
        }
      }

 ?>

</select>


    </div>
    <input type="submit" name="action" class="btn btn-primary" value="Seçimi Onayla">

</form>

<hr></hr>


	<?php  

      



      $sql = "SELECT name, urun_kat, tarih, cfiyat, miktar, reg_date FROM urunler WHERE pid =".$_GET['upd'] ;
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {


          echo '
          <form action="admin_processor.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Ürün Adı</label>
    <input name="pname" type="text" class="form-control" id="exampleInputEmail1"  required autofocus value="'.$row['name'].'">
  </div>
  <div class="form-group">
    <label for="exampleInputsifre1">Ürün Kategorisi</label>
    <input name="bname" type="text" class="form-control" id="exampleInputsifre1"  required value="'.$row['urun_kat'].'">
  </div>
  <div class="form-group">
    <label for="exampleInputsifre1">Tarih</label>
    <input name="tarih" type="date" class="form-control" id="exampleInputsifre1"  required value="'.$row['tarih'].'">
  </div>
  <div class="form-group">
    <label for="exampleInputsifre1">Satış Fiyatı</label>
    <input name="cfiyat" type="number" min="0" max="1000000" class="form-control" id="exampleInputsifre1"  required value="'.$row['cfiyat'].'">
  </div>
  <div class="form-group">
    <label for="exampleInputsifre1">Miktar</label>
    <input name="miktar" type="number" min="0" max="1000" class="form-control" id="exampleInputsifre1"  required value="'.$row['miktar'].'">
  </div>
  <input type="hidden" name="updid" value="'.$_GET['upd'].'">
  <input type="reset" class="btn btn-default">
  <input type="submit" name="action_upd" class="btn btn-primary" value="Güncelle">
</form>
</div>';
        }
      }
?>







<?php else: ?>


<form action="admin_processor.php" method="post">

  <div class="form-group">
      <label for="exampleInputEmail1">Ürün ID</label>
      <select class="form-control" name="upid" required>
<?php


$sql = "SELECT pid, name FROM urunler";
      $result = $conn->query($sql);



      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

          echo '<option value="'.$row['pid'].'"">'.$row['pid'].' - '.$row['name'].'</option>';
        }
      }

 ?>

</select>


    </div>
    <input type="submit" name="action" class="btn btn-primary" value="Seçimi Onayla">

</form>

<?php endif; ?>

