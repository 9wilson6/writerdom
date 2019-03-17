
<!-- Jquery Link -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
  <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!-- popper js Link -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <!-- Bootstrap js Link -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <!-- Animation on scroll cdn Link -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<?php if(isset($link)) {?>
     <script type="text/javascript" src="js/custom.js"></script>
 <?php }else{?>
    <script type="text/javascript" src="../js/custom.js"></script>
     <script type="text/javascript" src="../js/session_timer.js"></script>
 <?php }?>
  <!-- custom timer Js -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script> -->
  <!-- Ck Editor -->
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<!-- Animation On Scrol Trigger  -->

  <script>
    AOS.init(

      { offset:200,
        duration:1000,}
    );
  </script>

  </body>
  </html>
  <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

<script>
$(document).ready(function(){
$('#testmonial-slider').owlCarousel({
    items:1,
    itemsDesktop:[1000,1],
    itemsDesktopSmall:[979,1],
    pagination:false,
    navigation:true,
    navigationText:["",""],
    slideSpeed:1000,
    itemsTablet: [768, 1],
    itemsMobile: [550, 1],
    autoPlay:true

});

});
</script>