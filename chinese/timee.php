<?php  
  function  comments_time($d){
	$c='';
date_default_timezone_set('GMT');
$time2=date("Y-m-d H:i:s");    
$time1=$d;   
$nb = round((strtotime($time2) - strtotime($time1)),1);
$nbseconds = floor($nb); 
if ($nbseconds>=0) {
	if ($nbseconds<=59) {
	 //seconds
	if($nbseconds==0) $n=1;
	else $n=$nbseconds;
	if($n<=1) $c= $n." 秒 之前 ";
    else $c=  $n." 秒 之前";
}else if (round(($nbseconds/60))<60) {
	//minutes
	$n=round(($nbseconds/60),1) ;
	if($n<=1) $c= ceil($n)." 分钟 之前";
	else if($n<2) $c= floor($n)." 分钟 之前"; 
    else $c= floor($n)." 分钟 之前";
}else if (round(($nbseconds/3660),1)<24) {
	//hours 
	$n=round(($nbseconds/3660),1);
	  if($n<=1) $c= ceil($n)." 小时 之前";
	else if($n<2) $c= floor($n)." 小时 之前"; 
	    else $c= floor($n)." 小时 之前";
}else if (round(($nbseconds/86400),1)<=10) {
	//days  
	$n= round(($nbseconds/86400),1) ;
	if($n<=1) $c=  ceil($n)." 日 之前";
	else if($n<2) $c= floor($n)." 日 之前"; 
    else $c=  floor($n)." 日 之前";

}else  {
	$c= "date";
}
}else{
	$c='Err';
}

 return $c;
}









 function  news_time($d){
	$c='';
date_default_timezone_set('GMT');
$time2=date("Y-m-d H:i:s");    
$time1=$d;   
$nb = round((strtotime($time2) - strtotime($time1)),1);
$nbseconds = floor($nb); 
if ($nbseconds>=0) {
	if ($nbseconds<=59) {
	 //seconds
	if($nbseconds==0) $n=1;
	else $n=$nbseconds;
	if($n<=1) $c= $n." 秒 之前 ";
    else $c=  $n." 秒 之前";
}else if (round(($nbseconds/60))<60) {
	//minutes
	$n=round(($nbseconds/60),1) ;
	if($n<=1) $c= ceil($n)." 分钟 之前";
	else if($n<2) $c= floor($n)." 分钟 之前"; 
    else $c= floor($n)." 分钟 之前";
}else if (round(($nbseconds/3660),1)<24) {
	//hours 
	$n=round(($nbseconds/3660),1);
	  if($n<=1) $c= ceil($n)." 小时 之前";
	else if($n<2) $c= floor($n)." 小时 之前"; 
	    else $c= floor($n)." 小时 之前";
}else if (round(($nbseconds/86400),1)<=10) {
	//days  
	$n= round(($nbseconds/86400),1) ;
	if($n<=1) $c=  ceil($n)." 日 之前";
	else if($n<2) $c= floor($n)." 日 之前"; 
    else $c=  floor($n)." 日 之前";

}else  {
	$c= "date";
}
}else{
	$c='Err';
}

 return $c;
}
 






 function  real_news_time($d){
 	$cc=news_time($d);
 	if($cc=="date"||$cc=="Err"){
 			echo $d." GMT";
 	}else{
 			echo $cc;
 	}
 } 
 function  real_comments_time($d){
 	$cc=comments_time($d);
 	if($cc=="Err"){
 			echo $d." GMT";
 	}else{
 			echo $cc;
 	}
 }

 function current_lang(){ 
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
if(isset($_COOKIE['current_language'])){  
	if($actual_link!=$_COOKIE['current_language']){
		setcookie('current_language',$actual_link,time()+31104000,"/");
	}
}else{
	setcookie('current_language',$actual_link,time()+31104000,"/");
}
 }
 

?>