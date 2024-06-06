<?php
  include "koneksi.php";

  // mengambil dari form
  $id = $_POST['id'];
  $nama = $_POST["nama"];
  $nim = $_POST["nim"];
  $umur = $_POST["umur"];
  $jenis_kelamin = $_POST["jenis_kelamin"];
  $prodi = $_POST["prodi"];
  $jurusan = $_POST["jurusan"];
  $asal_kota = $_POST["asal_kota"];

  $result = mysqli_query($koneksi, "SELECT * FROM inputmhs WHERE nim = '$nim'");
  if (mysqli_num_rows($result) > 0) {
      header("location:index.php?error=duplicate_nim");
  } else {
      mysqli_query($koneksi,
      "INSERT INTO inputmhs (nama, nim, umur, jenis_kelamin, prodi, jurusan, asal_kota) VALUES 
      ('$nama', '$nim', '$umur','$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')");
  
      // kembali ke index
      header("location:index.php");
  }
?>