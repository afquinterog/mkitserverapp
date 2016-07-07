<?php

$servername = "localhost";
$username = "db-user";
$password = "CdJsBHeMMO0zrPg";
$dbname = "mkit";

/*
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "mkit";
*/


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
$memData = explode("|", $mem);
$mem = $memData[1];
$memTmp = $memData[0];
$memTmp = explode("/", $memTmp);
$memTotal = $memTmp[1];

//Get memory without cache and buffers
$memc = isset($_GET["memc"]) ? $_GET["memc"] : 0;
$memCache = 0;

if( $memc > 0 && $memTotal >0 ){
	$memCache = $memc * 100 / $memTotal; 	
}

$cpu    = $_GET["cpu"];
$server = $_GET["server"];
$con    = isset($_GET["con"]) ? $_GET["con"] : "0";
$ip    = isset($_GET["ip"]) ? $_GET["ip"] : "0";

echo " $disk - $mem - $memCache - $cpu - $con - $ip <br/>";


///$server = 1;
//$cpu = "50";;
//$memory = "50";
//$disk = "50";

$sql = "INSERT INTO metrics (server, cpu, memory, memory_cache, disk, connections, ip, date)
VALUES ('$server', '$cpu', '$mem','$memCache' , '$disk', $con , $ip , now() )";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

 ?>
