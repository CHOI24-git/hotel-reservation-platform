<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>국내숙소 - 저짝어뗘</title>
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
            <h2>국내 숙소</h2>
            <div class="hotel-list">
                <div class="hotel-item">
                    <img src="images/hotel1.jpg" alt="서울 쉐라톤 호텔">
                    <div class="hotel-details">
                        <h3>서울 쉐라톤 호텔</h3>
                        <p>서울특별시 강남구</p>
                        <div class="hotel-price">₩200,000/박</div>
                    </div>
                </div>
                <div class="hotel-item">
                    <img src="images/hotel2.jpg" alt="부산 파라다이스 호텔">
                    <div class="hotel-details">
                        <h3>부산 파라다이스 호텔</h3>
                        <p>부산광역시 해운대구</p>
                        <div class="hotel-price">₩250,000/박</div>
                    </div>
                </div>
                <div class="hotel-item">
                    <img src="images/hotel11.jpg" alt="서울 튼튼 호텔">
                    <div class="hotel-details">
                        <h3>서울 튼튼 호텔</h3>
                        <p>서울특별시 관악구</p>
                        <div class="hotel-price">₩250,000/박</div>
                    </div>
                </div>
                <div class="hotel-item">
                    <img src="images/hotel3.jpg" alt="제주 신라 호텔">
                    <div class="hotel-details">
                        <h3>제주 신라 호텔</h3>
                        <p>제주특별자치도 서귀포시</p>
                        <div class="hotel-price">₩300,000/박</div>
                    </div>
                </div>
                <div class="hotel-item">
                    <img src="images/hotel4.jpg" alt="인천 그랜드 호텔">
                    <div class="hotel-details">
                        <h3>인천 그랜드 호텔</h3>
                        <p>인천광역시 연수구</p>
                        <div class="hotel-price">₩180,000/박</div>
                    </div>
                </div>
                <div class="hotel-item">
                    <img src="images/hotel5.jpg" alt="경주 힐튼 호텔">
                    <div class="hotel-details">
                        <h3>경주 힐튼 호텔</h3>
                        <p>경상북도 경주시</p>
                        <div class="hotel-price">₩220,000/박</div>
                    </div>
                </div>
                <div class="hotel-item">
                    <img src="images/hotel6.jpg" alt="속초 마리나 리조트">
                    <div class="hotel-details">
                        <h3>속초 마리나 리조트</h3>
                        <p>강원도 속초시</p>
                        <div class="hotel-price">₩210,000/박</div>
                    </div>
                </div>
                <div class="hotel-item">
                    <img src="images/hotel7.jpg" alt="대구 프리미어 호텔">
                    <div class="hotel-details">
                        <h3>대구 프리미어 호텔</h3>
                        <p>대구광역시 중구</p>
                        <div class="hotel-price">₩195,000/박</div>
                    </div>
                </div>
                <div class="hotel-item">
                    <img src="images/hotel8.jpg" alt="광주 노블레스 호텔">
                    <div class="hotel-details">
                        <h3>광주 노블레스 호텔</h3>
                        <p>광주광역시 서구</p>
                        <div class="hotel-price">₩230,000/박</div>
                    </div>
                </div>
                <div class="hotel-item">
                    <img src="images/hotel9.jpg" alt="여수 라마다 호텔">
                    <div class="hotel-details">
                        <h3>여수 라마다 호텔</h3>
                        <p>전라남도 여수시</p>
                        <div class="hotel-price">₩240,000/박</div>
                    </div>
                </div>
                <div class="hotel-item">
                    <img src="images/hotel10.jpg" alt="평창 알펜시아 리조트">
                    <div class="hotel-details">
                        <h3>평창 알펜시아 리조트</h3>
                        <p>강원도 평창군</p>
                        <div class="hotel-price">₩280,000/박</div>
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
