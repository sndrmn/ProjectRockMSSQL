
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
                <h2 class="major">Connect to MSSQL</h2>
                <?php 
                session_start();

                if ($_SESSION['ep'] != "") {
                    $ep = $_SESSION['ep'];
                    $db = $_SESSION['db'];
                    $un = $_SESSION['un'];
                    $pa = $_SESSION['pa'];
 
                    $conn = new PDO("sqlsrv:server = tcp:$ep,1433; Database = $db", "$un", "$pa");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo nl2br("<span class=image main><img src=images/fistbump.png width=200 height=200 /></span>");
                    echo nl2br("<br><br>&nbsp DB connection successful to: &nbsp <strong><i>$ep</i></strong>");
                } else {
                    include ('settings-form.php');
                }
                ?>
                <br>

            </article>

            <!-- popmssql -->
            <article id="popmssql">
                <h2 class="major">Populate MSSQL</h2>
                <span class="image main"><img src="images/Teremana.png" alt="" /></span>
                <?php
                include("popmssql.php");
                ?>
                <form method="post">
                    <button type="submit" name="populate" value="Populate DB">
                </form>
                <br>

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