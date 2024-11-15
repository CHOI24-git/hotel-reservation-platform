<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include 'db_connection.php'; // 데이터베이스 연결 파일

// 로그인 폼에서 입력된 데이터 받기
$id = $_POST['id'];
$passwd = $_POST['passwd'];

// 데이터베이스에서 사용자 조회
$query = "SELECT number, passwd FROM memberTB WHERE id = ?";
$stmt = $conn->prepare($query);
if (!$stmt) {
    die("쿼리 준비 오류: " . $conn->error);
}
$stmt->bind_param("s", $id);
$stmt->execute();
$stmt->bind_result($number, $hashed_password);
$stmt->fetch();

// 비밀번호 검증
if (password_verify($passwd, $hashed_password)) {
    $_SESSION['number'] = $number;
    header("Location: index.php"); // 로그인 성공 시 메인 페이지로 이동
    exit();
} else {
    echo "<script>alert('아이디 또는 비밀번호가 잘못되었습니다.');history.back();</script>";
}

$stmt->close();
$conn->close();
?>