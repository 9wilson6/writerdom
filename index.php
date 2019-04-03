<?php $link=1 ?>
<?php require_once("inc/header_links.php");
require_once('layout/nav.php');
require_once('layout/header.php');
require_once('layout/mainsection.php');
require_once('layout/footer.php');
require_once("inc/footer_links.php");

?>
<script type="text/javascript" src="js/twakto.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.0/flickity.pkgd.min.js"></script>

<script type="text/javascript">
	$(window).scroll(function(){
		let scroll= $(window).scrollTop();
		if (scroll>50) {
			$('.mynav').css({"background":"#003c36", "opacity": ".85", "height":"70px", "font-size":"15px"} );
			// $('.logo').css({"font-size":"20px"});
			// $('.sign_up_btn').css({"font-size":"10px"});
		}
		else{
			$('.mynav').css({"background":"transparent", "font-size":"20px"} );
			// $('.logo').css({"font-size":"30px"});
			// $('.sign_up_btn').css({"font-size":"18px"});
		}
	});
</script>