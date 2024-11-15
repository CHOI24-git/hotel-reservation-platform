<?php
// 데이터베이스 연결 정보 설정
$servername = "192.168.21.5";
$username = "super"; // 데이터베이스 사용자 이름
$password = "1234"; // 데이터베이스 비밀번호
$dbname = "jjakDB";

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 폼에서 회원가입 데이터 가져오기
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$id = $_POST['id'];
$passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT); // 비밀번호 암호화
$grade = $_POST['grade'] ?? '일반'; // 기본 등급을 '일반'으로 설정
$addr = $_POST['addr'];
$regdate = date('Y-m-d'); // 현재 날짜를 가입일로 설정

// 데이터 삽입 쿼리
$stmt = $conn->prepare("INSERT INTO memberTB (name, phone, email, id, passwd, regdate, grade, addr) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $name, $phone, $email, $id, $passwd, $regdate, $grade, $addr);

// 쿼리 실행 및 결과 확인
if ($stmt->execute()) {
    echo "회원가입이 완료되었습니다!";
} else {
    echo "회원가입 오류: " . $stmt->error;
}

// 연결 종료
$stmt->close();
$conn->close();
?>
