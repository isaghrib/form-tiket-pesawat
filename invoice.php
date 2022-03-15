<?php include 'koneksi.php';?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
        text-align: right;
    }

    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box" >
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://fontmeme.com/permalink/200106/61ff6b8d851bbe2e9f85efbe487b7005.png" style="width:100%; max-width:300px;">
                            </td>

                            <td>

                                Invoice #: <?php echo $_GET['id']; ?><br>
                                <?php
                                $tgl=date('l,d-m-Y');
                                  echo $tgl;?><br>
                                </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">

                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                JavSky, Inc.<br>
                                Gunadarma<br>
                                Depok, Jawa Barat
                            </td>
                            <?php
                            $idbarusan=$_GET['id'];
                            $ambil=$koneksi->query("SELECT * FROM pesanan	WHERE id_psn='$idbarusan'");
                            $ambil= mysqli_fetch_array($ambil);
                            ?>
                            <td>
                                <?php echo $ambil['id_psn'] ?><br>
                                <?php echo $ambil['nama_psnfirst']  ?> <?php echo $ambil['nama_psnlast']?><br>
                                <?php echo $ambil['email']?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
              <?php
              $idbarusan=$_GET['id'];
              $ambil=$koneksi->query("SELECT * FROM pesanan join pesawat on pesanan.id_pswt=pesawat.id_pswt WHERE id_psn='$idbarusan'");
              $ambil= mysqli_fetch_array($ambil);

              ?>
                <td>
                    Penerbangan  <?php echo $ambil['berangkat']?> - <?php echo $ambil['tujuan']?>
                </td>

                <td>
                    Tarif
                </td>
            </tr>

            <tr class="item">
                  <td>
                    <?php echo $ambil['pswt']?>
                </td>

                <td>
                    Rp. <?php echo number_format( $ambil['tarifpsn'])?>
                </td>
            </tr>



            <tr class="total">
                <td></td>

                <td>
                   Total:   Rp.<?php echo number_format($ambil['tarifpsn'])?>
                </td>
            </tr>
        </table>
        <div>
  <input type="button" value="print" onclick="window.print();" />
</div>
    </div>
</body>
</html>
