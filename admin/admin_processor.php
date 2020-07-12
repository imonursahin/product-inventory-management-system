<?php  

if ($_POST['action'] == "Stok Ekle") {

	$pname = $_POST['pname'];
	$bname = $_POST['bname'];
	$tarih = $_POST['tarih'];
	$cfiyat = $_POST['cfiyat'];
	$miktar = $_POST['miktar'];


	include '../db_connect.php';

	
	$sql = "INSERT INTO urunler (name, urun_kat, tarih, cfiyat, miktar)
	VALUES ('$pname', '$bname', '$tarih', '$cfiyat', '$miktar')";

	if ($conn->query($sql) === TRUE) {
	    header('Location:index.php?page=new_prod&pro_status=success');
	} else {
		header("Location:index.php?page=new_prod&pro_status=$conn->error");
	}

	$conn->close();

}

if ($_POST['action_del'] == "Seçilen Stokları Sil") {

	$del_list = $_POST['delete'];
  	if(empty($del_list)) {
    	header("Location:index.php?page=view_prod&del_status=Stok seçimi yapmadınız");
  	} 
  	else {
    	$n = count($del_list);

    	include '../db_connect.php';

    	for($i=0; $i < $n; $i++){
      		$sql = "DELETE FROM urunler WHERE pid='$del_list[$i]'";

			if ($conn->query($sql) === TRUE) {

			} else {
				header("Location:index.php?page=view_prod&del_status=$conn->error");
				exit();
			}
    	}

 		header("Location:index.php?page=view_prod&del_status=success");
    

    	$conn->close();
    }
}



if ($_POST['action_upd'] == "Güncelle") {

	$pname = $_POST['pname'];
	$bname = $_POST['bname'];
	$tarih = $_POST['tarih'];
	$cfiyat = $_POST['cfiyat'];
	$miktar = $_POST['miktar'];
	$updid = $_POST['updid'];


	include '../db_connect.php';

	$sql = "UPDATE urunler SET name = '$pname', urun_kat = '$bname', tarih = '$tarih',  cfiyat = '$cfiyat',  miktar = '$miktar'
	WHERE pid =".$updid;

	if ($conn->query($sql) === TRUE) {
	    header('Location:index.php?page=update_prod&pro_status=success');
	} else {
		header("Location:index.php?page=update_prod&pro_status=$conn->error");
	}

	$conn->close();

}


if ($_POST['action'] == "Seçimi Onayla") {

	$id = $_POST['upid'];

	header("Location:index.php?page=update_prod&upd=".$id);

}


if ($_POST['action_wrk'] == "Tedarikçi Ekle") {

	$m_isim = $_POST['m_isim'];
	$type = $_POST['wtype'];
	$telefon = $_POST['wtelefon'];
	$adres = $_POST['adres'];


	include '../db_connect.php';

	$sql = "INSERT INTO kullanicilar (name, type, telefon, adres)
	VALUES ('$m_isim', '$type', '$telefon', '$adres')";

	if ($conn->query($sql) === TRUE) {
	    header('Location:index.php?page=new_wrk&pro_status=success');
	} else {
		header("Location:index.php?page=new_wrk&pro_status=$conn->error");
	}

	$conn->close();

}

if ($_POST['action_del_wrk'] == "Silmeyi Onayla") {

	$del_list = $_POST['delete'];
  	if(empty($del_list)) {
    	header("Location:index.php?page=view_prod&del_status=Silinecek öğe seçilmedi.");
  	} 
  	else {
    	$n = count($del_list);

    	include '../db_connect.php';

    	for($i=0; $i < $n; $i++){

    		if ($del_list[$i] == '100000') {
    			header("Location:index.php?page=view_wrk&del_status=You can't delete admin");
				exit();
    		}

      		$sql = "DELETE FROM kullanicilar WHERE id='$del_list[$i]'";

			if ($conn->query($sql) === TRUE) {

			} else {
				header("Location:index.php?page=view_wrk&del_status=$conn->error");
				exit();
			}
    	}

 		header("Location:index.php?page=view_wrk&del_status=success");
    

    	$conn->close();
    }
}

if ($_POST['action'] == "Tedarikçi Seç") {

	$id = $_POST['upid'];
	header("Location:index.php?page=update_wrk&upd_w=".$id);



}

if ($_POST['action_upd_wrk'] == "Tedarikçi Güncelle") {

	$m_isim = $_POST['m_isim'];
	$updid = $_POST['updid'];
	$telefon = $_POST['wtelefon'];
	$adres = $_POST['adres'];


	include '../db_connect.php';

	$sql = "UPDATE kullanicilar SET name = '$m_isim', telefon = '$telefon', adres = '$adres' WHERE id =".$updid;

	if ($conn->query($sql) === TRUE) {
	    header('Location:index.php?page=update_wrk&pro_status=success');
	} else {
		header("Location:index.php?page=update_wrk&pro_status=$conn->error");
	}

	$conn->close();

}









?>