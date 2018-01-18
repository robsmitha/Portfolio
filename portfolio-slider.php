<?php

?>

<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="vendor/swiper/css/swiper.min.css">

<!-- Swiper -->
<div class="swiper-container">
    <div class="swiper-wrapper">
        <?php
        if(!empty($SliderList)){
            foreach ($SliderList as $slide){
                    if(true){
                ?>
                <div class="swiper-slide">
                    <a href="portfolio-item.php?id=<?php echo $slide->getId(); ?>" class="d-block mb-4 h-100">
                        <img class="img-fluid img-rounded" src="<?php echo $slide->getImageUrl(); ?>" alt="<?php echo $slide->getName (); ?>" title="<?php echo $slide->getName (); ?>">
                    </a>
                </div>
        <?php
                }//end IF
            }//end FOREACH
        }//end IF
        ?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<!-- Swiper JS -->
<script src="vendor/swiper/js/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
    function getNumOfSlides(ScreenSize) {
        //get number of slides per view based on browser screen size
        var NumberOfSlides = 1;
        if (ScreenSize >= 1366) {
            NumberOfSlides = 4;
        }
        else if (ScreenSize >= 1200) {
            NumberOfSlides = 4;
        }
        else if (ScreenSize >= 1000) {
            NumberOfSlides = 3;
        }
        else if (ScreenSize >= 700) {
            NumberOfSlides = 2;
        }
        else {
            NumberOfSlides = 1;
        }
        return NumberOfSlides;
    }

    var n = getNumOfSlides($(window).width());

    var swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        slidesPerView: n,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>