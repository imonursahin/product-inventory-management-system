
<div class="col-md-6">
<?php 

if ($_GET['pro_status'] == 'success') {
  echo '<div class="alert alert-success" role="alert">Tedarikçi Başarıyla Eklendi</div>';
}
elseif (isset($_GET['pro_status'])) {
  echo '<div class="alert alert-danger" role="alert">Hata! Tekrar Deneyin '.$_GET['pro_status'].'</div>';
}

?>

<form action="admin_processor.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Tedarikçi Adı</label>
    <input name="m_isim" type="text" class="form-control" id="exampleInputEmail1"  required autofocus>
  </div>
  <div class="form-group">
    <label for="exampleInputsifre1">Tedarikçi Tipi</label>
    <input name="wtype" type="number" min="0" max="1" value="0" class="form-control" id="exampleInputsifre1"  required readonly>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Telefon Numarası</label>
    <input name="wtelefon" type="text" class="form-control" id="exampleInputEmail1"  required autofocus>
  </div>
  <div class="form-group">
    <label for="exampleInputsifre1">Adres</label>
    <input name="adres" type="text" class="form-control" id="exampleInputsifre1"  required>
  </div>
  
  <input type="reset" class="btn btn-default">
  <input type="submit" name="action_wrk" class="btn btn-primary" value="Tedarikçi Ekle">
</form>
</div>