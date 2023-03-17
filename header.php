<?php
require_once('config.php');
?>

<title><?php echo $siteName; ?></title>
<!-- Bootstrap CDN einbinden -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="css/jquery-3.5.1.slim.min.js"></script>
<script src="css/bootstrap.min.js"></script>

<!-- Navbar mit Bootstrap Klassen -->
<nav class="navbar navbar-expand-lg navbar-dark bg-header" data-bs-theme="dark">
  <div class="container-fluid">
    <!-- Logo und Titel -->
    <a class="navbar-brand" href="#">
      <img src="logo.png" alt="" width="30" height="24" class="d-inline-block align-top">
      <?php echo $siteName; ?>
    </a>
    <!-- Toggle Button für kleine Bildschirme -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar Inhalt -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Links zur Navigation -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php"><?php echo $headerMeals;?></a>
        </li>
        <li class ="nav-item ">
          <a class ="nav-link "href ="admin.php"><?php echo $headerAdmin;?></a>
        </li >
      </ul >

      <!--div class ="form-check form-switch ">
        <input type="checkbox" class="form-check-input" id="colorModeSwitch" data-toggle="toggle" data-onstyle="light" data-offstyle="dark" data-on-text="Light Mode" data-off-text="Dark Mode" onchange="toggleColorMode()">       </div >
     </div -->
   </div >
</nav >

<body class ="bg-dark text-center text-white">
