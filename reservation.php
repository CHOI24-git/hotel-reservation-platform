<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>튼튼호텔 - 예약 확인 및 결제</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/favicon.png" type="image/png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #fff;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .logo img {
            width: 20%;
            height: auto;
        }
        nav a {
            color: #333;
            text-decoration: none;
            padding: 0 15px;
            font-size: 1em;
        }
        nav a:hover {
            color: #FF4752;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .hotel-info {
            text-align: center;
            margin-bottom: 20px;
        }
        .hotel-info img {
            width: 100%; /* 가로 너비를 100%로 설정 */
            height: 400px; /* 고정된 높이 설정 */
            object-fit: cover; /* 이미지가 영역을 넘치지 않도록 자르기 */
            border-radius: 8px;
            transition: opacity 0.5s ease;
        }
        h1, h2 {
            color: #333;
            text-align: center;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"],
        input[type="tel"],
        input[type="datetime-local"],
        select,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 15px;
            background-color: #FF4752;
            color: #fff;
            font-size: 1.1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background-color: #e03e48;
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
    <div class="container">
        <section class="hotel-info">
            <h2>튼튼호텔 예약</h2>
            <img id="hotel-image" src="images/tnhotel1.jpg" alt="튼튼호텔 이미지">
        </section>

        <section class="reservation-form">
            <h2>예약 정보 입력</h2>
            <form id="reservationForm" action="reservation_process.php" method="POST"> <!-- action 속성 추가 -->

                <label for="name">예약자 이름:</label>
                <input type="text" id="name" name="name" required>

                <label for="guest_phone">휴대폰 번호:</label>
                <input type="tel" id="guest_phone" name="guest_phone" required placeholder="010-0000-0000">
                
                <label for="branch">지점 선택:</label>
                <select id="branch" name="branch" onchange="enableDateSelection()">
                    <option value="">지점을 선택하세요</option>
                    <option value="서울">서울</option>
                    <option value="부산">부산</option>
                    <option value="강릉">강릉</option>
                    <option value="제주">제주</option>
                </select>

                <label for="check_in">체크인 날짜:</label>
                <input type="date" id="check_in" name="check_in" required disabled>

                <label for="check_out">체크아웃 날짜:</label>
                <input type="date" id="check_out" name="check_out" required disabled>

                <label for="room_t">객실 종류:</label>
                <select id="room_t" name="room_t" required onchange="getAvailableRoomId()">
                    <option value="">객실 종류를 선택하세요</option>
                    <option value="룸(스탠다드)">룸(스탠다드)</option>
                    <option value="트룸(디럭스)">트룸(디럭스)</option>
                    <option value="트트룸(프리미엄)">트트룸(프리미엄)</option>
                    <option value="튼튼룸(VIP)">튼튼룸(VIP)</option>
                </select>

                <input type="hidden" id="room_id" name="room_id"> <!-- 방 ID를 담을 hidden input -->

                <script>
                function getAvailableRoomId() {
                    const roomType = document.getElementById("room_t").value;

                    // AJAX 호출을 통해 서버에서 가용한 방 ID를 가져옵니다
                    fetch(`get_room_id.php?room_type=${roomType}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.room_id) {
                                document.getElementById("room_id").value = data.room_id; // hidden input에 방 ID 설정
                                console.log('Room ID set:', data.room_id); // 방 ID 설정 로그
                            } else {
                                alert("해당 종류의 예약 가능 객실이 없습니다.");
                                document.getElementById("room_id").value = ''; // 방 ID 초기화
                                console.log('No available room found.');
                            }
                        })
                        .catch(error => console.error('Error fetching room ID:', error));
                    }
                </script>

                <label for="guests">예약 인원:</label>
                <select id="guests" name="guests" required onchange="toggleCustomGuestInput()">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="other">기타</option>
                </select>

                <div id="customGuestInput" style="display: none;">
                    <label for="customGuests">인원 수 직접 입력:</label>
                    <input type="number" id="customGuests" name="customGuests" min="7" placeholder="7 이상">
                </div>

                <!-- 결제 금액을 전달하기 위한 hidden input 추가 -->
                <input type="hidden" id="total_price" name="total_price">
                <input type="hidden" id="pay_method" name="pay_method">

                <!-- 예약하기 버튼 -->
                <button type="button" onclick="showPaymentPopup()">예약하기</button>

                <!-- 결제 팝업 -->
                <div class="payment-popup" id="paymentPopup" style="display: none;">
                    <p>총 결제 금액: <span id="totalPrice">0</span>원</p>
                    
                    <label for="pay_method_popup">결제 방법:</label>
                    <select id="pay_method_popup" name="pay_method" required>
                        <option value="카드 결제">카드 결제</option>
                        <option value="무통장입금">무통장입금</option>
                        <option value="투스페이">투스페이</option>
                        <option value="카카페이">카카페이</option>
                    </select>

                    <button onclick="confirmPayment()" style="background-color: #FF4752; color: #fff;">확인</button>
                    <button onclick="closePaymentPopup()" style="background-color: #fff; color: #333; border: 1px solid #ddd;">취소</button>
                </div>
            </form>

            <p class="notice">*체크인 시간: 15:00 / 체크아웃 시간: 11:00<br>*시간 조율은 문의 바랍니다.</p>
        </section>
    </div>

    <script>
        const roomPrices = {
            '룸(스탠다드)': 150000,
            '트룸(디럭스)': 300000,
            '트트룸(프리미엄)': 450000,
            '튼튼룸(VIP)': 800000,
        };

        function enableDateSelection() {
            document.getElementById("check_in").disabled = false;
            document.getElementById("check_out").disabled = false;
        }

        function showPaymentPopup() {
            const roomType = document.getElementById("room_t").value;
            const roomId = document.getElementById("room_id").value; // room_id 값을 가져옵니다
            const checkInDate = new Date(document.getElementById("check_in").value);
            const checkOutDate = new Date(document.getElementById("check_out").value);
            const days = (checkOutDate - checkInDate) / (1000 * 60 * 60 * 24);

            if (days <= 0) {
                alert("체크아웃 날짜는 체크인 날짜 이후여야 합니다.");
                return false;
            }

            if (!roomId) { // 방이 선택되었는지 확인
                alert("방을 선택해야 합니다."); // 방을 선택하지 않은 경우 경고창 표시
                return false;
            }

            const totalPrice = roomPrices[roomType] * days;
            document.getElementById("totalPrice").textContent = totalPrice.toLocaleString();
            document.getElementById("total_price").value = totalPrice; // hidden input에 금액 설정
            document.getElementById("paymentPopup").style.display = "block"; // 팝업 표시
        }

        function confirmPayment() {
            const payMethod = document.getElementById("pay_method_popup").value;

            // 결제 방법 확인
            if (!payMethod) {
                alert("결제 방법을 선택해야 합니다."); // 결제 방법이 선택되지 않았을 때 경고
                return; // 함수를 종료
            }

            // pay_method에 값 설정
            document.getElementById("pay_method").value = payMethod; 
            console.log('Selected Payment Method:', payMethod); // 선택한 결제 방법 출력

            // 예약 폼 제출
            document.getElementById("paymentPopup").style.display = "none";
            document.getElementById("reservationForm").submit(); 
        }



        function closePaymentPopup() {
            document.getElementById("paymentPopup").style.display = "none"; // 팝업 숨기기
        }

        function toggleCustomGuestInput() {
            const guestsSelect = document.getElementById("guests");
            const customGuestInput = document.getElementById("customGuestInput");

            if (guestsSelect.value === "other") {
                customGuestInput.style.display = "block";
                customGuestInput.querySelector("input").required = true;
            } else {
                customGuestInput.style.display = "none";
                customGuestInput.querySelector("input").required = false;
                customGuestInput.querySelector("input").value = "";
            }
        }

        function getToday() {
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }


        window.onload = function() {
            const checkIn = document.getElementById("check_in");
            const checkOut = document.getElementById("check_out");

            checkIn.min = getToday(); // 현재 날짜를 체크인 날짜의 최소값으로 설정

            checkIn.addEventListener("change", function() {
                checkOut.min = checkIn.value; // 체크아웃 날짜의 최소값을 체크인 날짜로 설정
                if (checkOut.value < checkIn.value) {
                    checkOut.value = checkIn.value; // 체크아웃 날짜를 체크인 날짜와 같거나 이후로 설정
                }
            });
        };


        // 이미지 슬라이드 기능
        const images = ["images/tnhotel1.jpg", "images/tnhotel2.jpg", "images/tnhotel3.jpg", "images/tnhotel4.jpg", "images/tnhotel5.jpg"];
        let currentIndex = 0;
        const hotelImage = document.getElementById("hotel-image");

        function changeImage() {
            currentIndex = (currentIndex + 1) % images.length;
            hotelImage.style.opacity = 0; // 페이드아웃 효과
            setTimeout(() => {
                hotelImage.src = images[currentIndex];
                hotelImage.style.opacity = 1; // 페이드인 효과
            }, 500); // 0.5초 후에 이미지 전환
        }

        setInterval(changeImage, 5000); // 5초마다 이미지 전환
    </script>
</body>
</html>