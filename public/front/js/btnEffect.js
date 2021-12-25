// btn effect

let Amozeshbtn = document.querySelectorAll('.amozesh-btn');
Amozeshbtn.forEach((element) => {
	element.addEventListener('mousemove', (e) => {
		let xp = e.pageX - element.offsetLeft;
		let yp = e.pageY - element.offsetTop;
		element.style.setProperty('--x', xp + 'px');
		element.style.setProperty('--y', yp + 'px');
	
	});
});
