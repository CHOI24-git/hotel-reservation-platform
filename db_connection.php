<?php
$servername = "192.168.21.5";
$username = "super";
$password = "1234";
$dbname = "jjakDB";

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4"); // UTF-8 설정
?>
