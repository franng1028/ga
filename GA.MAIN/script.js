var slideIndex = 1;
showDivs(slideIndex);

// Automatically change slides every 3 seconds (3000 milliseconds)
setInterval(function() {
  plusDivs(1);
}, 3000);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  slides[slideIndex-1].style.display = "block"; 
}