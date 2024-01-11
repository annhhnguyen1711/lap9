<?php
$severname = "Localhost:3306";
$username= "root";
$password ="";
$dbname="ecommercedb";
global $conn;
$conn = new mysqli($severname,$username,$password,$dbname);

if ($conn->connect_errno){
    die("Connection failed:" . $conn->connect_errno);
}
?>