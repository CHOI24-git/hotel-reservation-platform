<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>저짝어뗘 - 호텔 예약</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/favicon.png" type="image/png">
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php">
                <img src="logo.png" alt="저짝어뗘 로고" />
            </a>
        </div>
        <nav>
            <?php if (isset($_SESSION['number'])): ?>
                <!-- 로그인 상태라면 마이페이지 탭 표시 -->
                <a href="mypage.php">마이페이지</a>
                <a href="logout.php">로그아웃</a> <!-- 로그아웃 링크 -->
            <?php else: ?>
                <!-- 로그인 상태가 아니라면 로그인/회원가입 탭 표시 -->
                <a href="login.php">로그인</a>
                <a href="signup.php">회원가입</a>
            <?php endif; ?>
        </nav>

    </header>

    <main>
        <section class="search">
            <div class="search-background">
                <h2>어디로 떠나볼까요?</h2>
                <input type="text" placeholder="여행지나 숙소를 검색해보세요." />
                <div class="date-guest-container"> <!-- 새로 추가한 컨테이너 -->
                    <div class="date-picker">
                       <input type="date" id="check-in" />
                     <input type="date" id="check-out" />
                    </div>
                    <div class="guest-count">
                        <label for="guest">인원:</label>
                        <select id="guest">
                            <option value="1">1명</option>
                            <option value="2">2명</option>
                            <option value="3">3명</option>
                            <option value="4">4명</option>
                            <option value="5">5명</option>
                            <option value="6">6명</option>
                        </select>
                    </div>
                </div>
                <button id="search-button" onclick="redirectToReservation()">예약하기</button>
            </div>
        </section>

        <section class="events">
            <h2>이벤트</h2>
            <div class="event">
                <h3>11월 제휴 추가 할인!</h3>
            </div>
            <div class="event">
                <h3>해외 얼리버드 혜택</h3>
            </div>
            <div class="event">
                <h3>국내 인기 여행지 숙소 할인!</h3>
            </div>
        </section>

        <section class="tabs">
            <div class="tab-container">
                <button class="tab-button" onclick="window.location.href='domestic.php'">국내숙소</button>
                <button class="tab-button" onclick="window.location.href='international.php'">해외숙소</button>
                <button class="tab-button" onclick="window.location.href='notice.php'">공지사항</button>
                <button class="tab-button" onclick="window.location.href='faq.php'">FAQ</button>
            </div>
        </section>

        <section class="banner-slider">
            <div class="banner">
                <img id="banner-image" src="banner1.jpg" alt="배너 이미지" />
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 저짝어뗘. 모든 권리 보유.</p>
    </footer>
    
    <script>
        function redirectToReservation() {
            // 체크인, 체크아웃 날짜와 인원을 가져와서 URL에 추가
            const checkInDate = document.getElementById("check-in").value;
            const checkOutDate = document.getElementById("check-out").value;
            const guests = document.getElementById("guest").value;

            // reservation.php로 이동하며 필요한 정보들을 쿼리 파라미터로 전달
            window.location.href = `reservation.php?check_in=${checkInDate}&check_out=${checkOutDate}&guests=${guests}`;
        }
    </script>
    <script src="app.js"></script>
</body>
</html>
