var swiper = new Swiper('.mySwiper', {
	slidesPerGroup: 1,

	loop: true,
	loopFillGroupWithBlank: true,
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	breakpoints: {
		// when window width is >= 320px
		320: {
			slidesPerView: 1,
			spaceBetween: 30,
		},
		// when window width is >= 480px
		577: {
			slidesPerView: 2,
			spaceBetween: 30,
		},
		// when window width is >= 640px
		768: {
			slidesPerView: 2.5,
			spaceBetween: 30,
		},

		1024: {
			slidesPerView: 3,
			spaceBetween: 30,
		},
	},
});

// MORE BTN

const btnMore = document.querySelectorAll('.pakage-btn');
const pakageSec = document.querySelectorAll('.pakage-sec');
btnMore.forEach((btnM, index) => {
	btnM.addEventListener('click', () => {
		pakageSec.forEach((pak, indexx) => {
			if (index == indexx) {
				pak.classList.toggle('showtext');
			}
		});
	});
});
