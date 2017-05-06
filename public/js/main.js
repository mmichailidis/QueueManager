$(document).ready(function(){
    $('.slider').slick({
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3,
        index: 2,
        autoplay: true,
        autoplaySpeed: 2700,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });
});
