<?php 

class Validator{

function Clean($input){

return   strip_tags(trim($input));
}

function validate($input,$flag,$length = 6){

$status = true;
switch ($flag) {    
   case 1:
       # code...
         if(empty($input)){
             $status = false;
         }
       break;
   case 2:
   # code ... 
   if(strlen($input) < $length){
       $status = false; 
   }
   break;
  case 3: 
  #code .... 
  $allowedExtension = ["png",'jpg'];
  if(!in_array($input,$allowedExtension)){
      $status = false;
  }
  break;

}


return $status ; 
}


}


// $obj = new Validator;
// echo  $obj->Clean('<h1>test</h1>');

?>