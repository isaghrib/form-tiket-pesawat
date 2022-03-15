<?php

	include "koneksi.php";

	$id_bandara = $_GET["id_bandara"];
	$query = "SELECT * FROM pesawat WHERE id_bandara = '$id_bandara'";
	$sql = mysqli_query($koneksi,$query)or die(mysqli_error());

	while ($row = mysqli_fetch_array($sql)) { ?>
		<option value="<?php echo $row['id_bandara']; ?>"><?php echo $row["nama_pswt"] ?> - Rp. <?php echo number_format($row["tarif"]) ?></option>
	<?php
	}
	?>
?>
