<?php

//Thực hiện kế nối đến cơ sở dữ liệu
$host= "localhost:3306";
$username = "root";
$password = "";
$database = "fptaptechdb";

$conn = new mysqli($host,$username,$password,$database);

//Kiểm tra kết nối
if ($conn->connect_errno){
    die("Kết nối đến cơ sở dữ liệu thất bại:" . $conn->connect_errno);
}

//Xử lý thông tin đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username =$_POST["username"];
    $password =$_POST["password"];

    //Thực hiện truy vấn để kiểm tra thông tin đăng nhập
    $query = "SELECT * FROM Account WHERE username=' $username' AND  pasword='$password'";
    $result = $conn->query($query);

    if($result->num_rows > 0 ){
        echo "Đăng nhập thành công!";
        header("Location:dashboard.php");
    }else{
        echo "Đăng nhập thất bại, Vui lòng kiểm tra lại thông tin đăng nhập. ";
    }
}

//Đóng kết nối sau khi kiểm tra
$conn->close();

?>