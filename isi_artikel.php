<?php 
require 'functions.php';


?>


<!DOCTYPE html>
<html>
<title>Artikel Ikan Hias</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

a{
  text-decoration: none;
}

#formKomentar{    
 border: 10px 
 solid #d1d1d1;     
 width: 500px;     
 padding:10px; }
input, 

textarea{     
 padding: 10px;     
  border:3px 
  solid #e6e6e6;      
  border-radius: 5px;     
   margin-bottom: 15px; 
}

input:focus, 
textarea:focus{     
    border:3px 
    solid #5E4F4F; 
    } 

textarea{     
    width:300px;
         }

 input[type="submit"]{     
     cursor: pointer;      
     background: -webkit-linear-gradient(top, #efefef, #ddd);     
     background: -moz-linear-gradient(top, #efefef, #ddd);     
      background: -ms-linear-gradient(top, #efefef, #ddd);   
      background: -o-linear-gradient(top, #efefef, #ddd);      
      background: linear-gradient(top, #efefef, #ddd);      
      color: #333;     
       text-shadow: 0px 1px 1px rgba(255,255,255,1);      
       border: 1px solid #ccc; 
       } 

input[type="submit"]:hover {      
        background: -webkit-linear-gradient(top, #eee, #ccc);     
       background: -moz-linear-gradient(top, #eee, #ccc);     
        background: -ms-linear-gradient(top, #eee, #ccc);      
       background: -o-linear-gradient(top, #eee, #ccc);      
       background: linear-gradient(top, #eee, #ccc);     
        border: 1px solid #bbb; }

</style>
<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

<!-- Header -->
<header class="w3-container w3-center w3-padding-32"> 
  <h1><b>Ikan cupang petarung siam</b></h1>
  <p>Diposting oleh Admin pada <span class="w3-tag">Januari 27, 2022</span></p>
</header>

<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">
  <!-- Blog entry -->
  <?php
    $id = $_GET['catid'];
    $idgambar = $_GET['idgambar'];
    $sql = "SELECT * FROM artikel WHERE id_artikel= $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['judul_artikel'];
        $catdesc = $row['isi_artikel'];

        echo '<div class="w3-card-4 w3-margin w3-white">
    <img src="img/ikan-'. $idgambar .'.jpg" style="width:100%; height: 350px;">
    <div class="w3-container">
      <h3><b>'. $catname .'</b></h3>
    </div>

    <div class="w3-container">
      <p>'. $catdesc .'</p>
    </div>
  </div>';

      }
      ?>
      <?php
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        //INSERT INTO DATABASE
        $showAlert = false;
        $nama = $_POST['nama'];
        $comment = $_POST['komentar'];
        $sql = "INSERT INTO `komentar` (`id_komentar`, `nama`, `isi_komentar`, `id_artikel`, `komentar_oleh`, `timestamp`) VALUES (NULL, '$nama', '$comment', '$id', '0', CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn, $sql);
    }

    ?>
  <div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container">
      <h3><b>Kolom Komentar</b></h3>
    </div>

    <div class="w3-container">
      <section id="komentar">
    <div class="kolom">
<body>
<form id="formKomentar" action="" method="post">
   <div>
     <input type="text" name="nama" placeholder="Nama" />
   </div>
   <div>
     <textarea name="komentar" placeholder="Komentar">
     </textarea>
   </div>
   <div>
     <input type="submit" value="Tambahkan Komentar"/>
   </div>
  </form>
  </div>
 </section>
    </div>
    <div class="w3-container">
      <h3><b>Komentar Terbaru</b></h3>
      <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM komentar WHERE id_artikel= $id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id_komentar'];
            $nama = $row['nama'];
            $content = $row['isi_komentar'];
            $comment_time = $row['timestamp'];

            echo '<div class="d-flex align-items-center">
            <div class="flex-shrink-0">
                <img src="img/lohan.jpg" width="34" alt="..." style="border-radius:50%">
                <div class="flex-grow-1 ms-3">
            <p class="fw-bold my-0">'. $nama .' at ' . $comment_time . '</p>
                <p>' . $content . '</p>
            </div>
            </div>
            
        </div>';
        }


        ?>
    </div>
  </div>
  <hr>
<!-- END BLOG ENTRIES -->
</div>

<!-- Introduction menu -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card w3-margin w3-margin-top">
  <img src="/w3images/avatar_g.jpg" style="width:100%">
    <div class="w3-container w3-white">
      <h4><b>KITA</b></h4>
      <p>untuk mengerti dan menghargai betapa indahnya pengalaman,dengan adanya website ikan hias,kami ingin memberi tau betapa banyaknya macam-macam ikan yang sangat indah.</p>
    </div>
  </div><hr>
  
  <!-- Posts -->
  <div class="w3-card w3-margin">
    <div class="w3-container w3-padding">
      <h4>postingan ikan terbaru</h4>
    </div>
    <ul class="w3-ul w3-hoverable w3-white">
      <?php $sql = "SELECT * FROM artikel";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id_artikel'];
                $cat = $row['judul_artikel'];
                $desc = $row['isi_artikel'];

                echo '<a href="isi_artikel.php?catid=' . $id . ' & threadid='. $id .' & idgambar='. $id .'">
                <li class="w3-padding-16">
        <img src="img/ikan-'. $id .'.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">'. $cat .'</span><br>
        <span>' . substr($desc, 0, 50) . '</span>
      </li></a> ';
              }
              ?>
    </ul>
  </div>
  <hr> 
 
  
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
  <a href="artikel.php" class="w3-button w3-black w3-padding-large w3-margin-bottom">Kembali</a>
  <button class="w3-button w3-black w3-padding-large w3-margin-bottom">Next »</button>
</footer>

</body>
</html>