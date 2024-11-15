<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // 세션 시작

// 데이터베이스 연결 설정
$servername = "192.168.21.5";
$username = "super"; // 데이터베이스 사용자 이름
$password = "1234"; // 데이터베이스 비밀번호
$dbname = "jjakDB";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 세션에서 사용자 고유 ID(number) 가져오기
if (isset($_SESSION['number'])) {
    $number = $_SESSION['number']; // 세션에서 'number' 가져오기
} else {
    // 세션에 number 값이 없으면 로그인 페이지로 리디렉션
    echo "<script>
            alert('로그인 후 예약 바랍니다.');
            window.location.href = 'login.php';
          </script>";
    exit();
}

// 폼 데이터 가져오기
$name = $_POST['name'];
$guest_phone = $_POST['guest_phone'];
$check_in = $_POST['check_in'];
$check_out = $_POST['check_out'];
$guests = $_POST['guests'];
$room_t = $_POST['room_t'];
$branch = $_POST['branch'];
$total_price = $_POST['total_price']; // 총 금액 받기
$room_id = $_POST['room_id'];
$pay_method = $_POST['pay_method'];

// 데이터 삽입 쿼리 준비 (reserv_date는 서버에서 자동으로 설정)
$stmt = $conn->prepare("INSERT INTO reservTB (number, name, guest_phone, check_in, check_out, guests, room_t, branch, total_price, room_id, pay_method, reserv_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

if (!$stmt) {
    die("Prepare failed: " . $conn->error); // 쿼리 준비 실패 시 에러 메시지 출력
}

// 데이터 타입 바인딩 수정
$stmt->bind_param("issssissdis", $number, $name, $guest_phone, $check_in, $check_out, $guests, $room_t, $branch, $total_price, $room_id, $pay_method);

if ($stmt->execute()) {
    // 예약 성공 시 예약 번호 가져오기
    $reserv_n = $conn->insert_id;

    // reservation_API.php 파일 포함 (예약이 성공한 후에 발동)
    include 'reservation_API.php';

    // 여기에서 API의 특정 기능 호출 (예: 예약 관련 알림 또는 추가 처리)
    processReservationAPI($reservationData);

    // 예약 완료 후 payment_process.php로 리디렉션
    header("Location: payment_process.php?reserv_n=$reserv_n&total_price=$total_price&pay_method=$pay_method"); // pay_method 추가
    exit();
}


$stmt->close();
$conn->close();
?>
