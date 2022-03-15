<?php

	include "koneksi.php";

	$id_wilayah = $_GET["id_wilayah"];
	$query = "SELECT * FROM bandara WHERE id_wilayah = '$id_wilayah'";
	$sql = mysqli_query($koneksi,$query)or die(mysqli_error());

	while ($row = mysqli_fetch_array($sql)) { ?>
		<option value="<?php echo $row['id_bandara']; ?>"><?php echo $row["kd_bandara"] ?> - <?php echo $row["nama_bandara"] ?></option>
	<?php
	}
	?>
?>
