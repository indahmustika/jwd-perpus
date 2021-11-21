<?php 
	function selectGet($id){
		$conn 	= mysqli_connect("localhost", "root", "", "jwd_perpus");
		$sql 	= "SELECT transaksi.id, anggota.nama, buku.judul, transaksi.peminjaman, transaksi.batas, transaksi.pengembalian, transaksi.denda FROM transaksi INNER JOIN anggota ON transaksi.id_anggota = anggota.id INNER JOIN buku ON transaksi.id_buku = buku.id WHERE transaksi.id = '$id'";
		$rows   = array();
		$query 	= mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($query)) {
			$rows[] = $row;
		}
		return $rows;
	}
?>