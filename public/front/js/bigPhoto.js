// JavaScript Document

let myBigPhoto = document.getElementById("big-photo-show");
let myBigDivPhoto = document.getElementById("big-photo-id");




function bigPhoto(imgSource){
    
     myBigDivPhoto.style.display = "block";
     myBigPhoto.src = imgSource.src;
     console.log("ddddddd");
}

function closePhoto(){
    
     myBigDivPhoto.style.display = "none";
    
}