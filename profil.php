<div class="container mt-4">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="floatingTextInput">Ganti Password</label>
            <input type="password" class="form-control" placeholder="Tuliskan password baru jika ingin mengganti password saja" name="password">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Ganti Foto Profil</label>
            <input type="file" class="form-control" name="foto">
        </div>
        <div class="mb-3">
            <?php
            $data = null;
            if (isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                $sql = "SELECT foto FROM user WHERE id = $id";
                $hasil = $conn->query($sql);
                
                $data = $hasil->fetch_assoc();
            }
            ?>
            <?php
            if($data && $data["foto"]){
            ?>    
                <img src="asset/<?= $data["foto"] ?>" width="300" class="img-thumbnail">
            <?php
            } else {
                echo 'foto profil kosong';
            }
            ?>
            <input type="hidden" name="foto_lama" value="<?= $data["foto"] ?? '' ?>">
        </div>
        <input type="submit" value="Simpan" name="simpan" class="btn btn-primary">
    </form>
</div>

<?php
include "upload_foto.php";
include "koneksi.php";
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

//jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    $password = !empty($_POST['password']) ? md5($_POST['password']) : null;
    $foto = '';
    $nama_foto = $_FILES['foto']['name'];

    //jika ada file yang dikirim  
    if ($nama_foto != '') {
        $cek_upload = upload_foto($_FILES["foto"]);
        if ($cek_upload['status']) {
            $foto = $cek_upload['message'];
        } else {
            echo "<script>
                alert('" . $cek_upload['message'] . "');
                document.location='admin.php?page=profil';
            </script>";
            die;
        }
    }

    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];

        if ($nama_foto == '') {
            $foto = $_POST['foto_lama'];
        } else if (!empty($_POST['foto_lama'])) {
            unlink("asset/" . $_POST['foto_lama']);
        }

        $stmt = $conn->prepare("UPDATE user 
                                SET 
                                password = IFNULL(?, password),
                                foto = ?
                                WHERE id = ?");

        $stmt->bind_param("ssi", $password, $foto, $id);
        $simpan = $stmt->execute();
    }

    if ($simpan) {
        echo "<script>
            alert('Simpan data sukses');
            document.location='admin.php?page=profil';
        </script>";
    } else {
        echo "<script>
            alert('Simpan data gagal');
            document.location='admin.php?page=profil';
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>