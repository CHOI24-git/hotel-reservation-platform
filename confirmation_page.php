<?php
session_start(); // 세션 시작

// 세션 값이 없는 경우에 대한 유효성 검사
if (!isset($_SESSION['reserv_n'])) {
    echo "<script>
            alert('유효하지 않은 접근입니다.');
            window.location.href = 'index.php';
          </script>";
    exit();
}

// 예약 번호 설정
$reserv_n = $_SESSION['reserv_n'];

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
$reserv_n = isset($_GET['reserv_n']) ? intval($_GET['reserv_n']) : (isset($_SESSION['reserv_n']) ? $_SESSION['reserv_n'] : 0);          // 예약 번호
$total_price = isset($_GET['total_price']) ? floatval($_GET['total_price']) : (isset($_SESSION['total_price']) ? $_SESSION['total_price'] : 0); // 총 결제 금액
$pay_method = isset($_GET['pay_method']) ? $_GET['pay_method'] : (isset($_SESSION['pay_method']) ? $_SESSION['pay_method'] : '');              // 고객이 선택한 결제 방법

// 유효성 검사 수정
if ($reserv_n <= 0) {
    echo "<script>
            alert('유효하지 않은 예약 번호입니다.');
            window.history.back();
          </script>";
    exit();
}

if ($total_price <= 0) {
    echo "<script>
            alert('유효하지 않은 결제 금액입니다.');
            window.history.back();
          </script>";
    exit();
}

// 결제 방법 유효성 검사 강화
$valid_pay_methods = ['카드 결제', '무통장입금', '투스페이', '카카페이'];
if (!in_array($pay_method, $valid_pay_methods)) {
    echo "<script>
            alert('유효하지 않은 결제 방법입니다.');
            window.history.back();
          </script>";
    exit();
}

$status = '결제대기';                     // 기본 상태 설정
$pay_at = date('Y-m-d H:i:s');            // 결제 시각

// 결제 정보 삽입
$stmt = $conn->prepare("INSERT INTO paymentTB (reserv_n, total_price, pay_method, status, pay_at) VALUES (?, ?, ?, ?, ?)"); 
if (!$stmt) {
    // 에러 로그 기록 추가
    error_log("Prepare failed: " . $conn->error);
    die("문제가 발생했습니다. 관리자에게 문의해주세요.");
}

$stmt->bind_param("idsss", $reserv_n, $total_price, $pay_method, $status, $pay_at);

if ($stmt->execute()) {
    // 예약 및 결제 정보 세션에 저장
    $_SESSION['reserv_n'] = $reserv_n;
    $_SESSION['total_price'] = $total_price;
    $_SESSION['pay_method'] = $pay_method;

    // 예약 확인 페이지로 리디렉션
    header("Location: confirmation_page.php?reserv_n=$reserv_n");
    exit();
} else {
    echo "<script>
            alert('결제 오류: " . addslashes($stmt->error) . "');
            window.history.back();
          </script>";
}

$stmt->close();
$conn->close();
?>