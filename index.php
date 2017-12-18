<?php
$arr = array(2,15,"abc","><script>","<a href='test'>Test</a>",9654,"/script2","img","href");
$filter = array("<", ">","="," (",")",";","'","../","/..",chr(0));
  function c($arr,$filter){
     $arr = trim($arr);
     $arr = stripcslashes($arr);
     $arr = strip_tags($arr);
     $arr = htmlspecialchars($arr);
     $arr = str_replace($filter, "", $arr);
 return $arr;
}
//END CLEAN_FUNCTION
$s = $_SERVER['REQUEST_METHOD'];
//CLEAN_REQUESTS
if($s){
 switch ($s) {
   case 'GET':$r=&$_GET;$i++;$t='GET';break;
   case 'POST':$r=&$_POST;$i++;$t='POST';break;
   default:break;
 }
}
if($t === 'GET'){
 foreach ($r as $k => $v) {
   $_GET[$k] = c($v);
 }
}else if($t === 'POST'){
 foreach ($r as $k => $v) {
   $_POST[$k] = c($v);
 }
}
var_dump($arr);
?>
