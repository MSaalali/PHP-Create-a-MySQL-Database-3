<?php
echo "<h1>PHP MySQL Insert Data</h1>";
$servername = "localhost";
$username = "root";
$password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbname = $_POST["dbname"];
    try {
        $mydb = new PDO("mysql:host=$servername", $username, $password);
        $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE $dbname";
        $mydb->exec($sql);
        echo "<p class='demo1' >Database successfully created</p>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datadell"; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tableName = $_POST["tableName"];
    $column1 = $_POST["column1"];
    $column2 = $_POST["column2"];
    $column3 = $_POST["column3"];
    $column4 = $_POST["column4"];

    try {
        $mydb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE $tableName (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                $column1 VARCHAR(30) NOT NULL,
                $column2 VARCHAR(30) NOT NULL,
                $column3 VARCHAR(30) NOT NULL,
                $column4 VARCHAR(50) NOT NULL,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
        $mydb->exec($sql);
        echo "Table $tableName created successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        Database name: <input type="text" name="dbname"><br>
        <input type="submit" value="Create Database" class="dtName">
        Table name:<input type="text" name="tableName" class="tablename">
        Column 1:<input type="text" name="column1" class="clmn">
        Column 2:<input type="text" name="column2" class="clmn">
        Column 3:<input type="text" name="column3" class="clmn">
        Column 4:<input type="text" name="column4" class="clmn"><br>
        <input type="submit" value="Create Table">
    </form>
    <style>
 body {
  position: relative;
  background-color: white;
  background-repeat: no-repeat;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0.001px;
}

input {
  background-color: ;
  border-radius: 50px;
  height: 30px;
  width: 160px;
}

.clmn {
  background-color: #eeeeee;
  border-radius: 50px;
  height: 20px;
  width: 260px;
}

.tablename {
  background-color: #eeeeee;
  border-radius: 50px;
  height: 20px;
  width: 260px;
}
.demo1{
    color: green;
}

    </style>
</body>
</html>
