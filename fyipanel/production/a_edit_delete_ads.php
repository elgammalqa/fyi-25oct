<?php 
session_start();   ob_start();  
ob_start();
include '../models/user.model.php'; 
include '../models/news.model.php'; 
include '../models/news_published.model.php'; 
include '../../timee.php'; 
  if(userModel::islogged("Admin")==true){ 
    if(userModel::isLoged_but_un_lock()){
        header('Location:lock_screen.php');
    }else{  
       if (count($_COOKIE)>0)  setcookie('fyiplien','a_dnp.php',time()+2592000,"/");
       else   $_SESSION['auth']['lien']="a_dnp.php";  
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
 

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
     <script src="js/sweetalert-dev.js"></script>  
	  <link rel="stylesheet" href="css/sweetalert.css"/>  
  <link rel="stylesheet" href="bootstrap/css/dataTables.bootstrap.css" type="text/css"/>

  </head>

  <body class="nav-md" style="background: #F7F7F7;" >
    <div class="container body">
      <div class="main_container"> 
            <div class="col-md-3 left_col" style="position: fixed; " style="background:#2A3F54; position: fixed;   " >
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0; margin-top: 10px;margin-bottom: 10px;">
              <a href="admin.php" class="site_title"><img style="width: 45px; height: 45px; margin-left: 5px; " class="img-circle" src="images/fyi.jpeg" ><span style="margin-left: 15px;" > FYI PRESS </span></a>
            </div>
  
              <div class="clearfix"></div>
  
              <!-- menu profile quick info -->
             <?php require_once('a_menu_profile.php'); ?> 
              <!-- /menu profile quick info -->
             <?php require_once('a_menu.php'); ?>
             <?php require_once('a_footer.php'); ?> 
          </div>
        </div>

        <!-- top navigation -->
             <?php require_once('a_top_navigation.php'); ?> 
        <!-- /top navigation -->

         <!-- page content -->
        <div class="right_col" role="main"  >
        <!--        Table              -->
        <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Ads : </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content"> 
 <table id="example" class="table table-bordered" cellspacing="0" width="100%">
                            <thead>
                              <tr class="headings">   
                                <th >Title </th>
                                <th >Description </th>
                                <th >Date of </th> 
                                <th >Days rest </th>
                                <th >Hours rest </th>
                                <th >minutes rest  </th>  
                                <th >Delete </th>
                              </tr>
                            </thead> 
                             <tbody>
                      <?php  $news = new news_publishedModel();
                       $query=$news->all_ads();
                        date_default_timezone_set('GMT'); 
                        foreach($query as $news){   ?>     
                            <tr >  
                            <td ><?php echo $news['title']; ?></td>
                            <td ><?php echo $news['description']; ?></td>
                            <td ><?php echo $news['pubDate'].' GMT ';; ?></td>
                  <?php    $rest=($news['finDate'])-(time() - strtotime($news['pubDate']));
                           $days=floor($rest/86400); 
                           $hours=floor($rest/3600)-($days*24);
                           $minutes=floor($rest/60)-(($days*24*60)+($hours*60)); 
                             ?>
                            <td ><?php echo $days; ?></td>
                            <td ><?php echo $hours; ?></td>
                            <td ><?php echo $minutes; ?></td>  
                          <form  method="POST">   
                            <td>
                            <input type="hidden" name="id_del" value="<?php echo $news['id']; ?>"/> 
                            <button  class="flat btn btn-danger" name="delete_ads">Delete Ads</button>
                            </td>
                           </form>
                              </tr>
                            <?php }  ?>  
                      </tbody> 
                    </table>     
                  </div>  
              </div>
            </div> 
          <!--        /Table             -->
          </div> 
        <!-- /page content -->
        
         
      <?php   if(isset($_POST['delete_ads'])){      ?>
        <script>
            swal({
                    title: "Are you sure ?",
                    text: "we can not get this Ads Again!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Delete!",
                    cancelButtonText: "No, Cancel!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, 
                function(isConfirm) {
                    if (isConfirm) {
                        swal({
                            type: "success",
                            title: " Successfully deleted",
                            text: "closing in 1 second",
                            timer: 1000,
                            showConfirmButton: false });
                        window.location = 'a_delete_ads.php?id_del=<?php echo $_POST['id_del'];?>';
                    } else {
                        swal("Cancellation successfully", "your Ads is out of risk", "info");
                    }
                });

    </script>
        <?php }  ?>


        <!-- footer content -->
         
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="../../vendors/Flot/jquery.flot.js"></script>
    <script src="../../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../../vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../vendors/moment/min/moment.min.js"></script>
    <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script> 


  <!-- <script src="../../asset/js/jquery.js"></script> -->
  <script src="../../asset/js/jquery-1.8.3.min.js"></script>
  <script src="../../asset/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../../asset/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../../asset/js/jquery.scrollTo.min.js"></script>
  <script src="../../asset/js/jquery.sparkline.js"></script>


  <!--common script for all pages-->
  <script src="../../asset/js/common-scripts.js"></script>

  <script type="text/javascript" src="../../asset/js/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../../asset/js/gritter-conf.js"></script>

  <!--script for this page-->
  <script src="../../asset/js/sparkline-chart.js"></script>
  <script src="../../asset/js/zabuto_calendar.js"></script>
  <script src="bootstrap/js/jquery.dataTables.min.js" ></script>

  <script src="bootstrap/js/dataTables.bootstrap.js" ></script>
  <script type="text/javascript">
      $(document).ready(function() {
          $('#example').dataTable();
      } );
  </script> 


  <?php require_once('a_script.php'); ?>
 
  </body>
</html>
<?php  }
       }else{ ?>
        <script>
          window.location.replace('index.php');
        </script> 
  <?php  } ?>

