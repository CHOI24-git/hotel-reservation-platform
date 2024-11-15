<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 데이터베이스 연결 정보 설정
$servername = "192.168.21.5";
$username = "super"; // 데이터베이스 사용자 이름
$password = "1234"; // 데이터베이스 비밀번호
$dbname = "jjakDB";

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4"); // UTF-8 설정

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 폼에서 회원가입 데이터 가져오기
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$id = $_POST['id'];
$passwd = $_POST['passwd']; // 사용자 입력 비밀번호
$addr = $_POST['addr'];

// 비밀번호 암호화
$hashed_password = password_hash($passwd, PASSWORD_DEFAULT); // 비밀번호 해시화

// 데이터 삽입 쿼리
$stmt = $conn->prepare("INSERT INTO memberTB (name, phone, email, id, passwd, addr) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $phone, $email, $id, $hashed_password, $addr);

// 쿼리 실행 및 결과 확인
if ($stmt->execute()) {
    // JavaScript로 경고창 띄우고 로그인 페이지로 이동
    echo "<script>
            alert('회원가입이 완료되었습니다!');
            window.location.href = 'login.php';
          </script>";
    exit();
} else {
    echo "회원가입 오류: " . $stmt->error;
}

// 연결 종료
$stmt->close();
$conn->close();
?>
