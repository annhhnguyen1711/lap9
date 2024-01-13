<?php

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
include 'config.php';
global $conn;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }

        h2, h4 {
            color: #007bff;
        }
        p {            margin-bottom: 5px;}
    </style>
</head>

<body>

<div class="container mt-5">
    <h2 class="mb-4">Chi Tiết Đơn Hàng Của Mỗi Khách Hàng</h2>

    <?php
    $sql = "SELECT Customer.cid, Customer.name AS customer_name, Orders.oid, Orders.date, Orders.quantity, Product.pid, Product.name AS product_name, Order_Detail.price, Order_Detail.discount
        FROM Customer
        INNER JOIN Orders ON Customer.cid = Orders.cid
        INNER JOIN Order_Detail ON Orders.oid = Order_Detail.oid
        INNER JOIN Product ON Order_Detail.pid = Product.pid
        ORDER BY Customer.cid, Orders.oid";



    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $currentCustomerId = 0;

        while ($row = $result->fetch_assoc()) {
            if ($currentCustomerId != $row['cid']) {
                // In thông tin khách hàng
                echo "<h4 class='mt-4'>Khách hàng: " . $row['customer_name'] . "</h4>";
                $currentCustomerId = $row['cid'];
            }

            // In thông tin đơn hàng
            echo "<p><strong>Đơn hàng #" . $row['oid'] . "</strong></p>";
            echo "<p>Ngày đặt hàng: " . $row['date'] . "</p>";
            echo "<p>Số lượng: " . $row['quantity'] . "</p>";

            // In thông tin sản phẩm
            echo "<p><strong>Sản phẩm: <a href='product_detail.php?pid=" . $row['pid'] . "'> " . $row['product_name'] . "</a></strong></p>";
            echo "<p>Giá: $" . $row['price'] . "</p>";
            echo "<p>Chiết khấu: $" . $row['discount'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "<p>Không có dữ liệu.</p>";
    }
    ?>
</div>
<div class="container mt-5">
    <strong>Danh Sách Sản Phẩm Đang Có Trong Shop : </strong>
    <?php
    $sql = "SELECT * FROM Product";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<strong><a href='product_detail.php?pid=" . $row['pid'] .  "'>" . $row['name'] . " , </a></strong>";
        }
    } else {
        echo "<p>Hết hàng rồi.</p>";
    }
    $conn->close();
    ?>
</div>
</body>

</html><?php

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
include 'config.php';
global $conn;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }

        h2, h4 {
            color: #007bff;
        }
        p {            margin-bottom: 5px;}
    </style>
</head>

<body>

<div class="container mt-5">
    <h2 class="mb-4">Chi Tiết Đơn Hàng Của Mỗi Khách Hàng</h2>

    <?php
    $sql = "SELECT Customer.cid, Customer.name AS customer_name, Orders.oid, Orders.date, Orders.quantity, Product.pid, Product.name AS product_name, Order_Detail.price, Order_Detail.discount
        FROM Customer
        INNER JOIN Orders ON Customer.cid = Orders.cid
        INNER JOIN Order_Detail ON Orders.oid = Order_Detail.oid
        INNER JOIN Product ON Order_Detail.pid = Product.pid
        ORDER BY Customer.cid, Orders.oid";



    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $currentCustomerId = 0;

        while ($row = $result->fetch_assoc()) {
            if ($currentCustomerId != $row['cid']) {
                // In thông tin khách hàng
                echo "<h4 class='mt-4'>Khách hàng: " . $row['customer_name'] . "</h4>";
                $currentCustomerId = $row['cid'];
            }

            // In thông tin đơn hàng
            echo "<p><strong>Đơn hàng #" . $row['oid'] . "</strong></p>";
            echo "<p>Ngày đặt hàng: " . $row['date'] . "</p>";
            echo "<p>Số lượng: " . $row['quantity'] . "</p>";

            // In thông tin sản phẩm
            echo "<p><strong>Sản phẩm: <a href='product_detail.php?pid=" . $row['pid'] . "'> " . $row['product_name'] . "</a></strong></p>";
            echo "<p>Giá: $" . $row['price'] . "</p>";
            echo "<p>Chiết khấu: $" . $row['discount'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "<p>Không có dữ liệu.</p>";
    }
    ?>
</div>
<div class="container mt-5">
    <strong>Danh Sách Sản Phẩm Đang Có Trong Shop : </strong>
    <?php
    $sql = "SELECT * FROM Product";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<strong><a href='product_detail.php?pid=" . $row['pid'] .  "'>" . $row['name'] . " , </a></strong>";
        }
    } else {
        echo "<p>Hết hàng rồi.</p>";
    }
    $conn->close();
    ?>
</div>
</body>

</html>