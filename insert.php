<?php 

    // menyertakan file config dan session start
    require_once('config.php'); 

    // cek data
    if(isset($_POST['nama_lengkap']) && $_POST['alamat_email'] != '' && $_POST['kata_sandi'] != ''){

        // buat variabel
        $nama_lengkap = $_POST['nama_lengkap'];
        $alamat_email = $_POST['alamat_email'];
        $kata_sandi = $_POST['kata_sandi'];

        // buat permintaan ke database untuk menambahkan data
        $sql = "INSERT INTO `anggota` (`nama_lengkap`, `alamat_email`, `kata_sandi`) VALUES ('$nama_lengkap', '$alamat_email', '$kata_sandi')";

        // periksa permintaan berhasil atau gagal
        if ($koneksi->query($sql) === TRUE) {

            // membuat session 
            $_SESSION["nama_lengkap"] = $nama_lengkap;
            $_SESSION["alamat_email"] = $alamat_email;

            /*
                proses berhasil
                menampilkan halaman dasbor.php
            */
            header('location: dasbor.php');

        } else {
            // menampilkan halaman proses gagal
            header('location: gagal.php');
        }

        $koneksi->close();       
        
    }

?>