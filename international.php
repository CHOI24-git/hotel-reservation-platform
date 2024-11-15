<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>해외숙소 - 저짝어뗘</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/favicon.png" type="image/png">> <!-- 파비콘 추가 -->
    <style>
        .hotel-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin: 20px;
        }
        .hotel-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .hotel-item img {
            width: 150px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 20px;
        }
        .hotel-details {
            flex-grow: 1;
        }
        .hotel-details h3 {
            margin: 0;
            font-size: 1.2em;
        }
        .hotel-details p {
            margin: 5px 0;
            color: #666;
        }
        .hotel-price {
            font-weight: bold;
            color: #FF4752;
            font-size: 1.1em;
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
        <section>
            <h2>해외 숙소</h2>
            <div class="hotel-list">
                <div class="hotel-item">
                    <img src="images/hotelA.jpg" alt="뉴욕 호텔">
                    <div class="hotel-details">
                        <h3>Hilton New York Midtown</h3>
                        <p>미국 뉴욕</p>
                        <div class="hotel-price">₩300,000/박</div>
                    </div>
                </div>
                <div class="hotel-item">
                    <img src="images/hotelB.jpg" alt="파리 호텔">
                    <div class="hotel-details">
                        <h3>The Ritz-Carlton</h3>
                        <p>프랑스 파리</p>
                        <div class="hotel-price">₩350,000/박</div>
                    </div>
                </div>
                <div class="hotel-item">
                    <img src="images/hotelC.jpg" alt="도쿄 호텔">
                    <div class="hotel-details">
                        <h3>Shangri-La Hotel</h3>
                        <p>일본 도쿄</p>
                        <div class="hotel-price">₩320,000/박</div>
                    </div>
                </div>
                <div class="hotel-item">
                    <img src="images/hotelD.jpg" alt="로마 호텔">
                    <div class="hotel-details">
                        <h3>Hotel Danieli</h3>
                        <p>이탈리아 베니스</p>
                        <div class="hotel-price">₩400,000/박</div>
                    </div>
                </div>
                <div class="hotel-item">
                    <img src="images/hotelE.jpg" alt="방콕 호텔">
                    <div class="hotel-details">
                        <h3>Mandarin Oriental</h3>
                        <p>태국 방콕</p>
                        <div class="hotel-price">₩280,000/박</div>
                    </div>
                </div>
                <div class="hotel-item">
                    <img src="images/hotelF.jpg" alt="상하이 호텔">
                    <div class="hotel-details">
                        <h3>JW Marriott Hotel</h3>
                        <p>중국 상하이</p>
                        <div class="hotel-price">₩310,000/박</div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 저짝어뗘. 모든 권리 보유.</p>
    </footer>
</body>
</html>
