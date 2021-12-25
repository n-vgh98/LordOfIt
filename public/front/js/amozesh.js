// slector

//  head slider selector start and varibel

//let slides = document.querySelectorAll('.slides');
let nextbtnShowSlide = document.querySelector('.nxt-btn-slide');
let prevbtnSlide = document.querySelector('.prev-btn-slide');
let num = 0;

//  head slider selector and varibel end

// slector

// head slilder full screen start

//const init = (a) => {
//	slides.forEach((allslides) => {
//		allslides.style.display = 'none';
//	});
//
//	slides[a].style.display = 'block';
//};
//
//window.addEventListener('DOMContentLoaded', init(num));
//
//function ShowNextSlide() {
//	if (num >= slides.length - 1) {
//		num = 0;
//	} else {
//		num++;
//	}
//	init(num);
//}
//
//function ShowPrevSlide() {
//	if (num <= 0) {
//		num = slides.length - 1;
//	} else {
//		num--;
//	}
//	init(num);
//}
//
//nextbtnShowSlide.addEventListener('click', () => {
//	ShowNextSlide();
//});
//
//prevbtnSlide.addEventListener('click', () => {
//	ShowPrevSlide();
//});

// head slilder full screen end

// swiper start

let swiper = new Swiper('.mySwiper', {
	slidesPerView: 5,
	spaceBetween: 30,
	freeMode: true,
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},
	breakpoints: {
		// when window width is >= 320px
		320: {
			slidesPerView: 1,
			spaceBetween: 5,
		},

		// when window width is >= 480px
		480: {
			slidesPerView: 3,
			spaceBetween: 30,
		},
		// when window width is >= 640px
		640: {
			slidesPerView: 3,
			spaceBetween: 30,
		},
	},
});

// swiper end

let TwoText_Swiper_Slide_Amozesh = document.querySelectorAll(
	'.two-text-swiper-slide-amozesh'
);

let IconFaHeart = document.querySelector('.fa-heart');

TwoText_Swiper_Slide_Amozesh.forEach((AllTwoText) => {
	AllTwoText.addEventListener('click', () => {
		AllTwoText.classList.toggle('TEST');
	});
});



// Main menu and responsive menu started

// main page start
let parentMainlogo = document.querySelector(
	'.parent-main-logo-sigin_and_main-menu'
);

// icon bar select
let BarIcon = document.querySelector('.fa-bars');
// responsive menu select
let resPonsiveMenu = document.querySelector('.responsive-menu');
// responsive menu sticky select
let MenuSticky = document.querySelector('.parent-sign-up_and_iconbar');
// wrapper menu responsive select
let toggle = document.querySelectorAll('.toggle');
// responsive menu select
let parentresponsivelogotell = document.querySelector(
	'.parent-responsive-logo_tell'
);

//end selectors

toggle.forEach((e) => {
	e.addEventListener('click', () => {
		e.nextElementSibling.classList.toggle('show-wrapper-menu-responsive');
	});
});

// create div for closed menu responsive
let div = document.createElement('div');
div.className = 'closeMenu';
document.body.appendChild(div);
// create div for closed menu responsive

// create 1 dive and here take it---  line code 45
let closeMenu = document.querySelector('.closeMenu');

// event for show menu and hide __ show class close menu and hide
// and toggel sticky menu responsive
BarIcon.addEventListener('click', () => {
	BarIcon.classList.toggle('BarIconBefor');
	resPonsiveMenu.classList.toggle('ShowResponsiveMenu');
	closeMenu.classList.toggle('showDiv');
	parentresponsivelogotell.classList.toggle('stickyNone_if_menu_open');
});

// close menu __ and toggel sticky menu responsive
div.addEventListener('click', () => {
	resPonsiveMenu.classList.remove('ShowResponsiveMenu');
	closeMenu.classList.toggle('showDiv');
	BarIcon.classList.toggle('BarIconBefor');
	parentresponsivelogotell.classList.toggle('stickyNone_if_menu_open');
});

//change icon menu

toggle.forEach((e) => {
	e.addEventListener('click', () => {
		e.classList.toggle('Showtoggle');
	});
});

// end  responsive menu

// all scorll event and function
//document.addEventListener('scroll', () => {
//	
//	let sY = window.scrollY;
//	if (sY >= 100) {
//		parentresponsivelogotell.classList.add('sticky');
//		parentMainlogo.classList.add('fixed_Mainmenu_and_logo');
//	}
//	if (sY <= 100) {
//		parentresponsivelogotell.classList.remove('sticky');
//
//		parentMainlogo.classList.remove('fixed_Mainmenu_and_logo');
//	}
//});

// Main menu and responsive menu end
