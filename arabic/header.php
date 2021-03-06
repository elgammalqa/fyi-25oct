<?php
	require_once('online.php');
	$domain = 'https://fyipress.net/';
	$user_info = get_user_country(); 
	$user_country = trim($user_info['country']);

	$resource_countries = get_list_of_countries();
    $user_country_in_array = false;
	if(in_array($user_country, $resource_countries)){
	    $user_country_in_array = true;
	    require_once 'models/v4.utilisateurs.model.php';
        $country_to_display = v4Utilisteurs::get_country_arabic_name($user_country);
    }
	else{
        $country_to_display = 'العالم';
    }

//echo $country_to_display; exit;

  if(isset($_COOKIE['fyiuser_email'])){
 	$user_email=$_COOKIE['fyiuser_email'];
}else if(isset($_SESSION['user_auth']['user_email'])){
	$user_email=$_SESSION['user_auth']['user_email'];
}

 ?> 
<head>
<script async defer data-website-id="afc1b19c-5319-4097-8747-3b05933578c7" src="https://www.fyipress.net/umami.js"></script><meta http-equiv="Content-Type" content="text/html; charset=utf-8">  
	<meta name="p:domain_verify" content="20fe15c41ecc108c8279c64b0f7216f0"/>  
	<title style="text-align: right;" >
		إف واي آي برس : آخر الأخبار حول العالم 
	</title>    
	
    <style type="text/css">

        @media only screen and (max-width: 991px) {

        #navid {
          overflow: hidden;
        }
        #colorblack  li a{
            color: black;
        }

        .content {
          padding: 16px;
        }

        .sticky {
          position: fixed;
          top: 0;
          width: 100%;
        }

        .sticky + .content {
          padding-top: 60px;
        }
        #logocolor{
            background-color: #55abcd;
        }
        }

        @media only screen and (min-width: 991px) {
            <?php if ($log==false) {  ?>
                #colorblack  li a{
                    color: white;
                    font-size: 15px;  letter-spacing: 2px; font-weight: 700;
                    line-height: 32px;  padding-top: 16px; padding-left: 30px;
                }
            <?php }else {  ?>
                #colorblack  li a{
                    color: white;
                    font-size: 15px;  letter-spacing: 2px; font-weight: 700;
                    line-height: 32px;  padding-top: 16px; padding-left: 25px;
                }
           <?php } ?>

                #colorblack2 li a{
                    color: black;
                }
                .pl{
                     padding-left: 80px !important;
                      padding-top: 7px !important;
                }
                .plm li a{
                     padding-left: 30px !important;
                }
                .header_float_right{
                        float: right !important ;
                    }
            }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
        }

        @media only screen and (min-width: 991px) {
            .dropdown-content {
                position: absolute;
                background-color: #f9f9f9;
                width: 340px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                padding: 12px 16px;
                z-index: 1;
                border-bottom: 1px solid #ccc;
                right: -150px;
            }
        }

        .plm li .dropdown-content a{
            float: right;
            width: 48%;
            height: 40px;
            line-height: 40px;
            display: block;
            padding: 0 30px 0 0 !important;
            text-transform: capitalize;
            padding-left: 0 !important;
            border-bottom: 1px solid #f1f1f1;
            font-family: 'Droid Arabic Kufi', serif;
            font-size: 12px;
            margin-left: 1%;
            margin-right: 1%;
        }

        .plm li .dropdown-content a img{
            float: right;
            width: 25px;
            height: 18px;
            margin-right: -30px;
            margin-left: 10px;
            margin-top: 10px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
        @media only screen and (min-width: 991px) {
            #menu-lists ul.nav-list.plm {
                direction: rtl;
            }
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112526925-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-112526925-2');
    </script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-174224614-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());

        gtag('config', 'UA-174224614-1');
        </script>
    <link rel="stylesheet" type="text/css" href="fonts/EARLY_ACCESS.css">
 </head>
<header style="text-align: right;" class="primary">

    <div  class="navbar-expand-lg fixed-top navbar-dark bg-primary">
        <nav class="menu" style="width: 100% ;height: 100%;   background-color: #55abcd; display: block !important;" >
            <div class="container">
                <div style="background-color: #55abcd;" id="menu-list" dir="RTL">
                    <ul id="colorblack" class="nav-list" dir="RTL" >
                             <?php if(isMobile()){ ?>
                        <li style="background-color: red; " class="backk" ><a
                            style=" font-size: 30px; color:#fff; border-bottom: none !important; "> <i style="text-align: left; font-size: 30px;"
                            class="ion-ios-arrow-forward"></i>  رجوع  </a></li>
                         <?php }else{ ?>
                     <li class="header_float_right" ><a id="logocolor" href="index.php"><img src="images/fyipress.png"  style="width: 50px; height: 30px;" ></a></li>
                     <li class="header_float_right" ><a id="logocolor" href="fyi.php"><img src="../images/fyipress2.png"  style="width: 50px; height: 30px;" ></a></li>
                      <?php }  ?>
                            <li class="header_float_right" ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" target="_blank" href="http://www.chatsrun.com"  >شاتس رن</a></li>
                            <li class="header_float_right"><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" target="_blank" href="http://www.ispotlights.com"  >
                                  سبوت لايتس
                                </a></li>
                            <li class="header_float_right"><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;"  href="favorite_countries.php"  >
                                   المصادر المفضلة
                                </a></li>
                            <?php if ($log==false) {  ?>
                        <li class="header_float_right"><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="login.php"  >
                        تسجيل الدخول</a>
                        </li>
                        <li class="header_float_right"><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="register.php"  >التسجيل</a></li>
                    <?php }else{ ?>
                        <li style="font-size: 20px; "
                        class="dropdown magz-dropdown header_float_right" >
                         <a style="padding-right: 0px !important;padding-left: 0px !important;" >
                            مرحبا :   <?php
                              echo utilisateursModel::getUserName($user_email);  ?>
                              &nbsp; &nbsp;
                                <i class="ion-ios-arrow-left"> </i>
                            </a>
                         <ul id="colorblack2" class="dropdown-menu" style="text-align: right;" >
                                <li>
                                    <a style="padding-left: 0px !important;font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="resetpass.php">
                                        <i  class="icon ion-key">  </i>تغيير كلمة المرور
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li><a style="padding-left: 0px !important; font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="logout.php">
                                    <i class="icon ion-log-out"></i> تسجيل الخروج</a></li>
                            </ul>
                        </li>
                    <?php }  ?>


                                <?php   if(!isMobile()){ ?>
                            <li  class="dropdown magz-dropdown header_float_right">
                                <?php if ($log==false) {  ?>
                                    <a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;">
                                        اللغات
                                        &nbsp;<i class="ion-ios-arrow-left"></i> </a>
                                    <?php }else{ ?>
                                    <a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px; padding-right:85px;">
                                        اللغات
                                        &nbsp;<i class="ion-ios-arrow-left"></i> </a>

                                    <?php } ?>
                                    <ul id="colorblack2" class="dropdown-menu">
                                        <li><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" class="pl" href="index.php" >العربية</a></li>
                                        <li><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" class="pl" href="../urdu/index.php" >ارڈو </a></li>

                                        <li><a class="pl" href="../home.php"  >English</a></li>
                                        <li><a class="pl" href="../turkish/index.php" >Türkçe</a></li>
                                        <li><a class="pl" href="../german/index.php" >Deutsche</a></li>
                                        <li><a class="pl"  href="../spanish/index.php" >
                                        Español</a></li>
                                        <li><a class="pl" href="../french/index.php" >
                                        Français</a></li>
                                        <li><a class="pl"  href="../russian/index.php" >
                                        русский</a></li>
                                        <li><a class="pl" href="../japanese/index.php"  >日本語</a></li>
                                        <li><a class="pl" href="../chinese/index.php"  >中國</a></li>
                                        <li><a class="pl" href="../indian/index.php" >भारतीय</a></li>
                                        <li><a class="pl"  href="../hebrew/index.php"  >עברית</a></li>
                                    </ul>
                                </li>
                                    <?php   } ?>
                                    <li  class="font  header_float_right" ><a target="_blank"  href="search.php" style="padding-left: 0px;" >
                            <i style="font-size: 17pt;" class="ion-search"> 	</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
<!-- Start nav -->
        <?php if(!isMobile()){ ?>
        <nav id="navid" class="menu sticky-top" style=" width: 100% ;height: 100%; ">
        <?php }else{  ?>
        <nav id="navid" class="menu sticky-top" style=" width: 100% ;height: 100%; background-color: #55abcd;  ">
        <?php } ?>
            <div class="container">
                <div class="mobile-toggle">
                    <a href="#" data-toggle="menu" data-target="#menu-lists"><i class="ion-navicon-round" style="color: red;"></i></a>
                </div>

                <div class="mobile-toggle">
                    <a href="#" data-toggle="menu" data-target="#menu-list"><i  class="ion-android-apps" style="color: red;"></i></a>
                </div>

                <div class="mobile-toggle">
                 <a href="#" data-toggle="menu" data-target="#menu-lang"><i class="ion-ios-world"
                    style="color: red;"></i></a>
                </div>
                <div style="float: left;" class="mobile-toggle">
                    <a href="index.php"  ><img style="width: 50px; height: 30px;"
                     src="images/fyipress.png"></a>
                </div>
                <div style="float: left;" class="mobile-toggle">
                    <a href="fyi.php"  ><img style="width: 50px; height: 30px;"
                     src="../images/fyipress2.png"></a>
                </div>
             <div id="menu-lists">
            <ul class="nav-list plm">
             <?php if(isMobile()){ ?>
                        <li style="background-color: red; " class="backk" ><a
                            style=" font-size: 30px; color:#fff; border-bottom: none !important; ">رجوع  <i style="text-align: left; font-size: 30px;" class="ion-ios-arrow-forward"></i></a></li>
                         <?php } ?>
                        <li class="header_float_right">
                        <a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="index.php">الرئيسية</a>
                        </li>

                <li class="header_float_right"><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="breaking_news.php?n=1">أخبار عاجلة</a></li>

                <?php
                if($user_country_in_array){
                ?>
                    <li class="header_float_right"><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="country_news.php?c=<?= $user_country ?>&n=1"><?= $country_to_display ?></a></li>
                <?php
                }
                else{
                    ?>
                    <li class="header_float_right" ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="#">العالم</a></li>
                    <?php
                    }

                ?>

                <li class="header_float_right" ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="category.php?id=News&n=1">الأخبار</a></li>
                        <li class="header_float_right" ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="category.php?id=Sports&n=1">الرياضة</a></li>
                <li class="header_float_right" ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="category.php?id=Economy&n=1">الاقتصاد</a></li>
                <li class="header_float_right" ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="category.php?id=Health&n=1">الصحة</a></li>
                        <li class="header_float_right" ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="category.php?id=Arts&n=1">الفن</a></li>
                        <li class="header_float_right" ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="category.php?id=Technology&n=1">التكنولوجيا</a></li>
                        <li class="header_float_right" ><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="category.php?id=Culture&n=1">الثقافة</a></li>
                        <li class="header_float_right"><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="library.php?n=1">المكتبة</a></li>

                <li class="header_float_right dropdown"><a style="font-family: 'Droid Arabic Kufi', serif; letter-spacing: 0px;" href="#">الدول</a>
                    <div class="dropdown-content">
                        <?php
                        foreach ($resource_countries as $item){
                            ?><a href="country_news.php?c=<?=$item?>&n=1"><img src="<?=$domain?>v2/countries/<?=ucwords($item)?>.png"> <?=get_arabic_country_name($item)
                            ?></a><?php
                        }
                        ?>
                        </div>
                </li>
                    </ul>
            </div>

              <?php if(isMobile()){ ?>
               <div id="menu-lang">
                    <ul class="nav-list plm">
                        <li style="background-color: red; " class="backk" ><a
                         style="  font-size: 30px; color:#fff; border-bottom: none !important; ">رجوع  <i style="text-align: left; font-size: 30px;"
                            class="ion-ios-arrow-forward"></i></a></li>
                                        <li><a  href="index.php"  >العربية</a></li>
                                        <li><a  href="../urdu/index.php" >ارڈو </a></li>
                                        <li><a   href="../home.php" >English</a></li>
                                        <li><a   href="../turkish/index.php" >Türkçe</a></li>
                                        <li><a href="../german/index.php"  >Deutsche</a></li>
                                        <li><a   href="../spanish/index.php" >Español</a></li>
                                        <li><a   href="../french/index.php" >Français</a></li>
                                        <li><a   href="../russian/index.php" >русский</a></li>
                                        <li><a   href="../japanese/index.php" >日本語</a></li>
                                        <li><a  href="../chinese/index.php" >中國</a></li>
                                        <li><a  href="../indian/index.php" >भारतीय</a></li>
                                        <li><a   href="../hebrew/index.php"  >עברית</a></li>
                    </ul>
                </div>
              <?php } ?>
          </div>
        </nav>
        <!-- End nav -->
    </header>
    <div id="token" style="display: none"></div>
    <div id="msg" style="display: none"></div>
    <div id="notis" style="display: none"></div>
    <div id="err" style="display: none"></div>
<script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-messaging.js"></script>
<!-- For an optimal experience using Cloud Messaging, also add the Firebase SDK for Analytics. -->
<script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-analytics.js"></script>
<script>
    MsgElem = document.getElementById("msg");
    TokenElem = document.getElementById("token");
    NotisElem = document.getElementById("notis");
    ErrElem = document.getElementById("err");
    // Initialize Firebase
    // TODO: Replace with your project's customized code snippet
    var config = {
        apiKey: "AIzaSyDStHGkHD3ngmBjB6VHRbbgE5NEPBYIXvU",
        authDomain: "fyipressweb.firebaseapp.com",
        databaseURL: "https://fyipressweb.firebaseio.com",
        projectId: "fyipressweb",
        storageBucket: "fyipressweb.appspot.com",
        messagingSenderId: "954164744681",
        appId: "1:954164744681:web:adc388069c63e45f9fbb78"
    };
    firebase.initializeApp(config);

    const messaging = firebase.messaging();
    messaging
        .requestPermission()
        .then(function () {
            MsgElem.innerHTML = "Notification permission granted."
            //console.log("Notification permission granted.");

            // get the token in the form of promise
            return messaging.getToken()
        })
        .then(function(token) {
            TokenElem.innerHTML = token;
            document.cookie = 'tk='+token;
            //console.log(token);
        })
        .catch(function (err) {
            ErrElem.innerHTML =  ErrElem.innerHTML + "; " + err
            //console.log("Unable to get permission to notify.", err);
        });

    messaging.onMessage(function(payload) {
        //console.log("Message received. ", payload);
        NotisElem.innerHTML = NotisElem.innerHTML + JSON.stringify(payload);
        //kenng - foreground notifications
        const {title, ...options} = payload.notification;
        navigator.serviceWorker.ready.then(registration => {
            registration.showNotification(title, options);
        });
    });
</script>

<?php
if(utilisateursModel::islogged()){
    if(isset($_COOKIE['tk'])){
        $token = $_COOKIE['tk'];
        require_once('models/utilisateurs.model.php');
        require_once('models/v4.utilisateurs.model.php');
        $utilisateur=new utilisateursModel();
        $user_row = $utilisateur->get_user_by_email($_COOKIE['fyiuser_email']);
        v4Utilisteurs::update_user($token, $user_row['user_id']);
    }
}
?>