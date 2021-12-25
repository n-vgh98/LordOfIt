const tipsList=document.querySelector('.tips-ul li'),
tipsListParent=document.querySelector('.tips-ul')
console.log(tipsListParent)
tipsList.addEventListener('click', (e) => {
        e.preventDefault()
 tipsListParent.classList.toggle('showOff')
})