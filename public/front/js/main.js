// start selectors

// main page start
let parentMainlogo = document.querySelector(
	'.parent-main-logo-sigin_and_main-menu'
);

// chat online parent  select
let parentchat_img = document.querySelector('.parent-chat-img');

// chat box icon
let IconchatBox = document.querySelector('#icon-chat-box');

let chatBox = document.querySelector('.chat-box');
// select arrow up

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
let formApplyContent = document.querySelector('.form-apply-content');

let showapplyform = document.querySelector('#show-apply-form');

let formapply = document.querySelector('.form-apply');

let formapplycancel = document.querySelector('.form-apply-cancel');

//end selectors

document.addEventListener('DOMContentLoaded', () => {
	formApplyContent.style.display = 'none';
});

showapplyform.addEventListener('click', (e) => {
	e.preventDefault();
	formapply.style.display = 'block';
	formApplyContent.style.display = 'block';
});

formapplycancel.addEventListener('click', (e) => {
	e.preventDefault();
	formapply.style.display = 'none';
});

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

// end  responsive menu

// select all box Home page for animate
let Boxes = document.querySelectorAll('.box');

// animate skill bars

// take window height
let screenPosition = window.innerHeight;

// animation skill bars
function animationbars() {
	let Bars = document.querySelectorAll('.bar');
	Bars.forEach((e) => {
		// set to fixed show bars in windo height
		let contentposition = e.getBoundingClientRect().top;

		// Condition
		if (contentposition < screenPosition) {
			// take attrbiute Bars
			let dataIDs = e.getAttribute('data-id');
			if (dataIDs == 1) {
				e.classList.add('widthBars90');
			} else if (dataIDs == 3) {
				e.classList.add('widthBars75');
			} else if (dataIDs == 4) {
				e.classList.add('widthBars80');
			}
		}
	});
}

// animation academy
function animationAcademy() {
	let posts = document.querySelectorAll('.academy-post>div');
	posts.forEach((post) => {
		let postCoordinates = post.getBoundingClientRect().top;
		if (postCoordinates < screenPosition) {
			post.classList.add('posttransform');
			post.classList.add('post-new-academy-hompage');
		}
	});
}

// count numbers
function animationNumbers() {
	let SetNum = document.querySelectorAll('.SetNum');
	SetNum.forEach((e) => {
		let containerPosition = e.getBoundingClientRect().top;

		if (containerPosition < screenPosition) {
			anime({
				targets: '#view',
				value: [0, 450],
				duration: 1000,
				round: 1,
				easing: 'linear',
				loop: false,
			});

			anime({
				targets: '#customer',
				value: [0, 462],
				duration: 1000,
				round: 1,
				easing: 'linear',
				loop: false,
			});
			anime({
				targets: '#project',
				value: [0, 122],
				duration: 1000,
				round: 1,
				easing: 'linear',
				loop: false,
			});
		}
	});
}

// all scorll event and function
document.addEventListener('scroll', () => {
	animationNumbers();
	animationbars();
	animationAcademy();
	// test();

	let sY = window.scrollY;

	// console.log(sY);
//	if (sY >= 500) {
//		parentresponsivelogotell.classList.add('sticky');
//		parentMainlogo.classList.add('fixed_Mainmenu_and_logo');
//	}
//	if (sY <= 500) {
//		parentMainlogo.classList.remove('fixed_Mainmenu_and_logo');
//		parentresponsivelogotell.classList.remove('sticky');
//	}
	if (sY >= 500) {
		Boxes.forEach((allbox) => {
			allbox.classList.add('animateBoxes');
		});
	}

	// if (sY >= 720) {
	// 	fixed_arrow_upParent.classList.add('Show_ArrowUp');
	// }
	// if (sY <= 720) {
	// 	fixed_arrow_upParent.classList.remove('Show_ArrowUp');
	// }
	if (sY >= 800) {
		parentchat_img.classList.add('showOnlineChat');
	}
	if (sY <= 800) {
		parentchat_img.classList.remove('showOnlineChat');
	}
});

// swiper

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

// show img in midel

// select imgs grid in right skill bars
let aroundImgs = document.querySelectorAll('#around-imgs');
let midelImgs = document.querySelector('#midel-img');

// show and hide imgs right skill bars
aroundImgs.forEach((c) => {
	['click', 'mousemove'].forEach((event) =>
		c.addEventListener(event, () => {
			(allRoundIMGsrc = c.getAttribute('src')),
				midelImgs.setAttribute('src', allRoundIMGsrc);
		})
	);
});

let cancelChatBtn = document.querySelector('.cancel-chat-btn');
// select down inpt chat
let downInputChat = document.getElementById('down-input-chat');

// select top inpt chat
let topInputChat = document.getElementById('top-input-chat');

let sendChatBtn = document.querySelector('.send-chat-btn');

// show chat and hide
IconchatBox.addEventListener('click', () => {
	chatBox.classList.toggle('showChatBox');
	topInputChat.value = null;
	//
	downInputChat.value = null;
});

// topInputChat.value = downInputChat.value;
downInputChat.addEventListener('keyup', (eventdowninpt) => {
	if (eventdowninpt.keyCode == 13) {
		topInputChat.value += downInputChat.value;
		downInputChat.value = null;
	}
});

// close chat لغو چت btn
cancelChatBtn.addEventListener('click', () => {
	chatBox.classList.remove('showChatBox');
	topInputChat.value = null;
	downInputChat.value = null;
});

// send chat btn
sendChatBtn.addEventListener('click', () => {
	topInputChat.value += downInputChat.value;
	downInputChat.value = null;
});

//change icon menu

toggle.forEach((e) => {
	e.addEventListener('click', () => {
		e.classList.toggle('Showtoggle');
	});
});

// scorll bar aks code
// let prevScrollpos = window.pageYOffset;
// function test() {
// 	let currentScrollpos = window.pageYOffset;
//
// 	if (prevScrollpos < currentScrollpos) {
//// 		parentMainlogo.classList.add('fixed_Mainmenu_and_logo');
// 		// parentresponsivelogotell.classList.add('sticky');
//        
//        console.log("a");
// 	} else {
//// 		parentMainlogo.classList.remove('fixed_Mainmenu_and_logo');
// 		// parentresponsivelogotell.classList.remove('sticky');
//         console.log("b");
// 	}
//
// 	prevScrollpos = currentScrollpos;
// }
