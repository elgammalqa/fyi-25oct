<?php 
session_start();   ob_start();    
require_once('models/utilisateurs.model.php');
if(utilisateursModel::islogged())
$log=true;
else $log=false;
 ?>
 <!DOCTYPE html>
<html>
	<head>
<script async defer data-website-id="afc1b19c-5319-4097-8747-3b05933578c7" src="https://www.fyipress.net/umami.js"></script>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		  
		<!-- Bootstrap -->
		<link rel="stylesheet" href="../scripts/bootstrap/bootstrap.min.css">
		<!-- IonIcons -->
		<link rel="stylesheet" href="../scripts/ionicons/css/ionicons.min.css">
		<!-- Toast -->
		<link rel="stylesheet" href="../scripts/toast/jquery.toast.min.css">
		<!-- OwlCarousel -->
		<link rel="stylesheet" href="../scripts/owlcarousel/dist/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="../scripts/owlcarousel/dist/assets/owl.theme.default.min.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="../scripts/magnific-popup/dist/magnific-popup.css">
		<link rel="stylesheet" href="../scripts/sweetalert/dist/sweetalert.css">
		<!-- Custom style -->
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/style2.css">
		<link rel="stylesheet" href="../css/skins/all.css">
		<link rel="stylesheet" href="../css/demo.css"> 
		 <style type="text/css">
						@media (min-width: 992px) { 
							#pl1{
								padding-left: 20% ; 
							} 
							#pl2{
								padding-left: 35%
							}
						} 
						</style>
	</head>

	<body  class="skin-orange">
		  <?php require_once('header.php'); ?>
		<section class="category">
					<div class="container">
					    <div class="col-md-12 col-sm-12 col-xs-12"> 

						<?php 
							function redirect() {
								header('Location: forgot.php');
								exit(); 
							} 

							if (!isset($_GET['email']) || !isset($_GET['token'])) {
								redirect();
							} else { 
								$email = strip_tags($_GET['email']);
								$token = strip_tags($_GET['token']);   
								if (utilisateursModel::email_token_exist($email,$token)) {  
									$newPassword = utilisateursModel::generateNewpass();
									$pass = password_hash($newPassword, PASSWORD_DEFAULT);  
									utilisateursModel::update_token_pass($email,$pass); ?>
							  <br><br><br><br> 
							  <span id="pl1" style="font-size: 30px; " >  הסיסמה החדשה שלך האם </span> 
							  	<span style="color: green" >
							  		<input style="font-size: 25px; " value="<?php echo $newPassword; ?>">
							  	</span> 
							  
							   <br><br> 
							   <span id="pl2"style="font-size: 30px; ">
							         <a target="_blank" href="login.php">לחץ כאן כדי להתחבר</a>
							   </span>  
							<?php	} else{
									redirect();
								}
							}
						?>


						</div>
					</div>
					<div class="container">
					    <div class="row"> 	 
							<div class="col-md-8 text-left"> 
					            <div style="margin-bottom: 15%" id="output"></div>
					        </div>
					   </div> 
					</div> 
		</section>
  

		<!-- JS -->
		<script src="../js/jquery.js"></script>
		<script src="../js/jquery.migrate.js"></script>
		<script src="../scripts/bootstrap/bootstrap.min.js"></script>
		<script>var $target_end=$(".best-of-the-week");</script>
		<script src="../scripts/jquery-number/jquery.number.min.js"></script>
		<script src="../scripts/owlcarousel/dist/owl.carousel.min.js"></script>
		<script src="../scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
		<script src="../scripts/easescroll/jquery.easeScroll.js"></script>
		<script src="../scripts/sweetalert/dist/sweetalert.min.js"></script>
		<script src="../scripts/toast/jquery.toast.min.js"></script>
		
		<script src="../js/e-magz.js"></script>
		<script  >
			$(document).ready(function(){
				$('.backk').click(function(){   
			$(".nav-list").removeClass("active");
			$(".nav-list").removeClass("active");
				$(".nav-list .dropdown-menu").removeClass("active");
				$(".nav-title a").text("Menu");
				$(".nav-title .back").remove();
				$("body").css({
					overflow: "auto"
				});
				backdrop.hide();
				 
				});	 
			});
			 
		</script>
	</body>
</html>