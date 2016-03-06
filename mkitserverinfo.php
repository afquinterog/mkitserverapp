<?php
$servername = "localhost";
$username = "db-user";
$password = "CdJsBHeMMO0zrPg";
$dbname = "mkit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";


// 40%|/dev/xvda1|
$disk = $_GET["disk"];
$disk = explode("|", $disk);
$disk = $disk[0];

//869/992|87.60|
$mem = $_GET["mem"];
$mem = explode("|", $mem);
$mem = $mem[1];

$cpu    = $_GET["cpu"];
$server = $_GET["server"];
$con    = isset($_GET["con"]) ? $_GET["con"] : "0";

echo " $disk - $mem - $cpu - $con <br/>";


///$server = 1;
//$cpu = "50";;
//$memory = "50";
//$disk = "50";

$sql = "INSERT INTO metrics (server, cpu, memory, disk, connections, date)
VALUES ('$server', '$cpu', '$mem', '$disk', $con , now() )";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



 ?>
