
<?php 

include '../db_connect.php';

if (isset($_GET['upd_w'])) {
  $upd_wrk = $GET['upd_w'];
}


echo '<div class="col-md-6">';



if ($_GET['pro_status'] == 'success') {
  echo '<div class="alert alert-success" role="alert">Tedarikçi Bilgileri Başarıyla Güncellendi</div>';
}
elseif (isset($_GET['pro_status'])) {
  echo '<div class="alert alert-danger" role="alert">Hata! Tekrar Deneyin '.$_GET['pro_status'].'</div>';
}

?>

<?php if (isset($_GET['upd_w'])): ?>

 <form action="admin_processor.php" method="post">

  <div class="form-group">
    <label for="exampleInputEmail1">Tedarikçi ID</label>
    <select class="form-control" name="upid" required>
      <?php


      $sql = "SELECT id, name FROM kullanicilar";
      $result = $conn->query($sql);



      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

          if ($_GET['upd_w'] == $row['id']) {
            echo '<option selected value="'.$row['id'].'"">'.$row['id'].' - '.$row['name'].'</option>';
          }
          else

            echo '<option value="'.$row['id'].'"">'.$row['id'].' - '.$row['name'].'</option>';
        }
      }

      ?>

    </select>


  </div>
  <input type="submit" name="action" class="btn btn-primary" value="Tedarikçi Seç">

</form>

<hr></hr>


<?php  




$sql = "SELECT name, sifre, adres, telefon FROM kullanicilar WHERE id =".$_GET['upd_w'] ;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        // output data of each row
  while($row = $result->fetch_assoc()) {


    echo '
    <form action="admin_processor.php" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Tedarikçi Adı</label>
        <input name="m_isim" type="text" class="form-control" id="exampleInputEmail1"  required autofocus value="'.$row['name'].'">
      </div>
      <div class="form-group">
        <label for="exampleInputsifre1">Şifre</label>
        <input name="wpass" type="sifre" class="form-control" id="exampleInputsifre1"  required value="'.$row['sifre'].'">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Telefon Numarası</label>
        <input name="wtelefon" type="text" class="form-control" id="exampleInputEmail1"  required autofocus value="'.$row['telefon'].'">
      </div>
      <div class="form-group">
        <label for="exampleInputsifre1">Adres</label>
        <input name="adres" type="text" class="form-control" id="exampleInputsifre1"  required value="'.$row['adres'].'">
      </div>
      
      <input type="hidden" name="updid" value="'.$_GET['upd_w'].'">
      <input type="reset" class="btn btn-default">
      <input type="submit" name="action_upd_wrk" class="btn btn-primary" value="Tedarikçi Güncelle">
    </form>
  </div>';
}
}
?>







<?php else: ?>

  <form action="admin_processor.php" method="post">

    <div class="form-group">
      <label for="exampleInputEmail1">Tedarikçi ID</label>
      <select class="form-control" name="upid" required>
        <?php


        $sql = "SELECT id, name FROM kullanicilar";
        $result = $conn->query($sql);



        if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
            echo '<option value="'.$row['id'].'"">'.$row['id'].' - '.$row['name'].'</option>';
          }
        }

        ?>

      </select>


    </div>
    <input type="submit" name="action" class="btn btn-primary" value="Tedarikçi Seç">

  </form>

<?php endif; ?>

