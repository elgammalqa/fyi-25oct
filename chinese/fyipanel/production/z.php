<!DOCTYPE html>
<html>
<head>
<script async defer data-website-id="afc1b19c-5319-4097-8747-3b05933578c7" src="http://205.134.254.209:3000/umami.js"></script>
	<title></title>
</head>
<body>
  <form method="POST"  enctype="multipart/form-data" data-parsley-validate 
               class="form-horizontal form-label-left">   
                     <div class="form-group"> 
                      <label style="text-align: left" class="control-label col-md-1 col-sm-1 col-xs-12 " for="first-name">
                        From :  
                      </label>
                      <div class="col-md-2 col-sm-2 col-xs-12"> 
                        <input type="time" required="required" name="from"  class="form-control col-md-2 col-xs-12">
                      </div>
                      <label style="text-align: left" class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">
                        To :   
                      </label>
                      <div class="col-md-2 col-sm-2 col-xs-12"> 
                        <input type="time" required="required" name="to"  class="form-control col-md-2 col-xs-12">
                      </div> 
                      <button  name="submit" class="btn btn-success">Add</button> 
                      
                       <a href="z_edit_delete_hot_ads.php"> <button type="button" name="back" class="btn btn-primary">Back  </button></a>
                    </div>   
   </form> 

     <?php
     if(isset($_POST['submit'])){
        $ad_from=$_POST['from'];
        $ad_to=$_POST['to'];
        echo 'from = '.$ad_from.' to = '.$ad_to.'<br>';
                        }
     ?>




</body>
</html>