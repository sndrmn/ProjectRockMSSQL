<!DOCTYPE HTML>
<!--
  Dimension by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>PROJECT ROCK</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="shortcut icon" href="images/favicon.ico"> 
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>

<body class="is-preload">
  <!-- Wrapper -->
    <div id="wrapper">
       <!-- Header -->
        <header id="header">
            <div class="logo">
                <span class="icon fa-gem"></span>
            </div>
            <div class="content">
                <div class="inner">
                    <h1>Be humble Be Hungry <br>And always be the hardest <br> worker in the room</h1>
                    <p>Dwayne 'The Rock' Johnson </p>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="#mssql">Connect to MSSQL</a></li>
                    <li><a href="#popmssql">Populate MSSQL</a></li>
                    <li><a href="#mssql">Add MSSQL Items</a></li>
                    <li><a href="#mssql">Delete MSSQL Items</a></li>
                </ul>
            </nav>
        </header>

        <!-- Main -->
        <div id="main">

        <!-- mssql -->
        <article id="mssql">
        <?php 
        session_start();
        if ($_SESSION['ep'] != "") {
              $ep = $_SESSION['ep'];
              $db = $_SESSION['db'];
              $un = $_SESSION['un'];
              $pa = $_SESSION['pa'];
 
              $conn = new PDO("sqlsrv:server = tcp:$ep,1433; Database = $db", "$un", "$pa");
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $result_str = strtoupper($ep);  
              echo nl2br("<h2 class=major> YOU DESERVE A FIST BUMP! </h2> <span class=image main><br><img src=images/fistbump.png width=200 height=200 /></span>");
              echo nl2br("<br><br>&nbsp WEB SERVER CONNECTED TO: &nbsp <strong><i>$result_str</i></strong>");
        } else {
              echo nl2br("<h2 class=major> Connect to MSSQL </h2> ");
              include ('settings-form.php');
          }
        ?>
        </article>

         <!-- popmssql -->
         <article id="popmssql">
         <h2 class=major> Populate MSSQL </h2>
         <span class="image main"> <img src="images/Teremana.png" alt="" /> </span> 
        <?php
          if(isset($_POST['populate'])) { 
              session_start();
              $ep = $_SESSION['ep'];
              $db = $_SESSION['db'];
              $un = $_SESSION['un'];
              $pa = $_SESSION['pa'];

              try {
                      $conn = new PDO("sqlsrv:server = tcp:$ep,1433; Database = $db", "$un", "$pa");
                      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                      $tableName = 'Teremana';
                      $query = "CREATE TABLE $tableName ([c1_int] sql_variant, [c2_varchar] sql_variant)";
                      $stmt = $conn->query($query);
                      unset($stmt);

                      $query = "INSERT INTO [$tableName] (c1_int, c2_varchar) VALUES (10, 'North Sydney')";
                      $stmt = $conn->query($query);
                      unset($stmt);

                      $query = "INSERT INTO [$tableName] (c1_int, c2_varchar) VALUES (20, 'Greenwich')";
                      $stmt = $conn->query($query);
                      unset($stmt);

                      $query = "INSERT INTO [$tableName] (c1_int, c2_varchar) VALUES (36, 'Willoughby')";
                      $stmt = $conn->query($query);
                      unset($stmt);

                      $query = "INSERT INTO [$tableName] (c1_int, c2_varchar) VALUES (3, 'Kirribilli')";
                      $stmt = $conn->query($query);
                      unset($stmt);

                      $query = "INSERT INTO [$tableName] (c1_int, c2_varchar) VALUES (100, 'NorthBridge')";
                      $stmt = $conn->query($query);
                      unset($stmt);

                      echo nl2br("Teremana SQL Table Created");
                      echo "<script>window.location.href ='#popmssql';</script>";
              }
              catch (PDOException $e) {
                      echo nl2br("<strong>Teremana SQL Table Already Exists</strong>");
                      echo "<script>window.location.href ='#popmssql';</script>";
              }
            }
          ?> 
          </article>
    </div>
    <!-- Footer -->
        <footer id="footer">
            <p class="copyright">Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
        </footer>
  </div>

    <!-- BG -->
    <div id="bg"></div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>