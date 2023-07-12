<?php

$db = mysqli_connect("localhost", "root", "", "onlinecourse");

function query($query)
{
	global $db;
	$result = mysqli_query($db, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah_kursus($data)
{
	global $db;
	// ambil data dari tiap elemen dalam form
    $judul = htmlspecialchars($data["judul"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
    $durasi = htmlspecialchars($data["durasi"]);
	// query insert data
	mysqli_query($db, "INSERT INTO kursus VALUES ('', '$judul', '$deskripsi', '$durasi');");

	return mysqli_affected_rows($db);
}

function tambah_materi($data)
{
	global $db;
	// ambil data dari tiap elemen dalam form
    $judul = htmlspecialchars($data["judul"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
    $link = htmlspecialchars($data["link"]);
	$id_kursus = htmlspecialchars($data["id_kursus"]);
	// query insert data
	mysqli_query($db, "INSERT INTO materi (judul, deskripsi, link, id_kursus) VALUES ('$judul', '$deskripsi', '$link', '$id_kursus');");

	return mysqli_affected_rows($db);
}

function hapus_kursus($id)
{
	global $db;
	mysqli_query($db, "DELETE FROM kursus WHERE id = '$id';");
	return mysqli_affected_rows($db);
}

function hapus_materi($id)
{
	global $db;
	mysqli_query($db, "DELETE FROM materi WHERE id = '$id';");
	return mysqli_affected_rows($db);
}

function edit_kursus($data)
{
	global $db;
    $id = $_GET['id'];
	// ambil data dari tiap elemen dalam form
    $judul = htmlspecialchars($data["judul"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
    $durasi = htmlspecialchars($data["durasi"]);
	// query update data
	mysqli_query($db, "UPDATE kursus SET judul = '$judul', deskripsi = '$deskripsi', durasi = '$durasi' WHERE id = $id;");

	return mysqli_affected_rows($db);
}

function edit_materi($data)
{
	global $db;
    $id = $_GET['id'];
	// ambil data dari tiap elemen dalam form
    $judul = htmlspecialchars($data["judul"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
    $link = htmlspecialchars($data["link"]);
	// query update data
	mysqli_query($db, "UPDATE materi SET judul = '$judul', deskripsi = '$deskripsi', link = '$link' WHERE id = $id;");

	return mysqli_affected_rows($db);
}

function searchMateriByJudul($keyword)
{
    global $db;
    $keyword = mysqli_real_escape_string($db, $keyword);

    $query = "SELECT * FROM materi WHERE judul LIKE '%$keyword%'";
    $result = mysqli_query($db, $query);

    return $result;
}

?>