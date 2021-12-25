// select arrow up
let fixed_arrow_upParent = document.querySelector('.fixed-arrow-up-parent');

window.addEventListener('scroll', () => {
	let sY = window.scrollY;
	if (sY >= 720) {
		fixed_arrow_upParent.classList.add('Show_ArrowUp');
	}
	if (sY <= 720) {
		fixed_arrow_upParent.classList.remove('Show_ArrowUp');
	}
});
