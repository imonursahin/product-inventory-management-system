
<div class="col-md-6">
<?php 

if ($_GET['pro_status'] == 'success') {
  echo '<div class="alert alert-success" role="alert">Stok Başarıyla Eklendi</div>';
}
elseif (isset($_GET['pro_status'])) {
  echo '<div class="alert alert-danger" role="alert">Stok Eklenmesinde Hata Oluştu, Tekrar Deneyin '.$_GET['pro_status'].'</div>';
}

?>

<form action="admin_processor.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Ürün İsmi</label>
    <input name="pname" type="text" class="form-control" id="exampleInputEmail1"  required autofocus>
  </div>
  <div class="form-group">
    <label for="exampleInputsifre1">Ürün Kategorisi</label>
    <input name="bname" type="text" class="form-control" id="exampleInputsifre1"  required>
  </div>
  <div class="form-group">
    <label for="exampleInputsifre1">Tarih</label>
    <input name="tarih" type="date" class="form-control" id="exampleInputsifre1"  required>
  </div>
  <div class="form-group">
    <label for="exampleInputsifre1">Satış Fiyatı</label>
    <input name="cfiyat" type="number" min="0" max="1000000" class="form-control" id="exampleInputsifre1"  required>
  </div>
  <div class="form-group">
    <label for="exampleInputsifre1">Miktar</label>
    <input name="miktar" type="number" min="0" max="1000" class="form-control" id="exampleInputsifre1"  required>
  </div>
  <input type="reset" class="btn btn-default">
  <input type="submit" name="action" class="btn btn-primary" value="Stok Ekle">
</form>
</div>