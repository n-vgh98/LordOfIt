const arrowRightCourseBtnsPages = document.querySelector(
	'#arrowRight-course-btns-pages'
);

const arrowLeftCourseBtnsPages = document.querySelector(
	'#arrowLeft-course-btns-pages'
);
//

const pageItems = document.querySelectorAll('.page-item a');

pageItems.forEach((item) => {
	item.addEventListener('click', (e) => {
		document.querySelector('.active').classList.remove('active');
		e.preventDefault();
		item.classList.add('active');
	});
});

// chang style btn-numbers with arrow , 1 , 2 ...
let numAllbtns = 0;
const initForbtnspages = (btns) => {
	pageItems.forEach((allbtn) => {
		allbtn.classList.remove('active');
	});
	pageItems[btns].classList.add('active');
};

document.addEventListener('DOMContentLoaded', initForbtnspages(numAllbtns));

let nextallbtnspages = () => {
	if (numAllbtns >= pageItems.length - 1) {
		numAllbtns = 0;
	} else {
		numAllbtns++;
	}
	for (i = 0; i < pageItems.length; i++) {
		pageItems[i].classList.remove('active');
	}
	initForbtnspages(numAllbtns);
	pageItems[numAllbtns].classList.add('active');
};

let prvallbtnspages = () => {
	if (numAllbtns <= 0) {
		numAllbtns = pageItems.length - 1;
	} else {
		numAllbtns--;
	}
	for (i = 0; i < pageItems.length; i++) {
		pageItems[i].classList.remove('active');
	}
	initForbtnspages(numAllbtns);
	pageItems[numAllbtns].classList.add('active');
};

arrowLeftCourseBtnsPages.addEventListener('click',nextallbtnspages );

arrowRightCourseBtnsPages.addEventListener('click', prvallbtnspages);
