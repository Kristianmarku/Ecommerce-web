/* Slideshow */
var imagesBag = [
    'images/baby.jpg',
    'images/baby2.jpg',
    'images/baby1.jpg',
];

var imagesIndex = 0;
var sliderTime = 2000;

function setSlideshow()
{
    document.getElementById('slider').src = imagesBag[imagesIndex];
    imagesIndex++;

    if(imagesIndex == imagesBag.length)
    {
        imagesIndex = 0;
    }

    setTimeout("setSlideshow()", sliderTime);
}

setSlideshow();