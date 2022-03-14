(function ($) {
    $(document).ready(function () {
        

        // Swiper Homepage
        var sliderHome = new Swiper('.slider-swiper', {
            loop: true,
            autoplay: {
                delay: 5000,
            },
            spaceBetween: 10,
            slidesPerView: 1,
            // loopedSlides: 4, 
        });

        var  swiperApp={
            swiperProduct:function ($class,$swiperid){
                // console.log("swiper test");
                new Swiper($class, {
                    spaceBetween: 30,
                    slidesPerView: 3,
                    // autoplay: {
                    //     delay: 5000,
                    // },
                    navigation: {
                        nextEl: `.swiper-button-next.preOrder-next.preOrder-next${$swiperid}` ,
                        prevEl: `.swiper-button-prev.preOrder-prev.preOrder-prev${$swiperid}`,
                    },
                    // observeParents: true,
                    // observer: true,
                    // pagination: {
                    //     el: '.swiper-pagination',
                    //     clickable: true,
                    // },
                    breakpoints: {
                        //max-width> 575px
                        575: {
                            slidesPerView: 1.5
                        },
                        768: {
                            slidesPerView: 2.5
                        }
                    }
                });
            },
            swiperGallery:function ($class){
                // console.log("swiper test");
                new Swiper($class, {
                    spaceBetween: 30,
                    slidesPerView: 3,
                    slidesPerColumn: 2,
                    // autoplay: {
                    //     delay: 5000,
                    // },
                    navigation: {
                        nextEl: `.swiper-button-next.preOrder-next` ,
                        prevEl: `.swiper-button-prev.preOrder-prev`,
                    },
                    // observeParents: true,
                    // observer: true,
                    // pagination: {
                    //     el: '.swiper-pagination',
                    //     clickable: true,
                    // },
                    breakpoints: {
                        //max-width> 575px
                        575: {
                            slidesPerView: 1.5
                        },
                        768: {
                            slidesPerView: 2.5
                        }
                    }
                });
            },
        }
        // console.log( swiperApp)
        swiperApp.swiperProduct('.preOrder-swiper1','1');
        swiperApp.swiperProduct('.preOrder-swiper2',2);
        swiperApp.swiperProduct('.preOrder-swiper3',3);
        swiperApp.swiperGallery('.gallery-swiper');
        // swiperApp.swiperGallery('.devProduct-swiperfeature');
        // swiperApp.swiperGalleryCat('.devProduct-swiperCat');
    })
})(jQuery);