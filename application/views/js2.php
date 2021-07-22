<script>
 
    //Swiper Js
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 2,
        spaceBetween: 30,
        hashNavigation: {
          watchState: true,
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            600:{
                slidesPerView: 2,
                spaceBetween: 20
            },
                // when window width is >= 640px
            810: {
                slidesPerView: 2,
                spaceBetween: 20
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

      //kotak-melayang
        const callback = function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
            entry.target.classList.add("muncul");
            return;
        }
        // entry.target.classList.remove('muncul');
        });
        };

        const observer = new IntersectionObserver(callback);

        const targets = document.querySelectorAll(".inside-kotak");
        targets.forEach(function(target) {
        observer.observe(target);
        });
    </script>
    <script>
         if (screen && screen.width > 500) {
            document.write('<script type="text/javascript" src="assets/JS/timeline1.js"><\/script>');
            }else{
            document.write('<script type="text/javascript" src="assets/JS/timeline2.js"><\/script>');
            }
    </script>

</body>
</html>