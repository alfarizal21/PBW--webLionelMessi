<?php
include "koneksi.php"; 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Best Player</title>
    <link rel="icon" href="asset/logo.webp">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> <!--link icon-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!--bootstrap css-->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> <!--google font-->
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }
        .light {
            background-color: #00A6FB;
            color: black;
        }

        .dark {
            background-color: #051923;
            color: white;
        }
        .bounce {
            animation: bounce 2s infinite;
        }
        img{
          border-radius: 30px;
        }

        /* mendefinisikan animasi untuk bounce, menciptakan efek naik-turun pada elemen yang memiliki kelas .bounce. */
        @keyframes bounce { 
            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-30px);
                rotate: -20deg;  
            }
            60% {
                transform: translateY(-15px);
                rotate: 10deg;  
            }
        }
    </style>
  </head>
  <body>
    <!-- nav begin -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top"> <!--navbar-expand-lg (menu akan kolaps pada layar kecil)-->
        <div class="container">
          <a class="navbar-brand" href="#">Lionel Messi</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark"> <!--daftar item navigasi yang ditampilkan di sebelah kanan (ms-auto)-->
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#article">Article</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#gallery">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#schedule">Schedule</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about_me">About Me</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
            </ul>
            <button id="dark">
                <i class="bi bi-moon-stars-fill"></i>
            </button>
            <button id="light">  
                <i class="bi bi-brightness-high-fill"></i>
            </button>
          </div>
        </div>
    </nav>
    <!-- nav end -->
    <!-- hero begin -->
    <section id="hero" class="text-center p-5  text-sm">
        <div class="container">
            <div class="d-sm-flex flex-sm-row-reverse align-items-center">
                <img src="https://www.infobiografi.com/wp-content/uploads/2018/05/biografi-lionel-Messi.jpg" class="img-fluid bounce position-relative" width="400">
                <div>
                    <h1 class="fw-bold display-4">Lionel Andres Messi</h1>
                    <h4 class="lead display-6">Sering dijuluki sebagai "GOAT" (Greatest of All Time), pesepak bola legendaris asal Argentina yang dikenal luas karena keterampilannya yang luar biasa, visi permainan yang tajam, dan rekor-rekor mencengangkan di dunia sepak bola.</h4>
                    <h6>
                        <span id="tanggal"></span>
                        <span id="jam"></span>
                    </h6>
                </div>
            </div>
        </div>
    </section>
    <!-- hero end -->
    <!-- article begin -->
    <section id="article" class="text-center p-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                $sql = "SELECT * FROM article ORDER BY tanggal DESC";
                $hasil = $conn->query($sql);

                while($row = $hasil->fetch_assoc()){
                ?>
                <div class="col">
              <div class="card h-100">
                <img src="https://asset-a.grid.id/crop/0x0:0x0/700x465/photo/2024/06/25/000_334t4ypjpg-20240625013419.jpg" class="card-img-top" alt="Piala Dunia Messi">
                <div class="card-body">
                  <h5 class="card-title">Piala Dunia</h5>
                  <p class="card-text">Kasta tertinggi dalam turnamen sepak bola adalah Piala Dunia, dan Lionel Messi meraih kejayaan ini pada 2022.</p>
                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="https://asset-a.grid.id/crop/31x0:767x477/700x465/photo/2021/07/11/messi-pialajpg-20210711102530.jpg" class="card-img-top" alt="Copa America Messi">
                <div class="card-body">
                  <h5 class="card-title">Copa America</h5>
                  <p class="card-text">Turnamen sepak bola antar negara di Amerika Selatan, di mana Messi membawa Argentina menjadi juara pada 2021.</p>
                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="https://asset-a.grid.id/crop/0x0:0x0/700x465/photo/2022/06/02/lionel-messi-argentina-italia-af-20220602043158.jpg" class="card-img-top" alt="Finalisma Messi">
                <div class="card-body">
                  <h5 class="card-title">Finalisma</h5>
                  <p class="card-text">Pertandingan bergengsi antara juara Copa America dan Euro. Messi membawa Argentina mengalahkan Italia pada 2022.</p>
                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div>
              </div>
            </div>
          </div>
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100">
                <img src="https://asset-a.grid.id/crop/0x0:0x0/700x465/photo/2020/06/24/1370479074.jpg" class="card-img-top" alt="Ballon D'or Messi">
                <div class="card-body">
                  <h5 class="card-title">Ballon D'or</h5>
                  <p class="card-text">Penghargaan Ballon d'Or diberikan kepada pemain terbaik dunia. Messi telah memenangkan penghargaan ini sebanyak tujuh kali.</p>
                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="https://media.gettyimages.com/id/1176171995/photo/topshot-barcelonas-argentinian-forward-lionel-messi-poses-with-his-sixth-golden-shoe-awards.jpg?s=612x612&w=gi&k=20&c=Y5qRODNB9LSc1zOVOEARUKZnCdichqXlSUIUByQeE4o=" class="card-img-top" alt="Golden Boot Messi">
                <div class="card-body">
                  <h5 class="card-title">Golden Boot</h5>
                  <p class="card-text">Penghargaan Golden Boot diberikan kepada pencetak gol terbanyak di kompetisi internasional. Messi meraih penghargaan ini beberapa kali.</p>
                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div>
              </div>
            </div>
            <?php
            }
            ?>
            </div>          
        </div>
    </section>
    <!-- article end -->
    <!-- galerry begin -->
    <section id="gallery" class="text-center p-5  bg-primary-subtle">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">Gallery</h1>
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://asset-a.grid.id/crop/0x0:0x0/700x465/photo/2024/06/25/000_334t4ypjpg-20240625013419.jpg" class="d-block w-100" alt="1">
                  </div>
                  <div class="carousel-item">
                    <img src="https://asset-a.grid.id/crop/31x0:767x477/700x465/photo/2021/07/11/messi-pialajpg-20210711102530.jpg" class="d-block w-100" alt="2">
                  </div>
                  <div class="carousel-item">
                    <img src="https://asset-a.grid.id/crop/0x0:0x0/700x465/photo/2022/06/02/lionel-messi-argentina-italia-af-20220602043158.jpg" class="d-block w-100" alt="3">
                  </div>
                  <div class="carousel-item">
                    <img src="https://asset-a.grid.id/crop/0x0:0x0/700x465/photo/2020/06/24/1370479074.jpg" class="d-block w-100" alt="4">
                  </div>
                  <div class="carousel-item">
                    <img src="https://media.gettyimages.com/id/1176171995/photo/topshot-barcelonas-argentinian-forward-lionel-messi-poses-with-his-sixth-golden-shoe-awards.jpg?s=612x612&w=gi&k=20&c=Y5qRODNB9LSc1zOVOEARUKZnCdichqXlSUIUByQeE4o=" class="d-block w-100" alt="5">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
    </section>
    <!-- gallery end -->
    <!-- schedule begin -->
    <section id="schedule" class="text-center p-5">
      <div class="container">
        <h5 class="card-title"><b>Piala Dunia</b></h5> <br>
        <div class="row row-cols-1 row-cols-md-4 g-4">
          <div class="col">
            <div class="card h-100">
              <div class="card-header bg-danger">
                <small class="text-white">SENIN</small>
              </div>
              <ul class="list-group">
                <li class="list-group-item">
                    Probabilitas dan Statistika <br>
                    12.30 - 15.00 | H.4.7
                </li>
                <li class="list-group-item">
                    Rekayasa Perangkat Lunak <br>
                    15.30 - 18.00 | H.4.6
                </li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
                <div class="card-header bg-danger">
                    <small class="text-white">SELASA</small>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        Sistem Operasi <br>
                        09.30 - 12.00 | H.3.11
                    </li>
                    <li class="list-group-item">
                        Logika Informatika <br>
                        15.30 - 18.00 | H.4.5
                    </li>
                </ul>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
                <div class="card-header bg-danger">
                    <small class="text-white">RABU</small>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        Penambangan Data <br>
                        09.30 - 12.00 | H.4.9
                    </li>
                    <li class="list-group-item">
                        Basis Data <br>
                        14.10 - 15.50 | D.3.M
                    </li>
                </ul>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
                <div class="card-header bg-danger">
                    <small class="text-white">KAMIS</small>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        Pemrograman Berbasis Web <br>
                        12.30 - 14.10 | D.2.J
                    </li>
                    <li class="list-group-item">
                        Kriptografi <br>
                        15.30 - 18.00 | H.4.11
                    </li>
                </ul>
            </div>
          </div>
        </div>
        <br>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 justify-content-center">
            <div class="col">
                <div class="card h-100">
                    <div class="card-header bg-danger">
                        <small class="text-white">JUM'AT</small>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            Basis Data <br>
                            10.20 - 12.00 | H.5.14
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header bg-danger">
                        <small class="text-white">SABTU</small>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            Free
                        </li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </section>
     <!-- schedule end -->
    <!-- footer begin  -->
    <!-- about me begin -->
     <section id="about_me" class="text-center p-5 mt-5 mb-5 text-sm-start">
        <div class="container">
            <div class="d-flex flex-column flex-sm-row align-items-center gap-5 justify-content-center">
                <!-- gambar yg di klik -->
                <img src="https://cdn.idntimes.com/content-images/post/20211129/en-40978b818a5cf4be095787607c7e8b53.jpg" 
                     class="rounded-circle img-fluid w-25 w-sm-20" alt="Image" onclick="toggleText()" id="profileImage">
    
                <div class="py-1 mt-2">
                    <!-- konten yg akan di hidden -->
                    <div id="myDIV">
                        <p>A11.2023.15226</p>
                        <h3><b>Irgi Alfarizal Ardiansyah</b></h3>
                        <p>Program Studi Teknik Informatika</p>
                        <p><b><a class="link-offset-2 link-underline link-underline-opacity-0 text-dark" href="https://dinus.ac.id/">Universitas Dian Nuswantoro</a></b></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    
    <!-- about me end -->
    <footer class="text-center p-5">
        <div>
            <a href="https://www.instagram.com/irgiialfarizall/profilecard/?igsh=OHFjcW5yd2dhZW9h"><i class="bi bi-instagram h2 p-2 text-dark"></i></a>
            <a href="https://wa.me/085292320201"><i class="bi bi-whatsapp h2 p-2 text-dark"></i></a>
            <a href="https://www.tiktok.com/@twentyone_65?_t=8qyzN2eenGa&_r=1"><i class="bi bi-tiktok h2 p-2 text-dark"></i></a>
        </div>
        <div>
            Irgi Alfarizal Ardiansyah &copy; 2024
        </div>
    </footer>
    <!-- footer end -->

    <!-- Memuat Library Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // Menjadwalkan Eksekusi Fungsi tampilWaktu()
        window.setTimeout("tampilWaktu()", 100); 

        function tampilWaktu(){
            // Fungsi tampilWaktu() dan Mendapatkan Tanggal
            var waktu = new Date();
            // Mengatur Bulan
            var bulan = waktu.getMonth()+1;

            // Memperbarui Fungsi Setiap Detik
            setTimeout("tampilWaktu()", 1000);
            // Menampilkan tanggal dalam format DD/MM/YYYY
            document.getElementById("tanggal").innerHTML = waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
            // Menampilkan waktu dalam format HH:MM:SS
            document.getElementById("jam").innerHTML = waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds();
        }

        document.getElementById("light").onclick = function() {
            document.body.classList.add("light");
            document.body.classList.remove("dark");
        };
        document.getElementById("dark").onclick = function() {
            
            document.body.classList.add("dark");
            document.body.classList.remove("light");
        };
    </script>

    <script>
    function toggleText() {
        var textDiv = document.getElementById("myDIV");
        if (textDiv.style.display === "none") {
            textDiv.style.display = "block";  
        } else {
            textDiv.style.display = "none";   
        }
    }
    </script>
  </body>
</html>