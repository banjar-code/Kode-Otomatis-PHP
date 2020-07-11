<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Otomatis Dengan PHP Mysqli</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<?php 
$koneksi = mysqli_connect('localhost','root','','kodegenerator');
$query = mysqli_query($koneksi, "SELECT max(kode) as kodeTerbesar FROM tabel");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$huruf = "PC";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
?>
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Barang</h5>
      </div>
      <div class="modal-body">
      <form method="post" action="simpan.php">
  <div class="form-row">
    <div class="form-group mx-auto">
      <input type="text" class="form-control" placeholder="Kode Barang" name="kode" value="<?php echo $kodeBarang ?>" readonly required="required">
    </div>
    <div class="form-group mx-auto">
      <input type="text" class="form-control" placeholder="Nama Barang" name="nama_brg" required="required">
    </div>
	<div class="form-group mx-auto">
      <input type="text" class="form-control" onkeypress="return angkasaja(event)" placeholder="Harga Barang" name="harga" required="required">
    </div>
	<div class="form-group mx-auto">
      <input type="text" class="form-control" onkeypress="return angkasaja(event)" placeholder="Jumlah Barang" name="jumlah" required="required">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<table class="table table-striped">
		<thead>
			<tr>
				<th>Kode</th>
				<th>Nama Barang</th>
				<th>Harga</th>
				<th>Jumlah</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$barang = mysqli_query($koneksi,"SELECT * FROM tabel");
			while($b = mysqli_fetch_array($barang)){
				?>
				<tr>
					<td><?php echo $b['kode']; ?></td>
					<td><?php echo $b['nama_brg']; ?></td>
					<td><?php echo "Rp. ".number_format($b['harga'])." ,-"; ?></td>
					<td><?php echo $b['jumlah']; ?></td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
	<footer class="text-center">&copy;<a href="https://www.panduancode.com"> www.panduancode.com</a></footer>
      </div>
	   </div>
  </div>
  <script>
		function angkasaja(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
</body>
</html>