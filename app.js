const banners = ['banner1.jpg', 'banner2.jpg', 'banner3.jpg', 'banner4.jpg'];
let currentIndex = 0;

function changeBanner() {
    const bannerImage = document.getElementById('banner-image');
    currentIndex = (currentIndex + 1) % banners.length; // 인덱스를 순환
    bannerImage.src = banners[currentIndex];
}

// 5초마다 배너 변경
setInterval(changeBanner, 5000);

document.getElementById('search-button').addEventListener('click', function() {
    const destination = document.querySelector('.search input[type="text"]').value;
    const checkIn = document.getElementById('check-in').value;
    const checkOut = document.getElementById('check-out').value;
    const guests = document.getElementById('guest').value;

    // 여기서 검색 로직을 구현할 수 있습니다.
    alert(`검색할 숙소: ${destination}\n체크인: ${checkIn}\n체크아웃: ${checkOut}\n인원: ${guests}`);
});
