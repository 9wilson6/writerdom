<head>
<?php session_start(); ?>
 <title>WriterDom <?php if (isset($title)) {
 	echo"|".$title;
 }; ?></title>
 
 <!-- Bootstrap 4 link -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!-- Fontawesome 5.5.0 link -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<!-- animate css CDN link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
<!-- Animate On scroll cdn -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <!-- Custom Css -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
  <?php if(isset($link)) {?>
  	<link rel="stylesheet" href="css/settings.css">
 <?php }else{?>
 	 <link rel="stylesheet" href="../css/settings.css">
 <?php }?>
<!-- Custom Css -->
 

</head>
<body>