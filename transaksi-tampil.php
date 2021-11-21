<?php 
require_once('anggota-select.php');
require_once('buku-select.php');
require_once('transaksi-select.php');
$dataanggota 	= selectAnggota();
$databuku 		= selectBuku();
$datatransaksi 	= selectTransaksi();
?>
<html>
<head>
	<title>Sistem Informasi Perpustakaan</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-gray shadow">
		<div class="container">
			<a class="navbar-brand" href="">Sistem Informasi Perpustakan</a>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
				<li class="nav-item"><a class="nav-link" href="anggota-tampil.php">Data Anggota</a></li>
				<li class="nav-item"><a class="nav-link" href="buku-tampil.php">Data Buku</a></li>
				<li class="nav-item"><a class="nav-link active" href="transaksi-tampil.php">Transaksi</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<h1 class="display text-white">.</h1>
		<div class="card shadow">
			<h5 class="card-header bg-white text-dark">Data Transaksi</h5>
			<div class="card-body">
				<button type="button" class="btn btn-success shadow" data-toggle="modal" data-target="#exampleModal" 
				style="margin-bottom: 20px">TAMBAH PEMINJAMAN</button>
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Data Peminjaman</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="transaksi-insert.php" method="POST">
									<div class="row">
										<div class="col-sm-4" style="margin-bottom: 30px;">Nama Anggota</div>
										<div class="col-sm-8">
											<select name="id_anggota" class="form-control" required>
												<option selected disabled value="">-- Pilih Anggota --</option>
												<?php foreach($dataanggota as $valueanggota): ?>
													<option value="<?php echo $valueanggota[0]; ?>"><?php echo $valueanggota[1]; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4" style="margin-bottom: 30px;">Judul Buku</div>
										<div class="col-sm-8">
											<select name="id_buku" class="form-control" required>
												<option selected disabled value="">-- Pilih Buku --</option>
												<?php foreach($databuku as $valuebuku): ?>
													<option value="<?php echo $valuebuku[0]; ?>"><?php echo $valuebuku[1]; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4" style="margin-bottom: 30px;">Tanggal Pinjam</div>
										<div class="col-sm-8"><input type="date" name="peminjaman" class="form-control" required></div>
									</div>
									<div class="row">
										<div class="col-sm-4" style="margin-bottom: 30px;">Batas Pinjam</div>
										<div class="col-sm-8"><input type="date" name="batas" class="form-control" required></div>
									</div>
									<div class="row">
										<div class="col-sm-4"></div>
										<div class="col-sm-8"><input type="submit" class="btn btn-primary shadow" value="Simpan"></div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-hover" width="99%" cellspacing="0"  id="example" class="display">
						<thead>
							<tr>
								<th><center>No</center></th>
								<th><center>Anggota</center></th>
								<th><center>Buku</center></th>
								<th><center>Peminjaman</center></th>
								<th><center>Batas</center></th>
								<th><center>Pengembalian</center></th>
								<th><center>Denda</center></th>
								<th><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$count = 0;
							foreach($datatransaksi as $valuetransaksi): 
								$count++;
								?>
								<tr>
									<td><center><?php echo $count; ?></center></td>
									<td><?php echo $valuetransaksi[1]; ?></td>
									<td><?php echo $valuetransaksi[2]; ?></td>
									<td><center><?php echo $valuetransaksi[3]; ?></center></td>
									<td><center><?php echo $valuetransaksi[4]; ?></td>
									<td>
										<center>
										<?php 
										if($valuetransaksi[5] == "0000-00-00"){
											echo "Belum Kembali"; 
										} else{
											echo $valuetransaksi[5];
										}
										?>
										</center>
									</td>
									<td>
										<?php 
										if($valuetransaksi[5] == "0000-00-00"){
											echo "-"; 
										} else{
											echo "Rp. " .$valuetransaksi[6];
										}
										?>
									</td>
									<td>
										<center><a class="btn btn-primary btn-sm shadow" href="transaksi-kembali.php?id=<?php echo $valuetransaksi[0];?>">Return</a></center>
									</td>
								</tr>
							<?php endforeach; ?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>