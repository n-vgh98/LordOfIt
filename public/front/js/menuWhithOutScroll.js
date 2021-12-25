let BarIcon = document.querySelector('.fa-bars');
let resPonsiveMenu = document.querySelector('.responsive-menu');
let toggle = document.querySelectorAll('.toggle');


toggle.forEach((e) => {
	e.addEventListener('click', () => {
		e.nextElementSibling.classList.toggle('show-wrapper-menu-responsive');
	});
});

toggle.forEach((e) => {
	e.addEventListener('click', () => {
		e.classList.toggle('Showtoggle');
	});
});



// create div for closed menu responsive
let div = document.createElement('div');
div.className = 'closeMenu';
document.body.appendChild(div);
// create div for closed menu responsive

let closeMenu = document.querySelector('.closeMenu');

BarIcon.addEventListener('click', () => {
	BarIcon.classList.toggle('BarIconBefor');
	resPonsiveMenu.classList.toggle('ShowResponsiveMenu');
	closeMenu.classList.toggle('showDiv');
	parentresponsivelogotell.classList.toggle('stickyNone_if_menu_open');
});

div.addEventListener('click', () => {
	resPonsiveMenu.classList.remove('ShowResponsiveMenu');
	closeMenu.classList.toggle('showDiv');
	BarIcon.classList.toggle('BarIconBefor');
	parentresponsivelogotell.classList.toggle('stickyNone_if_menu_open');
});

// end  responsive menu
