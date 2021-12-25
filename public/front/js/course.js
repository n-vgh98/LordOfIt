// Variables
const suppBtn = document.querySelector('.course-supp-button'),
	supptText = document.querySelector('.course-supp-add');

// addEventListeners
suppBtn.addEventListener('click', (e) => {
	e.preventDefault();
	supptText.classList.toggle('show');
	suppBtn.firstElementChild.firstElementChild.classList.toggle('rotatebtn');
});

const heart1 = document.querySelector('.interesting .far');
const heart2 = document.querySelector('.interesting .fa');

heart1.addEventListener('click', () => {
	document.querySelector('.interesting').classList.add('active-heart');
});
heart2.addEventListener('click', () => {
	heart2.parentElement.parentElement.classList.remove('active-heart');
});

// // animation rahnamye sefaresh amozesh

let windoinerhight = window.innerHeight;
let guidancelist = document.querySelector('.guidance-list');
let guidancelistLis = document.querySelectorAll('.guidance-list li');
let gudianceNum = document.querySelectorAll('.gudiance-num');

let AllBoxes = document.querySelectorAll('.related-courses-item');
let PostionBoxes = document.querySelector('.related-courses-content');

document.addEventListener('scroll', () => {
	allfunctionAnimationRenderHere();
});

function animationLI() {
	guidancelistLis.forEach((e) => {
		e.classList.add('animationGuideLi');
	});
}

function Rotatebox() {
	AllBoxes.forEach((e) => {
		e.classList.add('rotate-box-course');
	});
}

function allfunctionAnimationRenderHere() {
	let postionGuide = guidancelist.getBoundingClientRect().top;
	let boxes = PostionBoxes.getBoundingClientRect().top;

	if (postionGuide < windoinerhight) {
		animationLI();
	}

	if (boxes < windoinerhight) {
		Rotatebox();
	}
}
