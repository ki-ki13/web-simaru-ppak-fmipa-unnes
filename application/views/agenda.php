<div class="super-wrapper" id="Superwrap">
    <div class="content" id="agenda-cont">
        <div class="tatatertib" id="agenda">
            <div class="swiper-container mySwiper" >
                <div class="swiper-wrapper">
                    <a href="#" data-hash="slide1" class="swiper-slide">
                        <div class="inside-slide">
                            <div class="agendajudul">
                                <h2>Agenda PPAK1</h2>
                            </div>
                            <iframe  src="https://drive.google.com/file/d/1ZSDh5aSw8NulL4lacgNKC_oTzwjBODL-/preview" frameborder="0"></iframe>
                        </div>
                    </a>
                    <a href="#" data-hash="slide2" class="swiper-slide">
                        <div class="inside-slide">
                            <div class="agendajudul">
                                <h2>Agenda PPAK2</h2>
                            </div>
                            <p>
                                Di tahun 2021 ini PPAK FMIPA UNNES mengusung tema “Bangkitkan Inspirator Muda Dalam Mewujudkan Generasi yang Adaptif,Produktif,Inovatif dan Kontributif Menuju FMIPA yang Berdedikasi dan Berprestasi”. Dengan tema tersebut berharap mahasiswa baru FMIPA bisa menjadi inspirator yang adaptif, produktif, inovatif dan dapat berkontribusi untuk FMIPA.
                            </p>
                        </div>
                    </a>
                    <a href="#" data-hash="slide3" class="swiper-slide">Slide 3</a>
                    <a href="#" data-hash="slide4" class="swiper-slide">Slide 4</a>
                    <a href="#" data-hash="slide5" class="swiper-slide">Slide 5</a>
                    
                </div>
                 <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div> 
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <script>
    //Swiper Js
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 50,
        centeredSlides:true,
        hashNavigation: {
          watchState: true,
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 50
            },
            600:{
                slidesPerView: 1, 
                spaceBetween: 50
            },
                // when window width is >= 640px
            810: {
                slidesPerView: 1,
                spaceBetween: 50
            }
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>