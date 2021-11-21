<?php 
$id 	= $_GET['id'];
$conn 	= mysqli_connect("localhost", "root", "", "jwd_perpus");
$sql 	= "SELECT * FROM buku WHERE id = '$id'";
$rows   = array();
$query 	= mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query)) {
	$rows[] = $row;
}
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
				<li class="nav-item"><a class="nav-link active" href="buku-tampil.php">Data Buku</a></li>
				<li class="nav-item"><a class="nav-link" href="transaksi-tampil.php">Transaksi</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<h1 class="display text-white">.</h1>
		<div class="card shadow">
			<h5 class="card-header bg-white text-dark">Data Buku</h5>
			<div class="card-body">
				<form action="buku-update.php" method="POST">
					<?php foreach($rows as $valueget): ?>
						<input type="hidden" name="id" value="<?php echo $valueget[0]; ?>">
						<div class="row">
							<div class="col-sm-3" style="margin-bottom: 30px;">Judul Buku</div>
							<div class="col-sm-8"><input type="text" name="judul" value="<?php echo $valueget[1]; ?>" class="form-control"></div>
						</div>
						<div class="row">
							<div class="col-sm-3" style="margin-bottom: 30px;">Penulis Buku</div>
							<div class="col-sm-8"><input type="text" name="penulis" value="<?php echo $valueget[2]; ?>" class="form-control"></div>
						</div>
						<div class="row">
							<div class="col-sm-3" style="margin-bottom: 30px;">Tahun Terbit</div>
							<div class="col-sm-8"><input type="text" name="tahun" value="<?php echo $valueget[3]; ?>" class="form-control"></div>
						</div>
						<div class="row">
							<div class="col-sm-3"></div>
							<div class="col-sm-8"><input type="submit" class="btn btn-primary shadow" value="Simpan"></div>
						</div>
					<?php endforeach; ?>
				</form>

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