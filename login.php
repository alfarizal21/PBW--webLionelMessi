<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "koneksi.php";

//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) { 
	header("location:admin.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['user'];
  
  //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database
  $password = md5($_POST['pass']);

	//prepared statement
  $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

	//parameter binding 
  $stmt->bind_param("ss", $username, $password);//username string dan password string
  
  //database executes the statement
  $stmt->execute();
  
  //menampung hasil eksekusi
  $hasil = $stmt->get_result();
  
  //mengambil baris dari hasil sebagai array asosiatif
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  //check apakah ada baris hasil data user yang cocok
  if (!empty($row)) {
    //jika ada, simpan variable username pada session
    $_SESSION['username'] = $row['username'];

    //mengalihkan ke halaman admin
    header("location:admin.php");
  } else {
	  //jika tidak ada (gagal), alihkan kembali ke halaman login
    header("location:login.php");
  }

	//menutup koneksi database
  $stmt->close();
  $conn->close();
} else {
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Lionel Messi</title>
    <link rel="icon" href="./img/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: #00FFFF;">
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                <div class="card border-0 shadow rounded-5 bg-white">
                    <div class="card-body">
                        <div class="text-center mb-3 fw-bold text-dark">
                            <i class="bi bi-person-circle h1 display-4"></i>
                            <p class="fs-4">Web Lionel Messi</p>
                            <hr />
                        </div>
                        <form action="" method="post">
                            <div class="mb-4">
                                <input type="text" name="user" class="form-control py-2 rounded-4 bg-light text-dark" placeholder="Username" required />
                            </div>
                            <div class="mb-4">
                                <input type="password" name="pass" class="form-control py-2 rounded-4 bg-light text-dark" placeholder="Password" required />
                            </div>
                            <div class="text-center my-3 d-grid">
                                <button type="submit" class="btn btn-success rounded-4">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.setTimeout("tampilwaktu()", 1000);

        function tampilwaktu() {
            var waktu = new Date();
            var bulan = waktu.getMonth() + 1;
            var tanggal = waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
            var jam = waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds();

            document.getElementById("tanggal").innerHTML = tanggal;
            document.getElementById("jam").innerHTML = jam;

            setTimeout(tampilwaktu, 1000);
        }

        window.onload = tampilwaktu;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
}
?>