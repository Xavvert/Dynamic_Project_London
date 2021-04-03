$(document).ready(function () {

    $("#notif").click(function () {
        $(".triangle").toggle("");
        $(".notif").toggle("");
    });
});

var audio = $("#myAudio")[0];
$("#logo").mouseenter(function () {
    audio.play();
});

var audio2 = $("#myAudio2")[0];
$("#submit").mouseenter(function () {
    audio2.play();
});

var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 2200); // Change image every 2.2 seconds
}
