<?php  
session_start();   ob_start();    
require_once('models/utilisateurs.model.php');
if(utilisateursModel::islogged())
$log=true; 
else $log=false;  
 ?>
<!DOCTYPE html> 
<html dir="rtl" lang="ar"> 
	<head>
<script async defer data-website-id="afc1b19c-5319-4097-8747-3b05933578c7" src="https://www.fyipress.net/umami.js"></script><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		
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
		<style type="text/css">
		@media (min-width: 768px)   { 
  	     #wdwrap{   width: 720px;  } 
        } 
        label,h4,input{
				text-align: right  ! important ;
			}
		</style>
		<script type="text/javascript" src="fyipanel/production/js/sweetalert-dev.js" ></script>
	</head> 
	<body class="skin-orange">
		 <?php require_once ("header.php"); ?> 
		<section class="login first grey">
			<div class="container" >
				<div class="box-wrapper" id="wdwrap" >				
					<div class="box box-border"> 
						<div class="box-body">
							<h4 style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px; padding-left:50px;"  >  הירשם   </h4>
							<form method="post" >
								<div class="form-group"> 
									<label class="fw" style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px; padding-left:50px; text-align: right;"> שם   </label>
									<input placeholder=" שם משתמש  "  maxlength="30" required="required" type="text" name="name" class="form-control">
								</div>
								<div class="form-group">
									<label style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" class="fw">  דוא"ל  </label>
									<input placeholder=" דוא"ל  " maxlength="60" required="required" type="email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" class="fw">  סיסמה   </label>
									<input placeholder="    "
									 required="required" type="password" name="password" class="form-control">
								</div> 
								<div class="form-group">
								 <label style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" class="fw"> אשר סיסמה  </label>
									<input placeholder="  "
									required="required" type="password" name="confirm_password" class="form-control">
								</div> 
								<div style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" class="form-group text-right">
									<button name="register" class="btn btn-primary btn-block"> הירשם    </button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Please read the terms of privacy ... Completing the registration means that, you agree to the terms of privacy.</span> <a href="https://fyipress.net/privacy.php">Privacy</a>
								</div>
								<div style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" class="form-group text-center">
									<span class="text-muted">  כבר יש לך חשבון?   </span>
									<a href="login.php">  התחברות   </a> 
								</div>
							</form> 
							<?php if(isset($_POST['register'])){  
							      $user = new utilisateursModel();  
							      if($user->userexist(strip_tags($_POST['email']))!=null){
							      ?> 
							      <script>
							          swal(" משתמש קיים  !"," המשתמש כבר קיים   ","warning")</script>
							     <?php
							      }else{ // user not existe
									$text=$_POST['password'];
		                            $CountOfNumbers= count(array_filter(str_split($text),'is_numeric')); 
		                            $NumbresOfCaracteres=strlen($text);
		                            $msgg="";
		                            if ($NumbresOfCaracteres<6) {
		                              $msgg='error';
		                            }else{
		                            if ($CountOfNumbers>=1) { 
		                            if ($NumbresOfCaracteres-$CountOfNumbers<=0)  {   $msgg='error';
		                             }
		                             }else {
		                                $msgg='error';
		                             }
		                             }
		                            $token= utilisateursModel::generateNewString();
		                           $userr = new utilisateursModel();  
				        		   $email=$_POST['email'];
				        		   $name=$_POST['name'];
							       $userr->setisEmailConfirmed(0);
							       $userr->settoken(strip_tags($token));
							       $userr->setemail(strip_tags($_POST['email']));
		                           $userr->setname(strip_tags($_POST['name']));
		                           if ($msgg=="") {
		                            $pass = password_hash($text, PASSWORD_DEFAULT);   
		                            $userr->setpassword($pass);
		                           }

		         if ($msgg=="") {  
					 	 if($_POST['password']==$_POST['confirm_password']){  
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
								$mail->Host=$host; //ftpupload.net
								$mail->Port=$port; //or 587 
								$mail->IsHTML(true);
								$mail->CharSet = 'UTF-8';
								$mail->Username=$email_sender;
								$mail->Password=$password_sender;
								$mail->SetFrom($email_sender," صحيفة لعلمك  ");
								$mail->Subject="لعملك  : تاكيد  بريدك الالكتروني ";
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
			       <span style='float:right;' > &nbsp;&nbsp;&nbsp;&nbsp; ברוך הבא      </span>  
			        <span style='float:right;' >    $name    </span>
			       <br> <br>
			         
             	<span style='float:right;' >
                	 &nbsp;&nbsp;&nbsp;  ברוך הבא ל
            	 </span>
             	 <span style='float:right;' >
                	 FYI PRESS
            	 </span>  
            	 <br><br>
                     כדי להפעיל את חשבונך ולאמת את כתובת הדוא  ל שלך
			        <br>
			        אנא לחץ על הקישור להלן<br> <br> 
			        <span style='padding-right: 100px;' ></span>
			        <a style='text-decoration: none;' target='_blank' href='$link/confirm.php?email=$email&token=$token'>
			        	 <span 
			        	 style='font-family: Avenir,Helvetica,sans-serif;box-sizing: border-box;
                               border-radius: 3px; color: #fff;display: inline-block;
                               text-decoration: none; background-color: #2ab27b; border-top: 10px solid #2ab27b;
                               border-right: 18px solid #2ab27b; border-bottom: 10px solid #2ab27b;
                               border-left: 18px solid #2ab27b;  ' > 
                            אשר את כתובת הדואר האלקטרוני שלך
                        </span>
			        </a><br><br> 
                    FYI Press תמיכה
			    </td>
			</tr> 
            <tr>  
            	<td style='text-align: right; padding: 20px;' >
                    <a target='_blank' href='$link' style='font-size: 19px;   font-family: Helvetica; line-height: 150%; ' >
                    וי זכויות 
                    </a><br><br>
                    <span style='font-size: 19px;    font-family: Helvetica;
                     line-height: 150%; color: #505050;' >
                Copyright © FYI Press, כל הזכויות שמורות
                    </span> 
                </td>
            </tr>           
        </tbody> 
    </table>

   "; 
				    if ($mail->send()){
				           $userr->add_utilisateur($pass); 
				           echo '<script> swal("סיסמה! "," אתה רשום! אמת את הדוא"ל שלך!","success");</script>'; 
				    }else{
				        echo '<script> swal("סיסמה! "," קרה משהו לא בסדר! בבקשה נסה שוב!","warning");</script>';
			        }
						               }else{  ?>
						          <script>
						          	swal("סיסמא שגויה! "," סיסמאות אינן זהות","warning")
						          </script>
				      <?php } //

			     }else { // not string   ?>
						          <script>
						          	swal("סיסמה !","<?php echo $msgg; ?>","warning")
						          </script>
		   <?php }  }  
						               
						           }  ?> 


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