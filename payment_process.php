<?php
session_start(); // 세션 시작

// 데이터베이스 연결 설정
$servername = "192.168.21.5";
$username = "super";
$password = "1234";
$dbname = "jjakDB";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 결제 정보 가져오기
$reserv_n = intval($_GET['reserv_n']);          // 예약 번호
$total_price = floatval($_GET['total_price']); // 총 결제 금액
$pay_method = $_GET['pay_method'];              // 고객이 선택한 결제 방법

// 결제 방법이 비어있을 경우 에러 처리
if (empty($pay_method)) {
    echo "<script>
            alert('결제 방법을 선택해야 합니다.');
            window.history.back();
          </script>";
    exit();
}

$status = '결제대기';                     // 기본 상태 설정
$pay_at = date('Y-m-d H:i:s');            // 결제 시각

// 결제 정보 삽입
$stmt = $conn->prepare("INSERT INTO paymentTB (reserv_n, total_price, pay_method, status, pay_at) VALUES (?, ?, ?, ?, ?)"); 
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("idsss", $reserv_n, $total_price, $pay_method, $status, $pay_at);

if ($stmt->execute()) {
    // 예약 및 결제 정보 세션에 저장
    $_SESSION['reserv_n'] = $reserv_n;
    $_SESSION['total_price'] = $total_price;
    $_SESSION['pay_method'] = $pay_method;

  // 예약 완료 메시지 출력
    echo "<script>
            alert('예약이 완료되었습니다!');
            window.location.href = 'index.php'; // 메인 페이지로 이동
          </script>";
} else {
    echo "<script>
            alert('결제 오류: " . addslashes($stmt->error) . "');
            window.history.back();
          </script>";
}

$stmt->close();
$conn->close();
?>