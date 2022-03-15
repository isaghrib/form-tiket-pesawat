<?php include 'koneksi.php';?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Travel Booking Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
      $( "#datepicker" ).datepicker({
        changeYear: true,
        changeMonth: true,
        minDate: 0,
        dateFormat: "dd-mm-yy",
        yearRange: "-100:+20",
      });
    } );
    </script>
  </head>

    <body>
      <div class="testbox">
      <form  method="post">
        <div class="banner">
          <h1>Form Pemesanan Tiket Pesawat</h1>
        </div>
        <div class="item">
          <p>No Tanda Pengenal</p>
          <div class="city-item">
            <select required name="jns">
              <option value="">Jenis ID</option>
              <option value="Paspor">Paspor</option>
              <option value="KTP">KTP</option>
              <option value="SIM">SIM</option>
                          </select>
            <input type="number" name="id" placeholder="Nomor" required />
          </div>
        </div>
        <div class="item">
          <p>Nama Penumpang</p>
          <div class="name-item">
            <input type="text" name="first" placeholder="First" required/>
            <input type="text" name="last" placeholder="Last" required/>
          </div>
        </div>
        <div class="item">
          <p>Jenis Kelamin</p>
          <select required name="jk">
            <option value=""> </option>
            <option value="Laki-laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
            <option value="Lain-lain">Lain-lain</option>
          </select>
        </div>
        <div class="item">
          <p>Email</p>
          <input type="email" name="email" placeholder="email@example.com" required/>
        </div>
        <div class="item">
          <p>Phone</p>
          <input type="number" name="phone" placeholder="012345678910" required/>
        </div>

        <div class="item"><p>Tanggal Berangkat </p>
        <input type="text" id="datepicker" name="tanggal" required>
        </div>
        <div class="item">
        <div class="city-item">
        <p>Kota Keberangkatan</p>
        <p>Bandara</p>
        </div>
        <div class="city-item">
          <select required name="berangkat" id="tujuan">
            <option value="">--Pilih Kota--</option>
						<?php
						                    $tujuan = "SELECT * FROM wilayah";
						                    $queryTujuan = mysqli_query($koneksi,$tujuan);
						                    while ($dataTujuan = mysqli_fetch_array($queryTujuan)) { ?>
						                        <option value="<?php echo $dataTujuan['id_wilayah'] ?>"><?php echo $dataTujuan["nama_wilayah"] ?>
						                        </option>
						                    <?php
						                    }
						                    ?>
          </select><br>
          <select required id="nama_bandara" name="bandara_berangkat">
            <option value="">Pilih Bandara</option>
          </select>
        </div>

        <div class="city-item">
        <p>Kota Tujuan</p>
        <p>Bandara</p>
        </div>
        <div class="city-item">
          <select required name="Tujuan" id="tujuan1">
						<option value="">--Pilih Kota--</option>
						<?php
																$tujuan = "SELECT * FROM wilayah";
																$queryTujuan = mysqli_query($koneksi,$tujuan);
																while ($dataTujuan = mysqli_fetch_array($queryTujuan)) { ?>
																		<option value="<?php echo $dataTujuan['id_wilayah'] ?>"><?php echo $dataTujuan["nama_wilayah"] ?>
																		</option>
																<?php	}?>
          </select>
          <select required id="nama_bandara1" name="bandara_tujuan">
						<option value="">Pilih Bandara</option>
          </select>
        </div>
      </div>
			<div class="item">
				<p>Maskapai</p>
				<select required id="maskapai" name="maskapai">
          <option value="">Pilih Maskapai</option>
									</select>

          <div class="btn-block">
            <button type="submit" name="checkout">Book</button>
          </div>
      </form>
      <?php
    if (isset($_POST['checkout']))
    {
      $idbandaraberangkat=$_POST['bandara_berangkat'];
      $ambil2=$koneksi->query("SELECT * FROM bandara WHERE id_bandara='$idbandaraberangkat'");
      $get1=$ambil2->fetch_assoc();
      $bandara_berangkat=$get1['kd_bandara'];
    $idbandaratujuan=$_POST['bandara_tujuan'];
    $ambil1=$koneksi->query("SELECT * FROM bandara WHERE id_bandara='$idbandaratujuan'");
    $get=$ambil1->fetch_assoc();
    $bandara_tujuan=$get['kd_bandara'];
    $edate=strtotime($_POST['tanggal']);
    $edate=date("Y-m-d",$edate);
    $id_pesawat = $_POST['maskapai'];
    $ambil = $koneksi->query("SELECT * FROM pesawat WHERE id_pswt='$id_pesawat'");
    $arraypswt = $ambil->fetch_assoc();
    $maskapai = $arraypswt['nama_pswt'];
    $tarif = $arraypswt['tarif'];
    $idpswt = $arraypswt['id_pswt'];
    $koneksi->query("INSERT INTO pesanan (no_iden,jns_iden,nama_psnfirst,nama_psnlast,jk,email,no_tel,tgl,berangkat,tujuan,pswt,tarifpsn,id_pswt)
     VALUES ('$_POST[id]','$_POST[jns]','$_POST[first]','$_POST[last]','$_POST[jk]','$_POST[email]','$_POST[phone]','$edate','$bandara_berangkat','$bandara_tujuan','$maskapai','$tarif','$idpswt' )");

     $idbarusan = $koneksi->insert_id;
     $koneksi->query("INSERT INTO pesanan (id_psn) VALUES ('$idbarusan')");
    echo "<script>alert('Pembelian sukses');</script>";
    echo "<script>location='invoice.php?id=$idbarusan';</script>";
    }
    ?>
      </div>
    </body>
  </html>
	<script type="text/javascript">
	$( "#tujuan" ).change(function() {
	var id_wilayah = $("#tujuan").val();
	console.log(id_wilayah);
	$.ajax({
		url: "./ajax_bandara.php?id_wilayah=" + id_wilayah,
		success: function(result){
			$("#nama_bandara").html(result);
		}
	});
});

$( "#tujuan1" ).change(function() {
var id_wilayah = $("#tujuan1").val();
console.log(id_wilayah);
$.ajax({
	url: "./ajax_bandara.php?id_wilayah=" + id_wilayah,
	success: function(result){
		$("#nama_bandara1").html(result);
	}
});
});

$( "#nama_bandara1" ).change(function() {
  var id_bandara = $("#nama_bandara1").val();
  console.log(id_bandara);
  $.ajax({
  	url: "./ajax_pesawat.php?id_bandara=" + id_bandara,
  	success: function(result){
  		$("#maskapai").html(result);
  	}
  });
  });

	</script>
