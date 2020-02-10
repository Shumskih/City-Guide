$(document).ready(function() {
   function countUp(className) {
       let countBlockTop = $('.'+className).offset().top;
       let windowHeight = window.innerHeight;
       let show = true;

       $(window).scroll(function() {
           if (show && (countBlockTop < $(window).scrollTop() + windowHeight)) {
               show = false;

               $('.'+className).spincrement({
                   from: 1,
                   duration: 5000
               })
           }
       })
   }

   countUp('count');

});