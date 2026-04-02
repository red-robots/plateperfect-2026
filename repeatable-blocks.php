<?php 
$dir = get_stylesheet_directory() . '/parts-flexible/';
$partsFiles = [];
if (is_dir($dir)) {
  $files = scandir($dir);
  foreach ($files as $file) {
    // Filter out "." (current dir) and ".." (parent dir)
    if ($file !== '.' && $file !== '..') {
      if (!preg_match('/-copy| copy|-bak|-backup/i', strtolower($file))) {
        $partsFiles[] = $file;
      }
    }
  }
}

if( have_rows('repeatable_blocks') ) { 
$i=1; while( have_rows('repeatable_blocks') ): the_row(); 
  if($partsFiles) {
    foreach($partsFiles as $file) {
      include( locate_template('parts-flexible/'.$file) );
    }
  }
$i++; endwhile;
} ?>
<script>
jQuery(document).ready(function($){
  const testimonialSwipers = document.querySelectorAll('.testimonial-swiper');
  if(testimonialSwipers.length) {
    // Loop through each element found
    testimonialSwipers.forEach((el) => {
      new Swiper(el, {
        // Essential for centering the main card
        centeredSlides: true,
        slidesPerView: 1.1, 
        spaceBetween: 0,
        loop: true,
        speed: 400,
        effect: 'slide',
        autoplay: {
          delay: 8000, // Time in ms between slides (3 seconds)
          disableOnInteraction: false, // Keeps sliding after user interacts
        },
        navigation: {
          nextEl: el.querySelector('.testimonial-button-next'),
          prevEl: el.querySelector('.testimonial-button-prev'),
        },
        // Listen for events here
        on: {
          // slideChange: function () {
          //   this.el.classList.add('is-changing');
          // },
          // // When the animation starts
          slideChangeTransitionStart: function () {
            this.el.classList.add('is-changing');
          },
          // // When the animation finishes
          slideChangeTransitionEnd: function () {
            this.el.classList.remove('is-changing');
          },
        },
        // Responsive breakpoints
        breakpoints: {
          640: {
            slidesPerView: 1.5,
          },
          1024: {
            slidesPerView: 2.2, // Shows more cards on larger screens
          },
        },
      });
    });
  }
});
</script>