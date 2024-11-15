<?php
// 데이터베이스 연결
$servername = "192.168.21.5";
$username = "super";
$password = "1234";
$dbname = "jjakDB";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 객실 종류를 GET 요청으로 받습니다.
$room_type = $_GET['room_type'];

// 가용한 방 ID를 검색하는 쿼리
$sql = "SELECT room_id FROM roomTB WHERE room_type = ? AND available_rooms > 0 LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $room_type);
$stmt->execute();
$result = $stmt->get_result();

$response = [];
if ($row = $result->fetch_assoc()) {
    $response['room_id'] = $row['room_id'];
} else {
    $response['room_id'] = null; // 가용한 방이 없으면 null 반환
}

echo json_encode($response); // JSON 형식으로 반환
$stmt->close();
$conn->close();
?>