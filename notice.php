<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항 - 저짝어뗘</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/favicon.png" type="image/png">> <!-- 파비콘 추가 -->
    <style>
        .notice-container {
            max-width: 800px; /* 최대 너비 설정 */
            margin: 20px auto; /* 중앙 정렬 */
            padding: 20px; /* 패딩 추가 */
            background-color: #fff; /* 배경색 흰색 */
            border-radius: 8px; /* 모서리 둥글게 */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* 그림자 효과 */
        }

        h2 {
            text-align: center; /* 제목 중앙 정렬 */
            margin-bottom: 20px; /* 아래 여백 추가 */
        }

        .notice-item {
            padding: 15px; /* 각 공지사항 항목의 패딩 */
            border-bottom: 1px solid #ddd; /* 아래쪽 테두리 */
            transition: background-color 0.3s; /* 배경색 변화 애니메이션 */
        }

        .notice-item:last-child {
            border-bottom: none; /* 마지막 항목 테두리 없애기 */
        }

        .notice-item:hover {
            background-color: #f9f9f9; /* 마우스 오버 시 배경색 변화 */
        }

        .notice-date {
            color: #999; /* 날짜 색상 회색 */
            font-size: 0.9em; /* 작은 글씨 */
        }

        .notice-title {
            font-weight: bold; /* 제목 굵게 */
            font-size: 1.1em; /* 제목 크기 조정 */
        }
    </style>
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
            <a href="signup.php">회원가입</a>
        </nav>
    </header>

    <main>
        <div class="notice-container">
            <h2>공지사항</h2>
            <div class="notice-item">
                <div class="notice-title">1월 4차 저짝어뗘 응원하기 이벤트</div>
                <div class="notice-date">2024.01.22</div>
            </div>
            <div class="notice-item">
                <div class="notice-title">1월 더블쿠폰 핫세일 더블 페이백 이벤트</div>
                <div class="notice-date">2024.01.19</div>
            </div>
            <div class="notice-item">
                <div class="notice-title">1월 3차 저짝어뗘 응원하기 이벤트</div>
                <div class="notice-date">2024.01.15</div>
            </div>
            <div class="notice-item">
                <div class="notice-title">12월 리뷰왕을 찾습니다 당첨 안내</div>
                <div class="notice-date">2024.01.12</div>
            </div>
            <div class="notice-item">
                <div class="notice-title">저짝어뗘 연말결산 이벤트</div>
                <div class="notice-date">2024.01.09</div>
            </div>
            <div class="notice-item">
                <div class="notice-title">1월 2차 저짝어뗘 응원하기 이벤트</div>
                <div class="notice-date">2024.01.08</div>
            </div>
            <div class="notice-item">
                <div class="notice-title">1월 1차 저짝어뗘 응원하기 이벤트</div>
                <div class="notice-date">2024.01.02</div>
            </div>
            <div class="notice-item">
                <div class="notice-title">12월 4차 저짝어뗘 응원하기 이벤트</div>
                <div class="notice-date">2023.12.26</div>
            </div>
            <div class="notice-item">
                <div class="notice-title">12월 더블텐데이 2배 페이백 이벤트</div>
                <div class="notice-date">2023.12.20</div>
            </div>
            <div class="notice-item">
                <div class="notice-title">12월 3차 저짝어뗘 응원하기 이벤트</div>
                <div class="notice-date">2023.12.18</div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 저짝어뗘. 모든 권리 보유.</p>
    </footer>
</body>
</html>
