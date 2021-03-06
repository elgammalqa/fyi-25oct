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
	    <link rel="icon"   href="images/fyipress.ico">
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
		<link rel="stylesheet" href="fyipanel/production/css/sweetalert.css">
		<script type="text/javascript" src="fyipanel/production/js/sweetalert-dev.js" ></script>
	</head> 
	<body class="skin-orange">
	    <?php require_once ("header.php"); ?>  
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<h4 style="text-align: right;" >
								نسيان كلمة المرور 
							</h4>
							<form method="post" >
								<div class="form-group" style="text-align: right;" >
									<label style=" font-size: 20px; " > 
										البريد الالكتروني 
									</label>
									<input style="text-align: right;" placeholder="بريدك الالكتروني" type="email" name="email" class="form-control">
								</div>
								<div class="form-group text-right">
									<button dir="rtl" class="btn btn-primary btn-block" name="reset" >
									 تغيير كلمة المرور 
								</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">

									 <a href="login.php"> الرجوع لتسجيل الدخول  </a>
									 </span>
								</div> 
							</form>
							<?php 
							 if (isset($_POST['reset'])) {
							 	$email=strip_tags($_POST['email']);
							 	if (utilisateursModel::email_exist($email)) {
							 	    $token= utilisateursModel::generateNewString(); 
							 	    $name=utilisateursModel::getUserName($email);
 
   
							 	$smtpsecure=utilisateursModel::info("smtpsecure"); 
					 	        $email_sender=utilisateursModel::info("email");  
					 	        $password_sender=utilisateursModel::info("password"); 
					 	        $host=utilisateursModel::info("host"); 
					 	        $port=utilisateursModel::info("port");    
					 	        $link=utilisateursModel::info("link");   
					 	        $smtpsecure = str_replace(' ', '', $smtpsecure);
					 	        $email_sender = str_replace(' ', '', $email_sender);
					 	        $password_sender = str_replace(' ', '', $password_sender);
					 	        $host = str_replace(' ', '', $host);
					 	        $port = str_replace(' ', '', $port);
					 	        $link = str_replace(' ', '', $link); 

							 	require('PHPMailer-master/PHPMailerAutoload.php');
								$mail=new PHPMailer();
								$mail->IsSmtp();
								$mail->SMTPDebug=0; 
								$mail->SMTPAuth=true;
								$mail->SMTPSecure=$smtpsecure;
								$mail->Host=$host;  
								$mail->Port=$port; //or 587
								$mail->IsHTML(true); 
								$mail->CharSet = 'UTF-8';
								$mail->Username=$email_sender;
								$mail->Password=$password_sender;
								$mail->SetFrom($email_sender," موقع  إف واي آي برس   ");
								$mail->Subject=" تغيير كلمة المرور  ";
								$mail->AddAddress($email, $name);
								$mail->Body = "   
	 <table border='0' cellpadding='0' cellspacing='0'style='margin-left:17%;'  >
        <tbody> 
            <tr>
                <td  >
                    <a>
                       <img src='$link/images/fyipress.png' 
                       style='padding:20px; width: 350px; height: 70px;' >
                    </a>
                </td>
            </tr>
            <tr>
                <td style='font-size: 19px; padding: 20px;  font-family: Helvetica; line-height: 150%; text-align: right;' >
                   <span style='float:right;' >
                   مرحبا بك  
                   </span>
                    <span style='float:right; padding-right: 10px; padding-left: 10px; ' >
                    $name &nbsp;
                   </span>
                   <br> <br>
                   في موقع إف واي آي برس   <br><br>
                  لتغيير كلمة المرور الخاصة بحسابك في موقع إف واي آي برس  
                    <br>
                    فضلا اضغط علي  الرابط الموجود ادناة <br> <br>
                    <span style='padding-right: 100px;' ></span>
                   <a style='text-decoration: none;' target='_blank' href='$link/confirm_forgot.php?email=$email&token=$token'>
                         <span 
                         style='font-family: Avenir,Helvetica,sans-serif;box-sizing: border-box;
                               border-radius: 3px; color: #fff;display: inline-block;
                               text-decoration: none; background-color: #2ab27b; border-top: 10px solid #2ab27b;
                               border-right: 18px solid #2ab27b; border-bottom: 10px solid #2ab27b;
                               border-left: 18px solid #2ab27b;  ' > 
                            تاكيد بريدك الالكتروني 
                        </span>
                    </a><br><br> 
                   فريق دعم  إف واي آي برس  
                </td>
            </tr> 
            <tr>  
                <td style='text-align: right; padding: 20px;' >
                    <a target='_blank' href='$link' style='font-size: 19px;   font-family: Helvetica; line-height: 150%; ' >
                    تفضل بزيارة  موقعنا  
                    </a><br><br>
                    <span style='font-size: 19px;    font-family: Helvetica;
                     line-height: 150%; color: #505050;' >
                    جميع الحقوق محفوظة لموقع إف واي آي برس    
                    </span> 
                </td>
            </tr>           
        </tbody>
    </table>   "; 
				    if ($mail->send()){
				    	 utilisateursModel::update_token($email,$token);
				      echo '<script> swal(" تغيير كلمة المرور  ","  تم ارسال كلمة المرور لبريدك الالكتروني   ","success");</script>'; 
				 }else{
			        echo '<script> swal(" تغيير كلمة المرور  "," حدث خطأ ما  يرجى المحاولة مرة أخرى   ","warning");</script>'; 
			     }

							 	}else{
							 		 echo '<script> swal(" تسجيل  "," لا يوجد حساب بهذا البريد الالكتروني  ","warning");</script>'; 
							 	}
							 }

							 ?>
						</div>
					</div>
				</div>
			</div>
		</section>

			<!-- Start footer -->
		<?php require_once ('footer.php') ?>
		<!-- End Footer --> 

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
		<script type="text/javascript"> 
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