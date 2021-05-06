function slideImg() {
    var slideBox = $(".slideBox");
    var slideImageBox = slideBox.find(".slide_image_box");
    var slideImages = slideImageBox.find("a");
    var nav = slideBox.find(".slide_nav").find("a");
    var indicators = slideBox.find(".slide_indicator").find("a");

    var currentIndex = -1;
    var intervalObject;

    //사진 가로로 만들기
    slideImages.each(function (i) {
        var newLeft = i *  100+ '%';
        $(this).css({left: newLeft});
    });

    function setImages(index) {
        slideImageBox.animate({left: -100 * index + '%'}, 500, 'swing');
        if (index===0){
            nav.first().hide();
            nav.last().show();
        }else if (index===slideImages.length-1){
            nav.first().show();
            nav.last().hide();
        }else{
            nav.first().show();
            nav.last().show();
        }
        indicators.removeClass('active');
        indicators.eq(index).addClass('active');
    }

    function startSlide() {
        intervalObject = setInterval(function () {
            currentIndex = (currentIndex + 1) % slideImages.length;
            setImages(currentIndex);
        }, 2000)
    }

    setImages(0);
    startSlide();

    slideBox.mouseenter(function (){
        clearInterval(intervalObject);
    })
    slideBox.mouseleave(function (){
        startSlide();
    })
    nav.first().on({
        click: function () {
            setImages(--currentIndex);
        }
    });
    nav.last().on({
        click: function () {
            setImages(++currentIndex);
        }
    });

    indicators.on('click',function (){
        setImages($(this).index());
    })
}

slideImg();