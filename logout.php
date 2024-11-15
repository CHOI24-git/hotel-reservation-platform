<?php
session_start(); // 세션 시작

// 세션 변수 모두 제거
$_SESSION = [];

// 세션 종료
session_destroy();

// index.php로 리디렉션
header("Location: index.php");
exit();
?>
