

const Lgoforjsanimate = document.querySelectorAll('.for-js-animate');

let setintervalLogo = setInterval(() => {
	Lgoforjsanimate.forEach((e) => {
		e.classList.add('jsClass_animation_logo');
	});
});

setTimeout(() => {
	Lgoforjsanimate.forEach((e) => {
		e.classList.toggle('jsClass_animation_logo2');
	});
}, 2000);
