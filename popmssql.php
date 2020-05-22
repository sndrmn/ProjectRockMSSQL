<?php
  if(isset($_POST['populate'])) { 
    session_start();
    $ep = $_SESSION['ep'];
    $db = $_SESSION['db'];
    $un = $_SESSION['un'];
    $pa = $_SESSION['pa'];

    try {
          echo "IN";
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

          echo "DB Updated";

        }
      catch (PDOException $e) {
          print("Error connecting to SQL Server.");
          die(print_r($e));
        }
  }
?> 