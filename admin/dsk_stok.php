<?php  

$sql = "SELECT pid, name, miktar FROM urunler";
$result = $conn->query($sql);

$flag = 0;

if ($result->num_rows > 0) {
        // output data of each row
	while($row = $result->fetch_assoc()) {

		if ($row['miktar'] <= 5 && $row['miktar'] != 0) {
			echo '<div class="alert alert-warning" role="alert"> '.$row['name'].' ('.$row['pid'].') isimli üründe düşük stok miktarı. Kalan stok miktarı '.$row['miktar'].'. </div>';
		}
		elseif ($row['miktar'] == 0) {
			$flag = 1;
			echo '<div class="alert alert-danger" role="alert"> '.$row['name'].' ('.$row['pid'].') isimli ürün stokta yok.</div>';
		}

		
	}
}

if ($flag == 0) {
	echo '<div class="alert alert-success" role="alert">Stok Yönetim Sistemine Hoşgeldiniz </div>';
}


?>