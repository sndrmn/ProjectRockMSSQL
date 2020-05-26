
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
                    <li><a href="#viewmssql">View MSSQL Items</a></li>
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
                <br>

            </article>

            <!-- popmssql -->
            <article id="popmssql">
                <h2 class=major> Populate MSSQL </h2>
                <span class="image main"> <img src="images/Teremana.png" alt="" /> </span> 
                <?php 
                if ($_SESSION['ep'] != "") {
                    echo nl2br("<form method=post action=popmssql.php> <input type=submit name=populate value=Teremana> </form>");
                } else {
                    echo nl2br("<strong>Web Server Not Connected to MSSQL</strong>");
                } 
                ?>
            </article>

            <!-- viewmssql -->
            <article id="viewmssql">
                <h2 class=major> View MSSQL Items</h2>
                <?php 
                session_start();
                if ($_SESSION['ep'] != "") {
                    $ep = $_SESSION['ep'];
                    $db = $_SESSION['db'];
                    $un = $_SESSION['un'];
                    $pa = $_SESSION['pa'];

                    try {
                      $conn = new PDO("sqlsrv:server = tcp:$ep,1433; Database = $db", "$un", "$pa");
                      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                      $tableName = 'Teremana';
                      $query = "SELECT * FROM $tableName";
                      $stmt = $conn->query($query);

                      $result = $stmt-> fetchAll();
                      echo "<table><th>STORE</th><th>STOCK</th><th colspan=2>OPERATIONS</th>";

                      if ($function == ""){
                        foreach( $result as $row ) {
                              echo "<tr>";
                              echo "<td> $row[Store]</td>";
                              echo "<td> $row[Stock]</td>";
                              echo "  <td><a href=index.php?store=$row[Store]&stock=$row[Stock]&function=edit> <img src=images/pencil.png /></a> </td>";
                              echo "  <td><a href=index.php?store=$row[Store]&function=delete> <img src=images/rubbish.png /></a> </td>";
                              echo "</tr>";
                        }
                        echo "</table>";
                        echo "<button onclick=window.location.href=index.php?section=Teremana&function=new>Create New Store</button>";
                      }

                      $function = $_GET["function"];
                      $store = $_GET["store"];
                      $stock = $_GET["stock"];

                      if ($function == "delete") {
                       $query = "DELETE FROM Teremana WHERE Store = '$store'";
                       $stmt = $conn->query($query);
                       unset($stmt);
                       header( "Location: index.php#viewmssql" );
                       } else if ($function == "edit") {
                          $function = "";
                           echo "<br><br><br><br>";
                           echo "<form name=input action=save.php method=post>";
                           echo "<table><th>STORE</th><th>STOCK</th><th>OPERATION</th>";
                           echo "<tr>";
                           echo "<td><input type=text name=storeupdate value=$store </></td>";
                           echo "<td><input type=text name=stockupdate value=$stock </></td>";
                           echo "<td><input type=hidden name=oldstore value=$store </></td>";
                           echo "<td><input type=image src=/images/floppy.png alt=Submit></td>";
                           echo "</tr>"; 
                           echo "</table>";
                           echo "<script>window.location.href ='#viewmssql';</script>";
                        }
                      }
                     catch (PDOException $e) {
                        //echo $e->getMessage();
                        echo nl2br("<strong>Teremana SQL Table Already Exists</strong>");
                    }
                } else {
                    echo nl2br("<strong>Web Server Not Connected to MSSQL</strong>");
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