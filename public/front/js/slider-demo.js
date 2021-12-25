// JavaScript Document


var slideIndex = 1;
let atest1;
let ctest1 = true;    
    
showSlides(slideIndex);



    


function plusSlides(n) {
  
  showSlides(slideIndex += n);
}

function currentSlide(n) {
    
  showSlides(slideIndex = n);
}
function m1(){
    
    if(ctest1 == true){
      ctest1 = false;
      atest1 = setTimeout(m2 , 2000);   
      plusSlides(1);
    }
    
    
}    
    
function m2() {

    ctest1 = true;
    
}    

function showSlides(n) {
     
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  atest1 = setTimeout(m1, 2000);  

     
}