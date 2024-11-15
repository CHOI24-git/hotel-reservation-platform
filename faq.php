<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - 저짝어뗘</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/favicon.png" type="image/png">> <!-- 파비콘 추가 -->
    <style>
        .faq-container {
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

        .faq-item {
            border: 1px solid #ddd; /* 테두리 추가 */
            border-radius: 5px; /* 모서리 둥글게 */
            margin-bottom: 10px; /* 항목 간의 간격 */
            overflow: hidden; /* 내용이 넘어가지 않도록 설정 */
            transition: background-color 0.3s; /* 배경색 변화 애니메이션 */
        }

        .faq-item:hover {
            background-color: #f9f9f9; /* 마우스 오버 시 배경색 변화 */
        }

        .faq-question {
            padding: 15px; /* 질문 항목의 패딩 */
            cursor: pointer; /* 포인터로 변경 */
            font-weight: bold; /* 질문 굵게 */
        }

        .faq-answer {
            padding: 15px; /* 답변 항목의 패딩 */
            display: none; /* 기본적으로 숨김 */
            border-top: 1px solid #ddd; /* 위쪽 테두리 추가 */
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
        <div class="faq-container">
            <h2>고객센터</h2>
            <p>어려움이거나 궁금한 점이 있으신가요?</p>
            <p>전화: 1670-6250 | 운영시간: 오전 9시 ~ 새벽 3시</p>
            <p>카카오 문의: 24시간 운영</p>

            <h2>자주 묻는 질문</h2>
            <div class="faq-item">
                <div class="faq-question">[숙박] 예약을 취소하고 싶어요.</div>
                <div class="faq-answer">예약 취소는 고객센터를 통해 가능하며, 규정에 따라 수수료가 발생할 수 있습니다.</div>
            </div>
            <div class="faq-item">
                <div class="faq-question">[공통] 천재지변/감염병으로 인한 예약취소는 어떻게 하나요?</div>
                <div class="faq-answer">해당 상황에 따라 다르며, 고객센터에 문의해 주시면 안내해 드립니다.</div>
            </div>
            <div class="faq-item">
                <div class="faq-question">[숙박] 예약대기 1건 예약취소하고 싶어요.</div>
                <div class="faq-answer">예약 대기건에 대한 취소는 고객센터를 통해 가능하니 연락해 주세요.</div>
            </div>
            <div class="faq-item">
                <div class="faq-question">[숙박] 체크인날짜/객실타입을 변경하고 싶어요.</div>
                <div class="faq-answer">변경은 고객센터에 문의하시면 도와드리겠습니다.</div>
            </div>
            <div class="faq-item">
                <div class="faq-question">[공통] 현금영수증 발급받고 싶어요.</div>
                <div class="faq-answer">현금영수증 발급은 고객센터를 통해 요청하실 수 있습니다.</div>
            </div>
            <div class="faq-item">
                <div class="faq-question">[공통] 영수증/거래내역서 발급받고 싶어요.</div>
                <div class="faq-answer">영수증 및 거래내역서 발급 요청은 고객센터를 통해 가능합니다.</div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 저짝어뗘. 모든 권리 보유.</p>
    </footer>

    <script>
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
            item.querySelector('.faq-question').addEventListener('click', () => {
                const answer = item.querySelector('.faq-answer');
                answer.style.display = answer.style.display === 'block' ? 'none' : 'block'; // 답변 보이기/숨기기
            });
        });
    </script>
</body>
</html>
