<?php
if (isset($_POST['simpan'])) {
    $foto = '';
    $nama_foto = $_FILES['profile_picture']['name'];

    // Jika ada file foto yang diunggah
    if ($nama_foto != '') {
        $cek_upload = upload_foto($_FILES['profile_picture']);
        if ($cek_upload['status']) {
            $foto = $cek_upload['message'];
        } else {
            echo "<script>
                alert('" . $cek_upload['message'] . "');
                document.location='admin.php?page=profil';
            </script>";
            die();
        }
    } else {
        $foto = $_POST['foto_lama']; // Jika tidak ada file baru, gunakan foto lama
    }

    // Cek apakah ada ID user yang dikirimkan
    if (isset($user['id'])) {
        $id = $user['id'];

        // Jika ada file baru, hapus foto lama
        if ($nama_foto != '') {
            unlink('img/' . $_POST['foto_lama']);
        }

        // Update hanya kolom foto
        $stmt = $conn->prepare("UPDATE user SET foto = ? WHERE id = ?");
        $stmt->bind_param('si', $foto, $id);

        $simpan = $stmt->execute();

        if ($simpan) {
            echo "<script>
                alert('Foto profil berhasil diperbarui');
                document.location='admin.php?page=profil';
            </script>";
        } else {
            echo "<script>
                alert('Gagal memperbarui foto profil');
                document.location='admin.php?page=profil';
            </script>";
        }

        $stmt->close();
    }

    $conn->close();
}
?>