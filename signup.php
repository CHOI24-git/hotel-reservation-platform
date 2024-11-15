<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 - 저짝어뗘</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/favicon.png" type="image/png"> <!-- 파비콘 추가 -->
</head>
<body>

    <header>
        <div class="logo">
            <a href="index.php">
                <img src="logo.png" alt="저짝어뗘 로고" />
            </a>
        </div>
        <nav>
            <a href="login.php">로그인</a>
        </nav>
    </header>

    <main class="signup-container">
        <h2>회원가입</h2>
        <form action="signup_process.php" method="POST">
            <div>
                <label for="name">name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="phone">phone:</label>
                <input type="tel" id="phone" name="phone" required placeholder="010-0000-0000">
            </div>
            <div>
                <label for="email">e-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="id">id:</label>
                <input type="text" id="id" name="id" required>
            </div>
            <div>
                <label for="passwd">password:</label>
                <input type="password" id="passwd" name="passwd" required>
            </div>
            <div>
                <label for="addr">address:</label>
                <input type="text" id="addr" name="addr">
            </div>
            <button type="submit">회원가입</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 저짝어뗘. 모든 권리 보유.</p>
    </footer>
</body>
</html>
