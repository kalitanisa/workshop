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

</style>
<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

<!-- Header -->
<header class="w3-container w3-center w3-padding-32"> 
  <h1><b>Artikel</b></h1>
  <p>Selamat datang di artikel <span class="w3-tag">Ikan Hias</span></p>
</header>

<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">
  <!-- Blog entry -->
  <?php 
            $sql = "SELECT * FROM artikel";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id_artikel'];
                $cat = $row['judul_artikel'];
                $desc = $row['isi_artikel'];
                $sql2 = "SELECT * FROM komentar WHERE id_artikel= $id";
                $result2 = mysqli_query($conn, $sql2);
                $baris = mysqli_num_rows($result2);

                echo '<div class="w3-card-4 w3-margin w3-white">
    <img src="img/ikan-'. $id .'.jpg" style="width:100%; height: 350px;">
    <div class="w3-container">
      <h3><b><a href="isi_artikel.php?catid=' . $id . ' & threadid='. $id .' & idgambar='. $id .'">' . $cat . '</a></b></h3>
      <h5>Diposting oleh Admin <span class="w3-opacity">Januari 27, 2022</span></h5>
    </div>

    <div class="w3-container">
      <p>' . substr($desc, 0, 350) . '...</p>
      <div class="w3-row">
        <div class="w3-col m8 s12">
          <a href="isi_artikel.php?catid=' . $id . ' & threadid='. $id .' & idgambar='. $id .'"><p><button class="w3-button w3-padding-large w3-white w3-border"><b>Baca Selengkapnya</b></button></p></a>
        </div>
        <div class="w3-col m4 w3-hide-small">
          <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-tag">'. $baris .'</span></span></p>
        </div>
      </div>
    </div>
  </div>';
              }
              ?>
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
      <p>J>untuk mengerti dan menghargai betapa indahnya pengalaman,dengan adanya website ikan hias,kami ingin memberi tau betapa banyaknya macam-macam ikan yang sangat indah.</p>
    </div>
  </div><hr>
  
  <!-- Posts -->
  <div class="w3-card w3-margin">
    <div class="w3-container w3-padding">
      <h4>Postingan ikan terbaru</h4>
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
  <a href="index.php" class="w3-button w3-black w3-padding-large w3-margin-bottom">Kembali</a>
  <button class="w3-button w3-black w3-padding-large w3-margin-bottom">Next »</button>
</footer>

</body>
</html>