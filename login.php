<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 - 저짝어뗘</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/favicon.png" type="image/png">> <!-- 파비콘 추가 -->
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php">
                <img src="logo.png" alt="여기어때 로고" />
            </a>
        </div>
        <nav>
            <a href="signup.php">회원가입</a>
        </nav>
    </header>

    <main class="login-container">
        <h2>로그인</h2>
        <form action="login_process.php" method="POST">
            <div class="form-group">
                <label for="id">아이디:</label>
                <input type="text" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="passwd">비밀번호:</label>
                <input type="password" id="passwd" name="passwd" required>
            </div>
            <button type="submit" class="login-button">로그인</button>
            <div class="options">
                <label>
                    <input type="checkbox"> 자동 로그인
                </label>
                <a href="#">아이디 찾기</a> | <a href="#">비밀번호 찾기</a>
            </div>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 저짝어뗘. 모든 권리 보유.</p>
    </footer>
</body>
</html>
