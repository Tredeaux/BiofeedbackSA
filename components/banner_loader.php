<?php
    $dirname = "Banners/";
    $images = glob($dirname."*");
    foreach($images as $image) {
        echo '
        <div class="slideshow-container">
        <div style="width:100%;background-color:#eee;text-align:center;" class="mySlides">
        <img src="'.$image.'" style="width:100%;text-align:center;margin:auto;">
        </div></div> ';
    }
?>
<br>
<div style="text-align:center">
<?php
    $dirname = "Banners/";
    $images = glob($dirname."*");
    foreach($images as $image) {
        echo '<span class="dot"></span> ';
    }
?>

<script>
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
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>
</div>