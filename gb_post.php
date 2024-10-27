<?php

session_start();

include 'koneksi.php';


$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$pesan = mysqli_real_escape_string($conn, $_POST['pesan']);

$stmt = $conn->prepare("INSERT INTO guestbook (id, tanggal, nama, pesan) VALUES(NULL, NOW(), ?, ?)");
$stmt->bind_param("ss", $nama, $pesan);
$stmt->execute();

if ($stmt->affected_rows > 0) {
	echo "Data berhasil disimpan";
}


//tambahkan atau perbaiki script diantara dibaris 7 sampai  15
//sql code injection  di guestbook bagian pesan   joni') UNION SELECT NULL,now(),'joni','joni'; -- '
