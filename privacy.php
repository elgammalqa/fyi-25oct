<?php 
session_start();   ob_start();    
require_once('models/utilisateurs.model.php'); 
function nb_messages_today($email){
	include 'fyipanel/views/connect.php';
	$sql = $con->prepare("SELECT count(*) FROM `messages` 
		WHERE `email`='$email' and Date(date)=Date(now()) "); 
    $sql->execute();
    $nb = $sql->fetchColumn();  
    return $nb;
} 
function add_message($email,$name,$subject,$message,$phone){
try{
	include 'fyipanel/views/connect.php';
 if($con->exec("INSERT INTO `messages` (`id`, `email`, `name`, `subject`, `message`, `phone`) VALUES
  (NULL, '".$email."','".$name."','".$subject."','".$message."','".$phone."')" ))
    return true; 
    else return false;
 } catch (PDOException $e) { 
   return false;  
 }
}
if(utilisateursModel::islogged())
$log=true; 
else $log=false;

if($log){
if(isset($_COOKIE['fyiuser_email'])){
	$cmail=$_COOKIE['fyiuser_email'];
	$cname=utilisateursModel::getUserName($cmail);
}else{
	$cmail=$_SESSION['user_auth']['user_email'];
	$cname=utilisateursModel::getUserName($cmail);
}
}
 ?>  

<!DOCTYPE html>
<html>
	<head>
<script async defer data-website-id="afc1b19c-5319-4097-8747-3b05933578c7" src="https://www.fyipress.net/umami.js"></script> 
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		  
		<!-- Bootstrap -->
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<!-- IonIcons -->
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
		<!-- Toast -->
		<link rel="stylesheet" href="scripts/toast/jquery.toast.min.css">
		<!-- OwlCarousel -->
		<link rel="stylesheet" href="scripts/owlcarousel/dist/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="scripts/owlcarousel/dist/assets/owl.theme.default.min.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="scripts/magnific-popup/dist/magnific-popup.css">
		<link rel="stylesheet" href="scripts/sweetalert/dist/sweetalert.css">
		<script src="scripts/sweetalert/dist/sweetalert.min.js"></script>
		<!-- Custom style -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/style2.css">
		<link rel="stylesheet" href="css/skins/all.css">
		<link rel="stylesheet" href="css/demo.css">   
		<style type="text/css">
			div .row{
				padding-bottom: 15px;
			}
			.fcontact{ 
				    font-size: 22px; 
				    font-weight: 800; 
				    text-transform: uppercase;
				    margin-bottom: 20px;
				    text-decoration: underline;
			}
		</style>
		 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	</head>

	<body  class="skin-orange" onLoad="document.myf.name.focus();">
		  <?php require_once('header.php'); ?>
		<section class="category" style="margin-bottom: 2%" >
			<div class="container"> 
			
			<h1>Privacy Policy</h1>


<p>Effective date: December 14, 2019</p>


<p>FYIPress ("us", "we", or "our") operates the FYIPress mobile application (hereinafter referred to as the "Service").</p>

<p>This page informs you of our policies regarding the collection, use, and disclosure of personal data when you use our Service and the choices you have associated with that data.</p>

<p>We use your data to provide and improve the Service. By using the Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, the terms used in this Privacy Policy have the same meanings as in our Terms and Conditions.</p>

<h2>Definitions</h2>
<ul>
    <li>
        <p><strong>Service</strong></p>
                <p>Service is the FYIPress mobile applications and websites etc... operated by FYIPress</p>
            </li>
    <li>
        <p><strong>Personal Data</strong></p>
        <p>Personal Data means data about a living individual who can be identified from those data (or from those and other information either in our possession or likely to come into our possession).</p>
    </li>
    <li>
        <p><strong>Usage Data</strong></p>
        <p>Usage Data is data collected automatically either generated by the use of the Service or from the Service infrastructure itself (for example, the duration of a page visit).</p>
    </li>
    <li>
        <p><strong>Cookies</strong></p>
        <p>Cookies are small files stored on your device (computer or mobile device).</p>
    </li>
</ul>

<h2>Information Collection and Use</h2>
<p>We collect several different types of information for various purposes to provide and improve our Service to you.</p>

<h3>Types of Data Collected</h3>

<h4>Personal Data</h4>
<p>While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you ("Personal Data"). Personally identifiable information may include, but is not limited to:</p>

<ul>
<li>Email address</li><li>Cookies and Usage Data</li>
</ul>

<h4>Usage Data</h4>

<p>When you access the Service by or through a mobile device, we may collect certain information automatically, including, but not limited to, the type of mobile device you use, your mobile device unique ID, the IP address of your mobile device, your mobile operating system, the type of mobile Internet browser you use, unique device identifiers and other diagnostic data ("Usage Data").</p>

<h4>Tracking &amp; Cookies Data</h4>
<p>We use cookies and similar tracking technologies to track the activity on our Service and we hold certain information.</p>
<p>Cookies are files with a small amount of data which may include an anonymous unique identifier. Cookies are sent to your browser from a website and stored on your device. Other tracking technologies are also used such as beacons, tags and scripts to collect and track information and to improve and analyse our Service.</p>
<p>You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.</p>
<p>Examples of Cookies we use:</p>
<ul>
    <li><strong>Session Cookies.</strong> We use Session Cookies to operate our Service.</li>
    <li><strong>Preference Cookies.</strong> We use Preference Cookies to remember your preferences and various settings.</li>
    <li><strong>Security Cookies.</strong> We use Security Cookies for security purposes.</li>
</ul>

<h2>Use of Data</h2>
    
<p>FYIPress uses the collected data for various purposes:</p>    
<ul>
    <li>To provide and maintain the Service</li>
    <li>To notify you about changes to our Service</li>
    <li>To allow you to participate in interactive features of our Service when you choose to do so</li>
    <li>To provide customer care and support</li>
    <li>To provide analysis or valuable information so that we can improve the Service</li>
    <li>To monitor the usage of the Service</li>
    <li>To detect, prevent and address technical issues</li>
</ul>

<h2>Transfer Of Data</h2>
<p>Your information, including Personal Data, may be transferred to - and maintained on - computers located outside of your state, province, country or other governmental jurisdiction where the data protection laws may differ than those from your jurisdiction.</p>
<p>If you are located outside United States and choose to provide information to us, please note that we transfer the data, including Personal Data, to United States or any country we have management or part of management there and process it there.</p>
<p>Your consent to this Privacy Policy followed by your submission of such information represents your agreement to that transfer.</p>
<p>FYIPress will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy and no transfer of your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of your data and other personal information.</p>

<h2>Disclosure Of Data</h2>

<h3>Legal Requirements</h3>
<p>FYIPress may disclose your Personal Data in the good faith belief that such action is necessary to:</p>
<ul>
    <li>To comply with a legal obligation</li>
    <li>To protect and defend the rights or property of FYIPress</li>
    <li>To prevent or investigate possible wrongdoing in connection with the Service</li>
    <li>To protect the personal safety of users of the Service or the public</li>
    <li>To protect against legal liability</li>
</ul>

<p>As an European citizen, under GDPR, you have certain individual rights. You can learn more about these guides in the <a href="https://termsfeed.com/blog/gdpr/#Individual_Rights_Under_the_GDPR">GDPR Guide</a>.</p>

<h2>Security of Data</h2>
<p>The security of your data is important to us but remember that no method of transmission over the Internet or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>

<h2>Service Providers</h2>
<p>We may employ third party companies and individuals to facilitate our Service ("Service Providers"), to provide the Service on our behalf, to perform Service-related services or to assist us in analyzing how our Service is used.</p>
<p>These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>

 


<h2>Links to Other Sites</h2>
<p>Our Service may contain links to other sites that are not operated by us. If you click a third party link, you will be directed to that third party's site. We strongly advise you to review the Privacy Policy of every site you visit.</p>
<p>We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>


<h2>Children's Privacy</h2>
<p>Our Service does not address anyone under the age of 18 ("Children").</p>
<p>We do not knowingly collect personally identifiable information from anyone under the age of 18. If you are a parent or guardian and you are aware that your Child has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from children without verification of parental consent, we take steps to remove that information from our servers.</p>


<h2>Changes to This Privacy Policy</h2>
<p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>
<p>We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update the "effective date" at the top of this Privacy Policy.</p>
<p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>


<h2>Contact Us</h2>
<p>If you have any questions about this Privacy Policy, please contact us:</p>
<ul>
        <li>By email: info@chatsrun.com</li>
          
        </ul>
 
		</section>

		<?php require_once ('footer.php') ?>

		<!-- JS -->
		<script src="js/jquery.js"></script>
		<script src="js/jquery.migrate.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
		<script>var $target_end=$(".best-of-the-week");</script>
		<script src="scripts/jquery-number/jquery.number.min.js"></script>
		<script src="scripts/owlcarousel/dist/owl.carousel.min.js"></script>
		<script src="scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
		<script src="scripts/easescroll/jquery.easeScroll.js"></script>
		<script src="scripts/toast/jquery.toast.min.js"></script>
		
		<script src="js/e-magz.js"></script>
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