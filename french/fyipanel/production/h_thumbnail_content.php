<?php 
session_start();   ob_start();   
ob_start();
include '../models/user.model.php';
include '../models/news.model.php'; 
  if(userModel::islogged("Head of Branch")==true){ 
    if(userModel::isLoged_but_un_lock()){
        header('Location:lock_screen.php');
    }else{   
       if (count($_COOKIE)>0)  setcookie('fyiplien','h_thumbnail_content.php',time()+2592000,"/");
       else   $_SESSION['auth']['lien']="h_thumbnail_content.php";   

?>
<!DOCTYPE html> 
<html lang="en">  
  <head>
<script async defer data-website-id="afc1b19c-5319-4097-8747-3b05933578c7" src="https://www.fyipress.net/umami.js"></script> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>FYI PRESS </title>

    <!-- Bootstrap -->
    <link href="../../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    
    <script src="js/sweetalert-dev.js"></script>
	  <link rel="stylesheet" href="css/sweetalert.css"/> 
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col" style="position: fixed;">
          <div class="left_col scroll-view">
           <div class="navbar nav_title" style="border: 0; margin-top: 10px;margin-bottom: 10px;">
              <a href="head.php" class="site_title"><img style="width: 40px; height: 40px; margin-left: 5px; " class="img-circle" src="images/fyi.jpeg" ><span> FYI PRESS </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
             <?php require_once('h_menu_profile.php'); ?>
            <!-- /menu profile quick info -->

            <br />
            <!-- sidebar menu -->
             <?php require_once('h_menu.php'); ?>
            <!-- /sidebar menu -->

           <!-- /menu footer buttons -->
             <?php require_once('h_footer.php'); ?>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
             <?php require_once('h_top_navigation.php'); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
           
          <!-- /top tiles -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Add Thumbnail Preview to video  </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li> 
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form method="POST" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="form-group"> 
                      <label style="text-align: left" class="control-label col-md-2 col-sm-3 col-xs-12 col-md-offset-1 " for="first-name"> preview image :  
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="media[]" runat="server"  accept="accept="video/*|image/*" required="required" id="first-name"   class="form-control col-md-7 col-xs-12" multiple="multiple" > 
                      </div>  
                       <input type="submit" value="Generate The Link" class="btn btn-success" required="required" name="insert" style="text-align: left" class="control-label col-md-1 col-sm-3 col-xs-12"> 
                    </div> 
                </form>  
                     
                    <?php  
                        if(isset($_POST['insert'])){   
                           $tr=true; 
                            for($i=0;$i<count($_FILES["media"]["name"]);$i++){

                $target_dir_tmp = "../views/image_tmp/";
                $target_file = $target_dir_tmp . basename($_FILES["media"]["name"][$i]);  
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);  
                        // Allow certain file formats
                    if($imageFileType != "jpg" &&$imageFileType != "JPG" && $imageFileType != "png"&& 
                      $imageFileType != "PNG" && $imageFileType != "jpeg"&& $imageFileType != "JPEG" 
                     && $imageFileType != "gif"&& $imageFileType != "GIF"  ) {  $tr=false; 
                    }

                      }
                             if($tr==true){
                            for($i=0;$i<count($_FILES["media"]["name"]);$i++){
                              $filetmp=$_FILES["media"]["tmp_name"][$i];
                              $filename=$_FILES["media"]["name"][$i];
                              $filetype=$_FILES["media"]["type"][$i]; 
                              $target_dir = "../views/thumbnail_content/"; 
                              $target_tmp = "../views/image_tmp/"; 
                              $filepath= $target_dir."".$filename;
                              $filepathtmp= $target_tmp."".$filename;
                              $imageFileType = pathinfo($filepathtmp,PATHINFO_EXTENSION);
                              $ImageNameNews=(string)newsModel::nbr_total_of_news()+1; 
                              move_uploaded_file($filetmp,$filepathtmp); 
                              $existe=true;
                              while($existe==true){ 
                                $num=$ImageNameNews."-".rand(500,900);//1-202
                                $target_f2tmp= $target_tmp . basename($num.".".$imageFileType);
                                //../views/image_tmp/1-202.jpg
                                $target_f2= $target_dir."".$num.".".$imageFileType;
                                //../views/image_content/1-202.jpg
                                if (file_exists($target_f2tmp)==false&&file_exists($target_f2)==false) {
                                  rename($filepathtmp,$target_f2tmp); //../views/image_tmp/1-202.jpg
                                  copy($target_f2tmp,$target_f2);  
                                  echo $target_f2."<br><br>"; 
                                  unlink($target_f2tmp); 
                                  $existe=false; 
                                } 
                              }// while  
                                }// for  
                                 }else{
                        echo '<script>  swal("Attention!","Sorry, Just Accept jpg, jpeg, png & gif Format\n!","warning"); </script> '; 
                              }     
                                
                        }  ?> 
                 
                   
                     <br> 
                     <div class="form-group">
                      <span class="control-label col-md-3 col-sm-3 col-xs-12" > </span> 
                      <div class="col-md-7 col-sm-6 col-xs-12">
                         <label style="text-align: left" > </label>
                      </div>
                    </div>  
                  <hr>   
                  </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content --> 
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../../../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../../../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../../../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../../../vendors/Flot/jquery.flot.js"></script>
    <script src="../../../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../../../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../../../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../../../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../../../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../../../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../../../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../../../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../../../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../../../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../../../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../../vendors/moment/min/moment.min.js"></script>
    <script src="../../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	  <?php require_once('a_script.php'); ?>

  </body>
</html>
<?php } }else{ ?>
        <script>
          window.location.replace('index.php');
        </script> 
  <?php  } ?>

