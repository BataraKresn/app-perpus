<?php
session_start(); 
// cek jika belom login, pindah ke halaman login
if(!isset($_SESSION['is_login'])) {
  header("Location: login.php");
}

require_once __DIR__."/koneksi.php";

$kode		= $_POST['kode'];
$judul		= $_POST['judul'];
$pengarang	= $_POST['pengarang'];
$jenis		= $_POST['jenis'];
$penerbit	= $_POST['penerbit'];

$query = mysqli_query($koneksi, "UPDATE buku SET kd_buku='$kode',
										judul_buku		='$judul',
										pengarang		='$pengarang',
										jenis_buku		='$jenis',
										penerbit		='$penerbit' 
										where kd_buku	='$_GET[id]'");
if ($query) {
	echo "<script>alert('data berhasil disimpan');
	document.location.href='buku.php'</script>\n";
} else {
	echo "<script>alert('data gagal disimpan');
	document.location.href='buku.php'</script>\n";
}
?>