<?php
  session_start();
  if(isset($_POST['populate'])) { 
    $ep = $_POST['endpoint'];
    $db = $_POST['database'];
    $un = $_POST['username'];
    $pa = $_POST['password'];

    $_SESSION['ep'] = $ep;
    $_SESSION['db'] = $db;
    $_SESSION['un'] = $un;
    $_SESSION['pa'] = $pa;

    try {
          $conn = new PDO("sqlsrv:server = tcp:$ep,1433; Database = $db", "$un", "$pa");
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $tableName = 'Teremana';
          $query = "CREATE TABLE $tableName ([c1_int] stock, [c2_varchar] store)";
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

          $query = "INSERT INTO [$tableName] (c1_int, c2_varchar) VALUES (100, 'NorthBridge)";
          $stmt = $conn->query($query);
          unset($stmt);

          echo "DB Updated";

        }
      catch (PDOException $e) {
          print("Error connecting to SQL Server.");
          die(print_r($e));
        }
  } 
?> 